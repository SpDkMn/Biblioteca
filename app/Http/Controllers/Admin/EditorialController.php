<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditorialRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


use App\User as User;
// Para usar el Modelo Profile
use App\Profile as Profile;

use App\Editorial as Editorial;

use Session;
use Redirect;


class EditorialController extends Controller
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
      //Rellena la variable $categories con el tipo de categoria que desean filtrar
      //Ejm: Desea filtrar por Revista y Tesis
      //El id de Revista en la tabla categories es 2 , y Tesis es 3
      //Entonces $categories[0]=2 ; $categories[1]=3;
        $i=0;
        foreach ($request->get('category') as $category) {
            switch ($category) {
              case 'libro':
                $categories[$i]=1;
                break;
              case 'revista':
                $categories[$i]=2;
                break;
              case 'tesis':
                $categories[$i]=3;
                break;
              case 'compendio':
                $categories[$i]=4;
                break;
            }
            $i=$i+1;
        }
      }

      if($editar)
        //$editorial recibira la primera editorial, tambien pudo usarse el metodo first
        $edit = view('admin.md_editoriales.edit',['editorial'=>Editorial::get()[0]]);

      if($crear)
          $new = view('admin.md_editoriales.new');

      if ($ver)
         if(($request->get('name'))!=null){
            //$editorials cargara todas las editoriales con con nombre "name"
            $editorials=Editorial::name($request->get('name'))->paginate();
            //envia los permisos de editar y eliminar
            //ademas enviara un boleano "search" el cual servira para saber si se realizo una busqueda en la vista
            $show = view('admin.md_editoriales.show',['editorials'=>$editorials,'eliminar'=>$eliminar,'editar'=>$editar,'categories'=>$categories,'search'=>true]);
            }

          else{
            //$editorials cargara todas las editoriales
            $editorials=Editorial::all();
            //envia los permisos de editar y eliminar
            //ademas enviara un boleano "search" el cual servira para saber si se realizo una busqueda en la vista
            $show = view('admin.md_editoriales.show',['editorials'=>$editorials,'eliminar'=>$eliminar,'editar'=>$editar,'categories'=>$categories,'search'=>false]);
          }


      if($eliminar)
        $delete = view('admin.md_editoriales.delete',['editorial'=>Editorial::get()[0]]);

      return view('admin.md_editoriales.index',[
        'show' => $show,
         'new' => $new,
        'edit' => $edit,
        'delete' => $delete
      ]);

  }


   public function create(){

   }

   public function store(EditorialRequest $request){

        $edit =Editorial::create([
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
                case 'tesis':
                    $id=3;
                    break;
                case 'compendio':
                    $id=4;
                    break;
            }

            $edit->categories()->attach($id);
        }

    	return redirect('admin/editorial');
  }

  public function edit($id){
      $editorial = Editorial::find($id);
      return view('admin.md_editoriales.edit')->with('editorial',$editorial);

    }



    public function update($id,EditorialRequest $request){

       $editorial = Editorial::find($id);

       $editorial->fill($request->all());
       $editorial->save();

       $editorial->categories()->detach();

       foreach ($request['category'] as $category) {

            switch ($category) {
                case 'libro':
                    $id=1;
                    break;
                case 'revista':
                    $id=2;
                    break;
                case 'tesis':
                    $id=3;
                    break;
                case 'compendio':
                    $id=4;
                    break;
            }

            $editorial->categories()->attach($id);
        }

       return redirect()->route('editorial.index');

    }

    public function destroy($id){
        $editorial=Editorial::find($id);
        $editorial->delete();
        return redirect('editorial.index');

    }



     public function show($id){

        $editorial = Editorial::find($id);
        $editorial->categories()->detach();
        $editorial->delete();

        return redirect()->route('editorial.index');
          }


}
