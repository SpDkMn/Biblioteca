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
        ThesisCopy::create(['clasification'=>'addkgdf532','incomeNumber'=>20057861,'barcode'=>48200001,'copy'=>1,'thesis_id'=>3]);
        ThesisCopy::create(['clasification'=>'sfkfgdf532','incomeNumber'=>10065421,'barcode'=>44500001,'copy'=>2,'thesis_id'=>3]);
        ThesisCopy::create(['clasification'=>'dgddsdddd2','incomeNumber'=>10043331,'barcode'=>65423401,'copy'=>1,'thesis_id'=>1]);
        ThesisCopy::create(['clasification'=>'fkfdsssg32','incomeNumber'=>10051231,'barcode'=>43405001,'copy'=>1,'thesis_id'=>2]);
        ThesisCopy::create(['clasification'=>'hkgdff5.32','incomeNumber'=>10353381,'barcode'=>48236351,'copy'=>2,'thesis_id'=>4]);
        ThesisCopy::create(['clasification'=>'jkgdsh5.32','incomeNumber'=>10157651,'barcode'=>48203671,'copy'=>3,'thesis_id'=>4]);
        ThesisCopy::create(['clasification'=>'kkgd.fh532','incomeNumber'=>10239081,'barcode'=>68976741,'copy'=>1,'thesis_id'=>5]);
        ThesisCopy::create(['clasification'=>'lkgd.af532','incomeNumber'=>10057621,'barcode'=>73561001,'copy'=>2,'thesis_id'=>5]);
        ThesisCopy::create(['clasification'=>'ñkgdf5.f32','incomeNumber'=>12349621,'barcode'=>44400001,'copy'=>1,'thesis_id'=>6]);
        ThesisCopy::create(['clasification'=>'xkgdffg532','incomeNumber'=>10301621,'barcode'=>23790001,'copy'=>2,'thesis_id'=>7]);
        ThesisCopy::create(['clasification'=>'ckg.df5s32','incomeNumber'=>10248451,'barcode'=>43245001,'copy'=>1,'thesis_id'=>8]);
        ThesisCopy::create(['clasification'=>'vkgdf5h3w2','incomeNumber'=>10124621,'barcode'=>48246001,'copy'=>1,'thesis_id'=>9]);
        ThesisCopy::create(['clasification'=>'bkgdf5aj32','incomeNumber'=>10478421,'barcode'=>48298801,'copy'=>1,'thesis_id'=>10]); 
    }
}
