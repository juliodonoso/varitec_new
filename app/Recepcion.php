<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepcion extends Model
{
    //
   protected $table = 'tbrecepcion';
  
public function Clientes()
{
    return $this->hasOne('App\Clientes','id','idCliente');
}

}
