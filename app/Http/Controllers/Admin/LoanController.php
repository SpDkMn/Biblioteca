<?php

namespace App\Http\Controllers\Admin;;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Author as Author;
use App\Magazine as Magazine;
use App\MagazineCopy as MagazineCopy;
use App\Editorial as Editorial;
use App\Content as Content;
use App\SearchItem as SearchItem;
use App\BookCopy as BookCopy;
use App\Book as Book;
use App\Order as Order ;
use App\Thesis as Thesis;
use App\User as User;
class LoanController extends Controller
{
    //Controlador del pedido || USUARIO


     /**
      * Display a listing of the resource.
      * @return \Illuminate\Http\Response
      */
      public function autentificacion(){

          if(Auth::User() != null){//esta logeado
            if(Auth::User()->employee2() == null){//verficiaca si no  es empleado
               Auth::logout();
            }
          }
        }
     public function index(Request $request)
     {
      $this->autentificacion();
       function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}
       //Almacenamiento de la fecha de pedido
         $startDate = null;
           //         $date->toDateString();                          // 1975-12-25
           //         $date->toFormattedDateString();                 // Dec 25, 1975
           //         $date->toTimeString();                          // 14:15:16
           //         $date->toDateTimeString();                      // 1975-12-25 14:15:16
       //fin

         $typeItem = cambiaCadena($request['typeItem']);
         $place = cambiaCadena($request['place']);
         $state = 0 ;
         $id_user = Auth::User()->id;
         $id_item = cambiaCadena($request['id']) ;
         $copy = cambiaCadena($request['copy']);
         //Editados en prestamo
         $endDate = null ;
         //Prueba
          //  switch ($typeItem) {
          //    case 1:
          //      //Almacenamiento de la copia del libro pedido
          //        $book = Book::find($request['id']);
          //        //Recorriendo las copias del item
          //        foreach ($book->bookCopies as $copia) {
          //          if ($copia->copy == cambiaCadena($request['copy'])) {
          //            //Almacenando copia del item pedido
          //            $copiaItem = $copia;
          //          }
          //        }
          //      //Fin
           //
          //      break;
           //
          //    default:
          //      # code...
          //      break;
          //  }
           //
           //
           //
           switch ($typeItem) {
             case 1:
              $book = Book::find($request['id']);
              foreach ($book->bookCopies as $item) {
                  if ($item->copy == cambiaCadena($request['copy'])) {
                    //Cambiando disponibilidad a en espera
                    $item->availability = 3;
                    $item->save();
                  }
              }
               break;
           }

         Order::create([
           'startDate' => $startDate,
           'typeItem' => $typeItem,
           'place' => $place,
           'id_user' => $id_user,
           'id_item' => $id_item,
           'copy' => $copy,
           'state' => $state,
           'endDate' => null
         ]);
       //Redirigir a un modal donde se muestre que el pedido fue satisfactorio
       return redirect(redirect()->getUrlGenerator()->previous());
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
      * @param \Illuminate\Http\Request $request
      * @return \Illuminate\Http\Response
      */
     public function store(NoticiaCreateRequest $request)
     {
       dd('estoy en pedidos');
     }

     /**
      * Display the specified resource.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
     }

     /**
      * Update the specified resource in storage.
      *
      * @param \Illuminate\Http\Request $request
      * @param int $id
      * @return \Illuminate\Http\Response
      */
     public function update(NoticiaUpdateRequest $request, $id)
     {
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
     }

     public function pedid()
      { 
          ini_set('max_execution_time', 500);

          while(Order::where('state',0)->count() < 1){
             usleep(1000);
          }        
          if(Order::where('state',0)->count() >0){

                $data = Order::where('state',0)->first();
                $typeItem = $data->typeItem;
                $id_item = $data->id_item;
                if($data->typeItem==2){ $item=Thesis::find($data->id_item); } 
                if($data->typeItem==1){ $item=Book::find($data->id_item); } 
                if($data->typeItem==3){ $item=Magazine::find($data->id_item); } 
                if($data->typeItem==4){ $item=Compendium::find($data->id_item); }

                $titulo = $item->title;  //Titulo del material
 
                foreach($item->authors as $author) 
                  if($author->pivot->type == true) 
                    $autor = $author->name;

                $cont=0;
                $pedidosc = Order::all();
                foreach($pedidosc as $pedidoc)
                  if($pedidoc->state == 0 || $pedidoc->state == 4 )   
                    $cont++;

                if($data->typeItem==1) $nomItem="Libro"; 
                else if($data->typeItem==2) $nomItem="Tesis"; 
                else if($data->typeItem==3) $nomItem="Revista"; 
                else $nomItem="Compendio";

                $startDate = $data->startDate;
                $place = $data->place;
                $copy = $data->copy;    
                $ubicacion = $item->libraryLocation; //ubicacion del material

                $usuario= User::find($data->id_user);
                $nomUsuario = $usuario->name;   //nombre del usuario


                $id = $data->id;
                $edit = Order::find($id);
                $edit->state = 4;    //Bandera. Cambio de numero para que no estea constantemente realizando peticiones a la base de datos
                $edit->save();
                //$data = Test::first();     
                return response()->json([
                      'startDate' => $startDate, 
                      'nomItem'   => $nomItem,   //nombre del item
                      'autor'     => $autor,
                      'place'     => $place,    //lugar de prestamo
                      'titulo'    => $titulo,
                      'copy'      => $copy,    //ejemplar
                      'ubicacion' => $ubicacion,
                      'nomUsuario'=> $nomUsuario,
                      'id'        => $id,
                      'cont'      => $cont,    //Con este contador muestro la cantidad de pedidos en espera
                      ]); 
          }
      }


}
