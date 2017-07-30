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
         EDITORIAL_ID => 3,
         CATEGORY_ID => 3
      ], [
         EDITORIAL_ID => 4,
         CATEGORY_ID => 4
      ], [
         EDITORIAL_ID => 5,
         CATEGORY_ID => 1
      ], [
         EDITORIAL_ID => 4,
         CATEGORY_ID => 2
      ], [
         EDITORIAL_ID => 5,
         CATEGORY_ID => 4
      ], [
         EDITORIAL_ID => 6,
         CATEGORY_ID => 5
      ], [
         EDITORIAL_ID => 6,
         CATEGORY_ID => 6
      ]);
      DB::table('category_editorial')->insert([EDITORIAL_ID => 1,CATEGORY_ID => 2]);
      DB::table('category_editorial')->insert([EDITORIAL_ID => 2,CATEGORY_ID => 2]);
      // ERROR : preguntar a pedro
      // DB::table('category_editorial')->insert(['editorial_id' => 3,'category_id' => 2]);
   }
}
