<?php
use Illuminate\Database\Seeder;

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
