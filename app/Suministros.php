<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suministros extends Model
{
    //
    protected $table = "tbsuministro";
    protected $primaryKey = 'id';
    protected $fillable   = ["prBarcode",""];
}
