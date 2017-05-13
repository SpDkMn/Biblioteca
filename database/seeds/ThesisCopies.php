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
         ThesisCopy::create(['incomeNumber'=>20057861 ,'barcode'=>48200001,'ejemplar'=>1,'availability'=>'1','thesis_id'=>'1']);

         ThesisCopy::create(['incomeNumber'=>24547861 ,'barcode'=>45642000,'ejemplar'=>2,'availability'=>'0','thesis_id'=>'1']);
    }
}
