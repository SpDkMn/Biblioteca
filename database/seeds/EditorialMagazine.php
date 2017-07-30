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
      DB::table('category_editorial')->insert([EDITORIAL_ID => '1',MAGAZINE_ID => '1',TYPE => 'true']);
    }
}
