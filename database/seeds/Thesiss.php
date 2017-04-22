<?php

use Illuminate\Database\Seeder;

use App\Thesis as Thesis;

class Thesiss extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thesis::create(['clasification'=>'23432r','title'=>'Analisis Matematico','category_id'=>'1','extension'=>'345','physicalDetails'=>'Tesis de mediano tamaño','dimensions'=>'35x24','accompaniment'=>'Incluye 2 cds']);  
    }
}
