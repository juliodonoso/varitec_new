<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Regiones;
use App\User;
use Auth;

class RegionesController extends Controller
{

    public function index()
    {
        $qryReg = Regiones::orderBy('rgnombre' , 'ASC')
                  ->select('id', 'rgnombre', 'rgordinal')
                  ->paginate(10);
        //dd($qryReg);
        $data = array('qryReg' => $qryReg, 'menu' => 'm_Iven');                 
  
      return view('regiones.index')->with($data);       
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validator($request->all())->validate();
        $reg = new Regiones([ 
          'rgnombre' => $request->get('rgnombre'),   
          'rgordinal' => $request->get('rgordinal')
        ]);
        //dd($reg);
        $reg->save();  
        return redirect()->route('Regiones.index')->with('msg-success','Registrada Exitosamente.!');            
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
      $this->Validator($request->all())->validate();
      $reg = Regiones::find($id);
      $reg->rgnombre = $request->get('rgnombre');
      $reg->rgordinal = $request->get('rgordinal');
      //dd($reg);
      $reg->save();
      return redirect()->route('Regiones.index')->with('msg-success','Actualizada Exitosamente.!');          
    }

    public function destroy($id)
    {
      $data = Regiones::find($id);
      Regiones::destroy($id);
      return redirect()->route('Regiones.index')->with('msg-error', 'Eliminada Exitosamente');   
    }

    protected function validator(array $data)
    {
      return Validator::make($data,[
        'rgnombre' => "required|string|max:20",   
        'rgordinal' => "required|string|max:4",
      ]);
    }

}
