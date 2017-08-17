<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryEditorialTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      // 21/03/17 ->ondelete() agregado para poder eliminar las tablas relacionadas con otras
      Schema::create('category_editorial', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('editorial_id')->unsigned();
         $table->foreign('editorial_id')
            ->references('id')
            ->on('editorials');
         $table->integer('category_id')->unsigned();
         $table->foreign('category_id')
            ->references('id')
            ->on('categories');
         
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
      Schema::dropIfExists('category_editorial');
   }
}
