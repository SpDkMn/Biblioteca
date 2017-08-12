<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFullcalendareventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fullcalendareventos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fechaIni');
            $table->dateTime('fechaFin')->nullable();
            $table->boolean('todoeldia')->nullable();
            $table->string('color')->nullable();
            $table->mediumText('titulo')->nullable();
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
        Schema::dropIfExists('fullcalendareventos');
    }
}
