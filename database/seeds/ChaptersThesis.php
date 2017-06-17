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
        ChapterThesis::create(['contenido'=>'numeros romanos','thesis_id'=>1]);
    }
}
