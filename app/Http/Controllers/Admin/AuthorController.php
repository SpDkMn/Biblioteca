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

   public function index(Request $request)
   {
      
      $show = $new = $edit = $delete = true;
      $ver = $crear = $editar = $eliminar = true;
      
      // Verifica si se envio "category" por metodo get , FILTROS de busqueda
      if ($request->get('category') == null) {
         $categories = null;
      } else {
         $i = 0;
         foreach ($request->get('category') as $category) {
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
               case 'colaborador':
                  $id = 5;
                  break;
               case 'asesor':
                  $id = 6;
                  break;
            }
            $i = $i + 1;
         }
      }
      
      if ($editar){
         // $author recibira el primer autor, tambien pudo usarse el metodo first
         $edit = view('admin.md_autores.edit', [
            'author' => Author::get()[0]
         ]);
      }
      if ($crear){
         $new = view('admin.md_autores.new');
      }
      if ($ver){
         if (($request->get('name')) != null) {
            // $authors cargara todos los autores con con nombre "name"
            $authors = Author::name($request->get('name'))->paginate();
            // envia los permisos de editar y eliminar
            // ademas enviara un boleano "search" el cual servira para saber si se realizo una busqueda en la vista
            $show = view('admin.md_autores.show', [
               'authors' => $authors,
               'eliminar' => $eliminar,
               'editar' => $editar,
               'categories' => $categories,
               'search' => true
            ]);
         } 
         else {
            // $authors cargara todos los autores
            $authors = Author::all();
            // envia los permisos de editar y eliminar
            // ademas enviara un boleano "search" el cual servira para saber si se realizo una busqueda en la vista
            $show = view('admin.md_autores.show', [
               'authors' => $authors,
               'eliminar' => $eliminar,
               'editar' => $editar,
               'categories' => $categories,
               'search' => false
            ]);
         }
      }
      if ($eliminar){
         $delete = view('admin.md_autores.delete', [
            'author' => Author::get()[0]
         ]);
      }
      return view('admin.md_autores.index', [
         'show' => $show,
         'new' => $new,
         'edit' => $edit,
         'delete' => $delete
      ]);
   }

   public function create()
   {}

   public function store(AuthorRequest $request)
   {
      $edit = Author::create([
         'name' => $request['name']
      ]);
      
      foreach ($request['category'] as $category) {
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
            case 'colaborador':
               $id = 5;
               break;
            case 'asesor':
               $id = 6;
               break;
         }
         
         $edit->categories()->attach($id);
      }
      
      return redirect('admin/autor');
   }

   public function edit($id)
   {
      $author = Author::find($id);
      return view('admin.md_autores.edit')->with('author', $author);
   }

   public function update($id, AuthorRequest $request)
   {
      $author = Author::find($id);
      $author->fill($request->all());
      $author->save();
      
      $author->categories()->detach(); // No tiene nada que ver con el error
      
      foreach ($request['category'] as $category) {
         
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
            case 'colaborador':
               $id = 5;
               break;
            case 'asesor':
               $id = 6;
               break;
         }
         $author->categories()->attach($id);
      }
      
      return redirect()->route('autor.index');
   }

   public function destroy($id)
   {
      $author = Author::find($id);
      $author->delete();
      return redirect('autor.index');
   }

   public function show($id)
   {
      $author = Author::find($id);
      $author->categories()->detach();
      $author->delete();
      
      return redirect()->route('autor.index');
   }
}