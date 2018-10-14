<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Categorias;
use App\Productos;
use App\Bodegas;
use App\User;
use Auth;
class ProductosController extends Controller
{
public function index()
{
$qryProd = Productos::orderBy('prBarcode' , 'ASC')
->select('id','prBarcode', 'prInterno', 'prNombre', 'prDescripcion', 'prCritico', 'prInicial', 'prValorizado', 'prUnidad','prCategoria','prBodega','prImagen','prEstado')
->paginate(10);
$categorias = Categorias::orderBy('ctdescripcion' , 'ASC')->where('ctestado',1)->pluck('ctdescripcion' , 'id');
$bodegas = Bodegas::orderBy('bgNombre' , 'ASC')->pluck('bgNombre' , 'id');
$proall = Productos::select('id')->get();
// dd($proall);
//$codIn= Productos::where('id' , $qryProd->id)->orderby('created_at','DESC')->last();
//$codIn = ;
//dd($codIn);
$data = array('qryProd' => $qryProd, 'categorias' => $categorias, 'bodegas' => $bodegas, 'menu' => 'm_Iven');

return view('productos.index')->with($data);
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
$prod = new Productos([
'prBarcode'  => $request->get('prBarcode'),
'prInterno'  => $request->get('prInterno'),
'prNombre'   => $request->get('prNombre'),
'prDescripcion' => $request->get('prDescripcion'),
'prCritico'     => $request->get('prCritico'),
'prInicial'     => $request->get('prInicial'),
'prValorizado'  => $request->get('prValorizado'),
'prUnidad'      => $request->get('prUnidad'),
'prCategoria'   => $request->get('prCategoria'),
'prBodega'      => $request->get('prBodega'),
'prEstado'      => $request->get('prEstado'),
]);
$prod ->save();
return redirect()->route('Productos.index')->with('msg-success','Registrado Exitosamente.!');
}
public function show($id)
{
//
}
public function blockProd($id)
{
//dd($id);
$data = Productos::find($id);
Productos::where('id' , $id)->update(['prEstado'=> $data->prEstado ? 0 : 1]);
return redirect()->route('Productos.index');
}
public function edit($id)
{
//
}
public function update(Request $request, $id)
{
// dd($request);
$this->Validator($request->all())->validate();
$prod = Productos::find($id);
$prod->prBarcode = $request->get('prBarcode');
$prod->prInterno = $request->get('prInterno');
$prod->prNombre = $request->get('prNombre');
$prod->prDescripcion = $request->get('prDescripcion');
$prod->prCritico = $request->get('prCritico');
$prod->prInicial = $request->get('prInicial');
$prod->prValorizado = $request->get('prValorizado');
$prod->prUnidad = $request->get('prUnidad');
$prod->prCategoria = $request->get('prCategoria');
$prod->prBodega = $request->get('prBodega');
//dd($prod);
$prod->save();
return redirect()->route('Productos.index')->with('msg-success','Actualizado Exitosamente.!');
}
public function destroy($id)
{
$data = Productos::find($id);
Productos::destroy($id);
return redirect()->route('Productos.index')->with('msg-error', 'Eliminado Exitosamente');
}
protected function validator(array $data)
{
return Validator::make($data,[
'prBarcode' => "required|string|max:20",
'prInterno' => "required|string|max:9",
'prNombre'  => "required|string|max:25",
'prDescripcion' => "required|string|max:50",
'prCritico' => "required|string|max:9",
'prInicial' => "required|string|max:9",
'prValorizado'  => "required",
'prUnidad'      => "required",
'prCategoria'   => "required",
'prBodega'      => "required",
]);
}

public function find($serie){
$data = Productos::where('prBarcode', $serie)->get();
//dd($data);
if($data->count() > 0)
return response()->json($data);
else
return response()->json(false);
}
}