<?php


//Saber si un Usuaio o no tiene na imagen
	$usuario = App\User::find(1);

	$image = $usuario->image;

	if($image){
		echo 'Tiene Imagen';
	}else{
		echo 'No tiene imagen';
	}
	return $image;


//01 Crear una imagen para un usuario utilizando el metodo save
	$imagen = new App\Image(['url'=>'imagenes/avatar.png']);

	$usuario = App\User::find(1);

	$usuario->image()->save($imagen);

	
	return $usuario;

//02 Obtener las informciones de las imagenes a traves del Usuario
	$usuario = App\User::find(1);

	$usuario->image;


	return $usuario->image->url;
//03 Crear varias imagen para un producto utilizando el metodo saveMany

	$producto = App\Product::find(1);
	$producto->images()->saveMany([
		new App\Image(['url' => 'imagenes/avatar.png']),
		new App\Image(['url' => 'imagenes/avatar2.png']),
		new App\Image(['url' => 'imagenes/avatar2.png']),
	]);

	
	return $producto->images;

//04 Otra forma Crear una imagen para un usuario utilizando el metodo create
	//$imagen = new App\Image(['url'=>'imagenes/avatar.png']);//Eliminamos la instancia

	$usuario = App\User::find(1);

	$usuario->image()->create([
		'url' => 'imagenes/avatar2.png',
	]);

	
	return $usuario;

//04 Otra forma seria metodo create

	$imagen =[];
	$imagen['url'] ='imagenes/avatar2.png';
	$usuario = App\User::find(1);

	$usuario->image()->create($imagen);

	
	return $usuario;

	//05 Crear varias imagen para un Producto utilizando el metodo createMany
	$imagen =[];
	$imagen[]['url'] ='imagenes/avatar.png';
	$imagen[]['url'] ='imagenes/avatar2.png';
	$imagen[]['url'] ='imagenes/avatar3.png';
	$imagen[]['url'] ='imagenes/a.png';
	$imagen[]['url'] ='imagenes/a.png';
	
	$producto = App\Product::find(2);
	$producto->images()->createMany($imagen);
	
	return $producto->images;

	//06 Actualizar una Imagen
	$usuario = App\User::find(1);

	 $usuario->image->url='imagenes/avatar2.png';
	 $usuario->push();//Actualizamos
	
	 return $usuario->image;//Llamamos a la relacion

	 //07 Actualizar Imagen de los productos
	$producto = App\Product::find(2);
	$producto->images[0]->url='imagenes/a.png';
	$producto->push();
	 return $producto->images;//Llamamos a la relacion

	 //08 Buscar el registro relacionado en la imagen
	$imagen = App\Image::find(11);
	return $imagen->imageable;//Llamamos a la relacion

//09 Delimitar los registros
	$producto = App\Product::find(2);
	return $producto->images()->where('url','imagenes/a.png')->get();

//10 Ordenar registros que provienen de la relacion
	$producto = App\Product::find(2);
	return $producto->images()->where('url','imagenes/a.png')->orderBy('id','DESC')->get();

//11 Contar los registro relacionados al usuario
	$usuario = App\User::withCount('image')->get();//LLamo al metodo images para saber cuantos registros tengo relacionados con este usuario
	$usuario = $usuario->find(1);
	return $usuario;

//12 Contar los registro relacionados al producto
	$producto = App\Product::withCount('images')->get();//LLamo al metodo images para saber cuantos registros tengo relacionados con este usuario
	$producto = $producto->find(1);
	return $producto->images_count;
//withCount + va a todos los registros

//13 Contar los registro relacionados al producto OTRA FORMA IDEAL
	$producto = App\Product::find(1);
	return $producto->loadCount('images');//Va directamente al registro que asigne

//14 lazy loading carga diferida
	$producto = App\Product::find(2);
	$imagen = $producto->imege;
	$categoria = $producto->category;

//15 Carga previa (eager  loading)
	$producto = App\Product::with('images')->get();
	return $producto;

//16 Carga previa de relaciones multiples
	$producto = App\Product::with('images','category')->get();
	return $producto;

	//17 Carga previa de relaciones multiples Registro especifico
	$producto = App\Product::with('images','category')->find(2);//Consultar un registro en especifico
	return $producto;	

//19 Carga previa de multiples relaciones a un registro en especifico
	//campo Id de la table + campo id de la relacion y luego los campos especificos a consultar
	$producto = App\Product::with('images:id,imageable_id,url','category:id,descripcion')->find(2);//Consultar un registro en especifico
	return $producto;

//20 Eliminar una Imagen
	$producto = App\Product::find(2);//Consultar un registro en especifico
	$producto->images[0]->delete();	
	return $producto;
//21 Eliminar todas Imagen
	$producto = App\Product::find(2);//Consultar un registro en especifico
	$producto->images()->delete();	
	return $producto;