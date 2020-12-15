<?php

namespace App\JhonatanPermission\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //es:desde aqui
    //en: from here

    protected $fillable = [
        'name', 'slug', 'description','full-access',
    ];

    //Mostrar todos los usuario con dicho roll
    //1 ROL puede tener Muchos Usuarios
    public function users(){
    	//withTimesTamps = para actualizar las fechas
    	return $this->belongsToMany('App\User')->withTimesTamps();
        //belongsToMany = para indicar la relacion de muchos a muchos
        //Llama a la clase User
    }

    public function permissions(){

        //withTimesTamps = para actualizar las fechas
        return $this->belongsToMany('App\JhonatanPermission\Models\Permission')->withTimesTamps();
        
    }
}
