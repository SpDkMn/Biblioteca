<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Penalty;
use App\User;
use App\PenaltyOrder;
use DateTime;

class observarCastigo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:observarCastigo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        //Aca es la funcion que se actualizara cada minuto
        $penalties = Penalty::get()->where('activity',1);

        $fecha = new DateTime ( 'NOW' );
        $fecha->modify( '-5 hour' );
        $tiempoRestante=$fecha;

        foreach ($penalties as $penalty) {
          //dd($penalty->endPenalty);

          if($penalty->endPenalty==null){
            //Es un ciclo
          }
          else{
            $fechaFin=new DateTime($penalty->endPenalty);
            $intervalo=date_diff( $fechaFin , $fecha );
            $dia=(int)$intervalo -> format('%a');
            $hora=(int)$intervalo->format('%h');
            $min=(int)$intervalo->format('%i');

            $usuario=$penalty->user;
            if($dia==0&&$hora==0&&$min<=1){
              //dd("entro");
                //Es hora de detener el castigo
                $penalty->activity=0;
                $penalty->save();
                $usuario->ultimatePunishmentId=null;
                $usuario->save();
                //dd($fecha);
                //dd("dia : ".$dia."; horas : ".$hora."; minutos : ".$min);

                foreach($usuario->penalties as $castigo)
                {
                  if($castigo->activity==2){
                    //El primer castigo en cola lo vuelve activo
                    $orden=$castigo->penaltyOrder;
                    if($orden->penaltyTime=="ciclo"){
                      $fechaFinal=null;
                    }else{
                      $fechaFinal=$fecha;
                      $fechaFinal->modify('+'.$orden->penaltyTime.' day');
                    }

                    $castigo->startPenalty=$fecha;
                    $castigo->endPenalty=$fechaFinal;
                    $castigo->activity=1;
                    $castigo->save();
                    $usuario->ultimatePunishmentId=$castigo->id;
                    $usuario->save();
                    break;
                  }
                }
            }


          }

        }
    }
}
