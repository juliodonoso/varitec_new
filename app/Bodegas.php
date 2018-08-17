<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodegas extends Model
{
    public    $table      = 'tbbodega';
    protected $primaryKey = 'id';
    protected $fillable   = ['bgNombre',];
}
