<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompendiumCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('compendium_copies', function (Blueprint $table) {
             $table->increments('id');
             $table->BigInteger('incomeNumber')->unsigned();
             $table->smallInteger('copy')->unsigned(); //Ejemplar
             $table->integer('compendium_id')->unsigned();

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
         Schema::dropIfExists('compendium_copies');
     }
}
