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
        Editorial::Create(['name'=>'Cepredin']);
        Editorial::Create(['name'=>'Alpha']);
        Editorial::Create(['name'=>'Omega']);
        Editorial::Create(['name'=>'Delta']);
        Editorial::Create(['name'=>'Coquito']);
        Editorial::Create(['name'=>'Rectorado']);
        Editorial::Create(['name'=>'Vicerectorado']);
        Editorial::Create(['name'=>'Lumbreras']);
        Editorial::Create(['name'=>'Monti']);
        Editorial::Create(['name'=>'Anaya Multimedia']);
        Editorial::Create(['name'=>'Globin']);
        Editorial::Create(['name'=>'Conquistador']);
        Editorial::Create(['name'=>'Fibonacci']);
        Editorial::Create(['name'=>'Gamarra']);
    }
}
// Eliminar esta semilla cuando se tenga gestion editorial
