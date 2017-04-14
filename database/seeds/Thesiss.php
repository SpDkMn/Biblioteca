<?php

use Illuminate\Database\Seeder;
use App\Thesis as Thesis ;
class Thesiss extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thesis::create(['clasification'=>'swes4','title'=>'Analisis Matematico','category_id'=>'1','summary'=>'Libro de matematicas','isbn'=>'489213','extension'=>'120','physicalDetails'=>'Sin portada','dimensions'=>'35 x 24 cm','accompaniment'=>'no incluye cd']);
        Thesis::create(['clasification'=>'ds12s4','title'=>'Diario de Rin','category_id'=>'2','summary'=>'El demenio rin','isbn'=>'489213','extension'=>'120','physicalDetails'=>'Sin portada','dimensions'=>'35 x 24 cm','accompaniment'=>'no incluye cd']);
        Thesis::create(['clasification'=>'ws23s4','title'=>'Reglas del futbol','category_id'=>'3','summary'=>'Aprende con Oliver'  ,'isbn'=>'489213','extension'=>'120','physicalDetails'=>'Sin portada','dimensions'=>'35 x 24 cm','accompaniment'=>'no incluye cd']);
    }
}
