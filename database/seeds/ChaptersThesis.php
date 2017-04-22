<?php

use Illuminate\Database\Seeder;

use App\ChapterThesis as ChapterThesis; 

class ChaptersThesis extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    
    public function run()
    {
        ChapterThesis::create(['name'=>'Digitacion'              ,'number'=>1,'thesis_id'=>1]);
        ChapterThesis::create(['name'=>'Mundo digital'           ,'number'=>2,'thesis_id'=>1]);
        ChapterThesis::create(['name'=>'Renovacion del sistema'  ,'number'=>3,'thesis_id'=>1]);
        ChapterThesis::create(['name'=>'Movimiento de pixeles'   ,'number'=>4,'thesis_id'=>1]);
        ChapterThesis::create(['name'=>'Renderizacion a duales'  ,'number'=>5,'thesis_id'=>1]);

        ChapterThesis::create(['name'=>'Programacion en el espacio'   ,'number'=>1,'thesis_id'=>2]);
        ChapterThesis::create(['name'=>'Motores de fantasia dinamica' ,'number'=>2,'thesis_id'=>2]);
        ChapterThesis::create(['name'=>'Operaciones en realidad'      ,'number'=>3,'thesis_id'=>2]);
        ChapterThesis::create(['name'=>'Conferencias realistas'       ,'number'=>4,'thesis_id'=>2]);
        ChapterThesis::create(['name'=>'Revolucion de videojuegos'    ,'number'=>5,'thesis_id'=>2]);
        ChapterThesis::create(['name'=>'Creacion del NeverGear'       ,'number'=>6,'thesis_id'=>2]);
    }
    **/
}
