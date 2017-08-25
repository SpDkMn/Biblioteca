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

class OrderBookController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $books = null ;

    $tableBooks = view('user.md_orders.search_books.tableBooks',[
      'books' => $books,
    ]);

    $search = view('user.md_orders.search_books.search', [
      'tableBooks' => $tableBooks
    ]);

    return view('user.md_orders.search_books.index', [
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

         //Error: Esta mostrando libros repetidos


          $itemsBooks=DB::Select($consulta_libros);

          // dd($itemsBooks,count($itemsBooks),$z);
          if (compruebaItem($itemsBooks)) {
            $i=0;
            foreach ($itemsBooks as $itemsBook) {
                $books[$i]=Book::find($itemsBook->item_id);
                $i++;
            }
          }

        $b = Book::first();
        $modalBook =  view('user.md_orders.search_books.modalBook',[
            'b'=>$b
          ]);

          return view('user.md_orders.search_books.tableBooks',[
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
          return view('user.md_orders.search_books.modalBook',[
              'b' => $b            ]);
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
