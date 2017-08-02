<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// Para usar el Modelo Tesis
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
      $howPrestamo=true;

      $showPrestamo = view('admin.md_prestamos.showPrestamo');

      return view('admin.md_prestamos.index', [
         'showPrestamo' => $showPrestamo
      ]);
   }


   public function create()
   {
          //
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
