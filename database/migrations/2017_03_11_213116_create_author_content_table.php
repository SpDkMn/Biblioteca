<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorContentTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('author_content', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('author_id')->unsigned();
         $table->integer('content_id')->unsigned();
         $table->foreign('author_id')
            ->references('id')
            ->on('authors')
            ->onDelete('cascade');
         $table->foreign('content_id')
            ->references('id')
            ->on('contents')
            ->onDelete('cascade');
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
      Schema::dropIfExists('author_content');
   }
}
