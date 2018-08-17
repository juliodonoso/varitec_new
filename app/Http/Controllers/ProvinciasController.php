<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Provincias;
use App\User;
use Auth;

class ProvinciasController extends Controller
{

    public function index()
    {
        $qryProv = Provincias::orderBy('ponombre' , 'ASC')
                  ->select('id', 'ponombre', 'poregion')
                  ->paginate(10);
        //dd($qryProv);
        $data = array('qryProv' => $qryProv, 'menu' => 'm_Iven');                 
  
      return view('provincias.index')->with($data);       
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //dd($request);
        $this->validator($request->all())->validate();
        //dd($request);
        $prov = new Provincias([ 
          'ponombre' => $request->get('ponombre'),   
          'poregion' => $request->get('poregion')
        ]);
        $prov->save();  
        return redirect()->route('Provincias.index')->with('msg-success','provistrada Exitosamente.!');             
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
        //dd($request);
        //dd($request);
      $this->Validator($request->all())->validate();
      $prov = Provincias::find($id);
      $prov->ponombre = $request->get('ponombre');
      $prov->poregion = $request->get('poregion');
      //dd($prov);
      $prov->save();
      return redirect()->route('Provincias.index')->with('msg-success','Actualizada Exitosamente.!');           
    }

    public function destroy($id)
    {
      $data = Provincias::find($id);
      Provincias::destroy($id);
      return redirect()->route('Provincias.index')->with('msg-error', 'Eliminada Exitosamente');   
    }

        protected function validator(array $data)
    {
      return Validator::make($data,[
        'ponombre' => "required|string|max:20",   
        'poregion' => "required|string|max:2",
      ]);
    }
}
