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
      Editorial::Create([NAME => 'Universidad Nacional Mayor de San Marcos']);
      Editorial::Create([NAME => 'Universidad Nacional Federico Villareal']);
      Editorial::Create([NAME => 'Universidad Nacional de Ingeniería']);
      Editorial::Create([NAME => 'Anaya Multimendia']);
      Editorial::Create([NAME => 'Ecoe Ediciones']);
      Editorial::Create([NAME => 'Solver-Maquin']);
      Editorial::Create([NAME => 'Bruño']);
   }
}
// Eliminar esta semilla cuando se tenga gestion editorial
