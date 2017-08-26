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
class LoanController extends Controller
{
     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index(Request $request)
     {
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
                    //Cambiando disponibilidad a prestado
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
       return redirect('user/');
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





}
