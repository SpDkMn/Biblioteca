<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NoticiaCreateRequest;
use App\Http\Controllers\Controller;
use App\Noticia;
use Session;
use Redirect;

class Noticias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ("holasa");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.md_noticias.ingreso_noticia");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoticiaCreateRequest $request)
    {
        if($request['urlImg']==null)
        {
            $valor=null;
        }
        else
        {
            $valor=$request['urlImg'];
        }
        \App\Noticia::create([
                'titulo' =>$request['titulo'],
                'contenido' =>$request['contenido'],
                'palabra_clave' =>$request['palabra_clave'],
                'localizacion' =>$request['localizacion'],
                'urlImg' =>$valor,
                
            ]);
        //\Storage::disk('local')->put($frase_2,\File::get($request['urlImg']));
        //echo("Llego");
        
        Session::flash('message','Noticia creada Correctamente');
        return redirect::to('/admin/noticias/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ("hola");
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
