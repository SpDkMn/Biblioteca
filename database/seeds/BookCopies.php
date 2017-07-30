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
         INCOMENUMBER => 20057861,
         CLASIFICATION => 'addkgd',
         EDITION => 1,
         BARCODE => 48200001,
         COPY => 1,
         ACQUISITIONMODALITY => 'compra',
         ACQUISITIONSOURCE => 'Facultad de Sistemas e informatica',
         ACQUISITIONPRICE => '48.50',
         ACQUISITIONDATE => '15 de Marzo',
         LOCATION => 'Facultad de Sistemas e informatica',
         MANAGEMENT => 2017,
         AVAILABILITY => true,
         PRINTTYPE => 'impresion',
         PUBLICATIONLOCATION => 'San Borja',
         PUBLICATIONDATE => '12 de marzo de 2080',
         PHONE => '973849441',
         RUC => '148430',
         BOOK_ID => 1
      ], [
         INCOMENUMBER => 10065421,
         CLASIFICATION => 'saaaaf',
         EDITION => 1,
         BARCODE => 44500001,
         COPY => 2,
         ACQUISITIONMODALITY => 'compra',
         ACQUISITIONSOURCE => 'Facultad de Sistemas e informatica',
         ACQUISITIONPRICE => '48.50',
         ACQUISITIONDATE => '15 de Marzo',
         LOCATION => 'Facultad de Sistemas e informatica',
         MANAGEMENT => 2017,
         AVAILABILITY => true,
         PRINTTYPE => 'impresion',
         PUBLICATIONLOCATION => 'San Borja',
         PUBLICATIONDATE => '12 de marzo de 2080',
         PHONE => '973849441',
         RUC => '148430',
         BOOK_ID => 1
      ], [
         INCOMENUMBER => 10043331,
         CLASIFICATION => 'dgddss',
         EDITION => 2,
         BARCODE => 65423401,
         COPY => 1,
         ACQUISITIONMODALITY => 'compra',
         ACQUISITIONSOURCE => 'Facultad de Sistemas e informatica',
         ACQUISITIONPRICE => '48.50',
         ACQUISITIONDATE => '15 de Marzo',
         LOCATION => 'Facultad de Sistemas e informatica',
         MANAGEMENT => 2017,
         AVAILABILITY => true,
         PRINTTYPE => 'impresion',
         PUBLICATIONLOCATION => 'San Borja',
         PUBLICATIONDATE => '12 de marzo de 2080',
         PHONE => '973849441',
         RUC => '148430',
         BOOK_ID => 3
      ], [
         INCOMENUMBER => 10051231,
         CLASIFICATION => 'fkfdss',
         EDITION => 1,
         BARCODE => 43405001,
         COPY => 1,
         ACQUISITIONMODALITY => 'compra',
         ACQUISITIONSOURCE => 'Facultad de Sistemas e informatica',
         ACQUISITIONPRICE => '48.50',
         ACQUISITIONDATE => '15 de Marzo',
         LOCATION => 'Facultad de Sistemas e informatica',
         MANAGEMENT => 2017,
         AVAILABILITY => true,
         PRINTTYPE => 'impresion',
         PUBLICATIONLOCATION => 'San Borja',
         PUBLICATIONDATE => '12 de marzo de 2080',
         PHONE => '973849441',
         RUC => '148430',
         BOOK_ID => 2
      ], [
         INCOMENUMBER => 10057651,
         CLASIFICATION => 'gkggdf',
         EDITION => 4,
         BARCODE => 48200001,
         COPY => 1,
         ACQUISITIONMODALITY => 'compra',
         ACQUISITIONSOURCE => 'Facultad de Sistemas e informatica',
         ACQUISITIONPRICE => '48.50',
         ACQUISITIONDATE => '15 de Marzo',
         LOCATION => 'Facultad de Sistemas e informatica',
         MANAGEMENT => 2017,
         AVAILABILITY => true,
         PRINTTYPE => 'impresion',
         PUBLICATIONLOCATION => 'San Borja',
         PUBLICATIONDATE => '12 de marzo de 2080',
         PHONE => '973849441',
         RUC => '148430',
         BOOK_ID => 2
      ]);
   }
}
