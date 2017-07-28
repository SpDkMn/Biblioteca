<?php
use Illuminate\Database\Seeder;

define('AUTHOR_ID', 'author_id');
define('THESIS_ID', 'thesis_id');
define('TYPE', 'type');

class AuthorThesis extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('author_thesis')->insert([
         AUTHOR_ID => 1,
         THESIS_ID => 1,
         TYPE => 1
      ], [
         AUTHOR_ID => 2,
         THESIS_ID => 1,
         TYPE => 0
      ], [
         AUTHOR_ID => 3,
         THESIS_ID => 1,
         TYPE => 0
      ], [
         AUTHOR_ID => 2,
         THESIS_ID => 2,
         TYPE => 1
      ]);
   }
}
