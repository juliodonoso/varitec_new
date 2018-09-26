<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunas extends Model
{
    public    $table      = 'tbcomuna';
    protected $primaryKey = 'id';
    protected $fillable   = ['conombre', 'coprovincia',];
}
