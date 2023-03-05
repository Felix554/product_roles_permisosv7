<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        /*$cat = new product();
        $cat ->nombre       = 'Mujer';
        $cat ->slug         = 'mujer';
        $cat ->descripcion  = 'Ropa de Mujer';
        $cat->save();

        return $cat;*/

        return Product::all();
    }

    public function show($slug)
    {
        if(Product::where('slug',$slug)->first()){
            return 'Slug Existe';
        }else{
            return 'Slug Disponible';
        }
         
    }

    public function eliminarimagen($id)
    {
        $imagen = Image::find($id);

        $archivo = substr($imagen->url,1);

        $eliminar = File::delete($archivo);//Se elimina el archivo del servidor

        $imagen->delete();

        return 'Eliminado id'.$id.' '.$eliminar;


         
    }
}
