<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JhonatanPermission\Models\Role;
use App\User;

class UserController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('haveaccess','user.index');//Reglas de permisologia por roles OTRA FORMA
        //$users = User::orderBy('id','Desc')->paginate(2);
        $users = User::with('roles')->orderBy('id','Desc')->paginate(2);

        //return $users;

        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$this->authorize('create', User::class);
        //Policy   Autoriza el metodo create aL Modelo User::class si se habilita la pilitica
        //return 'Create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', [$user,['user.show','userown.show']]);
        //Metodo view de la Class-UserPolicy + el modelo o inf a enviar + que es lo que quiero enviar
        //El arreglo se refiere al slug de BD de la TB permissions
        //Metodo de UserPolicy + parametros del user

        //$this->authorize('haveaccess','role.edit');//Reglas de permisologia por roles OTRA FORMA
        $roles = Role::orderBy('name')->get();

        return view('user.view',compact('roles','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)//Aqui me traigo los datos del usuario por parametro
    {

        //Este metodo funciona de forma individual por usuario que estan asociado a un Rol en particularidad que poseen unos permisos particulares
        $this->authorize('update', [$user,['user.edit','userown.edit']]);//Metodo de UserPolicy + parametros del user
        //$this->authorize('update', $user);//Metodo de UserPolicy + parametros del user
         //$this->authorize('haveaccess','role.edit');//Reglas de permisologia por roles OTRA FORMA
        $roles = Role::orderBy('name')->get();

        return view('user.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'          => 'required|max:50|unique:users,name,'.$user->id,
            'email'         => 'required|max:50|unique:users,email,'.$user->id
            //Tabla users + nombre del campo + variable $user
        ]);

        //dd($request->all());

        $user->update($request->all());//Se actualizan todos los campos q ya estan declarados en el MD USER $fillable[]

        $user->roles()->sync($request->get('roles'));//Se actualiza la realcion de usuario con roles

        return redirect()->route('user.index')->with('status_success','User Update sucsessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('haveaccess','user.destroy');//Reglas de permisologia por roles OTRA FORMA
        //$this->authorize('haveaccess','user.destroy');//Reglas de permisologia por roles OTRA FORMA
        
        $user->delete();

        return redirect()->route('user.index')->with('status_success','User remove');
    }
}
