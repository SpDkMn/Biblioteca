<?php

use App\ChapterBook as ChapterBook; 
use Illuminate\Database\Seeder;

class ChaptersBook extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ChapterBook::create(['name'=>'numeros romanos'  ,'number'=>1,'book_id'=>1]);
        ChapterBook::create(['name'=>'numeros reales'   ,'number'=>2,'book_id'=>1]);
        ChapterBook::create(['name'=>'numeros complejos','number'=>3,'book_id'=>1]);
        ChapterBook::create(['name'=>'limites'          ,'number'=>4,'book_id'=>1]);
        ChapterBook::create(['name'=>'metodos numericos','number'=>5,'book_id'=>1]);
        ChapterBook::create(['name'=>'derivadas'        ,'number'=>6,'book_id'=>1]);

        ChapterBook::create(['name'=>'Nacimiento, Hijo de satan'  ,'number'=>1,'book_id'=>2]);
        ChapterBook::create(['name'=>'Muerte de Shiro'            ,'number'=>2,'book_id'=>2]);
		ChapterBook::create(['name'=>'El nuevo exorcista'         ,'number'=>3,'book_id'=>2]);
		ChapterBook::create(['name'=>'El gato de Rin'             ,'number'=>4,'book_id'=>2]);
		ChapterBook::create(['name'=>'Enfrentamiento Yukio'       ,'number'=>5,'book_id'=>2]);
		ChapterBook::create(['name'=>'Tragado por su padre, satan','number'=>6,'book_id'=>2]);
    }
}
