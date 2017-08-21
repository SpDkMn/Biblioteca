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

class OrderThesisController extends Controller
{
    public function index()
  {
    $thesis = null ;

    $tableThesis = view('user.md_orders.search_thesis.tableThesis',[
      'thesis' => $thesis
    ]);

    $search = view('user.md_orders.search_thesis.search', [
      'tableThesis' => $tableThesis
    ]);

    return view('user.md_orders.search_thesis.index', [
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
        $consulta_thesis = "Select item_id From search_items Where Match(content) AGAINST('".$search."') AND STATE = true AND type='2'";
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

        $itemThesis=DB::Select($consulta_thesis);
        if (compruebaItem($itemThesis)) {
          $i=0;
          foreach ($itemThesis as $itemThesi) {
              $thesis[$i]=Thesis::find($itemThesi->item_id);
              $i++;
          }
        }

      $b = Thesis::first();
      $modalThesis =  view('user.md_orders.search_thesis.modalThesis',[
          'b'=>$b
        ]);

        return view('user.md_orders.search_thesis.tableThesis',[
              'thesis' => $thesis,
              'modalThesis' => $modalThesis
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
        return view('user.md_orders.search_thesis.modalThesis',[
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
