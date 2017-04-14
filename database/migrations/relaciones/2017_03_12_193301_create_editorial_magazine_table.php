<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditorialMagazineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('editorial_magazine', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('magazine_id')->unsigned();
            $table->integer('editorial_id')->unsigned();
            $table->foreign('magazine_id')->references('id')->on('magazines');
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
        Schema::dropIfExists('editorial_magazine');
    }
}
