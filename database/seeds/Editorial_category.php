<?php

use Illuminate\Database\Seeder;

class Editorial_category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
        DB::table('category_editorial')->insert(['editorial_id' => 1,'category_id' => 1]);
        DB::table('category_editorial')->insert(['editorial_id' => 2,'category_id' => 1]);
        DB::table('category_editorial')->insert(['editorial_id' => 3,'category_id' => 1]);
        //ERROR : preguntar a pedro
        //DB::table('category_editorial')->insert(['editorial_id' => 3,'category_id' => 2]);
    }
}
