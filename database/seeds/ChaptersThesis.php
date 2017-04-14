<?php

use App\ChapterThesis as ChapterThesis; 
use Illuminate\Database\Seeder;

class ChaptersThesis extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChapterThesis::create(['name'=>'numeros romanos'  ,'number'=>1,'thesis_id'=>1]);
        ChapterThesis::create(['name'=>'numeros reales'   ,'number'=>2,'thesis_id'=>1]);
        ChapterThesis::create(['name'=>'numeros complejos','number'=>3,'thesis_id'=>1]);
        ChapterThesis::create(['name'=>'limites'          ,'number'=>4,'thesis_id'=>1]);
        ChapterThesis::create(['name'=>'metodos numericos','number'=>5,'thesis_id'=>1]);
        ChapterThesis::create(['name'=>'derivadas'        ,'number'=>6,'thesis_id'=>1]);

        ChapterThesis::create(['name'=>'Nacimiento, Hijo de satan'  ,'number'=>1,'thesis_id'=>2]);
        ChapterThesis::create(['name'=>'Muerte de Shiro'            ,'number'=>2,'thesis_id'=>2]);
		ChapterThesis::create(['name'=>'El nuevo exorcista'         ,'number'=>3,'thesis_id'=>2]);
		ChapterThesis::create(['name'=>'El gato de Rin'             ,'number'=>4,'thesis_id'=>2]);
		ChapterThesis::create(['name'=>'Enfrentamiento Yukio'       ,'number'=>5,'thesis_id'=>2]);
		ChapterThesis::create(['name'=>'Tragado por su padre, satan','number'=>6,'thesis_id'=>2]);
    }
}
