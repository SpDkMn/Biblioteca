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
      $this->call(Profiles::class);
      $this->call(Employees::class);

     
      $this->call(Categories::class);
      //Autores:
      $this->call(Authors::class);
      //Editoriales:
      $this->call(Editorials::class);
      //Noticias:
      $this->call(Noticias::class);
      //Configuraciones:
      $this->call(Configuration1::class);
      //Tesis:
      $this->call(Thesiss::class);
      $this->call(ThesisCopies::class);
      $this->call(ChaptersThesis::class);
      //Libros:
      $this->call(Books::class);
      $this->call(BookCopies::class);;
      $this->call(ChaptersBook::class);
      //Revistas:
      $this->call(Magazines::class);
      $this->call(MagazineCopy::class);
      $this->call(Contenidos::class);
      //Tipos de usuarios:
      $this->call(UserTypes::class);
      //Pivots:
      $this->call(AuthorThesis::class);
      $this->call(AuthorBook::class);
      $this->call(EditorialThesis::class);
      $this->call(EditorialCategory::class);
      $this->call(EditorialBook::class);
      $this->call(AuthorCategory::class);
   }
}
