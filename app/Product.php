<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	//1 Producto pertenece a una Categoria por esto es que va en singular el nombre del metodo
   public function category(){

   		//$this->belongsTo(category::class,'categorias_id');//si la FK en product se llamara asi
   		return $this->belongsTo(category::class);//Asi o como la de abajo se le pasa el Modelo
   		//return $this->belongsTo('App\Category');

   }
}
