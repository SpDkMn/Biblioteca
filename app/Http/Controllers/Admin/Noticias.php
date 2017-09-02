<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\NoticiaCreateRequest;
use App\Http\Requests\NoticiaUpdateRequest;
use App\Http\Controllers\Controller;
use App\Noticia;
use App\Notification;
use Session;
use Redirect;
use App\Order as Order;

class Noticias extends Controller
{

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function autentificacion(){

        if(Auth::User() != null){//esta logeado
          if(Auth::User()->employee2() == null)//verficiaca si no  es empleado
            Auth::logout();
        }
      }

   public function index()
   {
      $this->autentificacion();
      return redirect::to('/admin/noticias/show');
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
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(NoticiaCreateRequest $request)
   {
      if ($request['urlImg'] == null) {
         $valor = null;
      } else {
         $valor = $request['urlImg'];
      }
      \App\Noticia::create([
         'titulo' => $request['titulo'],
         'contenido' => $request['contenido'],
         'palabra_clave' => $request['palabra_clave'],
         'localizacion' => $request['localizacion'],
         'urlImg' => $valor

      ]);

      Session::flash('message', 'Noticia creada Correctamente');
      return redirect::to('/admin/noticias/show');
   }

   /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      $variable = \App\Noticia::paginate(8);

      return view('admin.md_noticias.mostrar_noticia', compact('variable'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $user = \App\Noticia::find($id);
      return view('admin.md_noticias.editar_noticia', [
         'noticia' => $user
      ]);
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
      $user = \App\Noticia::find($id);
      $user->fill($request->all());
      $user->save();
      Session::flash('message', 'Noticia editada correctamente');

      return Redirect::to('/admin/noticias/show');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $user = Noticia::find($id);
      $user->delete();
      Session::flash('message', 'Noticia eliminada Correctamente');
      return redirect::to('/admin/noticias/show');
   }
}
