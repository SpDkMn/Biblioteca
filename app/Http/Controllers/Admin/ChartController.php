<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Para usar el objeto Auth
use Illuminate\Support\Facades\Auth;
// Para usar el Modelo User
use App\User as User;
// Para usar el Modelo Profile
use App\Profile as Profile;
use App\Order as Order;
use App\Book as Book;
use App\Thesis as Thesis;
use App\Magazine as Magazine;
use App\Compendium as Compendium;


class ChartController extends Controller
{

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
    /*
      $show = $new = $edit = $delete = true;
      $ver = $crear = $editar = $eliminar = true;

      if ($crear) {
         $new = view('admin.md_perfiles.new');
      }
      if ($ver) {
         $show = view('admin.md_perfiles.show', [
            'new' => $new,
            'perfiles' => Profile::all(),
            'editar' => $editar,
            'eliminar' => $eliminar
         ]);
      }
      if ($editar) {
         $edit = view('admin.md_perfiles.edit', [
            'perfil' => Profile::first()
         ]);
      }
      if ($eliminar) {
         $delete = view('admin.md_perfiles.delete');
      }
      $i = 0 ; $pedidos = null ;
      foreach (Order::all() as $pedido) {
        if ($pedido->state == 0) {
          $pedidos[$i] = $pedido ;
        }
        $i = $i +1 ;
      }
      */
      $pedidos = Order::all();
      $libros  = Book::all();
      $thesis  = Thesis::all();
      $revistas= Magazine::all();
      $compendios = Compendium::all();


      $numBooks=0;
      foreach (Book::all() as $libro) {
          $numBooks = $numBooks +1 ;
      }

      $numThesis=0;
      foreach (Thesis::all() as $tesis) {
          $numThesis = $numThesis +1 ;
      }

      $numMagazines=0;
      foreach (Magazine::all() as $revista) {
          $numMagazines = $numMagazines +1 ;
      }

      $numCompendium=0;
      foreach (Compendium::all() as $compendio) {
          $numCompendium = $numCompendium +1 ;
      }

      return view('admin.md_statistics.index',[
        'pedidos' => null ,
         'numBooks' => $numBooks,
         'numThesis' => $numThesis,
         'numMagazines' => $numMagazines,
         'numCompendium' => $numCompendium
      ]);

   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      //
   }

   /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
   }

   /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
   }
}
