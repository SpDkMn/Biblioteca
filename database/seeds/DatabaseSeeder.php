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
        $this->call(Authors::class);
        $this->call(Editorials::class);
        $this->call(Categories::class);
        // $this->call(Books::class);
        // $this->call(BookCopies::class);;
        // $this->call(ChaptersBook::class);
        // $this->call(Thesiss::class);
        // $this->call(ThesisCopies::class);
        // $this->call(ChaptersThesis::class);

        //llenando tablas pivotes
        DB::table('author_category')->insert(['author_id' => '1','category_id' => '2']);
        DB::table('author_category')->insert(['author_id' => '2','category_id' => '2']);
        DB::table('author_category')->insert(['author_id' => '3','category_id' => '2']);
        DB::table('author_category')->insert(['author_id' => '4','category_id' => '2']);
        DB::table('author_category')->insert(['author_id' => '5','category_id' => '5']);
        DB::table('author_category')->insert(['author_id' => '6','category_id' => '5']);
        DB::table('author_category')->insert(['author_id' => '7','category_id' => '5']);
        DB::table('category_editorial')->insert(['editorial_id' => '1','category_id' => '2']);
        DB::table('category_editorial')->insert(['editorial_id' => '2','category_id' => '2']);
        DB::table('category_editorial')->insert(['editorial_id' => '3','category_id' => '2']);
        DB::table('category_editorial')->insert(['editorial_id' => '4','category_id' => '2']);

      }

}
