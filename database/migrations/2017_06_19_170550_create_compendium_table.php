<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompendiumTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('compendia', function (Blueprint $table) {
         $table->increments('id');
         $table->string('title');
         $table->integer('numero')->unsigned();
         $table->string('fechaEdicion')->nullable();
         $table->integer('author_id')->unsigned();
         $table->integer('editorial_id')->unsigned();
         $table->longText('introduccion');
         
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
      Schema::dropIfExists('compendia');
   }
}
