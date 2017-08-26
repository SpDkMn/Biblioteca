<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// Para usar el Modelo Tesis
use Carbon\Carbon;

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
          return view('admin.layouts.header',['pedidos'=>$pedidos2]);
   }

   public function prestar(Request $request)
   {

     function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}
     $pedido = Order::find(cambiaCadena($request['id']));
     $endDate = Carbon::now('America/Lima');
     $pedido->state = 1 ;
     $pedido->endDate = $endDate ;

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

   public function devolver(Request $request){

          function cambiaCadena($str){return intval(preg_replace('/[^0-9]+/', '', $str), 10);}
          $pedido = Order::find(cambiaCadena($request['id']));
          // $endDate = Carbon::now('America/Lima');
          //state 3 es devuelto
            $pedido->state = 3;
          // $pedido->endDate = $endDate ;
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
          //Consultar: cambiar el estado del pedido a devuelto
           $pedido->save();
          return redirect(redirect()->getUrlGenerator()->previous());
   }

   public function edit($id)
   {
         //
   }

   public function update(Request $request, $id)
   {
      $thesis = Thesis::find($id);
      $usuarios = User::all();

         $i=0;

      foreach($thesis->thesisCopies as $copia){

                  foreach($usuarios as $usuario){
                        if($usuario->code == $request["codigo"]){
                           if($usuario->state == 1){
                              if($i<1){   //Para que pase solo una vez.Solo se hace el prestamo de un ejemplar
                                 if($copia->availability==1){
                                       $copia->availability=0;  //Deshabilitando una de los ejemplares
                                       $usuario->thesis_order()->attach($id);
                                       $copia->save();
                                       $i++;
                                 }
                               }

                           }
                        }
                     }

      }

    $showPrestamo = view('admin.md_prestamos.showPrestamo');

      return view('admin.md_prestamos.index', [
         'showPrestamo' => $showPrestamo
      ]);


}

   public function destroy($id)
   {
      //
   }

   public function content(Request $request, $id)
   {
      $thesis = Thesis::find($id);

      return view('admin.md_thesiss.show2')->with('thesis', $thesis);
   }

   public function show($id)
   {
      //
   }


}
