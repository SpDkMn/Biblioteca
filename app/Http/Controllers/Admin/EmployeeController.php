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
// Para usar el Modelo Employee
use App\Employee as Employee;

use App\UserType as UserType;
use App\Order as Order;

use Illuminate\Support\Facades\Crypt;

class EmployeeController extends Controller
{

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function autentificacion(){

        if(Auth::User() != null){//esta logeado
          if(Auth::User()->employee2() == null){//verficiaca si no  es empleado
             Auth::logout();
          }
        }
      }
   public function index()
   {
     $this->autentificacion();
      $show = $new = $edit = $delete = true;
      $ver = $crear = $editar = $eliminar = true;

      $usuarios = User::all();
      $perfiles = Profile::all();
      $employees = Employee::all();

      if ($crear) {
         $new = view('admin.md_empleados.new', [
            'perfiles' => $perfiles,
            'usuarios' => $usuarios
         ]);
      }
      if ($ver) {
         $show = view('admin.md_empleados.show', [
            'empleados' => Employee::with([
               'user'
            ])->get(),
            'editar' => $editar,
            'eliminar' => $eliminar
         ]);
      }
      if ($editar) {

         $edit = view('admin.md_empleados.edit', [
            'empleado' => User::first()->employee[0],
            'usuario' => User::first(),
            'perfiles' => $perfiles,
            'usuarios' => $usuarios
         ]);
      }
      if ($eliminar) {
         $delete = view('admin.md_empleados.delete');
      }
      $pedidos = null ; $i = 0 ;
      foreach (Order::all() as $pedido) {
        if ($pedido->state == 0) {
          $pedidos[$i] = $pedido ;
        }
        $i++;
      }

      return view('admin.md_empleados.index', [
         'show' => $show,
         'new' => $new,
         'edit' => $edit,
         'delete' => $delete,
         'pedidos' => $pedidos
      ]);
   }

   public function create()
   {
      //
   }

   public function store(Request $request)
   {

      Employee::create([
         'code'=> $request->code,
         'password' =>  Crypt::encrypt($request->password),
         'user_id' => $request->user,
         'profile_id' => $request->profile
      ]);

      return redirect('admin/employees');
   }

   public function show($id)
   {
      //
   }

   public function edit($id)
   {

      $usuarios = User::all();
      $empleado = Employee::find($id);

      return view('admin.md_empleados.edit', [
         'empleado' => $empleado,
         'usuarios' => User::all(),
         'usuario' => $empleado->user,
         'perfiles' => Profile::all()
      ]);
   }

   public function update(Request $request, $id)
   {
      $e = Employee::find($id);
      $e->code = $request->code2;
      $e->password = Crypt::encrypt($request->password2);
      $e->user_id = $request->user;
      $e->profile_id = $request->profile;
      $e->save();
      return redirect('admin/employees');
   }

   public function destroy($id)
   {
      $e = Employee::with('user')->where('id', $id)->first();
      $e->user->delete();
      $e->delete();
   }
}
