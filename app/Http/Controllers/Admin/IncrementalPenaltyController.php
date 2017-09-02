<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IncrementalPenalty;
use Session;
use Redirect;
use Illuminate\Support\Facades\Auth;

class IncrementalPenaltyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function autentificacion(){

         if(Auth::User() != null){//esta logeado
           if(Auth::User()->employee2() == null){//verficiaca si no  es empleado
              Auth::logout();
           }
         }
       }
    public function index()
    {
        $this->autentificacion();
        $incrementalpenalties = IncrementalPenalty::all();
        $incrementalpenalty = null;
        $show = view('admin.md_incrementalsanciones.show', [
            'incrementalpenalties' => $incrementalpenalties
        ]);
        $new = view('admin.md_incrementalsanciones.new');
        $edit = view('admin.md_incrementalsanciones.edit', [
            'incrementalpenalty' => $incrementalpenalty
        ]);
        return view('admin.md_incrementalsanciones.index', [
            'show' => $show,
            'new' => $new,
            'edit' => $edit
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
        \App\IncrementalPenalty::create([
         'order' => $request['order'],
         'additional_time' => $request['additional_time']
      ]);
      Session::flash('message', 'Sancion incremental creada correctamente');
      return redirect::to('/admin/incrementalsanciones');
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
        $incrementalpenalties = IncrementalPenalty::all();
        $incrementalpenalty = \App\IncrementalPenalty::find($id);

        $show = view('admin.md_incrementalsanciones.show', [
            'incrementalpenalties' => $incrementalpenalties
        ]);

        $new = view('admin.md_incrementalsanciones.new');

        $edit = view('admin.md_incrementalsanciones.edit', [
            'incrementalpenalty' => $incrementalpenalty
        ]);

        return view('admin.md_incrementalsanciones.index', [
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
        $incrementalpenalty_copia = \App\IncrementalPenalty::find($id);

        $incrementalpenalty_copia->fill($request->all());

        $incrementalpenalty_copia->save();
        Session::flash('message', 'El castigo incremental ha sido editado correctamente');
        $incrementalpenalties = IncrementalPenalty::all();
        $incrementalpenalty = \App\IncrementalPenalty::find($id);
        $show = view('admin.md_incrementalsanciones.show', [
           'incrementalpenalties' => $incrementalpenalties
        ]);

        $new = view('admin.md_incrementalsanciones.new');

        $edit = view('admin.md_incrementalsanciones.edit', [
           'incrementalpenalty' => $incrementalpenalty
        ]);

        return view('admin.md_incrementalsanciones.index', [
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
      $incrementalpenalty = IncrementalPenalty::find($id);

      $incrementalpenalty->delete();

      Session::flash('message', 'La sancion incremental ha sido eliminada correctamente');
      return redirect::to('/admin/incrementalsanciones');
    }
}
