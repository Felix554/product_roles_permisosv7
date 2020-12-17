<?php

namespace App\JhonatanPermission\Traits;

trait UserTrait{
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

                return true;//TodosAccesos
                //return 'TodosAccesos';//TodosAccesos
            }
            //De lo contrario busca cada uno de los permisos asociados a dicho rol
            foreach ($role->permissions as $perm) {//Recorre la informacion

                //return $perm->slug;
                
                if ($perm->slug == $permission) {//Compara si lo tiene asignado
                    return true;
                }
            }

        }

        return false;
    }
}