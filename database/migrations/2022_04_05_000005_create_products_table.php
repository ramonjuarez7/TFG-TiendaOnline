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
            $table->float('Precio_individual',3,2); //precio del producto individual
            $table->float('Precio_peso_volumen',3,2); //precio por unidad de peso o volumen
            $table->float('Precio_pack',3,2); //precio del paquete si se vende en ese formato
            $table->integer('Unidades_pack'); //cantidad de unidades en un paquete
            $table->string('Codigo_barras')->unique();
            $table->unsignedBigInteger('concretecategory_id');
            $table->timestamps();

            $table->foreign('concretecategory_id')->references('id')->on('concretecategories');
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
