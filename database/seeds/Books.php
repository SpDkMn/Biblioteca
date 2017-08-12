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
         'clasification'    => 'ds5.s4',
         'title'            => 'Analisis Matematico',
         'secondaryTitle'   => 'Secundario y sus propiedades',
         'summary'          => 'Libro de matematicas',
         'isbn'             =>  489213,
         'extension'        => '120 paginas',
         'physicalDetails'  => 'Sin portada',
         'dimensions'       => '35 x 24 cm',
         'accompaniment'    => 'no incluye cd',
         'relationBook'     => 1,
         'edition'          => 2,
         'libraryLocation'  => 'Stand  A2'
      ]);
      
      Book::create([
         'clasification'    => 'fs2.d4',
         'title'            => 'Inteligencia Artificial',
         'secondaryTitle'   => 'Cambiando el mundo',
         'summary'          => 'El libro presenta una breve razon para que los humanos cambien de forma a robots',
         'isbn'             =>  489234,
         'extension'        => '270 paginas',
         'physicalDetails'  => 'Moderna caratula',
         'dimensions'       => '35 x 24 cm',
         'accompaniment'    => 'no incluye cd',
         'relationBook'     => 2,
         'edition'          => 3,
         'libraryLocation'  => 'Stand  A3'
      ]);

      Book::create([
         'clasification'    => 'er2.d4',
         'title'            => 'Redes Neuronales',
         'secondaryTitle'   => 'Renovando la ciencia',
         'summary'          => 'El libro trata de como las redes neuronales van evolucionando',
         'isbn'             =>  482344,
         'extension'        => '240 paginas',
         'physicalDetails'  => 'Moderna caratula',
         'dimensions'       => '35 x 24 cm',
         'accompaniment'    => 'no incluye cd',
         'relationBook'     => 2,
         'edition'          => 3,
         'libraryLocation'  => 'Stand  A5'
      ]);
   }
}
