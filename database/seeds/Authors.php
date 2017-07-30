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
      Author::Create(['name' => 'Luis Cayo Leon']);
      Author::Create(['name' => 'Santiago Moquillaza Enriquez']);
      Author::Create(['name' => 'Mauricio Espinoza Vargas']);
      Author::Create(['name' => 'Jose Mateo Carrasco']);
      Author::Create(['name' => 'Jose Gonzales Villalobos']);
      Author::Create(['name' => 'Facultad de Ingeniería de Sistemas e Información']);
      Author::Create(['name' => 'Facultad de Ingeniería de Minas']);
   }
}
