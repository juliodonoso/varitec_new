<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('auth/login');
   //return App\User::all();
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::get('/', function () {
        return view('layouts.backend.contentdemo');
    })->name('dash.index'); 
	 Route::get('/config/admins', 'UsuarioController@listAdmins')->name('config.listadmin');
	  Route::get('/config/users', 'UsuarioController@listUsers')->name('config.listuser');  
    Route::post('/config/admins/add', 'UsuarioController@createUser')->name('config.adduser');
    Route::get('/config/users/reset/{id}', 'UsuarioController@resetUsers')->name('config.resetuser');  
    Route::get('/config/users/block/{id}', 'UsuarioController@blockUsers')->name('config.blockuser');
    Route::get('/config/users/reset_pass', 'UsuarioController@reset_pass')->name('config.resetpass');
    Route::put('/config/users/update_pass', 'UsuarioController@update_pass')->name('config.updatepass');
    Route::delete('/config/users/delete/{id}', 'UsuarioController@deleteUser')->name('config.deleteUser');
    Route::put('/config/users/update/{id}', 'UsuarioController@updateUsers')->name('config.updateUsers');
    Route::get('/Clientes/find/{rutCliente}','ClientesController@find')->name('clientes.find');
    Route::get('/Productos/find/{serie}','ProductosController@find')->name('clientes.find');
    Route::resource('Recepcion','RecepcionController');
    Route::get('pdfview',array('as'=>'pdfview','uses'=>'RecepcionController@pdfview'));
    Route::get('/Recepcion/anular/{id}','RecepcionController@anular')->name('Recepcion.anular');
    Route::get('/Laboratorio/listarLaboratorio','LaboratorioController@listarPreLaboratorio')->name('Laboratorio.listar');
    Route::get('/Laboratorio/traspaso/{id}','LaboratorioController@traspasoLaboratorio')->name('Laboratorio.trasaso');
    Route::resource('Laboratorio','LaboratorioController');
    
    Route::resource('Bodega','BodegaController');
    Route::resource('Clientes','ClientesController');
    Route::resource('Productos','ProductosController');
    Route::resource('Proveedores','ProveedoresController');
    Route::resource('Provincias','ProvinciasController');
    Route::resource('Regiones','RegionesController');
    Route::resource('Comunas','ComunasController');
    Route::prefix('ajax')->group(function () {
    Route::get('provinciasAjax/{id}','ProvinciasController@findProvincias');
    Route::get('comunasAjax/{id}','ComunasController@findComunas');
});

}); 