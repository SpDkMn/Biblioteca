<?php
use Illuminate\Database\Seeder;

use App\BookCopy as BookCopy;

class BookCopies extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      BookCopy::create([
         'incomeNumber' => 20057861,
         'clasification' => 'addkgd',
         'barcode' => 482034001,
         'copy' => 1,
         'acquisitionModality' => 'compra',
         'acquisitionSource' => 'Facultad de Sistemas e informatica',
         'acquisitionPrice' => '48.50',
         'acquisitionDate' => '15 de Marzo',
         'management' => 2017,
         'availability' => true,
         'printType' => 'impresion',
         'publicationLocation' => 'San Borja',
         'publicationDate' => '12 de marzo de 2080',
         'book_id' => 1
      ]);
      BookCopy::create([
         'incomeNumber' => 10065421,
         'clasification' => 'saaaaf',
         'barcode' => 44500001,
         'copy' => 2,
         'acquisitionModality' => 'compra',
         'acquisitionSource' => 'Facultad de Sistemas e informatica',
         'acquisitionPrice' => '48.50',
         'acquisitionDate' => '15 de Marzo',
         'management' => 2017,
         'availability' => true,
         'printType' => 'impresion',
         'publicationLocation' => 'San Borja',
         'publicationDate' => '12 de marzo de 2080',
         'book_id' => 1
      ]);
      BookCopy::create([
         'incomeNumber' => 10043331,
         'clasification' => 'dgddss',
         'barcode' => 65423401,
         'copy' => 1,
         'acquisitionModality' => 'compra',
         'acquisitionSource' => 'Facultad de Sistemas e informatica',
         'acquisitionPrice' => '48.50',
         'acquisitionDate' => '15 de Marzo',
         'management' => 2017,
         'availability' => true,
         'printType' => 'impresion',
         'publicationLocation' => 'San Borja',
         'publicationDate' => '12 de marzo de 2080',
         'book_id' => 3
      ]);
      BookCopy::create([
         'incomeNumber' => 10051231,
         'clasification' => 'fkfdss',
         'barcode' => 43405001,
         'copy' => 1,
         'acquisitionModality' => 'compra',
         'acquisitionSource' => 'Facultad de Sistemas e informatica',
         'acquisitionPrice' => '48.50',
         'acquisitionDate' => '15 de Marzo',
         'management' => 2017,
         'availability' => true,
         'printType' => 'impresion',
         'publicationLocation' => 'San Borja',
         'publicationDate' => '12 de marzo de 2080',
         'book_id' => 2
      ]);
      BookCopy::create([
         'incomeNumber' => 10057651,
         'clasification' => 'gkggdf',
         'barcode' => 482002601,
         'copy' => 2,
         'acquisitionModality' => 'compra',
         'acquisitionSource' => 'Facultad de Sistemas e informatica',
         'acquisitionPrice' => '48.50',
         'acquisitionDate' => '15 de Marzo',
         'management' => 2017,
         'availability' => true,
         'printType' => 'impresion',
         'publicationLocation' => 'San Borja',
         'publicationDate' => '12 de marzo de 2080',
         'book_id' => 2
      ]);
   }
}
