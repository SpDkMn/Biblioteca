<?php
use Illuminate\Database\Seeder;

use App\Category as Category;

class Categories extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {

     Category::create(['name' => 'libro']);
     Category::create(['name' => 'revista']);
     Category::create(['name' => 'tesis/tesina']);
     Category::create(['name' => 'compendio']);
     Category::create(['name' => 'colaborador']);
     Category::create(['name' => 'asesor']);
     
      //ESTO SOLO ME GENERA EL PRIMER REGISTRO , LO DEJARÉ COMO ARRIBA
      // Category::create([
      //    'name' => 'libro'
      // ], [
      //    'name' => 'revista'
      // ], [
      //    'name' => 'tesis/tesina'
      // ], [
      //    'name' => 'compendio'
      // ], [
      //    'name' => 'colaborador'
      // ], [
      //    'name' => 'asesor'
      // ]);
   }
}
