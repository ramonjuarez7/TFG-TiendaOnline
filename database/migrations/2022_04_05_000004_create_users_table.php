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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Email')->unique();
            $table->string('DNI_NIF',9)->unique();
            $table->string('Nombre');
            $table->string('Apellidos');
            $table->string('Password');
            $table->string('Nacimiento');
            $table->bigInteger('Telefono')->unique();
            $table->string('Registro');
            $table->boolean('Estado')->default(true);
            $table->string('Direccion_envio');
            $table->string('Direccion_facturacion');
            $table->boolean('Privilegios')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
