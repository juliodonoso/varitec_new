<?php

namespace App\Http\Controllers;

use App\Folios;
use App\Http\Controllers\Controller;
use App\Image;
use App\Laboratorio;
use App\Rebaja;
use App\Recepcion;
use App\Suministros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use PDF;

class LaboratorioController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$recepcion = DB::table('tbrecepcion as re')
			->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
			->join('tbproducto as p', 'p.id', '=', 're.idProducto')
			->select('re.id  as id', 'numeroRecepcion', 'clNombre', 'clRut', 'idProducto', 'fechaRecepcion', 'prBarcode', 'prNombre', 'tipoTrabajo')
			->where('re.estado', 0)
			->get();

		return view('laboratorio.inicio', ['recepcion' => $recepcion]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//

		return view('laboratorio.nuevo');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
		$lab = Laboratorio::find($id);
		$lab->estado = 2;
		$lab->save();
		//return view('laboratorio.laboratorio',['laboratorio'=> $laboratorio,'titulo'=>$titulo]);

	}

	public function aceptadas(Request $request, $id) {
		$lab = Laboratorio::find($id);
		if (isset($request->inputname)) {
			//rebaja suministros
			$rebaja = new RebajaController();
			$suministros = new SuministrosController();
			foreach ($request->inputname as $clave => $input) {
				// Code Here
				$rebaja->rebajar($id, $input, $request->inputcantidad[$clave]);
				$suministros->descuento($input, $request->inputcantidad[$clave]);

			}
		}

		//enviar mail con confirmación

		$lab->estado = 3;
		$lab->descripcionVisual = $request->descripcion ? $request->descripcion : '';
		$res = Recepcion::find($lab->idRecepcion);

		Mail::send('mailVaritec', array(
			'name' => "Varitec",
			"body" => "Mensajes desde la gestion",
			"titulo" => "Laboratorio",
			"subTitulo" => "Orden Laboratorio",
			"nombre" => "julio",
			"rut" => "1111",
			"numero" => "999",
		)
			, function ($message) {
				$message->to('mario@svent.cl', 'Mario Vofs')
					->subject('Orden Laboratorio');
				$message->from('jdonoso@ipconfig.cl', 'Gestion Varitec');
			});
		$lab->save();
		//envio correo
		$laboratorio = DB::table('tbllaboratorio as lab')
			->leftJoin('tbrecepcion as re', 're.id', '=', 'lab.idRecepcion')
			->leftJoin('tbcliente as cl', 'cl.id', '=', 're.idCliente')
			->leftJoin('tbproducto as p', 'p.id', '=', 're.idProducto')
			->where('lab.estado', 0)
			->select('lab.id', 'clNombre', 'lab.numeroLaboratorio as numeroLaboratorio', 're.numeroRecepcion as numeroRecepcion', 'p.prBarcode as prBarcode', 'p.prNombre', 're.tipoTrabajo', 're.id as idRes', 'lab.estado as estadoLab')
			->get();

		return view('laboratorio.laboratorio', ['laboratorio' => $laboratorio, 'titulo' => 'Activas']);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
		echo $request;
		echo $id;

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function listarPreLaboratorio() {
		$laboratorio = DB::table('tbllaboratorio as lab')
			->leftJoin('tbrecepcion as re', 're.id', '=', 'lab.idRecepcion')
			->leftJoin('tbcliente as cl', 'cl.id', '=', 're.idCliente')
			->leftJoin('tbproducto as p', 'p.id', '=', 're.idProducto')
			->where('lab.estado', 0)
			->select('lab.id', 'clNombre', 'lab.numeroLaboratorio as numeroLaboratorio', 're.numeroRecepcion as numeroRecepcion', 'p.prBarcode as prBarcode', 'p.prNombre', 're.tipoTrabajo', 're.id as idRes', 'lab.estado as estadoLab')
			->get();
		return view('laboratorio.laboratorio', ['laboratorio' => $laboratorio, 'titulo' => 'Cotización laboratorio']);
	}

	public function listarLaboratorio($id) {
		$laboratorio = DB::table('tbllaboratorio as lab')
			->leftJoin('tbrecepcion as re', 're.id', '=', 'lab.idRecepcion')
			->leftJoin('tbcliente as cl', 'cl.id', '=', 're.idCliente')
			->leftJoin('tbproducto as p', 'p.id', '=', 're.idProducto')
			->where('lab.estado', $id)
			->select('lab.id', 'clNombre', 'lab.numeroLaboratorio as numeroLaboratorio', 're.numeroRecepcion as numeroRecepcion', 'p.prBarcode as prBarcode', 'p.prNombre', 're.tipoTrabajo', 're.id as idRes', 'lab.estado as estadoLab')
			->get();
		$titulo = "Activas";
		if ($id == 1) {
			$titulo = "Trabajo Laboratorio";
		} elseif ($id == 2) {
			$titulo = "Pendientes (Borrador)";
		} elseif ($id == 3) {
			$titulo = "Cerradas (Finalizadas)";
		}

		return view('laboratorio.laboratorio', ['laboratorio' => $laboratorio, 'titulo' => $titulo]);
	}

	public function traspasoLaboratorio($id) {
		$folio = new Folios();
		$laboratorio = new laboratorio();
		$recepcion = new Recepcion();
		/* buscra recepcion*/
		$recepcion = $recepcion->where('id', $id)->get()->first();
		$recepcion->estado = 1;
		/* buscar numero laboratorio*/

		$nf = $folio->where('id', 1)->get();

		/* setear variables laboratorio*/
		$laboratorio->numeroLaboratorio = $nf[0]->folioLaboratorio + 1;
		$laboratorio->idRecepcion = $recepcion->id;
		$laboratorio->idProducto = $recepcion->idProducto;
		$laboratorio->descripcion = '';
		$laboratorio->fechaRecepcion = $recepcion->fechaRecepcion;
		$laboratorio->tipoTrabajo = 1;
		$laboratorio->descripcionVisual = '';
		$laboratorio->estado = 0;

		// setear folio
		//$folio->where('folioLaboratorio',$folioNumero->folioLaboratorio);
		$n = $nf[0]->folioLaboratorio + 1;
		DB::table('tbfolios')
			->where('id', 1)
			->update(['folioLaboratorio' => $n]);

		//dd($folio->folioLaboratorio);
		//guardar
		$recepcion->save();
		$laboratorio->save();

		return json_decode(true);
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function pdfRecepcion(Request $request) {
		$items = DB::table('tbllaboratorio as lab')
			->join('tbrecepcion as re', 're.id', '=', 'lab.idRecepcion')
			->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
			->join('tbproducto as pr', 'pr.id', '=', 're.idProducto')
			->select('lab.id  as idLaboratorio',
				'numeroRecepcion',
				'numeroLaboratorio',
				'clNombre',
				'clRut',
				'clTelefono',
				're.idProducto',
				'lab.fechaRecepcion',
				'lab.tipoTrabajo',
				'contactoTecnico',
				'lab.descripcionVisual',
				'pr.prNombre as nombreProducto',
				'prBarcode as codEquipo',
				'mailContacto')
			->where('lab.id', $request->id)
			->where('lab.estado', 0)
			->get()->first();

		//$items = DB::table("tbrecepcion")->get();

		view()->share('items', $items);

		if ($request->has('download')) {
			$pdf = PDF::loadView('pdfLaboratorio');
			$namePdf = 'Laboratorio-' . $items->numeroLaboratorio . '.pdf';
			return $pdf->download($namePdf);
		}

		return view('pdfLaboratorio');
	}

	public function pdfTerminadas(Request $request) {
		$items = DB::table('tbllaboratorio as lab')
			->join('tbrecepcion as re', 're.id', '=', 'lab.idRecepcion')
			->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
			->join('tbproducto as pr', 'pr.id', '=', 're.idProducto')
			->select('re.id  as id',
				'numeroRecepcion',
				'numeroLaboratorio',
				'clNombre',
				'clRut',
				'clTelefono',
				'lab.idProducto',
				'lab.fechaRecepcion',
				'lab.tipoTrabajo',
				'contactoTecnico',
				'lab.descripcionVisual',
				'pr.prNombre as nombreProducto',
				'prBarcode as codEquipo',
				'mailContacto')
			->where('lab.id', $request->id)
			->get()->first();
		//$items = DB::table("tbrecepcion")->get();

		view()->share('items', $items);

		if ($request->has('download')) {
			$pdf = PDF::loadView('pdfLaboratorio');
			$namePdf = 'Laboratorio-' . $items->numeroLaboratorio . '.pdf';
			return $pdf->download($namePdf);
		}
		return view('pdfLaboratorio');
	}

	public function pdfPendientes(Request $request) {
		$items = DB::table('tbllaboratorio as lab')
			->join('tbrecepcion as re', 're.id', '=', 'lab.idRecepcion')
			->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
			->join('tbproducto as pr', 'pr.id', '=', 're.idProducto')
			->select('lab.id  as idLaboratorio',
				'numeroRecepcion',
				'numeroLaboratorio',
				'clNombre',
				'clRut',
				'clTelefono',
				're.idProducto',
				'lab.fechaRecepcion',
				'lab.tipoTrabajo',
				'contactoTecnico',
				'lab.descripcionVisual',
				'pr.prNombre as nombreProducto',
				'prBarcode as codEquipo',
				'mailContacto')
			->where('lab.id', $request->id)
			->where('lab.estado', 2)
			->get()->first();
		//$items = DB::table("tbrecepcion")->get();

		view()->share('items', $items);

		if ($request->has('download')) {
			$pdf = PDF::loadView('pdfLaboratorio');
			$namePdf = 'Laboratorio-' . $items->numeroLaboratorio . '.pdf';
			return $pdf->download($namePdf);
		}
		return view('pdfLaboratorio');
	}

	public function pdfAceptada(Request $request) {
		$items = DB::table('tbllaboratorio as lab')
			->join('tbrecepcion as re', 're.id', '=', 'lab.idRecepcion')
			->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
			->join('tbproducto as pr', 'pr.id', '=', 're.idProducto')
			->select('lab.id  as idLaboratorio',
				'numeroRecepcion',
				'numeroLaboratorio',
				'clNombre',
				'clRut',
				'clTelefono',
				're.idProducto',
				'lab.fechaRecepcion',
				'lab.tipoTrabajo',
				'contactoTecnico',
				'lab.descripcionVisual',
				'pr.prNombre as nombreProducto',
				'prBarcode as codEquipo',
				'mailContacto')
			->where('lab.id', $request->id)
			->where('lab.estado', 1)
			->get()->first();

		//$items = DB::table("tbrecepcion")->get();

		view()->share('items', $items);

		if ($request->has('download')) {
			$pdf = PDF::loadView('pdfLaboratorio');
			$namePdf = 'Laboratorio-' . $items->numeroLaboratorio . '.pdf';
			return $pdf->download($namePdf);
		}

		return view('pdfLaboratorio');
	}

	public function pdfLaboratorio(Request $request) {
		$items = DB::table('tbllaboratorio as lab')
			->join('tbrecepcion as re', 're.id', '=', 'lab.idRecepcion')
			->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
			->join('tbproducto as pr', 'pr.id', '=', 're.idProducto')
			->select('lab.id  as idLaboratorio',
				'numeroRecepcion',
				'numeroLaboratorio',
				'clNombre',
				'clRut',
				'clTelefono',
				're.idProducto',
				'lab.fechaRecepcion',
				'lab.tipoTrabajo',
				'contactoTecnico',
				'lab.descripcionVisual',
				'pr.prNombre as nombreProducto',
				'prBarcode as codEquipo',
				'mailContacto')
			->where('lab.id', $request->id)
			->where('lab.estado', 1)
			->get()->first();

		//$items = DB::table("tbrecepcion")->get();

		view()->share('items', $items);

		if ($request->has('download')) {
			$pdf = PDF::loadView('pdfLaboratorio');
			$namePdf = 'Laboratorio-' . $items->numeroLaboratorio . '.pdf';
			return $pdf->download($namePdf);
		}

		return view('pdfLaboratorio');
	}

	public function gestion($id) {
		$laboratorio = DB::table('tbllaboratorio as lab')
			->join('tbrecepcion as res', 'lab.idRecepcion', '=', 'res.id')
			->join('tbcliente as cl', 'cl.id', '=', 'res.idCliente')
			->where('lab.id', $id)
			->select('lab.id as idLab', 'lab.*', 'res.*', 'cl.*')
			->get();

		$imagen = new Image();

		$imagenes = $imagen->where('idTabla', $laboratorio[0]->idRecepcion)
			->where('tabla', 'tbrecepcion')
			->select('name', 'src', 'folder')
			->get();

		$suministros = new Suministros();
		//dd( $suministros->all());
		return view('laboratorio.gestion', [
			'laboratorio' => $laboratorio,
			'imagen' => $imagenes,
			'suministros' => $suministros->all(),
		]);

	}

	public function borrador($id) {

		$laboratorio = DB::table('tbllaboratorio as lab')
			->join('tbrecepcion as res', 'lab.idRecepcion', '=', 'res.id')
			->join('tbcliente as cl', 'cl.id', '=', 'res.idCliente')
			->where('lab.id', $id)
			->select('lab.id as idLab', 'lab.*', 'res.*', 'cl.*')
			->get();

		$imagen = new Image();

		$imagenes = $imagen->where('idTabla', $laboratorio[0]->idRecepcion)
			->where('tabla', 'tbrecepcion')
			->select('name', 'src', 'folder')
			->get();

		$suministros = new Suministros();

		$rebaja = new Rebaja();
		$rebajas = $rebaja->join('tbsuministro as tbs', 'tbs.id', '=', 'tbrebaja.idSuministro')->where('idLaboratorio', $id)->get();

		return view('laboratorio.borrador', [
			'laboratorio' => $laboratorio,
			'imagen' => $imagenes,
			'suministros' => $suministros->all(),
			'rebajas' => $rebajas,
		]);

	}

	public function trabajo($id) {

		$laboratorio = DB::table('tbllaboratorio as lab')
			->join('tbrecepcion as res', 'lab.idRecepcion', '=', 'res.id')
			->join('tbcliente as cl', 'cl.id', '=', 'res.idCliente')
			->where('lab.id', $id)
			->select('lab.id as idLab', 'lab.*', 'res.*', 'cl.*')
			->get();

		$imagen = new Image();

		$imagenes = $imagen->where('idTabla', $laboratorio[0]->idRecepcion)
			->where('tabla', 'tbrecepcion')
			->select('name', 'src', 'folder')
			->get();

		$suministros = new Suministros();

		return view('laboratorio.gestion', [
			'laboratorio' => $laboratorio,
			'imagen' => $imagenes,
			'suministros' => $suministros->all(),
			'rebajas' => $rebajas,
		]);

	}

	public function enviarMail() {

		Mail::send('mailVaritec', array('name' => "name", "body" => "Body of email."), function ($message) {
			$message->to('puyol.22@hotmail.com', 'Example')
				->subject('Subject for example');
			$message->from('jdonoso@ipconfig.cl', 'Messagge from example');
		});
	}

}
