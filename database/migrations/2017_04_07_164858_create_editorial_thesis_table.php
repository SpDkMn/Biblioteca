<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorialThesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('editorial_thesis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thesis_id')->unsigned();
            $table->foreign('thesis_id')->references('id')->on('thesiss');
            $table->integer('editorial_id')->unsigned();
            $table->foreign('editorial_id')->references('id')->on('editorials');

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
        Schema::dropIfExists('editorial_thesis');
    }
}
