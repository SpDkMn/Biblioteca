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

   public function index(Request $request)
   {

      $show = $new = $edit = $delete = true;
      $ver = $crear = $editar = $eliminar = true;

      if ($editar) {
        //Con esto ya no saldra offset: 0 , solo mostraremos el primero a editar si existe
        if (Editorial::all()->isNotEmpty()) {
          // $editorial recibira la primera editorial, tambien pudo usarse el metodo first
          $edit = view('admin.md_editoriales.edit', [
             'editorial' => Editorial::get()[0]
          ]);
        }
      }
      if ($crear) {
         $new = view('admin.md_editoriales.new');
      }
      if ($ver) {
        
            // $editorials cargara todas las editoriales
            $editorials = Editorial::all();
            // envia los permisos de editar y eliminar
            // ademas enviara un boleano "search" el cual servira para saber si se realizo una busqueda en la vista
            $show = view('admin.md_editoriales.show', [
               'editorials' => $editorials,
               'eliminar' => $eliminar,
               'editar' => $editar,
            ]);
         
      }

      if ($eliminar) {
        if (Editorial::all()->isNotEmpty()) {
         $delete = view('admin.md_editoriales.delete', [
            'editorial' => Editorial::get()[0]
         ]);
       }
      }
      return view('admin.md_editoriales.index', [
         'show' => $show,
         'new' => $new,
         'edit' => $edit,
         'delete' => $delete
      ]);
   }

   public function create()
   {}


   public function store(EditorialRequest $request)
   {
      $edit = Editorial::create([
         'name' => $request['name']
      ]);
      foreach ($request['category'] as $category) {
         $id = $this->switchCategory($category);
         $edit->categories()->attach($id);
      }
      return redirect('admin/editorial');
   }

   public function edit($id)
   {
      $editorial = Editorial::find($id);
      return view('admin.md_editoriales.edit')->with('editorial', $editorial);
   }

   public function update($id, EditorialRequest $request)
   {
      $editorial = Editorial::find($id);
      $editorial->fill($request->all());
      $editorial->save();
      $editorial->categories()->detach();

      foreach ($request['category'] as $category) {
         $id = $this->switchCategory($category);
         $editorial->categories()->attach($id);
      }
      return redirect()->route('editorial.index');
   }

   public function destroy($id)
   {
      $editorial = Editorial::find($id);
      $editorial->delete();
      return redirect('editorial.index');
   }

   public function show($id)
   {
   
   }

     public function switchCategory($category){
      switch ($category) {
         case 'libro':
            $id = 1;
            break;
         case 'revista':
            $id = 2;
            break;
         case 'tesis/tesina':
            $id = 3;
            break;
         case 'compendio':
            $id = 4;
            break;
         default:
            $id = null;
      }
      return $id;
   }

}
