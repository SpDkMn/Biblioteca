<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User as User;
use App\Profile as Profile;
use App\Author as Author;

use Session;
use Redirect;


class AuthorController extends Controller
{
	public function index(Request $request){
/**
        $profile = User::with(['Employee','Employee.profile'])->where('id',Auth::user()->id)->first()->Employee->Profile;
        $j2a = json_decode($profile->JSON,true);
        // Iniciamos los permisos en false
**/
        $ver = $crear = $editar = $eliminar = true;
    /**
        // Recorremos cada uno de los permisos de 'perfiles'
        foreach($j2a['empleados'] as $dato){
          foreach($dato as $key => $value){
            if($value == true){
              switch($key){
                case 'ver': $ver = true;break;
                case 'crear': $crear = true;break;
                case 'editar': $editar = true; break;
                case 'eliminar': $eliminar = true; break;
              }
            }
          }
        }
        $show = $new = $edit = $delete = "";
       **/
       /**
    **/
       if($request->get('category')==null) {
        $categories=null;
       }
       else{
        $i=0;
        foreach ($request->get('category') as $category) {
          switch ($category) {
            case 'Libro':
              $categories[$i]=1; break;
            case 'Revista':
              $categories[$i]=2; break;
            case 'Tesis':
              $categories[$i]=3; break;
            case 'Compendio':
              $categories[$i]=4; break;
          }
          $i=$i+1;
        }
       }

        if($editar)
            $edit = view('admin.md_autores.edit',['author'=>Author::get()[0]]);

        if($crear)
            $new = view('admin.md_autores.new');

        if ($ver)
        {
            if(($request->get('name'))!=null){
                $authors=Author::name($request->get('name'))->orderBy('name','ASC')->paginate(10);
                $show = view('admin.md_autores.show',['authors'=>$authors,'eliminar'=>$eliminar,'editar'=>$editar,'categories'=>$categories]);
            }
            else{
                $authors=Author::orderBy('name','ASC')->paginate(10);
                $show = view('admin.md_autores.show',['authors'=>$authors,'eliminar'=>$eliminar,'editar'=>$editar,'categories'=>$categories]);
            }
         }
        if($eliminar)
            $delete = view('admin.md_autores.delete',['author'=>Author::get()[0]]);

        return view('admin.md_autores.index',[
          'show' => $show,
           'new' => $new,
          'edit' => $edit,
          'delete' => $delete
        ]);
    }

    public function create(){
    	return view('autor.create');
    }

    public function store(AuthorRequest $request){
        $edit =Author::create([
    		'name' => $request['name'],
      	]);
        foreach ($request['category'] as $category) {

            switch ($category) {
                case 'Libro':
                    $id=1;
                    break;
                case 'Revista':
                    $id=2;
                    break;
                case 'Tesis':
                    $id=3;
                    break;
                case 'Compendio':
                    $id=4;
                    break;
            }
            $edit->categories()->attach($id);
        }

    	return redirect('admin/autor');
    }

    public function edit($id,Request $request){
        $author = Author::find($id);
        $edit= view('admin.md_autores.edit')->with('author',$author);
        $editar=$eliminar=true;

        if($request->get('category')==null){
          $categories=null;
        }
        else{
          $i=0;
          foreach ($request->get('category') as $category) {
            switch($category){
              case 'Libro':
                $categories[$i]=1; break;
              case 'Revista':
                $categories[$i]=2; break;
              case 'Tesis':
                $categories[$i]=3; break;
              case 'Compendio':
                $categories[$i]=4; break;
            }
            $i=$i+1;
          }
        }

        $new = view('admin.md_autores.new');
        $authors=Author::orderBy('name','ASC')->paginate(10);
        $show = view('admin.md_autores.show',['authors'=>$authors,'eliminar'=>$eliminar,'editar'=>$editar,'categories'=>$categories]);
        $delete = view('admin.md_autores.delete',['author'=>Author::get()[0]]);

         return view('admin.md_autores.index',[
          'show' => $show,
           'new' => $new,
          'edit' => $edit,
          'delete' => $delete
        ]);
     }


    public function update($id,AuthorRequest $request){
       $author = Author::find($id);
       $author->fill($request->all());
       $author->save();           //GUARDA LOS DATOS EDITADOS
       $author->categories()->detach(); //ELIMINA LA CATEGORIA A LA QUE PERTENECE EL AUTOR

       foreach ($request['category'] as $category) {
            switch ($category) {
                case 'Libro':
                    $id=1;
                    break;
                case 'Revista':
                    $id=2;
                    break;
                case 'Tesis':
                    $id=3;
                    break;
                case 'Compendio':
                    $id=4;
                    break;
            }
            $author->categories()->attach($id); // GUARDA LAS NUEVAS CATEGORIAS A LAS QUE PERTENECE DICHO AUTOR
        }
       return redirect()->route('autor.index');
    }

    public function destroy($id){
        //
    }
     public function show($id){
      $author = Author::find($id);
      $author->categories()->detach();
      $author->delete();

      return redirect()->route('autor.index');
    }


}
