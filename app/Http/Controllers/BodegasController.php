<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Bodegas;
use App\User;
use Auth;

class BodegasController extends Controller
{

    public function index()
    {
        $qryBod = Bodegas::orderBy('bgNombre' , 'ASC')
                  ->select('id','bgNombre')
                  ->paginate(10);
        //dd($qryBod);
        $data = array('qryBod' => $qryBod, 'menu' => 'm_Iven');                 
  
      return view('bodegas.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $bod = new Bodegas([
            'bgNombre' => $request->get('bgNombre')
        ]);
        $bod->save();
        return redirect()->route('Bodegas.index')->with('msg-success','Registrada Exitosamente.!');  
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
       // dd($request);
      $this->Validator($request->all())->validate();
      $bod = Bodegas::find($id);
      $bod->bgNombre = $request->get('bgNombre');
      //dd($bod);
      $bod->save();
      return redirect()->route('Bodegas.index')->with('msg-success','Actualizado Exitosamente.!');  
    }

    public function destroy($id)
    {
        //dd($id);
      $data = Bodegas::find($id);
      Bodegas::destroy($id);
      return redirect()->route('Bodegas.index')->with('msg-error', 'Eliminada Exitosamente');
    }

    protected function validator(array $data)
    {
      return Validator::make($data,[
        'bgNombre' => "required|string|max:40",
      ]);
    }

    public function add(){
      return view('Bodegas.add');
    }
}
