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

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $profile = User::with(['Employee','Employee.profile'])->where('id',Auth::user()->id)->first()->Employee->Profile;
        // Json TO Array (J2A)
        $j2a = json_decode($profile->JSON,true);
         $ver = $crear = $editar = $eliminar = false;
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
        }
        $show = $new = $edit = $delete = "";
        
        if($crear)$new = view('admin.md_perfiles.new');
        if($ver)$show = view('admin.md_perfiles.show',['new' => $new,'perfiles'=>Profile::all(),'editar' => $editar,'eliminar'=>$eliminar]);
        if($editar)$edit = view('admin.md_perfiles.edit',['perfil'=>Profile::first()]);

        if($eliminar)$delete = view('admin.md_perfiles.delete');
        return view('admin.md_perfiles.index',[
          'show' => $show,
          'edit' => $edit,
          'delete' => $delete
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        Profile::create(['name'=>$request->name,'JSON'=>'{"solicitudes": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"perfiles": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"prestamos": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"empleados": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"castigos": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"items": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"ejemplares": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"lugares": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"categorias": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"estados": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"editoriales": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"usuarios": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"devoluciones": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"castigados": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}]}']);
        return redirect('admin/profiles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfil = Profile::find($id);
        return view('admin.md_perfiles.edit',['perfil'=>$perfil]);
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
        $profiles = json_decode('{"solicitudes": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"perfiles": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"prestamos": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"empleados": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"castigos": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"items": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"ejemplares": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"lugares": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"categorias": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"estados": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"editoriales": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"usuarios": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"devoluciones": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}],"castigados": [{"ver":false},{"crear":false},{"editar":false},{"eliminar":false}]}',true);
        foreach ($profiles as $key => $value) {
          $enviado = $request->$key;
          if(!is_null($enviado)){
            foreach($enviado as $clav => $valo){
              foreach($profiles[$key] as $cla => $val){
                foreach($val as $k => $v)
                if($k == $valo){
                  $profiles[$key][$cla][$k] = true;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Profile::find($id);
        $p->delete();
    }
}
