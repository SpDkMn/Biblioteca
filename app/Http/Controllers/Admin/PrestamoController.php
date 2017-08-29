<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// Para usar el Modelo Tesis
use Carbon\Carbon;
use App\UserType as UserType ;
use App\Order as Order;
use App\Loan as Loan;
use App\Configuration as Configuration;
use App\Author as Author;
use App\Thesis as Thesis;
use App\ThesisCopy as ThesisCopy;
use App\Editorial as Editorial;
use App\Content as Content;
use App\ChapterThesis as ChapterThesis;
use App\User as User;
// Para usar el Modelo Profile
use App\Profile as Profile;
use App\Book as Book ;

class PrestamoController extends Controller
{

   //Controlador del prestamo || ADMINISTRADOR



   public function index(Request $request)
   {
      $pedidos = Order::all();

      $configuraciones = Configuration::all();
      //Inicializando bandera
      $band = false ;
      if ($configuraciones->isNotEmpty()) {
            $configuracion = $configuraciones->last();
            $band = true;
      }else {
          $configuracion = collect([]);
      }


      $showSeleccion = view('admin.md_prestamos.showSeleccion',[
         'pedidos' => $pedidos,
         ]);


      $showPedidos = view('admin.md_prestamos.showPedidos',[
         'pedidos' => $pedidos,
         ]);


      $showPrestamo = view('admin.md_prestamos.showPrestamo',[
         'pedidos'       => $pedidos,
         'configuracion' => $configuracion,
         ]);


         $i = 0 ;
         foreach (Order::all() as $pedido) {
           if ($pedido->state == 0) {
             $pedidos[$i] = $pedido ;
           }
           $i = $i+1;
         }

      return view('admin.md_prestamos.index', [
         'showSeleccion'   => $showSeleccion,
         'showPedidos'     => $showPedidos,
         'showPrestamo'    => $showPrestamo,
         'pedidos' => $pedidos
      ]);

   }


   public function create()
   {
          //Enviando los $pedidos

           $pedidos = Order::all();
           $pedidos2 = null ;
           $i = 0 ;
           foreach ($pedidos as $pedido) {
             if ($pedido->state == 0) {
               $pedidos2[$i] = $pedido ;
             }
             $i++;
           }
           dd($pedidos2,$pedidos);
          return view('admin.layouts.header',['pedidos'=>$pedidos2]);
   }

   public function prestar(Request $request)
   {

     function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}
     $pedido = Order::find(cambiaCadena($request['id']));
     //Cambiando el estado del pedido a aceptado
     $pedido->state = 1 ;
     //Poniendo la fecha en la que fue prestado
     $pedido->startDate = Carbon::now('America/Lima');
     switch ($pedido->typeItem) {
       case 1:
        $book = Book::find($pedido->id_item);
        foreach ($book->bookCopies as $item) {
            if ($item->copy == $pedido->copy) {
              //Cambiando disponibilidad a prestado
              $item->availability = 2;
              $item->save();
            }
        }
         break;
       default:
         # code...
         break;
     }
     $pedido->save();
     return redirect(redirect()->getUrlGenerator()->previous());
   }
   public function rechazar(Request $request){
     function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}
     //Encontrando el pedido
     $pedido = Order::find(cambiaCadena($request['id']));
     //Poniendo la fecha en la que fue rechazado
     $pedido->endDate = Carbon::now('America/Lima');
     //Cambiando el estado del pedido a rechazado
     $pedido->state = 2;
     switch ($pedido->typeItem) {
       case 1:
        $book = Book::find($pedido->id_item);
        foreach ($book->bookCopies as $item) {
            if ($item->copy == $pedido->copy) {
              //Cambiando disponibilidad del item a : disponible
              $item->availability = 1;
              //Falta cambiar el estado del usuario que ha pedido
              $item->save();
            }
        }
         break;
       default:
         # code...
         break;
     }
     //Regresando a la ruta anterior
     $pedido->save();
     return redirect(redirect()->getUrlGenerator()->previous());
   }

   public function devolver(Request $request){
          function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}
          $pedido = Order::find(cambiaCadena($request['id']));
          $pedido->endDate = Carbon::now('America/Lima');
          $pedido->state = 3;
          switch ($pedido->typeItem) {
            case 1:
             $book = Book::find($pedido->id_item);
             foreach ($book->bookCopies as $item) {
                 if ($item->copy == $pedido->copy) {
                   //Cambiando disponibilidad a disponible
                   $item->availability = 1;
                   //Falta cambiar el estado del usuario que ha pedido
                   $item->save();
                 }
             }
              break;
            default:
              # code...
              break;
          }
           $pedido->save();
          return redirect(redirect()->getUrlGenerator()->previous());
   }


}
