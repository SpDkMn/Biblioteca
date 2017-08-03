<?php

use Illuminate\Database\Seeder;

class EditorialBook extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('editorial_book')->insert([
         'editorial_id' => 4,
         'book_id' 		=> 1,
         'type' 		=> 1
      ]);
      DB::table('editorial_book')->insert([
         'editorial_id' => 3,
         'book_id' 		=> 2,
         'type' 		=>1
      ]);
      DB::table('editorial_book')->insert([
         'editorial_id' => 2,
         'book_id'      => 3,
         'type'         =>1
      ]);
    }
}
