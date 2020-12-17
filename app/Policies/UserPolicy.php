<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any $users.
     *$usera = Usuario autenticado
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $usera)// usera = Usuario autenticado user= usuario del q hacemos referencia del q vamos a utilizar o a ver
    {
        //
    }

    /**
     * Determine whether the user can create $users.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $usera)
    {
        return $usera->id > 0;
        //Quiero confirmar el Id del usuario autenticado y si es mayo a 0 podre ingresar y no sale el error 403 por no estar autorizado
    }

    /**
     * Determine whether the user can update the $user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $$user
     * @return mixed
     */
    public function update(User $usera, User $user, $perm=null)//User es el modelo
    {
        if ($usera->havePermission($perm[0])=== true) {
            return true;
        }else
        if ($usera->havePermission($perm[1])=== true) {
            //return true;
            return $usera->id === $user->id;

        }else{
            return false;
        }
        //return $usera->id === $user->id;//Validar si el usuario autenticado es igual al parametro enviado
        //La idea es que cualquier usuario Logueado pueda ver su propio registro, y que no pueda ver el registro de otros
    }
    /**
     * Determine whether the user can view the $user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $$user
     * @return mixed
     */
    public function view(User $usera, User $user, $perm=null)//$usera usuario autenticado $user parametro enviado
    {
        //Se llama $usera->havePermission($perm[0]) que esta en AuthServiceProvider
        //Si tiene el Rol Full-Access que es global o el permiso user.show
        //dd($usera->havePermission($perm)); 
        if ($usera->havePermission($perm[0]) === true) {
            return true;
        }else
        if ($usera->havePermission($perm[1]) === true) {//Verificamos el permiso userown.show que es el 2 parametro de el controlador UserController en el metodo show
            return $usera->id === $user->id;
            //Verificamos que el usuario login es = al usuario que le estoy pasando por parametro

        }else{
            return false;
        }
        //return $usera->id === $user->id;//Validar si el usuario autenticado es igual al parametro enviado
        //La idea es que cualquier usuario Logueado pueda ver su propio registro, y que no pueda ver el registro de otros
    }
}
