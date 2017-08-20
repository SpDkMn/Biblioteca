<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Book as Book;
use App\Magazine as Magazine;
use App\Thesis as Thesis;
use App\Compendium as Compendium;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $books = null ;
      $magazines = null ;
      $thesis = null ;

      $tableBooks = view('user.md_orders.tableBooks',[
        'books' => $books
      ]);
      $tableMagazines = view('user.md_orders.tableMagazines',[
        'magazines' => $magazines
      ]);
      $tableThesis = view('user.md_orders.tableThesis',[
        'thesis' => $thesis
      ]);

      $search = view('user.md_orders.search', [
        'tableBooks' => $tableBooks,
        'tableMagazines' => $tableMagazines,
        'tableThesis' => $tableThesis
      ]);

      return view('user.md_orders.index', [
        'search' => $search
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

      if($request->ajax()){
         $search=$request->input('search');
        echo "Resultados de Busqueda : ".$search;
     }
     //El filtro se elimina al hacer la busqueda y la busqueda se elimina al seleccionar el filtro

     //Activadores
     $Blibros=$Bthesis=$Brevistas=$Bcompendios = false;

       switch ($request['searchType']) {
         case 1:
        $consulta_libros = "Select item_id From search_items Where Match(content) AGAINST('".$search."') AND STATE = true AND type='1'";
        $Blibros = true;
           break;
       case 2:
        $consulta_thesis = "Select item_id From search_items Where Match(content) AGAINST('".$search."') AND STATE = true AND type='2'";
        $Bthesis = true;
         break;
       case 3:
       $consulta_revistas = "Select item_id From search_items Where Match(content) AGAINST('".$search."') AND STATE = true AND type='3'";
       $Brevistas = true;
         break;
       case 4:
       $consulta_compendios = "Select item_id From search_items Where Match(content) AGAINST('".$search."') AND STATE = true AND type='4'";
       $Bcompendios = true;
         break;
       };


       //Comprobamos si el los items obtenidos en la consulta no son nulos
       function compruebaItem($item){
         if(sizeof($item)==0){
           echo "<br>";
           echo "No se encontraron resultados";
           return false;
         }else {
           return true;
         }
       }

       //HACIENDO PRUEBAS -- MOSTRANDO LOS ACTIVADORES
      //  echo "<br>";
      //  echo true === (bool)$Blibros ? 'True ' : 'False ' ;
      //  echo "<br>";
      //  echo true === (bool)$Bthesis ? 'True ' : 'False ';
      //  echo "<br>";
      //  echo true === (bool)$Brevistas ? 'True ' : 'False ';
      //  echo "<br>";
      //  echo true === (bool)$Bcompendios ? 'True ' : 'False ';

      //Filtrando las consultas para hacerla más rapida
      if ($Blibros) {
        $itemsBooks=DB::Select($consulta_libros);
        if (compruebaItem($itemsBooks)) {
          $i=0;
          foreach ($itemsBooks as $itemsBook) {
              $books[$i]=Book::find($itemsBook->item_id);
              $i++;
          }


        }
        // dd("estas buscando un libro");
      }else if ($Bthesis) {
        $itemsThesis=DB::Select($consulta_thesis);
        if (compruebaItem($itemsThesis)) {
          foreach ($itemsThesis as $itemsThesi) {
              $thesis[$i]=Thesis::find($itemsThesi->item_id);
              $i++;
          }        }
          // dd("estas buscando una tesis");
      }else if ($Brevistas) {
        $itemsMagazines=DB::Select($consulta_revistas);
        if (compruebaItem($itemsMagazines)) {
          foreach ($itemsMagazines as $itemsMagazine) {
              $magazines[$i]=Magazine::find($itemsMagazine->item_id);
              $i++;
          }        }
          // dd("estas buscando una revista");
      }else if ($Bcompendios) {
        $itemsCompendium=DB::Select($consulta_compendios);
        if (compruebaItem($itemsCompendium)) {
          foreach ($itemsCompendium as $itemsCompendiu) {
              $compendiums[$i]=Compendium::find($itemsCompendiu->item_id);
              $i++;
          }
        }
        // dd("estas buscando un compendio");
      }
      //dd('llego hasta aqui',$request->all(),$request['searchType']);

      //No hay else porque por defecto siempre habrá como minimo uno activado


      $b = Book::first();
      $modalBook =  view('user.md_orders.modalBook',[
          'b'=>$b
        ]);

        return view('user.md_orders.tableBooks',[
              'books' => $books,
              'modalBook' => $modalBook
            ]);
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $b = Book::find($id);
        return view('user.md_orders.modalBook',[
            'b' => $b
          ]);
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
}
