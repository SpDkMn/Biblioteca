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
<<<<<<< HEAD
      // Rellenando la tabla authors con 30 datos aleatorios
      Author::Create([
         'name' => 'Mauricio Espinoza Vargas'
      ]);
      Author::Create([
         'name' => 'Santiago Moquillaza Enriquez'
      ]);
      Author::Create([
         'name' => 'Luis Cayo Leon'
      ]);
      Author::Create([
         'name' => 'Tania Leyva Riveira'
      ]);
=======
      Author::Create(['name' => 'Luis Cayo Leon']);
      Author::Create(['name' => 'Santiago Moquillaza Enriquez']);
      Author::Create(['name' => 'Mauricio Espinoza Vargas']);
      Author::Create(['name' => 'Jose Mateo Carrasco']);
      Author::Create(['name' => 'Jose Gonzales Villalobos']);
      Author::Create(['name' => 'Facultad de Ingeniería de Sistemas e Información']);
      Author::Create(['name' => 'Facultad de Ingeniería de Minas']);
>>>>>>> e4f94eab83036b90581060e078051096c072bd75
   }
}
