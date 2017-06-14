<?php

use Illuminate\Database\Seeder;

use App\Thesis as Thesis;

class Thesiss extends Seeder
{    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thesis::create(['type'=>'tesis','clasification'=>'23432r','title'=>'Analisis Matematico','edition'=>2013,'extension'=>'345','nhojas'=>'234','physicalDetails'=>'Tesis de mediano tamaño','dimensions'=>'35x24','accompaniment'=>'Incluye 2 cds','location'=>'Segundo estante','publicationLocation'=>'San Borja','summary'=>'Este es el resumen de la primera tesis','conten'=>'Este es el contenido de la primera tesis','recomendacion'=>'Esta es la recomendacion de la tesis','bibliografia'=>'Bibliografia de la tesis o tesina','asesor'=>'Pedro Diaz']);  
    }
}





