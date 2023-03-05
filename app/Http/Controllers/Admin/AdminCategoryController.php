<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;

class AdminCategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); //Verifica la autenticacion para todas las rutas y luego dejara ingresar
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');
        //dd($nombre);
        $categorias = category::where('nombre','like',"%$nombre%")->orderBy('nombre')->paginate(2);
        return view('admin.category.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//Guardar
    {
        /*$cat = new category();
        $cat-> nombre=$request->nombre;
        $cat-> slug=$request->slug;
        $cat-> descripcion=$request->descripcion;
        $cat->save();

        return $cat;
        //Primer metodo para guardar los registros
        */

        //return category::create($request->all());
        $request->validate([
            'nombre' => 'required|max:50|unique:categories,nombre',
            'slug' => 'required|max:50|unique:categories,slug',
            'descripcion' => 'max:255'
        ]);
         /*return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);*/
       // $request->validate([
        //'name' => ['required', 'string', new Uppercase],
        //]);

        category::create($request->all());

        return redirect()->route('admin.category.index')->with('datos','Registro Creado Correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)//VER
    {
        $cat = category::where('slug',$slug)->firstOrFail();
        $editar='si';

        return view('admin.category.show',compact('cat','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $cat = category::where('slug',$slug)->firstOrFail();
        $editar='si';

        return view('admin.category.edit',compact('cat','editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = category::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:50|unique:categories,nombre,'.$cat->id,//Ignore el id del registro
            'slug' => 'required|max:50|unique:categories,slug,'.$cat->id,
            'descripcion' => 'max:255,'.$cat->id
        ]);
        /*
        $cat-> nombre=$request->nombre;
        $cat-> slug=$request->slug;
        $cat-> descripcion=$request->descripcion;
        $cat->save();
        //forma larga*/
        $cat->fill($request->all())->save();

        //return $cat;
        return redirect()->route('admin.category.index')->with('datos','Registro actualizado Correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = category::findOrFail($id);
        $cat->delete();

        return redirect()->route('admin.category.index')->with('datos','Registro eliminado Correctamente!');
    
    }
}
