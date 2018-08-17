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

   Route::resource('Recepcion','RecepcionController');
   Route::resource('Bodega','BodegaController');
   Route::resource('Clientes','ClientesController');
   Route::resource('Productos','ProductosController');
   Route::resource('Proveedores','ProveedoresController');
   Route::resource('Provincias','ProveedoresController');
   Route::resource('Regiones','RegionesController');


}); 