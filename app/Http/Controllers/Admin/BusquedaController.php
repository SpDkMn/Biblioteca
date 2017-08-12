<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
  public function index(Request $request)
  {
    $search = view('admin.md_busqueda.search');
    return view('admin.md_busqueda.index',['search'=>$search]);
  }


  public function create()
  {
         //
  }

  public function store(Request $request,$id)
  {
        dd('PROBANDO...');
  }

  public function edit($id)
  {
        //
  }

  public function show(Request $request){

    dd($request->all());

  }

  public function update(Request $request, $id)
  {

  }

  public function destroy($id)
  {
     //
  }

}
