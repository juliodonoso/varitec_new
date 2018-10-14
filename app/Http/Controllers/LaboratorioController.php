<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Recepcion;
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


    public function listarLaboratorio(){
         $recepcion = DB::table('tbrecepcion as re')
                ->join('tbcliente as cl', 'cl.id', '=', 're.idCliente')
                ->join('tbproducto as p','p.id', '=', 're.idProducto')
                ->where('re.estado',0)
                ->get();

     
        return view('laboratorio.laboratorio',['recepcion'=> $recepcion]);

    }
}
