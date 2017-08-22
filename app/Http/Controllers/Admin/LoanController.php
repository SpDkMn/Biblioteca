<?php

namespace App\Http\Controllers\Admin;;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Author as Author;
use App\Magazine as Magazine;
use App\MagazineCopy as MagazineCopy;
use App\Editorial as Editorial;
use App\Content as Content;
use App\SearchItem as SearchItem;
class LoanController extends Controller
{

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
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
      * @param \Illuminate\Http\Request $request
      * @return \Illuminate\Http\Response
      */
     public function store(NoticiaCreateRequest $request)
     {
       dd('estoy en pedidos');
     }

     /**
      * Display the specified resource.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
     }

     /**
      * Update the specified resource in storage.
      *
      * @param \Illuminate\Http\Request $request
      * @param int $id
      * @return \Illuminate\Http\Response
      */
     public function update(NoticiaUpdateRequest $request, $id)
     {
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
     }
}
