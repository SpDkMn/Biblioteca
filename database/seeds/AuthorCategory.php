<?php
use Illuminate\Database\Seeder;


class AuthorCategory extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('author_category')->insert([
         'author_id' => 1,
         'category_id' => 1
      ]);
      DB::table('author_category')->insert([
         'author_id' => 1,
         'category_id' => 3
      ]);
      DB::table('author_category')->insert([
         'author_id' => 1,
         'category_id' => 4
      ]);
      DB::table('author_category')->insert([
         'author_id' => 1,
         'category_id' => 5
      ]);
      DB::table('author_category')->insert([
         'author_id' => 1,
         'category_id' => 6
      ]);
      DB::table('author_category')->insert([
         'author_id' => 2,
         'category_id' => 3
      ]);
      DB::table('author_category')->insert([
         'author_id' => 2,
         'category_id' => 6
      ]);
      DB::table('author_category')->insert([
         'author_id' => 3,
         'category_id' => 2
      ]);
      DB::table('author_category')->insert([
         'author_id' => 3,
         'category_id' => 3
      ]);
      DB::table('author_category')->insert([
         'author_id' => 3,
         'category_id' => 4
      ]);
      DB::table('author_category')->insert([
         'author_id' => 3,
         'category_id' => 6
      ]);
      DB::table('author_category')->insert([
         'author_id' => 4,
         'category_id' => 1
      ]);
      DB::table('author_category')->insert([
         'author_id' => 4,
         'category_id' => 3
      ]);
      DB::table('author_category')->insert([
         'author_id' => 4,
         'category_id' => 6
      ]);


   }
}
