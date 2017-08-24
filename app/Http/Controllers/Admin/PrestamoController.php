<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// Para usar el Modelo Tesis

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


      return view('admin.md_prestamos.index', [
         'showSeleccion'   => $showSeleccion,
         'showPedidos'     => $showPedidos,
         'showPrestamo'    => $showPrestamo
      ]);
   }


   public function create()
   {
          return view('admin.layouts.header');
   }

   public function store(Request $request,$id)
   {
         //
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
