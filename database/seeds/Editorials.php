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
        Editorial::Create(['name'=>'FIGMMG']);
        Editorial::Create(['name'=>'FISI']);
        Editorial::Create(['name'=>'FII']);
        Editorial::Create(['name'=>'FIEE']);
        Editorial::Create(['name'=>'UNMSM']);
        Editorial::Create(['name'=>'Callao']);
        Editorial::Create(['name'=>'Villareal']);
        Editorial::Create(['name'=>'Anaya Multimedia']);
        Editorial::Create(['name'=>'Delta']);
        Editorial::Create(['name'=>'Coquito']);
        Editorial::Create(['name'=>'Rectorado']);
        Editorial::Create(['name'=>'Vicerectorado']);

    }
}
// Eliminar esta semilla cuando se tenga gestion editorial
