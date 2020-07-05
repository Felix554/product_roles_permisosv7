<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any $users.
     *
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
    }

    /**
     * Determine whether the user can update the $user.
     *
     * @param  \App\User  $user
     * @param  \App\User  $$user
     * @return mixed
     */
    public function update(User $usera, User $user, $perm=null)
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
    public function view(User $usera, User $user, $perm=null)
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
}
