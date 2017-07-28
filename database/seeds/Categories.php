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
      
      // Rellenando la tabla categorias para hacer la prueba
      Category::create([
         'name' => 'libro'
      ], [
         'name' => 'revista'
      ], [
         'name' => 'tesis/tesina'
      ], [
         'name' => 'compendio'
      ], [
         'name' => 'colaborador'
      ], [
         'name' => 'asesor'
      ]);
   }
}
