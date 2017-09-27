<?php
namespace App\Console;
use DB;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

   /**
    * The Artisan commands provided by your application.
    *
    * @var array
    */
   protected $commands = [
     'App\Console\Commands\Prueba',
     'App\Console\Commands\observarCastigo'
   ];

   /**
    * Define the application's command schedule.
    *
    * @param \Illuminate\Console\Scheduling\Schedule $schedule
    * @return void
    */
   protected function schedule(Schedule $schedule)
   {
      //Comando a ejecutarse cada minuto
       $schedule->command('test:prueba')->everyMinute();
       $schedule->command('command:observarCastigo')->everyMinute();

   }

   /**
    * Register the Closure based commands for the application.
    *
    * @return void
    */
   protected function commands()
   {
      require base_path('routes/console.php');
   }
}
