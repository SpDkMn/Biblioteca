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
      DB::table('author_category')->insert([AUTHOR_ID => 1,CATEGORY_ID => 1]);
      DB::table('author_category')->insert([
         AUTHOR_ID => 1,
         CATEGORY_ID => 3
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 1,
         CATEGORY_ID => 4
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 1,
         CATEGORY_ID => 5
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 1,
         CATEGORY_ID => 6
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 2,
         CATEGORY_ID => 3
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 2,
         CATEGORY_ID => 6
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 3,
         CATEGORY_ID => 2
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 3,
         CATEGORY_ID => 3
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 3,
         CATEGORY_ID => 4
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 3,
         CATEGORY_ID => 6
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 4,
         CATEGORY_ID => 1
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 4,
         CATEGORY_ID => 3
      ]); DB::table('author_category')->insert([
         AUTHOR_ID => 4,
         CATEGORY_ID => 6
      ]);DB::table('author_category')->insert([
         AUTHOR_ID => 5,
         CATEGORY_ID => 5
      ]);DB::table('author_category')->insert([
         AUTHOR_ID => 6,
         CATEGORY_ID => 2
      ]);DB::table('author_category')->insert([
         AUTHOR_ID => 7,
         CATEGORY_ID => 2
      ]);


   }
}
