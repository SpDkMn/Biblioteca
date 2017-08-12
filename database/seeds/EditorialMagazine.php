<?php

use Illuminate\Database\Seeder;

class EditorialMagazine extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('editorial_magazine')->insert([
         'editorial_id' => 4,
         'magazine_id' 		=> 1,
         'type' 		=> 1
      ]);
      DB::table('editorial_magazine')->insert([
         'editorial_id' => 3,
         'magazine_id' 		=> 2,
         'type' 		=>1
      ]);
    }
}
