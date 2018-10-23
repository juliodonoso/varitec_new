<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Clientes;
use App\Recepcion;
use App\Folios;
use App\Regiones;
use App\Productos;
use App\Image;

use PDF;
class RecepcionController extends Controller
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
                        ->select('re.id  as id','numeroRecepcion','clNombre','clRut','idProducto','fechaRecepcion')
                        ->where('re.estado',0)
                        ->get();
        
        return view('recepcion.inicio',['recepcion'=>$recepcion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $folio = Folios::all();
        $regiones = Regiones::select('id','rgnombre')->get()->pluck('rgnombre','id');
        
        return view('recepcion.nuevo',['folioRecepcion' => $folio[0]->folioRecepcion,'regiones'=>$regiones]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $recepcion= new Recepcion();
        $cliente =  new Clientes();
        $producto =  new productos();
        $imagen = new Image();
        $folio = new Folios();

        if($request->clienteNuevo == "false"){
        $cliente->clRut=$request->rutCliente;
        $cliente->clNombre=$request->cliente;
        $cliente->clTelefono=$request->telefono;
        $cliente->clDireccion=$request->direccion;
        //$cliente->=$request->region;
        $cliente->clCiudad=$request->provincia;
        $cliente->clComuna=$request->comuna;
        $cliente->clContacto=$request->contacto;
        $cliente->clEmail=$request->email;
        $cliente->clContactoMail=$request->emailContacto;
        $cliente->save();
        
        $recepcion->idCliente=$cliente->id;
        $recepcion->idProducto=$request->idProducto;
        $recepcion->numeroRecepcion=$request->numeroRecepcion;
        $recepcion->fechaRecepcion=$request->fechaRecepcion;
        $recepcion->contactoTecnico=$request->contacto;
        $recepcion->mailContacto=$request->emailContacto;
        $recepcion->tipoTrabajo=$request->tipoTrabajo;
        $recepcion->descripcionVisual=$request->descripcionVisual;
        $recepcion->save();

        $folio->where('folioRecepcion',$recepcion->numeroRecepcion);
        $folio->folioRecepcion=$request->numeroRecepcion+1;
        $folio->save();
        }else{
        
        $idCliente=$cliente->where('clRut',str_replace('.','',$request->rutCliente))->get();
        $recepcion->idCliente=$idCliente[0]->id;
        $recepcion->idProducto=$request->idProducto;
        $recepcion->numeroRecepcion=$request->numeroRecepcion;
        $recepcion->fechaRecepcion=$request->fechaRecepcion;
        $recepcion->contactoTecnico=$request->contacto;
        $recepcion->mailContacto=$request->emailContacto;
        $recepcion->tipoTrabajo=$request->tipoTrabajo;
         $recepcion->descripcionVisual=$request->descripcionVisual;

        $recepcion->save();            
        $folio->folioRecepcion=$request->numeroRecepcion+1;
        $folio->save();
        }

        $tabla = "tbrecepcion";


         if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name=$file->getClientOriginalName();
                $file->move(public_path().'/storage/recepcion/', $name);  
                $data[] = $name;

                $imagen->name=$name;
                $imagen->folder='recepcion';
                $imagen->src=public_path().'/storage/';
                $imagen->tabla=$tabla;
                $imagen->idTabla=$recepcion->id;  
                $imagen->save();
            }
            
         }

         $arrayRecepcion = $recepcion->all();

         return view('recepcion.inicio',['recepcion'=>$arrayRecepcion]);
        
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


    /*
    * anular registro recepcion
    */
    public function anular($id){
        $recepcion = Recepcion::find($id);

        $recepcion->estado = 99;
        $recepcion->save();
        return json_decode(true);
    }

   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfview(Request $request)
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
            return $pdf->download('pdfview.pdf');
        }


        return view('pdfview');
    }
   
}
