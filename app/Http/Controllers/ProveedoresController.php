<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Proveedores;
use App\User;
use Auth;

class ProveedoresController extends Controller
{

    public function index()
    {
        $qryPro = Proveedores::orderBy('pvrut' , 'ASC')
                  ->select('id','pvrut', 'pvnombre', 'pvdireccion', 'pvciudad', 'pvcomuna', 'pvtelefono', 'pvemail', 'pvestado')
                  ->paginate(10);
       // dd($qryPro);
        $data = array('qryPro' => $qryPro, 'menu' => 'm_Iven');                 
  
      return view('proveedores.index')->with($data);    
    }

    public function create()
    {
        //
    }

    public function blockPro($id)
    {
       //dd($id);
        $data = Proveedores::find($id);
        Proveedores::where('id' , $id)->update(['pvestado'=> $data->pvestado ? 0 : 1]);
        return redirect()->route('Proveedores.index');       
    }   

    public function store(Request $request)
    {
        //
        $this->validator($request->all())->validate();
       // dd($request);
        $pro = new Proveedores([ 
          'pvrut' => $request->get('pvrut'),   
          'pvnombre' => $request->get('pvnombre'),
          'pvdireccion' => $request->get('pvdireccion'),
          'pvciudad' => $request->get('pvciudad'),
          'pvcomuna' => $request->get('pvcomuna'),
          'pvtelefono' => $request->get('pvtelefono'),
          'pvemail' => $request->get('pvemail'),
          'pvestado' => $request->get('pvestado')
        ]);
        //dd($pro);
        $pro->save();  
        return redirect()->route('Proveedores.index')->with('msg-success','Registrado Exitosamente.!');  
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
      $pro = Proveedores::find($id);
      $pro->pvrut = $request->get('pvrut');
      $pro->pvnombre = $request->get('pvnombre');
      $pro->pvdireccion = $request->get('pvdireccion');
      $pro->pvciudad = $request->get('pvciudad');
      $pro->pvcomuna = $request->get('pvcomuna');
      $pro->pvtelefono = $request->get('pvtelefono');
      $pro->pvemail = $request->get('pvemail');
      //dd($pro);
      $pro->save();
      return redirect()->route('Proveedores.index')->with('msg-success','Actualizado Exitosamente.!');            
    }

    public function destroy($id)
    {
      $data = Proveedores::find($id);
      Proveedores::destroy($id);
      return redirect()->route('Proveedores.index')->with('msg-error', 'Eliminado Exitosamente');       }

    protected function validator(array $data)
    {
      return Validator::make($data,[
        'pvrut' => "required|string|max:9",   
        'pvnombre' => "required|string|max:50",
        'pvdireccion' => "required|string|max:50",
        'pvciudad' => "required|string|max:50",
        'pvcomuna' => "required|string|max:50",
        'pvtelefono' => "required|string|max:9",
        'pvemail' => "required|string|max:50",
      ]);
    }    

}
