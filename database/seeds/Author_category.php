<?php

use Illuminate\Database\Seeder;

class Author_category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author_category')->insert(['author_id' => 1,'category_id' => 1]);
        DB::table('author_category')->insert(['author_id' => 2,'category_id' => 1]);
        DB::table('author_category')->insert(['author_id' => 3,'category_id' => 1]);
        //error: preguntar a pedro
        //DB::table('author_category')->insert(['author_id' => 3,'category_id' => 2]);
    }
}
