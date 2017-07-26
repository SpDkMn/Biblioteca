<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesisCopiesTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('thesis_copies', function (Blueprint $table) {
         $table->increments('id');
         $table->biginteger('incomeNumber');
         $table->biginteger('barcode');
         $table->integer('ejemplar');
         $table->boolean('availability');
         
         $table->integer('thesis_id')->unsigned();
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
      Schema::dropIfExists('thesis_copies');
   }
}
