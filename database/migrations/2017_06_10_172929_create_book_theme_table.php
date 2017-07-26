<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookThemeTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('book_theme', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('book_id')->unsigned();
         $table->foreign('book_id')
            ->references('id')
            ->on('books');
         $table->integer('theme_id')->unsigned();
         $table->foreign('theme_id')
            ->references('id')
            ->on('themes');
         $table->timestamps();
         $table->softDeletes();
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('book_theme');
   }
}
