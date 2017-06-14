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
        Author::Create(['name'=>'Luis Miguel Joyanes']);

    }

}
// Eliminar esta semilla cuando se tenga gestion author
