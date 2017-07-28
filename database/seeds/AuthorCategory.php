<?php
use Illuminate\Database\Seeder;

define('AUTHOR_ID', 'author_id');
define('CATEGORY_ID', 'category_id');

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
         AUTHOR_ID => 1,
         CATEGORY_ID => 1
      ], [
         AUTHOR_ID => 1,
         CATEGORY_ID => 3
      ], [
         AUTHOR_ID => 1,
         CATEGORY_ID => 4
      ], [
         AUTHOR_ID => 1,
         CATEGORY_ID => 5
      ], [
         AUTHOR_ID => 1,
         CATEGORY_ID => 6
      ], [
         AUTHOR_ID => 2,
         CATEGORY_ID => 3
      ], [
         AUTHOR_ID => 2,
         CATEGORY_ID => 6
      ], [
         AUTHOR_ID => 3,
         CATEGORY_ID => 2
      ], [
         AUTHOR_ID => 3,
         CATEGORY_ID => 3
      ], [
         AUTHOR_ID => 3,
         CATEGORY_ID => 4
      ], [
         AUTHOR_ID => 3,
         CATEGORY_ID => 6
      ], [
         AUTHOR_ID => 4,
         CATEGORY_ID => 1
      ], [
         AUTHOR_ID => 4,
         CATEGORY_ID => 3
      ], [
         AUTHOR_ID => 4,
         CATEGORY_ID => 6
      ]);
   }
}
