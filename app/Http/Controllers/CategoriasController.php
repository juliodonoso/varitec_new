<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Categorias;
use App\User;
use Auth;

class CategoriasController extends Controller
{

    public function index()
    {
        $qryCat = Categorias::orderBy('ctnombre' , 'ASC')
                  ->select('id','ctnombre', 'ctdescripcion', 'ctestado')
                  ->paginate(10);
        //dd($qryCat);
        $data = array('qryCat' => $qryCat, 'menu' => 'm_Iven');                 
  
      return view('categorias.index')->with($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validator($request->all())->validate();
        $cat = new Categorias([ 
          'ctnombre' => $request->get('ctnombre'),
          'ctdescripcion' => $request->get('ctdescripcion')
        ]);
        $cat->ctestado = $request->ctestado;
        //dd($cat);
        $cat->save();  
        return redirect()->route('Categorias.index')->with('msg-success','Registrada Exitosamente.!');  
    }

    public function show($id) 
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function blockCat($id)
    {
        //dd($id);
        $data = Categorias::find($id);
        Categorias::where('id' , $id)->update(['ctestado'=> $data->ctestado ? 0 : 1]);
        return redirect()->route('Categorias.index');       
    }      

    public function update(Request $request, $id)
    {
       // dd($request);
      $this->Validator($request->all())->validate();
      $cat = Categorias::find($id);
      $cat->ctnombre = $request->get('ctnombre');
      $cat->ctdescripcion = $request->get('ctdescripcion');
      //dd($bod);
      $cat->save();
      return redirect()->route('Categorias.index')->with('msg-success','Actualizado Exitosamente.!'); 


    }


    public function destroy($id)
    {
       // dd($id);
      $data = Categorias::find($id);
      Categorias::destroy($id);
      return redirect()->route('Categorias.index')->with('msg-error', 'Eliminada Exitosamente');        
    }

    protected function validator(array $data)
    {
      return Validator::make($data,[
        'ctnombre' => "required|string|max:40",
        'ctdescripcion' => "required|string|max:100",
      ]);
    }

}
