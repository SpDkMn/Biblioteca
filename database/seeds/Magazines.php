<?php

use Illuminate\Database\Seeder;
use App\Magazine as Magazine;

class Magazines extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Magazine::Create([
          'title' => 'Algorithmic',
          'volumen' => '3',
          'numero' => '4',
          'fechaEdicion' => 'ABR-DIC.2016',
          'subtitle' => 'Revista de Investigación',
          'issn' => '666999',
          'issnD' => '999666',
          'author_id' => '6'
        ]);
    }
}
