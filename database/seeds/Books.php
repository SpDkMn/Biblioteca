<?php
use Illuminate\Database\Seeder;
use App\Book as Book;

class Books extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Book::create([
         'clasification' => 'ds5.s4',
         'title' => 'Analisis Matematico',
         'secondaryTitle' => 'Secundario y sus propiedades',
         'summary' => 'Libro de matematicas',
         'isbn' => 489213,
         'extension' => '120 paginas',
         'physicalDetails' => 'Sin portada',
         'dimensions' => '35 x 24 cm',
         'accompaniment' => 'no incluye cd'
      ]);
   }
}
