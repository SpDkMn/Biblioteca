<?php

namespace App\Http\Controllers\Admin;;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Author as Author;
use App\Magazine as Magazine;
use App\MagazineCopy as MagazineCopy;
use App\Editorial as Editorial;
use App\Content as Content;
use App\SearchItem as SearchItem;
use App\BookCopy as BookCopy;
class LoanController extends Controller
{

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index(Request $request)
     {
       $copia = BookCopy::find($request['id']);
       $date = Carbon::now('America/Lima');
      //         $date->toDateString();                          // 1975-12-25
      //         $date->toFormattedDateString();                 // Dec 25, 1975
      //         $date->toTimeString();                          // 14:15:16
      //         $date->toDateTimeString();                      // 1975-12-25 14:15:16
       dd($request->all(),'estoy en pedido',$copia,$date->toDateTimeString());

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
