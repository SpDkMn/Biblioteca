<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Editorial as Editorial;

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
         'name' => 'Universidad Nacional Mayor de San Marcos'
      ]);
      Editorial::Create([
         'name' => 'Anaya Multimendia'
      ]);
      Editorial::Create([
         'name' => 'Ecoe Ediciones'
      ]);
      Editorial::Create([
         'name' => 'Solver-Maquin'
      ]);
      Editorial::Create([
         'name' => 'Bruño'
      ]);
   }
}
// Eliminar esta semilla cuando se tenga gestion editorial
