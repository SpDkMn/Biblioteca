<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Editorial as Editorial;

define('NAME', 'name');

class Editorials extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      // Rellenando la tabla authors para la prueba de revistas
      Editorial::Create([
         NAME => 'Universidad Nacional Mayor de San Marcos'
      ], [
         NAME => 'Anaya Multimendia'
      ], [
         NAME => 'Ecoe Ediciones'
      ], [
         NAME => 'Solver-Maquin'
      ], [
         NAME => 'Bruño'
      ]);
   }
}
// Eliminar esta semilla cuando se tenga gestion editorial
