<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JhonatanPermission\Models\Role;
use App\JhonatanPermission\Models\permission;
use Illuminate\Support\Facades\Gate;//Trabajar con los permisos

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('haveaccess','role.index');//Reglas de permisologia

        //$roles = Role::orderBy('id','Desc')->paginate(2);
        //return view('role.index',compact('roles'));
        $roles = Role::orderBy('id','Desc')->get();

        return view('role.index',['roles'=> $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess','role.create');//Reglas de permisologia por roles

        $permissions = Permission::get();//Sse Obtienen todos los valores

        return view('role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//Guardar
    {

        Gate::authorize('haveaccess','role.create');//Reglas de permisologia roles

       $request->validate([
            
            
            'full-access'   => 'required|in:yes,no'
        ]);
         //Problemas con  'name'          => 'required|max:50|roles,name',
       //'slug'          => 'required|max:50|roles,slug',

        $role = Role::create($request->all());

        if ($request->get('permission')) {

            //return $request->all();
            $role->permissions()->sync($request->get('permission'));

        }
        return redirect()->route('role.index')->with('status_success','Role Saved sucsessFully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)//Mostrar
    {
        $this->authorize('haveaccess','role.show');//Reglas de permisologia por roles OTRA FORMA

        $permission_role = [];

        foreach ($role->permissions as $permission) {
            
            $permission_role[] = $permission->id;//= [1,2,3] para q los pueda mostrar en pantalla

        }
        //return $permission_role;
        //$role->permissions;//Nos muestra todos los permisos asociados a dicho ROL
        $permissions = Permission::get();//Sse Obtienen todos los valores

        return view('role.view',compact('permissions','role','permission_role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)//MOdel Binding
    {
        $this->authorize('haveaccess','role.edit');//Reglas de permisologia por roles OTRA FORMA

        $permission_role = [];

        foreach ($role->permissions as $permission) {
            
            $permission_role[] = $permission->id;//= [1,2,3] para q los pueda mostrar en pantalla

        }
        //return $permission_role;
        //$role->permissions;//Nos muestra todos los permisos asociados a dicho ROL
        $permissions = Permission::get();//Sse Obtienen todos los valores

        return view('role.edit',compact('permissions','role','permission_role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->authorize('haveaccess','role.edit');//Reglas de permisologia por roles OTRA FORMA

        $request->validate([
            'name'          => 'required|max:50|unique:roles,name,'.$role->id,
            'slug'          => 'required|max:50|unique:roles,slug,'.$role->id,
            'full-access'   => 'required|in:yes,no,'.$role->id
        ]);

        $role->update($request->all());

        if ($request->get('permission')) {

            //return $request->all();
            $role->permissions()->sync($request->get('permission'));

        }
        return redirect()->route('role.index')->with('status_success','Role Update sucsessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('haveaccess','role.destroy');//Reglas de permisologia por roles OTRA FORMA
        
        $role->delete();

        return redirect()->route('role.index')->with('status_success','Role remove');
    }
}
