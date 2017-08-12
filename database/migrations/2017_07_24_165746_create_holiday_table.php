<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHolidayTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('holidays', function (Blueprint $table) {
         $table->increments('id');
         $table->string('item');
         $table->datetime('start');
         $table->datetime('end');
         $table->integer('id_configuration')->unsigned();
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
      Schema::dropIfExists('holidays');
   }
}
