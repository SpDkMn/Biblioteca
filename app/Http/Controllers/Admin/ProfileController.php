<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Para usar el objeto Auth
use Illuminate\Support\Facades\Auth;
// Para usar el Modelo User
use App\User as User;
// Para usar el Modelo Profile
use App\Profile as Profile;
use App\Order as Order;


class ProfileController extends Controller
{

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      $show = $new = $edit = $delete = true;
      $ver = $crear = $editar = $eliminar = true;

      if ($crear) {
         $new = view('admin.md_perfiles.new');
      }
      if ($ver) {
         $show = view('admin.md_perfiles.show', [
            'new' => $new,
            'perfiles' => Profile::all(),
            'editar' => $editar,
            'eliminar' => $eliminar
         ]);
      }
      if ($editar) {
         $edit = view('admin.md_perfiles.edit', [
            'perfil' => Profile::first()
         ]);
      }
      if ($eliminar) {
         $delete = view('admin.md_perfiles.delete');
      }
      $i = 0 ; $pedidos = null ;
      foreach (Order::all() as $pedido) {
        if ($pedido->state == 0) {
          $pedidos[$i] = $pedido ;
        }
        $i = $i +1 ;
      }

      return view('admin.md_perfiles.index', [
         'show' => $show,
         'edit' => $edit,
         'delete' => $delete,
         'pedidos' => $pedidos
      ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      Profile::create([
         'name' => $request->name,
         'JSON' => '{"libros": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"tesis": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"revistas": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"compendios": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"noticias": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"castigos": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"perfiles": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"usuarios": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"empleados": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"prestamos": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"devoluciones": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"solicitudes": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"autores": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"editoriales": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"noticias": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"configuraciones": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}]}'


      ]);
      return redirect('admin/profiles');
   }

   /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $perfil = Profile::find($id);
      return view('admin.md_perfiles.edit', [
         'perfil' => $perfil
      ]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $profiles = json_decode('{"libros": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"tesis": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"revistas": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"compendios": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"noticias": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"castigos": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"perfiles": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"usuarios": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"empleados": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"prestamos": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"devoluciones": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"solicitudes": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"autores": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"editoriales": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"noticias": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"configuraciones": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}]}', true);
      foreach ($profiles as $key => $value) {
         $enviado = $request->$key;
         if (! is_null($enviado)) {
            foreach ($enviado as $valo) {
               foreach ($profiles[$key] as $cla => $val) {
                  foreach ($val as $k => $v) {
                     if ($k == $valo) {
                        $profiles[$key][$cla][$k] = true;
                     }
                  }
               }
            }
         }
      }
      $profile = Profile::find($id);
      $profile->JSON = json_encode($profiles);
      $profile->save();
      return redirect('admin/profiles');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $p = Profile::find($id);
      $p->delete();
   }
}
