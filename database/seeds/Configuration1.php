<?php
use Illuminate\Database\Seeder;
use App\Configuration as Configuration;

class Configuration1 extends Seeder
{

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      Configuration::create([
         'startMonday' => null,
         'startTuesday' => null,
         'startWednesday' => null,
         'startThursday' => null,
         'startFriday' => null,
         'startSaturday' => null,
         'startSunday' => null,
         'endMonday' => null,
         'endTuesday' => null,
         'endWednesday' => null,
         'endThursday' => null,
         'endFriday' => null,
         'endSaturday' => null,
         'endSunday' => null
      
      ]);
   }
}