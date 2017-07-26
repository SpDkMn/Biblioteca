<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('contents', function (Blueprint $table) {
         $table->increments('id');
         $table->string('title');
         $table->integer('magazine_id')->nullable();
         $table->integer('compendium_id')->nullable();
         
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
      Schema::dropIfExists('contents');
   }
}
