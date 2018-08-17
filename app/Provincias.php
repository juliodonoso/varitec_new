<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    public    $table      = 'tbprovincia';
    protected $primaryKey = 'id';
    protected $fillable   = ['ponombre', 'poregion',];
}
