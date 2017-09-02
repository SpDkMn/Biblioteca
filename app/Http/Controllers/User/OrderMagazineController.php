<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Magazine as Magazine;
use App\Thesis as Thesis;
use App\Compendium as Compendium;
class OrderMagazineController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function autentificacion(){

       if(Auth::User() != null){//esta logeado
         if(Auth::User()->employee2() != null){//verficiaca si  es empleado
            Auth::logout();
         }
       }
     }
  public function index()
  {
    $this->autentificacion();
    $magazines = null ;

    $tableMagazine = view('user.md_orders.search_magazines.tableMagazine',[
      'magazines' => $magazines
    ]);

    $search = view('user.md_orders.search_magazines.search', [
      'tableMagazine' => $tableMagazine
    ]);

    return view('user.md_orders.search_magazines.index', [
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
          $consulta_revistas = "Select item_id From search_items Where Match(content) AGAINST('".$search."') AND STATE = true AND type='3'";
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

          $itemsMagazines=DB::Select($consulta_revistas);
          if (compruebaItem($itemsMagazines)) {
            $i=0;
            foreach ($itemsMagazines as $itemsMagazine) {
                $magazines[$i]=Magazine::find($itemsMagazine->item_id);
                $i++;
            }
          }

        $b = Magazine::first();
        $modalMagazine =  view('user.md_orders.search_magazines.modalMagazine',[
            'b'=>$b
          ]);

          return view('user.md_orders.search_magazines.tableMagazine',[
                'magazines' => $magazines,
                'modalMagazine' => $modalMagazine
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
          $b = Magazine::find($id);
          return view('user.md_orders.search_magazines.modalMagazine',[
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
