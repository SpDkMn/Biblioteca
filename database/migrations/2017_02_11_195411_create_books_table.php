<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('clasification');
            $table->string('title');
            $table->string('secondaryTitle');
            $table->string('summary');
            $table->biginteger('isbn');
            //Descripcion fisica del libro
            $table->string('extension');
            $table->string('physicalDetails');
            $table->string('dimensions');
            $table->string('accompaniment');
            //fin descripcion fisica
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
        Schema::dropIfExists('books');
    }
}
