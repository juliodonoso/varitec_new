<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regiones extends Model
{
    public    $table      = 'tbregiones';
    protected $primaryKey = 'id';
    protected $fillable   = ['rgnombre', 'rgordinal',];
}
