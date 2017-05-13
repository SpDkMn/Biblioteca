<?php

use Illuminate\Database\Seeder;
use App\Author as Author ;
class Authors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //Rellenando la tabla authors con 30 datos aleatorios
        Author::Create(['name'=>'Anibal Mauricio']);
        Author::Create(['name'=>'Yenni Reategui Sanchez']);
        Author::Create(['name'=>'Abelardo Acuña']);
        Author::Create(['name'=>'Javier Peralta Osorio']);
        Author::Create(['name'=>'Luis Toro']);
        Author::Create(['name'=>'Pedro Diaz']);
    }
    
}
// Eliminar esta semilla cuando se tenga gestion author
