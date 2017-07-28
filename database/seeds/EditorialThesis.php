<?php
use Illuminate\Database\Seeder;

define('EDITORIAL_ID', 'editorial_id');
define('THESIS_ID', 'thesis_id');

class EditorialThesis extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::table('editorial_thesis')->insert([
         EDITORIAL_ID => 1,
         THESIS_ID => 1
      ], [
         EDITORIAL_ID => 1,
         THESIS_ID => 2
      ]);
   }
}
