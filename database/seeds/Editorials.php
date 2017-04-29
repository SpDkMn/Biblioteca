<?php

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
    	//Rellenando la tabla authors para la prueba de revistas
        Editorial::Create(['name'=>'Universidad Nacional Mayor de San Marcos']);
        Editorial::Create(['name'=>'Universidad Nacional Callao']);
        Editorial::Create(['name'=>'Universidad Alas Peruanas']);
        Editorial::Create(['name'=>'Universidad La Cantuta']);
        Editorial::Create(['name'=>'Pontificia Universidad Catolica del Perú']);
        Editorial::Create(['name'=>'Rectorado']);
        Editorial::Create(['name'=>'Vicerectorado']);
      
    }
}
// Eliminar esta semilla cuando se tenga gestion editorial
