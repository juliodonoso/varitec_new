<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    public $table         = 'vend';
    protected $primaryKey = 'ven_id';
    protected $fillable   = [ 'ven_cod', 'ven_des', 'ven_sys_create', ];

}
