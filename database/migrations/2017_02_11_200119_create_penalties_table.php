<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenaltiesTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('penalties', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('userId');
         $table->integer('employeeId')->nullable();
         $table->integer('penaltyOrderId')->nullable();
         $table->integer('categoryId')->nullable();
         $table->integer('objectId')->nullable();
         $table->dateTime('startPenalty')->nullable();
         $table->dateTime('endPenalty')->nullable();
         $table->string('activity')->nullable();
         $table->string('event')->nullable();
         $table->boolean('belongsTime');

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
      Schema::dropIfExists('penalties');
   }
}
