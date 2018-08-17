<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    public    $table      = 'tbproveedor';
    protected $primaryKey = 'id';
    protected $fillable   = ['pvrut', 'pvnombre', 'pvdireccion', 'pvciudad', 'pvcomuna', 'pvtelefono', 'pvemail', 'pvestado',];
}
