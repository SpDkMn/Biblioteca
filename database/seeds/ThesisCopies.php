<?php
use Illuminate\Database\Seeder;
use App\ThesisCopy as ThesisCopy;

class ThesisCopies extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      ThesisCopy::create([
         'incomeNumber' => '00200500',
         'barcode' => '200000004124',
         'ejemplar' => 1,
         'availability' => '1',
         'thesis_id' => '1'
      ]);
      
      ThesisCopy::create([
         'incomeNumber' => '00547800',
         'barcode' => '200000001345',
         'ejemplar' => 2,
         'availability' => '0',
         'thesis_id' => '1'
      ]);
      
      ThesisCopy::create([
         'incomeNumber' => '00343500',
         'barcode' => '200000002354',
         'ejemplar' => 1,
         'availability' => '1',
         'thesis_id' => '2'
      ]);
   }
}
