<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSummariesThesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
<<<<<<< HEAD:database/migrations/2017_02_11_195510_create_book_copies_table.php
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
=======
    {
        Schema::create('summaries_thesis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content');
            $table->integer('thesis_id')->unsigned();
>>>>>>> tesis-jose:database/migrations/relaciones/2017_04_07_164949_create_summaries_thesis_table.php
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
        Schema::dropIfExists('summaries_thesis');
    }
}
