<?php

use Illuminate\Database\Seeder;
use App\Content as content ;
class Contenidos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      content::Create([
        TITLE => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        MAGAZINE_ID => '1',
        COMPENDIUM_ID => '0'
      ]);
      content::Create([
        TITLE => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.',
        MAGAZINE_ID => '1',
        COMPENDIUM_ID => '0'
      ]);
    }
}
