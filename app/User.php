<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\JhonatanPermission\Traits\UserTrait;

class User extends Authenticatable
{
    use Notifiable, UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //es:desde aqui
    //en: from here
    //Mostrar todos los roles de dicho usuario
    public function roles(){

        //withTimesTamps = para actualizar las fechas
        return $this->belongsToMany('App\JhonatanPermission\Models\Role')->withTimesTamps();
        
    }

    public function havePermission($permission){


        foreach ($this->roles as $role) {
            //Verifica que en la tabla roles tenga en el campo "full-access = yes"
            if ($role['full-access'] == 'yes') {//Tiene todos los accesos
                return 'true full-access';
            }
            //De lo contrario busca cada uno de los permisos asociados a dicho rol
            foreach ($role->permissions as $perm) {//Recorre la informacion

                //return $perm->slug;
                
                if ($perm->slug == $permission) {//Compara si lo tiene asignado
                    return 'true por permiso';
                }
            }
        }

        return 'false';

        //SE LLEVO A USERTRAIT PARA PODER SER REUTILIZADA EN OTROS SISTEMAS
    }
}
