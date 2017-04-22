<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2017_03_11_200207_create_categories_table.php
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
=======
        Schema::create('editorials', function (Blueprint $table) {

            $table->increments('id')->unique();
            $table->string('name');
        
>>>>>>> Luis:database/migrations/2017_02_11_194717_create_editorials_table.php
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
        Schema::dropIfExists('categories');
    }
}
