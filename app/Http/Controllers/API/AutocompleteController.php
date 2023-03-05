<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class AutocompleteController extends Controller
{

    public function autocomplete(Request $Request){

    	$palabraabuscar = $Request->get('palabraabuscar');

    	$productos = Product::where('nombre','like','%'.$palabraabuscar.'%')->orderBy('nombre')->get();

    	$resultado =[];

    	foreach ($productos as $prod) {

    		$encontrartexto = stristr($prod->nombre, $palabraabuscar);//Elimina lo q se antepone a lo que buscas
    		$prod->encontrado = $encontrartexto;

    		$recortar_palabra = substr($encontrartexto, 0, strlen($palabraabuscar));//Elimina lo que esta despues de lo que buscas
    		$prod->substr = $recortar_palabra;

    		$prod->name_negrita = str_ireplace($palabraabuscar, "<br>$recortar_palabra</br>", $prod->nombre);

    		$resultado[] = $prod;
    	}


    	return $resultado;

    }

}

