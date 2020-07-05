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
    public function users(){
    	//withTimesTamps = para actualizar las fechas
    	return $this->belongsToMany('App\User')->withTimesTamps();
    }

    public function permissions(){

        //withTimesTamps = para actualizar las fechas
        return $this->belongsToMany('App\JhonatanPermission\Models\Permission')->withTimesTamps();
        
    }
}
