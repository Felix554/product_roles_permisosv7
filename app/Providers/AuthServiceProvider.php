<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Policies\UserPolicy;//Se incluye la clase UserPolicy para usarla de proteccion de politicas
/*
GATE = Nos permite crear funciones anonimas, y permite crear funciones de acceso generico

*/

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        //El modelo User se le aplicara las politicas UserPolicy
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //Permisos q se aplican a usuarios logeados
        Gate::define('haveaccess', function (User $user, $perm){
            //dd($user->id);//Para identificar el ID con que estoy LOGIN
            //dd($perm);
            return $user->havePermission($perm);
             //return $user;
        });
    }
}
