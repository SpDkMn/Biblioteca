<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fullcalendarevento as CalendarioEvento;

class CalendarController extends Controller
{
    public function index()
    {   
        $data = array(); //declaramos un array principal que va contener los datos
        $id = CalendarioEvento::pluck('id')->all(); //listamos todos los id de los eventos
        $titulo = CalendarioEvento::pluck('titulo')->all(); //lo mismo para lugar y fecha
        $fechaIni = CalendarioEvento::pluck('fechaIni')->all();
        $fechaFin = CalendarioEvento::pluck('fechaFin')->all();
        $allDay = CalendarioEvento::pluck('todoeldia')->all();
        $background = CalendarioEvento::pluck('color')->all();
        $count = count($id); //contamos los ids obtenidos para saber el numero exacto de eventos
 
        //hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "title"=>$titulo[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
                "start"=>$fechaIni[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
                "end"=>$fechaFin[$i],
                "allDay"=>$allDay[$i],
                "backgroundColor"=>$background[$i],
                "id"=>$id[$i]
                //"url"=>"cargaEventos".$id[$i]
                //en el campo "url" concatenamos el el URL con el id del evento para luego
                //en el evento onclick de JS hacer referencia a este y usar el método show
                //para mostrar los datos completos de un evento
            );
        }
 
        json_encode($data); //convertimos el array principal $data a un objeto Json 
       return $data; //para luego retornarlo y estar listo para consumirlo
    }

    public function create(){
        //Valores recibidos via ajax
        $title = $_POST['title'];
        $start = $_POST['start'];
        $back = $_POST['background'];

        //Insertando evento a base de datos

        CalendarioEvento::create([
            'fechaIni' => $start,
            'fechaFin' => null,
            'todoeldia' => true,
            'color' => $back,
            'titulo'=>$title,
            ]);
   }

   public function update(){
        //Valores recibidos via ajax
        $id = $_POST['id'];
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allDay = $_POST['allday'];
        $back = $_POST['background'];

        $evento=CalendarioEvento::find($id);
        if($end=='NULL'){
            $evento->fechaFin=NULL;
        }else{
            $evento->fechaFin=$end;
        }
        $evento->fechaIni=$start;
        $evento->todoeldia=$allDay;
        $evento->color=$back;
        $evento->titulo=$title;
        //$evento->fechaFin=$end;

        $evento->save();
   }

   public function delete(){
        //Valor id recibidos via ajax
        $id = $_POST['id'];

        CalendarioEvento::destroy($id);
   }
}
