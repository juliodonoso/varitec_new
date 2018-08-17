<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    public    $table      = 'tbcliente';
    protected $primaryKey = 'id';
    protected $fillable   = ['clRut', 'clNombre', 'clDireccion', 'clComuna', 'clCiudad', 'clTelefono', 'clEmail', 'clEstado',];
}
