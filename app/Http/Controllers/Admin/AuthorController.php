<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User as User;
// Para usar el Modelo Profile
use App\Profile as Profile;
use App\Author as Author;
use Session; 
use Redirect;
class AuthorController extends Controller
{  
	public function index(Request $request){

      $profile = User::with(['Employee','Employee.profile'])->where('id',Auth::user()->id)->first()->Employee->Profile;
      $j2a = json_decode($profile->JSON,true);
      // Iniciamos los permisos en false

      $ver = $crear = $editar = $eliminar =false;    
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
      //Verifica si se envio "category" por metodo get , FILTROS de busqueda 
      if($request->get('category')==null){
        $categories=null;
      }
      else{
   
        $i=0;
        foreach ($request->get('category') as $category) {
            switch ($category) {
              case 'Libro':
                $categories[$i]=1;
                break;
              case 'Revista':
                $categories[$i]=2;
                break;
              case 'Tesis/Tesina':
                $categories[$i]=3;
                break;
              case 'Compendio':
                $categories[$i]=4;
                break;
              case 'Colaborador':
                $categories[$i]=5;
                break;
              case 'Asesor':
                $categories[$i]=6;
                break;
             
            }
            $i=$i+1;
        }
      }
    }
      
    if($editar){
      //$author recibira el primer autor, tambien pudo usarse el metodo first 
      $edit = view('admin.md_autores.edit',['author'=>Author::get()[0]]);
    }
          
    if($crear){
      $new = view('admin.md_autores.new');
    }

    if ($ver){
      if(($request->get('name'))!=null){
        //$authors cargara todos los autores con con nombre "name"
        $authors=Author::name($request->get('name'))->paginate();
        //envia los permisos de editar y eliminar
        //ademas enviara un boleano "search" el cual servira para saber si se realizo una busqueda en la vista
        $show = view('admin.md_autores.show',['authors'=>$authors,'eliminar'=>$eliminar,'editar'=>$editar,'categories'=>$categories,'search'=>true]);
      } else{
        //$authors cargara todos los autores
        $authors=Author::all();
        //envia los permisos de editar y eliminar
        //ademas enviara un boleano "search" el cual servira para saber si se realizo una busqueda en la vista
        $show = view('admin.md_autores.show',['authors'=>$authors,'eliminar'=>$eliminar,'editar'=>$editar,'categories'=>$categories,'search'=>false]);
      }
    }

    if($eliminar){
      $delete = view('admin.md_autores.delete',['author'=>Author::get()[0]]);
    }

    return view('admin.md_autores.index',[
      'show' => $show,
      'new' => $new,
      'edit' => $edit,
      'delete' => $delete
    ]);
  }


   public function create(){
    	
   }

   public function store(AuthorRequest $request){
        
        $edit =Author::create([
    		'name' => $request['name'],
    	]);

        foreach ($request['category'] as $category) {
            
            switch ($category) {
                case 'libro':
                    $id=1;
                    break;
                case 'revista':
                    $id=2;
                    break;
                case 'tesis/tesina':
                    $id=3;
                    break;
                case 'compendio':
                    $id=4;
                    break;
                case 'colaborador':
                    $id=5;
                    break;
                case 'asesor':
                    $id=6;
                    break;
            }   

            $edit->categories()->attach($id);
        }

    	return redirect('admin/autor');
  }

   public function edit($id){
  
      $author = Author::find($id);
      return view('admin.md_autores.edit')->with('author',$author);

    }
    
    

   public function update($id,AuthorRequest $request){
       
       $author = Author::find($id);
    $author->fill($request->all());
    $author->save();
       $author->categories()->detach();

       foreach ($request['category'] as $category) {
            
            switch ($category) {
                case 'libro':
                    $id=1;
                    break;
                case 'revista':
                    $id=2;
                    break;
                case 'tesis/tesina':
                    $id=3;
                    break;
                case 'compendio':
                    $id=4;
                    break;
                case 'colaborador':
                    $id=5;
                    break;
              case 'asesor':
                   $id=6;
                   break;
            }   

            $author->categories()->attach($id);
        }

       return redirect()->route('autor.index');
       
    }

   public function destroy($id){
        $author=Author::find($id);
        $author->delete();
        return redirect('autor.index');
       
    }

    return redirect()->route('autor.index');
  }

  public function destroy($id){
    $author=Author::find($id);
    $author->delete();
    return redirect('autor.index');
  }

  public function show($id){
    $author = Author::find($id);
    $author->categories()->detach();
    $author->delete();
    return redirect()->route('autor.index');
  }
  
}
