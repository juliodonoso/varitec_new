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
                ->join('tbrecepcion as re','re.id','=','lab.id')
                ->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
                ->join('tbproducto as p','p.id', '=', 're.idProducto')
                ->where('lab.estado',0)
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

        $folio=$folio->select('folioLaboratorio')->get()->first();
            
        /* setear variables laboratorio*/      
        $laboratorio->numeroLaboratorio=$folio->folioLAboratorio+1;
        $laboratorio->idRecepcion=$recepcion->id;
        $laboratorio->idProducto=$recepcion->idProducto;
        $laboratorio->descripcion='';
        $laboratorio->fechaRecepcion=$recepcion->fechaRecepcion;
        $laboratorio->tipoTrabajo=1;
        $laboratorio->descripcionVisual='';
        $laboratorio->estado=0;


        // setear folio 
        $folio->folioLAboratorio=$folio->folioLAboratorio+1;
        
        //guardar
        $recepcion->save();
        $folio->save();
        $laboratorio->save();

        return json_decode(true);
    }

}
