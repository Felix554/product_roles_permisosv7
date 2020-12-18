<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Product;
use App\Category;
use App\JhonatanPermission\Models\Role;
use App\JhonatanPermission\Models\Permission;
use Illuminate\Support\Facades\Gate;//Trabajar con los permisos

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/test', function () {

	//$user = User::find(2);
	//$user->roles()->sync([4]);
	//return $user->havePermission('role.index');//PAra verificar si el usuario tiene este permiso
	//Gate::authorize('haveaccess','role.show');
	//return $user;	
	
	/*$category = new Category();
	$category->nombre		='NIÑAS';
    $category->slug 		='ninas';
    $category->descripcion 	='Segunda Categoria';
	$category->save();*/

	/*$prod= new Product();
	$prod->nombre ='Producto 3';
    $prod->slug ='Producto 3';
    $prod->category_id = '2';
    //$prod->cantidad ='1';
    //$prod->precio_actual ='';
    //$prod->precio_anterior ='';
    //$prod->porcentaje_descuento ='';
   /* $prod->descripcion_corta ='Producto 3';
    $prod->descripcion_larga ='Producto TRES';
    $prod->especificaciones ='Producto';
    $prod->datos_de_interes ='Producto';
    //$prod->visitas ='';
    //$prod->ventas ='';
    $prod->estado ='NUEVO';//estatus del producto
    $prod->activo ='SI';
    $prod->sliderprincipal='NO';
    $prod->save();*/

	//$prod= Product::find(3)->category;
	//Obtenemos todo el registro de la categoria que esta enlazada con el producto 1
	//$prod= Product::find(1)->first();
	//Obtenemos los valores del producto
	$cat=Category::find(2)->products;
	//products hace relacion al metodo de 1 categoria puede tener N Productos segun la relacion 
	
	return $cat;

});

Route::resource('role', 'RoleController')->names('role');

//Van todos los metodos con exception de create y store ya q se utilizan al registrarse
Route::resource('/user', 'UserController',['except'=>[
	'create','store']])->names('user');

Route::resource('admin/category','Admin\AdminCategoryController')->names('admin.category');

Route::resource('admin/product','Admin\AdminProductController')->names('admin.product');


/*Route::get('/test', function () {
    
 	/*return Role::create([
 		'name' => 'Admin',
 		'slug' => 'admin',
 		'description' => 'Administrador',
 		'full-access' => 'yes',
 	]);
	return Role::create([
 		'name' => 'test',
 		'slug' => 'test',
 		'description' => 'test',
 		'full-access' => 'no',
 	]);

 	*/

 	/*$user = User::find(1);

 	//$user->roles()->attach([1,3]);//Se guardan varios roles
 	//$user->roles()->detach([1]);//Se Eliminar todos los registros de dicho usuario que coincida con el rol 1
 	$user->permissions()->sync([1,2]);//Se Eliminar todos los registros de dicho usuario que coincida con el rol 1

 	return $user->roles;*/

 	/*return Permission::create([
 		'name' => 'List product',
 		'slug' => 'product.index',
 		'description' => 'Un usuario puede listar los permisos',
 	]);*/

 	/*$role = Role::find(2);

 	$role->permissions()->sync([1,2]);//Se Eliminar todos los registros de dicho usuario que coincida con el rol 1

 	return $role->permissions;

});*/
