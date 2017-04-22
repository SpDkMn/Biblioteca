<?php

use Illuminate\Database\Seeder;

use App\ThesisCopy as ThesisCopy; 

class ThesisCopies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ThesisCopy::create(['incomeNumber'=>20057861 ,'clasification'=>'addkgd','barcode'=>48200001,'ejemplar'=>1,'edition'=>2014,'nhojas'=>'123','location'=>'Estante 3','management'=>2017,'availability'=>true,'publicationLocation'=>'Facultad de Ingenieria de sistemas','thesis_id'=>1]);
    }
}
