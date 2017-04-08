<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('book_copies', function (Blueprint $table) {
            $table->increments('id');
            $table->biginteger('incomeNumber');
            $table->string('clasification');
            $table->biginteger('barcode');
            $table->integer('copy');
            $table->integer('edition');
            //adquision del libro
            $table->string('acquisitionModality');
            $table->string('acquisitionSource');
            $table->string('acquisitionPrice');
            $table->string('acquisitionDate');
            //fin adquision
            $table->string('location');
            $table->integer('management');
            $table->boolean('availability');

            $table->string('printType');
            $table->string('publicationLocation');
            $table->string('publicationDate');
            $table->biginteger('phone');
            $table->biginteger('ruc');
            $table->integer('book_id')->unsigned();
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
        Schema::dropIfExists('book_copies');
    }
}
