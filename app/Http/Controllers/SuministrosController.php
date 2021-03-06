<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Suministros;
use App\Folios;

class SuministrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $suminitros = Suministros::paginate(15);
        return view('suministros.index',['suminitros'=>$suminitros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suministros= new Suministros();
        $n_cotizacion = Folios::find(1)->folioCotizacion +1 ; 
        $username=Auth::user()->name;
        return view('suministros.solicitud',[
            'suministros' => $suministros->all(),
            'solicitante' => $username,
            'cotizacion' => $n_cotizacion,
            ] );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request->prNombre);
        $suministros= new Suministros();
        $suministros->prNombre=$request->prNombre;
        $suministros->prInicial = $request->cantidadInicial;
        $suministros->prUnidad = $request->cantidadInicial;
        $suministros->prBarcode=$request->prBarcode;
        $suministros->prValorizado=$request->prValorizado;
        $suministros->prCritico=$request->prCritico;
        $suministros->prInterno=$request->prInterno;
        $suministros->save();
        $suminitros = Suministros::paginate(15);
        return view('suministros.index',['suminitros'=>$suminitros]);

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
        $suministros = Suministros::find($id);
        $suministros->prUnidad = $request->cantidad+$suministros->prUnidad;
        if($suministros->save()){
            echo true;
        }else{
            echo false;
        }
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

    public function getSuministros(){
        return Suministros::All();
    }

    public function mostrar(Request $id){
        return view('suministros.mostrar');
    }

    public function solicitud(){
        return view('suministros.listar');
    }

    public function add(){
        return view('suministros.add');
    }

    public function consultarCantidad($id){
        $suministros = Suministros::find($id);
        echo $suministros->prUnidad;
    }
}
