<?php

use Illuminate\Database\Seeder;
use App\Compendium as Compendium;

class Compendiums extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Compendium::Create([
          'title' => 'Compendio1',
          'numero' => '4',
          'fechaEdicion' => 'ABR-DIC.2016',
          'editorial_id' => '6',
          'introduccion'=>'Compendio de Tecnologias de la informacion',
          'author_id' => 1
        ]);
         Compendium::Create([
          'title' 			=> 'Algorithmic 2',
          'numero' 			=> '2',
          'fechaEdicion' 	=> 'ABR-ENE.2015',
          'editorial_id' 	=> '5',
          'introduccion' 	=> 'Compendio de redes neuronales',
          'author_id' 		=>2

        ]);
    }
}
