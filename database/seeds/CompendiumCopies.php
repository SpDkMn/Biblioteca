<?php

use Illuminate\Database\Seeder;
use App\CompendiumCopy as CompendiumCopys ;

class CompendiumCopies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompendiumCopys::Create([
        'incomeNumber' => '11111111111',
        'copy' => '1',
        'compendium_id' => '1'
      ]);
      CompendiumCopys::Create([
        'incomeNumber' => '2222222222',
        'copy' => '2',
        'compendium_id' => '2'
      ]);
    }
}
