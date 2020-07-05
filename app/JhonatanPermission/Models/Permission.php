<?php

namespace App\JhonatanPermission\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
	//Estos son los campos oblif=gatorios para cuando utilicemos la funcion create
    protected $fillable = [
        'name', 'slug', 'description',
    ];

    public function roles(){

        //withTimesTamps = para actualizar las fechas
        return $this->belongsToMany('App\JhonatanPermission\Models\Role')->withTimesTamps();
        //belongsToMany = Relacion de muchos a muchos
        
    }
}
