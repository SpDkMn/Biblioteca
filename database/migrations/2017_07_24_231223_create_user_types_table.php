<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); 
            $table->boolean('prestamoSala');
            $table->boolean('prestamoDomicilio');
            $table->boolean('castigado');
            $table->integer('tiempoDomicilio')->nullable();
            $table->integer('cantidadSala')->nullable();
            $table->integer('cantidadDomicilio')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('user_types');
    }
}
