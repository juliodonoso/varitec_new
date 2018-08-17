<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Clientes;
use App\User;
use Auth;

class ClientesController extends Controller
{

    public function index()
    {
        $qryCli = Clientes::orderBy('clRut' , 'ASC')
                  ->select('id','clRut', 'clNombre', 'clDireccion', 'clComuna', 'clCiudad', 'clTelefono', 'clEmail', 'clEstado')
                  ->paginate(10);
        //dd($qryCli);
        $data = array('qryCli' => $qryCli, 'menu' => 'm_Iven');                 
  
      return view('clientes.index')->with($data);        
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //dd($request);
        $this->validator($request->all())->validate();
        $cli = new Clientes([ 
          'clRut' => $request->get('clRut'),   
          'clNombre' => $request->get('clNombre'),
          'clDireccion' => $request->get('clDireccion'),
          'clComuna' => $request->get('clComuna'),
          'clCiudad' => $request->get('clCiudad'),
          'clTelefono' => $request->get('clTelefono'),
          'clEmail' => $request->get('clEmail'),
          'clEstado' => $request->get('clEstado')
        ]);
        //dd($cli);
        $cli->save();  
        return redirect()->route('Clientes.index')->with('msg-success','Cliente Exitosamente.!');          
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function blockCli($id)
    {
        //dd($id);
        $data = Clientes::find($id);
        Clientes::where('id' , $id)->update(['clEstado'=> $data->clEstado ? 0 : 1]);
        return redirect()->route('Clientes.index');       
    }    

    public function update(Request $request, $id)
    {
        //dd($request);
      $this->Validator($request->all())->validate();
      $cli = Clientes::find($id);
      $cli->clRut = $request->get('clRut');
      $cli->clNombre = $request->get('clNombre');
      $cli->clDireccion = $request->get('clDireccion');
      $cli->clComuna = $request->get('clComuna');
      $cli->clCiudad = $request->get('clCiudad');
      $cli->clTelefono = $request->get('clTelefono');
      $cli->clEmail = $request->get('clEmail');
      //dd($cli);
      $cli->save();
      return redirect()->route('Clientes.index')->with('msg-success','Actualizado Exitosamente.!');         
    }

    public function destroy($id)
    {
       // dd($id);
      $data = Clientes::find($id);
      Clientes::destroy($id);
      return redirect()->route('Clientes.index')->with('msg-error', 'Eliminada Exitosamente');   
    }

    protected function validator(array $data)
    {
      return Validator::make($data,[

        'clRut' => "required|string|max:9",   
        'clNombre' => "required|string|max:50",
        'clDireccion' => "required|string|max:50",
        'clComuna' => "required|string|max:50",
        'clCiudad' => "required|string|max:50",
        'clTelefono' => "required|string|max:9",
        'clEmail' => "required|string|max:50",
      ]);
    }




}
