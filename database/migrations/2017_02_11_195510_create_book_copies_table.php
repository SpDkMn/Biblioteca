<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCopiesTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('book_copies', function (Blueprint $table) {
         $table->increments('id');
         $table->unsignedBigInteger('incomeNumber')->unique();
         $table->string('clasification')->nullable();
         $table->unsignedBiginteger('barcode')->unique();
         $table->unsignedTinyInteger('copy');
         $table->unsignedTinyInteger('volume')->nullable();
         // adquision del libro
         $table->string('acquisitionModality');
         $table->string('acquisitionSource')->nullable();
         $table->string('acquisitionPrice')->nullable();
         $table->string('acquisitionDate')->nullable();
         // fin adquision
         $table->string('management')->nullable();
         $table->boolean('availability');
         
         $table->string('printType');
         $table->string('publicationLocation')->nullable();
         $table->string('publicationDate')->nullable();
         
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
      Schema::dropIfExists('book_copies');
   }
}
