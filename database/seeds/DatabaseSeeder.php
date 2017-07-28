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
      $this->call(Thesiss::class);
      $this->call(ThesisCopies::class);
      $this->call(ChaptersThesis::class);
      $this->call(Authors::class);
      $this->call(Editorials::class);
      $this->call(Categories::class);
      $this->call(AuthorCategory::class);
      $this->call(AuthorThesis::class);
      $this->call(EditorialThesis::class);
      $this->call(EditorialCategory::class);
      $this->call(Noticias::class);
      $this->call(Configuration1::class);
      $this->call(UserTypes::class);
   }
}

