<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('slug')->unique();
            //Para realizar la consulta por el nombre y no por el Id
            $table->unsignedBigInteger('category_id');//Un producto pertenece a una categoria, por lo que debes crear unos metodos en cada Modelo Categories y products
            //Se coloca el nombre del modelo y luego _ nombre del campo Ejm category_id a quien hace relacion
            $table->bigInteger('cantidad')->unsigned()->default(0);
            $table->decimal('precio_actual',12,2)->default(0);
            $table->decimal('precio_anterior',12,2)->default(0);
            $table->Integer('porcentaje_descuento')->unsigned()->default(0);
            $table->text('descripcion_corta')->nullable();
            $table->text('descripcion_larga')->nullable();
            $table->text('especificaciones')->nullable();
            $table->text('datos_de_interes')->nullable();
            $table->unsignedInteger('visitas')->default(0);
            $table->unsignedInteger('ventas')->default(0);
            $table->string('estado');//estatus del producto
            $table->char('activo',2);
            $table->char('sliderprincipal',2);
            $table->timestamps();
            //$table->unsignedBigInteger('user_id');

            //Llave Foranea
             $table->foreign('category_id')->references('id')->on('categories');
            //Nombre del Modelo _ clavePK + id la referencia de la otra TB + nombre de la table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
