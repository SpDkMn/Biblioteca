<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Penalty;
use App\TypePenalty;
use DateTime;

class PenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function autentificacion(){

         if(Auth::User() != null){//esta logeado
           if(Auth::User()->employee2() == null){//verficiaca si no  es empleado
              Auth::logout();
           }
         }
       }
    public function index()
    {
       $this->autentificacion();

        $users = User::with(['user_type'])->get();
        return view('admin.md_sanciones.index',[

            "users"=>$users,
            'pedidos'=>null

            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario=User::with(['penalties'])->find($request->usuarioId);
        $tipoSancion=TypePenalty::with(['penaltyOrders'])->find($request->typePenalty);


        $fecha = new DateTime ( 'NOW' );
        $fecha->modify( '-5 hour' );
        $arregloCastigos=$usuario->penalties;
        $contador=0;
        foreach($arregloCastigos as $castigo){
            if($castigo->belongsTime){
                $contador++;
            }
        }

        $cantidadOrden=count($tipoSancion->penaltyOrders);
        $orden=$tipoSancion->penaltyOrders[$contador];

        if($usuario->ultimatePunishmentId!=null){
            //Entro a Cola
                \App\Penalty::create([
                     'userId' => $request->usuarioId,
                     'employeeId' => Auth::user()->employee2->id,
                     'penaltyOrderId' => $orden->id,
                     'startPenalty' => null,
                     'endPenalty' => null,
                     'activity' => 2,
                     'event' => $request->contexto,
                     'belongsTime' => true,
                  ]);
           return redirect("admin/sanciones");

        }else{
            //dd("esta vacio");

            //$fecha_actual=date("d/m/Y");
            //$fecha= time() ;
            //dd($fecha->format('h/i/s'));

                if($orden->penaltyTime == "ciclo"){
                    \App\Penalty::create([
                         'userId' => $request->usuarioId,
                         'employeeId' => Auth::user()->employee2->id,
                         'penaltyOrderId' => $orden->id,
                         'startPenalty' => $fecha,
                         'endPenalty' => null,
                         'activity' => 1,
                         'event' => $request->contexto,
                         'belongsTime' => true,
                      ]);
                }
                else{
                    $fechaFinal=$fecha;
                    $fechaFinal->modify('+'.$orden->penaltyTime.' day');
                    \App\Penalty::create([
                         'userId' => $request->usuarioId,
                         'employeeId' => Auth::user()->employee2->id,
                         'penaltyOrderId' => $orden->id,
                         'startPenalty' => $fecha,
                         'endPenalty' => $fechaFinal,
                         'activity' => 1,
                         'event' => $request->contexto,
                         'belongsTime' => true,
                      ]);
                }
                $sanciones=Penalty::all();

                $usuario->ultimatePunishmentId=count($sanciones);
                $usuario->save();

                return redirect("admin/sanciones");
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penalties = Penalty::get();
        return view('admin.md_sanciones.show',[
            "penalties"=>$penalties
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function pararSancion($id)
    {
        $usuario=User::with(['penalties'])->find($id);
        if($usuario->ultimatePunishmentId!=null)
        {


            $sancion=Penalty::find($usuario->ultimatePunishmentId);

            $fecha = new DateTime ( 'NOW' );
            $fecha->modify( '-5 hour' );

            $sancion->endPenalty=$fecha;
            $sancion->activity=0;
            $sancion->save();

            $sancionCola=null;

            $arregloSancion=$usuario->penalties;
            for($i=0;$i<count($arregloSancion);$i++){
                if($arregloSancion[$i]->activity==2){
                    $sancionCola=$arregloSancion[$i];
                    break;
                }
            }

            if($sancionCola==null){
                //No hubo cola
                $usuario->ultimatePunishmentId=null;
                $usuario->save();
            }
            else
            {
                //Si hubo cola

                $ordenSancionCola=$sancionCola->penaltyOrder;

                $fechaFinal=$fecha;

                if($ordenSancionCola->penaltyTime=="ciclo"){
                    $fechaFinal=null;
                }
                else{
                    $fechaFinal->modify('+'.$ordenSancionCola->penaltyTime.' day');
                }

                $sancionCola->startPenalty=$fecha;
                $sancionCola->endPenalty=$fechaFinal;
                $sancionCola->activity=1;
                $sancionCola->save();

                $usuario->ultimatePunishmentId=$sancionCola->id;
                $usuario->save();
            }
            echo("true");
        }
        else{
            echo("false");
        }



    }
    /*public function observarCastigo(){

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
          }
          //dd($fecha);
          dd("dia : ".$dia."; horas : ".$hora."; minutos : ".$min);
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
              $castigo->save();
              break;
            }
          }
        }

      }



    }
    */
}
