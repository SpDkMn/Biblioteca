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
        //
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

      $consulta_libros = "Select item_id From search_items Where Match(content) AGAINST('".$search."') AND STATE = true AND type='1'";
      $consulta_thesis = "Select item_id From search_items Where Match(content) AGAINST('".$search."') AND STATE = true AND type='2'";
      $consulta_revistas = "Select item_id From search_items Where Match(content) AGAINST('".$search."') AND STATE = true AND type='3'";
      //La consulta se hará segun
      $items=DB::Select($consulta_libros);

      if(sizeof($items)==0){
        echo "<br>";
        echo "No se encontraron resultados";
      }
      else{
        $i=0;
        foreach ($items as $item) {
            $books[$i]=Book::find($item->item_id);
            $i++;
        }

        return view('user.md_orders.tableBooks',[
              'books' => $books
          ]);
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
}
