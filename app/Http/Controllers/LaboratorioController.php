<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Recepcion;
use App\Folios;
use App\Laboratorio;
class LaboratorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $recepcion = DB::table('tbrecepcion as re')
                ->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
                ->join('tbproducto as p','p.id', '=', 're.idProducto')
                ->select('re.id  as id','numeroRecepcion','clNombre','clRut','idProducto','fechaRecepcion','prBarcode','prNombre','tipoTrabajo')
                ->where('re.estado',0)
                ->get();

     
        return view('laboratorio.inicio',['recepcion'=> $recepcion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('laboratorio.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function listarPreLaboratorio(){
         $laboratorio = DB::table('tbllaboratorio as lab')
                ->leftJoin('tbrecepcion as re','re.id','=','lab.idRecepcion')
                ->leftJoin('tbcliente as cl', 'cl.id', '=', 're.idCliente')
                ->leftJoin('tbproducto as p','p.id', '=', 're.idProducto')
                ->where('lab.estado',0)
                ->select('lab.id','clNombre','lab.numeroLaboratorio as numeroLaboratorio','p.prBarcode as prBarcode','p.prNombre','re.tipoTrabajo')
                ->get();
             
        return view('laboratorio.laboratorio',['laboratorio'=> $laboratorio]);
    }

    public function traspasoLaboratorio($id){
  

        $folio = new Folios();
        $laboratorio = new laboratorio();
        $recepcion = new Recepcion();
                /* buscra recepcion*/
        $recepcion = $recepcion->where('id',$id)->get()->first();
        $recepcion->estado = 1;
        /* buscar numero laboratorio*/        

        $nf=$folio->where('id',1)->get();
      
        /* setear variables laboratorio*/ 
        $laboratorio->numeroLaboratorio=$nf[0]->folioLaboratorio+1;
        $laboratorio->idRecepcion=$recepcion->id;
        $laboratorio->idProducto=$recepcion->idProducto;
        $laboratorio->descripcion='';
        $laboratorio->fechaRecepcion=$recepcion->fechaRecepcion;
        $laboratorio->tipoTrabajo=1;
        $laboratorio->descripcionVisual='';
        $laboratorio->estado=0;


        // setear folio 
        //$folio->where('folioLaboratorio',$folioNumero->folioLaboratorio);
        $n=$nf[0]->folioLaboratorio+1;
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
    public function pdfRecepcion(Request $request)
    {
        $items = DB::table('tbrecepcion as re')
                        ->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
                        ->join('tbproducto as pr', 'pr.id' ,'=','re.idProducto')
                        ->select('re.id  as id',
                            'numeroRecepcion',
                            'clNombre',
                            'clRut',
                            'idProducto',
                            'fechaRecepcion',
                            'tipoTrabajo',
                            'contactoTecnico',
                            'descripcionVisual',
                            'pr.prNombre as nombreProducto',
                            'prBarcode as codEquipo',
                            'mailContacto')
                        ->where('re.id',$request->id)
                        ->where('re.estado',0)
                        ->get()->first();
        
        //$items = DB::table("tbrecepcion")->get();
                       
        view()->share('items',$items);


        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            $namePdf = 'Recepcion-'.$items->numeroRecepcion.'.pdf';
            return $pdf->download($namePdf);
        }


        return view('pdfview');
    }

    public function gestion($id){


        $laboratorio =DB::table('tbllaboratorio as lab')
        ->join('tbrecepcion as res','lab.idRecepcion','=','res.id')
        ->join('tbcliente as cl','cl.id','=','res.idCliente')
        ->where('lab.id',$id)
        ->select('lab.*','res.*','cl.*')
        ->get();
        //$imagen =

         return view('laboratorio.gestion',[
                    'laboratorio'=>$laboratorio,
                    'imagen' => ''
            ]);
    }

}
