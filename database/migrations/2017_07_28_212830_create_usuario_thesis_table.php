<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioThesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_thesis', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('thesis_id')->unsigned();
         $table->foreign('thesis_id')->references('id')->on('thesiss');
         $table->integer('user_id')->unsigned();
         $table->foreign('user_id')->references('id')->on('users');
                  
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
        Schema::dropIfExists('usuario_thesis');
    }
}
