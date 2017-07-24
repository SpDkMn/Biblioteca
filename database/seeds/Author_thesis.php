<?php

use Illuminate\Database\Seeder;

class Author_thesis extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author_thesis')->insert(['author_id' => 1,'thesis_id' => 1,'type' => 1]);
        DB::table('author_thesis')->insert(['author_id' => 2,'thesis_id' => 1,'type' => 0 ]);
        DB::table('author_thesis')->insert(['author_id' => 3,'thesis_id' => 1,'type' => 0]);
        DB::table('author_thesis')->insert(['author_id' => 2,'thesis_id' => 2,'type' => 1]);
    }
}
