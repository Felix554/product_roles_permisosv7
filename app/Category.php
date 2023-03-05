<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable=['nombre','slug','descripcion'];
	//Se agrega para el segundo metodo de guardado que es mas facil y seguro
	
    //1 Categoria puede tener muchos productos, el nombre del metodo seria en plural
    public function products(){
    	return $this->hasMany(Product::class);
    	//hasMany = identifica que puede tener muchos productos
    }
}
