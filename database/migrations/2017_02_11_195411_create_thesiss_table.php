<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesissTable extends Migration
{

   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('thesiss', function (Blueprint $table) {
         $table->increments('id');
         $table->string('type');
         $table->string('clasification')->nullable();
         $table->longText('title');
         
         $table->string('edition')->nullable();
         // Descripcion fisica de la tesis
         $table->string('extension');
         $table->string('escuela');
         $table->string('physicalDetails')->nullable();
         $table->string('dimensions');
         $table->string('accompaniment')->nullable();
         $table->string('location');
         $table->string('publicationLocation');
         $table->longText('summary')->nullable();
         $table->longText('conten')->nullable();
         $table->longText('conclusions')->nullable();
         $table->longText('recomendacion')->nullable();
         $table->longText('bibliografia')->nullable();
         $table->string('asesor');
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
      Schema::dropIfExists('thesiss');
   }
}
