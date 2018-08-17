<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    public    $table      = 'tbcategoria';
    protected $primaryKey = 'id';
    protected $fillable   = ['ctnombre', 'ctdescripcion', 'ctcreado', 'ctestado', 'ctimagen'];
}
