<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagazinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magazines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('volumen')->unsigned();
            $table->integer('numero')->unsigned();
            $table->string('fechaEdicion')->nullable();
            $table->string('subtitle')->nullable();
            $table->bigInteger('issn')->unsigned()->nullable();
            $table->bigInteger('issnD')->unsigned()->nullable();
            $table->integer('author_id')->unsigned();

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
        Schema::dropIfExists('magazines');
    }
}
