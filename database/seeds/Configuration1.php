<?php

use Illuminate\Database\Seeder;

class Configuration1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /**
      * Run the database seeds.
      *
      * @return void
      */
     public function run()
       {
         Configuration::create(['name' => 'Activar','JSON'=>'{"activar":1}']);
       }
     }
}
