<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      // Para crear si fueran necesarios
      Schema::create('customers', function (Blueprint $table) {
         $table->increments('id');
         
         $table->integer('user_id')->unsigned();
         
         $table->softDeletes();
         $table->timestamps();
         
         $table->foreign('user_id')
            ->references('id')
            ->on('users');
      });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      Schema::dropIfExists('customers');
   }
}
