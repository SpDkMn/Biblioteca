<?php
use App\ChapterBook as ChapterBook;
use Illuminate\Database\Seeder;

define('NAME', 'name');
define('NUMBER', 'number');
define('BOOK_ID', 'book_id');

class ChaptersBook extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      ChapterBook::create([
         NAME => 'numeros romanos',
         NUMBER => 1,
         BOOK_ID => 1
      ], [
         NAME => 'numeros reales',
         NUMBER => 2,
         BOOK_ID => 1
      ], [
         NAME => 'numeros complejos',
         NUMBER => 3,
         BOOK_ID => 1
      ], [
         NAME => 'limites',
         NUMBER => 4,
         BOOK_ID => 1
      ], [
         NAME => 'metodos numericos',
         NUMBER => 5,
         BOOK_ID => 1
      ], [
         NAME => 'derivadas',
         NUMBER => 6,
         BOOK_ID => 1
      ], [
         NAME => 'Nacimiento, Hijo de satan',
         NUMBER => 1,
         BOOK_ID => 2
      ], [
         NAME => 'Muerte de Shiro',
         NUMBER => 2,
         BOOK_ID => 2
      ], [
         NAME => 'El nuevo exorcista',
         NUMBER => 3,
         BOOK_ID => 2
      ], [
         NAME => 'El gato de Rin',
         NUMBER => 4,
         BOOK_ID => 2
      ], [
         NAME => 'Enfrentamiento Yukio',
         NUMBER => 5,
         BOOK_ID => 2
      ], [
         NAME => 'Tragado por su padre, satan',
         NUMBER => 6,
         BOOK_ID => 2
      ]);
   }
}
