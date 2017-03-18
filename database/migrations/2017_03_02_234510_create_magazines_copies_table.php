<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagazinesCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magazine_copies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clasification')->unique();
            $table->BigInteger('incomeNumber')->unsigned();
            $table->BigInteger('barcode')->unsigned();
            $table->smallInteger('copy')->unsigned(); //Ejemplar
            $table->integer('magazine_id')->unsigned();



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
        Schema::dropIfExists('magazine_copies');
    }
}
