<?php
use Illuminate\Database\Seeder;
use App\Author as Author;

class Authors extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      // Rellenando la tabla authors con 30 datos aleatorios
      Author::Create([
         'name' => 'Mauricio Espinoza Vargas'
      ], [
         'name' => 'Santiago Moquillaza Enriquez'
      ], [
         'name' => 'Luis Cayo Leon'
      ], [
         'name' => 'Tania Leyva Riveira'
      ]);
   }
}
// Eliminar esta semilla cuando se tenga gestion author
