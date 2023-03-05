<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\category;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('admin.category.create');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$cat = category::where('slug',$slug)->firstOrFail();
        //$editar='si';

        //return view('admin.category.edit',compact('cat','editar'));
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
        //$cat = category::findOrFail($id);
        /*
        $cat-> nombre=$request->nombre;
        $cat-> slug=$request->slug;
        $cat-> descripcion=$request->descripcion;
        $cat->save();
        //forma larga*/
        //$cat->fill($request->all())->save();
        //return $cat;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
