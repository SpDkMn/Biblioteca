<?php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      //$this->call(Constantes::class);
      $this->call(Profiles::class);
      $this->call(Employees::class);
      $this->call(Thesiss::class);
      $this->call(ThesisCopies::class);
      $this->call(ChaptersThesis::class);
      $this->call(Authors::class);
     // $this->call(AuthorThesis::class);

      $this->call(Editorials::class);
      $this->call(Categories::class);
      $this->call(Author_category::class);
      $this->call(Author_thesis::class);
      $this->call(Editorial_thesis::class);

      $this->call(Noticias::class);
      $this->call(Configuration1::class);
      
      // $this->call(Books::class);
      // $this->call(BookCopies::class);;
      // $this->call(ChaptersBook::class);
      // $this->call(Thesiss::class);
      // $this->call(ThesisCopies::class);
      // $this->call(ChaptersThesis::class);
      // llenando tablas pivotes

      $this->call(EditorialCategory::class);
      $this->call(UserTypes::class);
      $this->call(Magazines::class);
      $this->call(MagazineCopy::class);
      $this->call(Contenidos::class);


   }
}
