<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //1 Categoria puede tener muchos productos, el nombre del metodo seria en plural
    public function products(){
    	return $this->hasMany(Product::class);
    	//hasMany = identifica que puede tener muchos productos
    }
}
