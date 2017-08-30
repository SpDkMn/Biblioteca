<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TypePenalty;
use App\PenaltyOrder;
use App\Employee;
use App\Penalty;
use Redirect;

class PenaltyOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //dd($user);
        /*\App\Penalty::create([
          'userId' => 2,
          'employeeId' => 1,
          'penaltyOrderId'=>1,
          'categoryId'=>1,
          'objectId'=>1,
          'startPenalty'=>null,
          'endPenalty'=>null,
          'activity'=>"a",
          'event'=>"a"
      ]);*/
        //$castigo = \App\Penalty::with(['user'])->find(1);
        //dd($castigo);
        $user = \App\PenaltyOrder::with(['penalties'])->find(1);
        dd($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        dd("entro");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd("entro :3");
    }
    public function prueba(Request $request)
    {
        dd("entro :3");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.md_sanciones.index')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('entro');    
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
        //dd($request['duracion1']);
        
        $tiposancion = TypePenalty::with(['penaltyOrders'])->find($id);
        $arregloOrden=$tiposancion->penaltyOrders;
        $cantidad=count($arregloOrden);
        for($i=0;$i<$cantidad;$i++){
            $ordenCambiable= PenaltyOrder::find($arregloOrden[$i]->id);
            $ordenCambiable->penaltyTime=$request['duracion'.($i+1)];
            $ordenCambiable->save();
        }
        return redirect::to('/admin/tiposanciones');
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
