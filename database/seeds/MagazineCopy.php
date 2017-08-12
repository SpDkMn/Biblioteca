<?php

use Illuminate\Database\Seeder;
use App\MagazineCopy as mc ;
class MagazineCopy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      mc::Create([
        'incomeNumber' => '11111111111',
        'barcode' => '11111111111',
        'copy' => '1',
        'magazine_id' => '1'
      ]);
      mc::Create([
        'incomeNumber' => '2222222222',
        'barcode' => '2222222222',
        'copy' => '2',
        'magazine_id' => '1'
      ]);
      mc::Create([
        'incomeNumber' => '33333333333',
        'barcode' => '3333333333',
        'copy' => '3',
        'magazine_id' => '1'
      ]);
      mc::Create([
        'incomeNumber' => '22222222444',
        'barcode' => '555342453',
        'copy' => '1',
        'magazine_id' => '2'
      ]);


    }
}
