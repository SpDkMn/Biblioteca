<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('users', function (Blueprint $table) {
         $table->increments('id');
         $table->string('username');
         $table->string('password');
         
         $table->string('name');
         $table->string('last_name');
         $table->string('code')->nullable();
         $table->string('dni')->nullable();
         $table->string('home_phone')->nullable();
         $table->string('phone')->nullable();
         $table->string('email')->unique();
         $table->string('address')->nullable();
         $table->string('school')->nullable();
         $table->string('faculty')->nullable();
         $table->string('university')->nullable();
         $table->integer('id_user_type');
         
         $table->boolean('state');
         
         $table->rememberToken();
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
      Schema::dropIfExists('users');
   }
}
