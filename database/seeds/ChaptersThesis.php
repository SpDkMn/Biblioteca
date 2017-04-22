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
        ChapterThesis::create(['content'=>'numeros romanos'  ,'thesis_id'=>1]);
        ChapterThesis::create(['content'=>'numeros reales'   ,'thesis_id'=>1]);
        ChapterThesis::create(['content'=>'numeros complejos','thesis_id'=>1]);
        ChapterThesis::create(['content'=>'limites'          ,'thesis_id'=>1]);
        ChapterThesis::create(['content'=>'metodos numericos','thesis_id'=>1]);
        ChapterThesis::create(['content'=>'derivadas'        ,'thesis_id'=>1]);

        ChapterThesis::create(['content'=>'Nacimiento, Hijo de satan'  ,'thesis_id'=>2]);
        ChapterThesis::create(['content'=>'Muerte de Shiro'            ,'thesis_id'=>2]);
		ChapterThesis::create(['content'=>'El nuevo exorcista'         ,'thesis_id'=>2]);
		ChapterThesis::create(['content'=>'El gato de Rin'             ,'thesis_id'=>2]);
		ChapterThesis::create(['content'=>'Enfrentamiento Yukio'       ,'thesis_id'=>2]);
		ChapterThesis::create(['content'=>'Tragado por su padre, satan','thesis_id'=>2]);
    }
}
