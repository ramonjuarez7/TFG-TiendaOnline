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
        Schema::create('concretecategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Nombre');
            $table->unsignedBigInteger('supercategory_id')->nullable();
            $table->timestamps();

            $table->foreign('supercategory_id')->references('id')->on('supercategories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concretecategories');
    }
};
