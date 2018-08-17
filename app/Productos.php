<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    public    $table      = 'tbproducto';
    protected $primaryKey = 'id';
    protected $fillable   = ['prBarcode', 'prInterno', 'prNombre', 'prDescripcion', 'prCritico', 'prInicial', 'prValorizado', 'prUnidad','prCategoria','prBodega','prImagen','prEstado'];

    
   public function Categoria()
   {
   	return $this->belongsTo('App\Categorias' , 'prCategoria');
   }

   
   public function Bodega()
   {
   	return $this->belongsTo('App\Bodegas', 'prBodega');
   }

    
}
