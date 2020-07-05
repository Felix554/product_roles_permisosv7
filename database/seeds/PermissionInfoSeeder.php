<?php

use Illuminate\Database\Seeder;
use App\User;
use App\JhonatanPermission\Models\Role;
use App\JhonatanPermission\Models\Permission;
use Illuminate\Support\Facades\Hash;//PAra encriptar
use Illuminate\Support\Facades\DB;//

class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//Desabilitarlos foreing kye
    	DB::statement('SET foreign_key_checks=0');


    	//Truncar las tablas
    	DB::table('role_user')->truncate();
    	DB::table('permission_role')->truncate();
    	Permission::truncate();
    	Role::truncate();
    	//Se habilitan	
    	DB::statement('SET foreign_key_checks=0');

    	$useradmin = User::where('email','admin@admin.com')->first();
    		if ($useradmin) {
    			$useradmin->delete();
    		}
        //user admin
    	$useradmin = User::create([
    		'name' => 'admin',
	        'email' => 'admin@admin.com',
	        'password' => Hash::make('admin')
    	]);

    	//Rol Admin
    	$roladmin = Role::create([
	 		'name' => 'Admin',
	 		'slug' => 'admin',
	 		'description' => 'Administrador',
	 		'full-access' => 'yes',
 		]);

        //Relacion tabla role_user
        $useradmin->roles()->sync([$roladmin->id]);

        //Permission
        $permission_all =[];

        //Permission role
        $permission = Permission::create([
	 		'name' => 'List role',
	 		'slug' => 'role.index',
	 		'description' => 'Un usuario puede listar los role',
 		]);
 		//el slug pertenece al modelo role

 		$permission_all[] = $permission->id;

 		//Permission role
        $permission = Permission::create([
	 		'name' => 'Show role',
	 		'slug' => 'role.show',
	 		'description' => 'Un usuario puede ver un role',
 		]);
 		//el slug pertenece al modelo role

 		$permission_all[] = $permission->id;

 		//Permission role
        $permission = Permission::create([
	 		'name' => 'Create role',
	 		'slug' => 'role.create',
	 		'description' => 'Un usuario puede create un role',
 		]);
 		//el slug pertenece al modelo role

 		$permission_all[] = $permission->id;

 		//Permission role
        $permission = Permission::create([
	 		'name' => 'Edit role',
	 		'slug' => 'role.edit',
	 		'description' => 'Un usuario puede edit los role',
 		]);
 		//el slug pertenece al modelo role

 		$permission_all[] = $permission->id;

 		//Permission role
        $permission = Permission::create([
	 		'name' => 'Destroy role',
	 		'slug' => 'role.destroy',
	 		'description' => 'Un usuario puede destroy los role',
 		]);
 		//el slug pertenece al modelo role

 		$permission_all[] = $permission->id;//Le agrago a dicha variable el id de la tabla perission que acabo de crear

 		//table permission_role
        //$roladmin->permissions()->sync($permission_all);
 		//<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< USER>>>>>>>>>>>>>>>>>>>>>>>>>>>
 		//Permission user
        $permission = Permission::create([
	 		'name' => 'List user',
	 		'slug' => 'user.index',
	 		'description' => 'Un usuario puede listar los user',
 		]);
 		//el slug pertenece al modelo user

 		$permission_all[] = $permission->id;

 		//Permission user
        $permission = Permission::create([
	 		'name' => 'Show user',
	 		'slug' => 'user.show',
	 		'description' => 'Un usuario puede ver un user',
 		]);
 		//el slug pertenece al modelo user

 		$permission_all[] = $permission->id;

 		//Permission user
        $permission = Permission::create([
	 		'name' => 'Edit user',
	 		'slug' => 'user.edit',
	 		'description' => 'Un usuario puede edit los user',
 		]);
 		//el slug pertenece al modelo user

 		$permission_all[] = $permission->id;

 		//Permission user
        $permission = Permission::create([
	 		'name' => 'Destroy user',
	 		'slug' => 'user.destroy',
	 		'description' => 'Un usuario puede destroy los user',
 		]);
 		//el slug pertenece al modelo user

 		$permission_all[] = $permission->id;

        //NEW
        $permission = Permission::create([
            'name' => 'Show own user',
            'slug' => 'userown.show',
            'description' => 'Un usuario puede ver un own user',
        ]);
        //el slug pertenece al modelo user

        $permission_all[] = $permission->id;

        //Permission user
        $permission = Permission::create([
            'name' => 'Edit own user',
            'slug' => 'userown.edit',
            'description' => 'Un usuario puede edit  own user',
        ]);
		$permission_all[] = $permission->id;
		/*//Permission user
        $permission = Permission::create([
	 		'name' => 'Create user',
	 		'slug' => 'user.create',
	 		'description' => 'Un usuario puede create un user',
 		]);
 		//el slug pertenece al modelo user

 		$permission_all[] = $permission->id;*/

 		//table permission_role
 		//$roladmin->permissions()->sync($permission_all);

    }
}
