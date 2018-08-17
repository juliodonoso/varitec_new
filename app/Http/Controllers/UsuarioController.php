<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use Auth;

class UsuarioController extends Controller
{
    public function listAdmins()
    {
     $QryUserAdm = User::orderBy('name' , 'ASC')
              ->where('rol_id' , 1)
              ->select('id',
                       'name', 
                		   'email',
                		   'password',
                		   'rol_id',
                		   'phone',
                		   'rut',
                		   'active',
                		   'created_at')
              ->paginate(10);
      $data = array('QryUserAdm' => $QryUserAdm , 'menu' => 'm_uadm');        
            //  dd($QryUserAdm);
      return view('configuracion.user.listadmin')->with($data);
    }

    public function listUsers()
    {
      $QryUserAdm = User::orderBy('name' , 'ASC')
              ->where('rol_id' , 2)
              ->select('id',
                       'name', 
                       'password',
                       'rol_id',
                       'phone',
              		     'email',
              		     'rut',
              		     'active',
              		     'created_at')
              ->paginate(10);
             //dd($QryUserAdm);
      $data = array('QryUserAdm' => $QryUserAdm , 'menu' => 'm_user');        
      return view('configuracion.user.listuser')->with($data);
    }

    public function createUser(Request $request)
    {
      //dd($request);
       $this->validator($request->all())->validate();
        $data = new User([
          'rut' => $request->get('rut'),
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'phone' => $request->get('phone'),
          'rol_id' => $request->get('rol_id')
        ]);
       //dd($data);
        $data->password = \Hash::make('123456');
        $data->save();
        if($request->rol_id == 1)
            return redirect()->route('config.listadmin')->with('msg-success','Creado Exitosamente');  
        else   
            return redirect()->route('config.listuser')->with('msg-success','Creado Exitosamente');
    }

    public function blockUsers($id)
    {
        $data = User::find($id);
        User::where('id' , $id)->update(['active'=> $data->active ? 0 : 1]);
       // dd($data);
       if($data->rol_id == 1)
            return redirect()->route('config.listadmin');  
        else   
            return redirect()->route('config.listuser');       
    }  

    public function resetUsers($id)
    {
        $data = User::find($id);
        $data->password = \Hash::make('123456');
        $data->save();
       if($data->rol_id == 1)
            return redirect()->route('config.listadmin')->with('msg-success','Clave Reseteada Exitosamente');  
        else   
            return redirect()->route('config.listuser')->with('msg-success', 'Clave Reseteada Exitosamente');
    }   

    public function reset_pass()
    {
      return view('configuracion.user.cambio_clave');
    }

    public function update_pass(Request $request)
    {
      //dd($request);
      $pass1 = $request->pass1;
      $pass2 = $request->pass2;

      $id_usu = Auth::user()->id;
      
      if ($pass1 == $pass2)
      {
          $usuario = User::find($id_usu);
          $usuario ->password = bcrypt($pass1);
          $usuario ->save();
          return redirect()->route('config.resetpass')->with('msg-success','Clave Modificada Exitosamente');
      }
      else{
          return redirect()->route('config.resetpass')->with('msg-error','Error, Las claves no Coinciden !!');
      }


    }

    public function updateUsers(Request $request, $id)
    {
      //dd($id);
      $this->Validator($request->all())->validate();
      $data = User::find($id);
      $data->rut = $request->get('rut');
      $data->name = $request->get('name');
      $data->email = $request->get('email');
      $data->phone = $request->get('phone');
      //dd($data->rol_id);
      $data->save();
      if($data->rol_id == 1)
            return redirect()->route('config.listadmin')->with('msg-success','Actualizado Exitosamente');  
        else   
            return redirect()->route('config.listuser')->with('msg-success','Actualizado Exitosamente');
    }

    public function deleteUser($id)
    {
      $data = User::find($id);
      if($data->rol_id == 1)
      {
        User::destroy($id);
        return redirect()->route('config.listadmin')->with('msg-error','Administrador Eliminado Exitosamente');  
      }  
        else {
              User::destroy($id);
              return redirect()->route('config.listuser')->with('msg-error', 'Usuario Eliminado Exitosamente');
             }   
    }

    protected function validator(array $data)
    {
      return Validator::make($data,[
        'rut' => "required|string|max:9",
        'name' => "required|string|max: 50",
        'email' => "required|string|max: 50",  
        'phone' => "required|string|max:9",
      ]);
    }

}
