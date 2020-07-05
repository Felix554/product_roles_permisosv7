<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Policies\UserPolicy;
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
            //dd($user->id);
            //dd($perm);

            return $user->havePermission($perm);
             //return $user;
        });
    }
}
