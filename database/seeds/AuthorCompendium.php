<?php

use Illuminate\Database\Seeder;

class AuthorCompendium extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author_compendium')->insert([
         'author_id' => 1,
         'compendium_id' => 1,
         'type' => 1
      ]);
      DB::table('author_compendium')->insert([
         'author_id' => 2,
         'compendium_id' => 2,
         'type' => 1
      ]);
    }
}
