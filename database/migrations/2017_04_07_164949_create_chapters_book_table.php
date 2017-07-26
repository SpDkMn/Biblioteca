<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersBookTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('chapters_book', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->unsignedTinyInteger('number');
         $table->unsignedSmallInteger('book_id');
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
      Schema::dropIfExists('chapters_book');
   }
}
