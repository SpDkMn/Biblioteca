<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('configurations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tiPrestamo');
            $table->string('tcPrestamo');
            $table->string('tReserva');
            $table->string('diaFeriado');
            $table->string('rangoFeriado');
            $table->boolean('activador');
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
        Schema::dropIfExists('configurations');
    }
}
