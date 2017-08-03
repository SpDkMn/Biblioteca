<?php
use Illuminate\Database\Seeder;

class EditorialCategory extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('category_editorial')->insert([
         'editorial_id' => 1,
         'category_id' => 3
      ]);
      DB::table('category_editorial')->insert([
         'editorial_id' => 2,
         'category_id' => 4
      ]);
      DB::table('category_editorial')->insert([
         'editorial_id' => 3,
         'category_id' => 1
      ]);
      DB::table('category_editorial')->insert([
         'editorial_id' => 3,
         'category_id' => 2
      ]);
      DB::table('category_editorial')->insert([
         'editorial_id' => 3,
         'category_id' => 4
      ]);
      DB::table('category_editorial')->insert([
         'editorial_id' => 4,
         'category_id' => 5
      ]);
      DB::table('category_editorial')->insert([
         'editorial_id' => 4,
         'category_id' => 6
      ]);
   }
}
