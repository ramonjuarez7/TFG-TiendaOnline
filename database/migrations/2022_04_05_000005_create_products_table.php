<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre');
            $table->string('Imagen');
            $table->string('Informacion');
            $table->boolean('Medicion'); //true = kilogramos, false = litros
            $table->float('Peso_volumen',4,2); //en función de si el valor Medicion es true o false
            $table->float('Precio_individual',5,2); //precio del producto individual
            $table->float('Precio_peso_volumen',5,2); //precio por unidad de peso o volumen
            $table->string('Codigo_barras')->unique();
            $table->integer('Stock');
            $table->integer('Maximo_pedido');
            $table->boolean('Novedad');
            $table->unsignedBigInteger('concretecategory_id')->nullable();
            $table->timestamps();

            $table->foreign('concretecategory_id')->references('id')->on('concretecategories')->onDelete('set null');
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
};
