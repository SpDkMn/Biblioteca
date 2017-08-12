<?php

use Illuminate\Database\Seeder;

class AuthorBook extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('author_book')->insert([
         'author_id' => 1,
         'book_id' => 1,
         'type' => 1
      ]);
      DB::table('author_book')->insert([
         'author_id' => 2,
         'book_id' => 1,
         'type' => 0
      ]);
      DB::table('author_book')->insert([
         'author_id' => 3,
         'book_id' => 1,
         'type' => 0
      ]);
      DB::table('author_book')->insert([
         'author_id' => 2,
         'book_id' => 2,
         'type' => 1
      ]);
      DB::table('author_book')->insert([
         'author_id' => 3,
         'book_id' => 3,
         'type' => 1
      ]);
    }
}
