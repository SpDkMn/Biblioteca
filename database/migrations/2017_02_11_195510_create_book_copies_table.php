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
         $table->string('clasification')->unique();
         $table->unsignedBiginteger('barcode')->unique();
         $table->unsignedTinyInteger('copy');
         $table->unsignedTinyInteger('volume')->nullable();
         // adquision del libro
         $table->string('acquisitionModality');
         $table->string('acquisitionSource');
         $table->string('acquisitionPrice')->nullable();
         $table->string('acquisitionDate');
         // fin adquision
         $table->string('management');
         $table->boolean('availability');
         
         $table->string('printType');
         $table->string('publicationLocation');
         $table->string('publicationDate');
         
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
