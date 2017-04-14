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
        ThesisCopy::create(['incomeNumber'=>20057861 ,'clasification'=>'addkgd','edition'=>1,'barcode'=>48200001,'copy'=>1,'acquisitionModality'=>'compra','acquisitionSource'=>'Facultad de Sistemas e informatica','acquisitionPrice'=>'48.50','acquisitionDate'=>'15 de Marzo','location'=>'Facultad de Sistemas e informatica','management'=>2017,'availability'=>true,'printType'=>'impresion','publicationLocation'=>'San Borja','publicationDate'=>'12 de marzo de 2080','phone'=>973849441,'ruc'=>148430,'thesis_id'=>1]);
        ThesisCopy::create(['incomeNumber'=>10065421,'clasification'=>'saaaaf','edition'=>1,'barcode'=>44500001,'copy'=>2,'acquisitionModality'=>'compra','acquisitionSource'=>'Facultad de Sistemas e informatica','acquisitionPrice'=>'48.50','acquisitionDate'=>'15 de Marzo','location'=>'Facultad de Sistemas e informatica','management'=>2017,'availability'=>true,'printType'=>'impresion','publicationLocation'=>'San Borja','publicationDate'=>'12 de marzo de 2080','phone'=>973849441,'ruc'=>148430,'thesis_id'=>1]);
        ThesisCopy::create(['incomeNumber'=>10043331,'clasification'=>'dgddss','edition'=>2,'barcode'=>65423401,'copy'=>1,'acquisitionModality'=>'compra','acquisitionSource'=>'Facultad de Sistemas e informatica','acquisitionPrice'=>'48.50','acquisitionDate'=>'15 de Marzo','location'=>'Facultad de Sistemas e informatica','management'=>2017,'availability'=>true,'printType'=>'impresion','publicationLocation'=>'San Borja','publicationDate'=>'12 de marzo de 2080','phone'=>973849441,'ruc'=>148430,'thesis_id'=>3]);
        ThesisCopy::create(['incomeNumber'=>10051231,'clasification'=>'fkfdss','edition'=>1,'barcode'=>43405001,'copy'=>1,'acquisitionModality'=>'compra','acquisitionSource'=>'Facultad de Sistemas e informatica','acquisitionPrice'=>'48.50','acquisitionDate'=>'15 de Marzo','location'=>'Facultad de Sistemas e informatica','management'=>2017,'availability'=>true,'printType'=>'impresion','publicationLocation'=>'San Borja','publicationDate'=>'12 de marzo de 2080','phone'=>973849441,'ruc'=>148430,'thesis_id'=>2]);
        ThesisCopy::create(['incomeNumber'=>10057651,'clasification'=>'gkggdf','edition'=>4,'barcode'=>48200001,'copy'=>1,'acquisitionModality'=>'compra','acquisitionSource'=>'Facultad de Sistemas e informatica','acquisitionPrice'=>'48.50','acquisitionDate'=>'15 de Marzo','location'=>'Facultad de Sistemas e informatica','management'=>2017,'availability'=>true,'printType'=>'impresion','publicationLocation'=>'San Borja','publicationDate'=>'12 de marzo de 2080','phone'=>973849441,'ruc'=>148430,'thesis_id'=>2]);
    }
}
