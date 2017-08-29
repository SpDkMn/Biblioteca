<?php

namespace App\Console\Commands;
use DB ;
use App\Author as Author ;
use App\Order as Order;
use Carbon\Carbon ;
use App\User as User;
use App\UserType as UserType ;
use Illuminate\Console\Command;

class Prueba extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:prueba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Codigo de prueba ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

      $tipos = UserType::all();
      $pedidos = Order::all();
      $usuarios = User::all();

      foreach ($pedidos as $pedido) {
         if ($pedido->state == 1) {
           if ($pedido->place == 1 ) { //domicilio
           $usuario = User::find($pedido->id_user);
           $tipo = UserType::find($usuario->id_user_type);
           //El tiempo esta en horas -> cambiar el 24 y poner el 180 en horas
           $tiempoDomicilio = $tipo->tiempoDomicilio/60;
           $tiempoPrestamo = $pedido->startDate;

           $tiempoActual = Carbon::now('America/Lima') ;
           $tiempoPrestamo2 = Carbon::parse($tiempoPrestamo)->timezone('America/Lima');

           if ($tiempoActual->diffInHours($tiempoPrestamo2->addHours($tiempoDomicilio),false)<=0) {
             if ($tipo->castigado) {
               //Cambiando el estado a 1 : castigado
               $usuario->state = 1;
               $usuario->save();
             }
           }else {
             echo "No Castigado";
           }

         }else if ($pedido->place = 0) { //sala

           }
         }
      }



        $horaactual = Carbon::now('America/Lima');
        $titulo = "BIBLIOTECA.txt";
        $nuevoarchivo = fopen($titulo, "w+");
        fwrite($nuevoarchivo,"Fecha: ".$horaactual->toTimeString());
        fwrite($nuevoarchivo," Tiempo Domicilio: ".$tiempoDomicilio);
        fclose($nuevoarchivo);

      $this->info('Codigo ejecutandose ... ');

    }
}
