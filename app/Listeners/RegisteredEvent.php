<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisteredEvent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //dd($event); 
        $event->user->roles()->sync(2);//Se agrega al registrarse el Usuario el Rol de Registered User id 2 segun la BD
        /*Se accede al metodo user para optener sus valores
        Se llama a la relacion roles() 
        y luego se le pasa un array con el rol que se va a asignar*/

    }
}
