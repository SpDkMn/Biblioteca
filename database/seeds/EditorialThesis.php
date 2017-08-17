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
         'editorial_id' => 1,
         'thesis_id' => 1
      ]);
      DB::table('editorial_thesis')->insert([
         'editorial_id' => 1,
         'thesis_id' => 2
      ]);
   }
}
