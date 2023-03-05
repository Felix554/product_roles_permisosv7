<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //para guardar de manera masiva imagenes
     protected $fillable = [
        'url',
    ];

    //Para identificar a cual modelo pertenece la Imagen
    public function imageable(){
    	return $this->morphTo();

    }
}
