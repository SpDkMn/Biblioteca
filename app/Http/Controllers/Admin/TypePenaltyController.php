<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TypePenalty;
use App\PenaltyOrder;
use Session;
use Redirect;


class TypePenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

          $typepenalties = TypePenalty::with(['penaltyOrders'])->get();
          $typepenalty = null;
          $show = view('admin.md_tiposanciones.show', [
             'typepenalties' => $typepenalties
          ]);
          $new = view('admin.md_tiposanciones.new');
          $edit = view('admin.md_tiposanciones.edit', [
             'typepenalty' => $typepenalty
          ]);
          return view('admin.md_tiposanciones.index', [
             'show' => $show,
             'new' => $new,
             'edit' => $edit,
             'pedidos' => null 
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
        \App\TypePenalty::create([
         'symbol' => $request['symbol'],
         'cause' => $request['cause']
      ]);
      Session::flash('message', 'Tipo de Sancion creado Correctamente');
      return redirect::to('/admin/tiposanciones');
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
        $typepenalties = TypePenalty::all();
      $typepenalty = \App\TypePenalty::find($id);

      $show = view('admin.md_tiposanciones.show', [
         'typepenalties' => $typepenalties
      ]);

      $new = view('admin.md_tiposanciones.new');

      $edit = view('admin.md_tiposanciones.edit', [
         'typepenalty' => $typepenalty
      ]);

      return view('admin.md_tiposanciones.index', [
         'show' => $show,
         'new' => $new,
         'edit' => $edit
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
      $typepenalty_copia = \App\TypePenalty::find($id);

      $typepenalty_copia->fill($request->all());

      $typepenalty_copia->save();
      Session::flash('message', 'El tipo de castigo ha sido editado correctamente');
      $typepenalties = TypePenalty::all();
      $typepenalty = \App\TypePenalty::find($id);
      $show = view('admin.md_tiposanciones.show', [
         'typepenalties' => $typepenalties
      ]);

      $new = view('admin.md_tiposanciones.new');

      $edit = view('admin.md_tiposanciones.edit', [
         'typepenalty' => $typepenalty
      ]);

      return view('admin.md_tiposanciones.index', [
         'show' => $show,
         'new' => $new,
         'edit' => $edit
      ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $typepenalty = TypePenalty::find($id);

      $typepenalty->delete();

      Session::flash('message', 'El tipo de sancion ha sido eliminado correctamente');
      return redirect::to('/admin/tiposanciones');
    }
    public function anadirOrden($id){
      $typepenalty = \App\TypePenalty::find($id);
      $cantidad= count($typepenalty->penaltyOrders);
      \App\PenaltyOrder::create([
           'order' => ($cantidad+1),
           'penaltyTime' => 'ciclo',
           'penaltyType_id' =>($id)

          ]);
      return redirect::to('/admin/tiposanciones');
    }
    public function quitarOrden($id){
      $typepenalty = \App\TypePenalty::find($id);
      $arreglo = $typepenalty->penaltyOrders;
      $cantidad = count($arreglo);
      $arreglo[$cantidad-1]->delete();
      return redirect::to('/admin/tiposanciones');
    }

}
