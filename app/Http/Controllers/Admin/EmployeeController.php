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

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /*   $profile = User::with(['Employee','Employee.profile'])->where('id',Auth::user()->id)->first()->Employee->Profile;
        // Json TO Array (J2A)
        $j2a = json_decode($profile->JSON,true);
        // Iniciamos los permisos en false
        $ver = $crear = $editar = $eliminar = true;
        // Recorremos cada uno de los permisos de 'perfiles'
        foreach($j2a['perfiles'] as $dato){
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
        }   */
        
        $show = $new = $edit = $delete = true;
        $ver = $crear = $editar = $eliminar = true;
        
        if($crear)
            $new = view('admin.md_empleados.new',['perfiles'=>Profile::all()]);
        if($ver)
            $show = view('admin.md_empleados.show',['empleados'=>Employee::with([
                'user'])->get(),'editar' => $editar,'eliminar'=>$eliminar]);
        if($editar)
            $edit = view('admin.md_empleados.edit',['empleado'=>Employee::with(['user'])->get()[0],'perfiles'=>Profile::all()]);
        if($eliminar)
            $delete = view('admin.md_empleados.delete');
        return view('admin.md_empleados.index',[
          'show' => $show,
          'new' => $new,
          'edit' => $edit,
          'delete' => $delete
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $u = User::create(['name'=>$request->name,'last_name'=>$request->last_name,'email'=>$request->email,'password'=>bcrypt($request->username)]);
        Employee::create(['user_id'=>$u->id,'profile_id'=>$request->profile]);
        return redirect('admin/employees');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $e = Employee::with(['user','profile'])->where('id',$id)->first();
        
        return view('admin.md_empleados.edit',['empleado'=>$e,'perfiles'=>Profile::all()]);
    }

    public function update(Request $request, $id)
    {
        $e = Employee::find($id);
        $e->user->name = $request->name;
        $e->user->last_name = $request->last_name;
        $e->user->email = $request->email;
        $e->profile_id = $request->profile;
        $e->user->save();
        $e->save();
        return redirect('admin/employees');
    }

    public function destroy($id)
    {
        $e = Employee::with('user')->where('id',$id)->first();
        $e->user->delete();
        $e->delete();
    }
    
}
