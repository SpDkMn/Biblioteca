<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use App\User;
use Session;
use Redirect;
use Where;

class Usuarios extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $guardado=$request->tipo_estado." ".$request->busqueda_contenido;
        $variable = User::search($request->tipo_escuela,$request->tipo_academico,$guardado)->orderBy('id','DESC')->paginate(5);
        $users = User::all();
        $user=null;
        $show = view('admin.md_usuarios.show',['users'=>$users]);
        $new = view('admin.md_usuarios.new');
        $edit =view('admin.md_usuarios.edit',['user'=>$user]);
        
        
       //return view('admin.md_usuarios.mostrar_usuario')->with('variable',$variable);
        return view('admin.md_usuarios.index',[ 'show'=>$show, 
            'new'=>$new,'edit'=>$edit,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.md_usuarios.ingreso_usuario");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request['tipo_academico']=="Pregrado"){
            $dato=1;
            $username=$request['code'];
        }else if($request['tipo_academico']=="Postgrado"){
            $dato=2;
            $username=$request['dni'];
        }else if($request['tipo_academico']=="Profesor"){
            $dato=3;
            $username=$request['code'];
        }else if($request['tipo_academico']=="Externo"){
            $dato=4;
            $username=$request['dni'];
        }else if($request['tipo_academico']=="Administrativo"){
            $dato=5;
            $username=$request['dni'];
        }else{
            $dato=6;
            $username=$request['code'];
        }
        $arreglo_1=explode(" ",$request['last_name'],2);
        $cadena_contra="fisi.".strtolower($arreglo_1[0]);
        \App\User::create([
                'name'=>$request['name'],
                'last_name'=>$request['last_name'],
                'code'=>$request['code'],
                'dni'=>$request['dni'],
                'password'=>bcrypt($cadena_contra),
                'home_phone'=>$request['home_phone'],
                'phone'=>$request['phone'],
                'school'=>$request['school'],
                'id_user_type' =>$dato,
                'email' =>$request['email'],
                'address'=>$request['address'],
                'username' =>$username,
                'faculty'=>$request['faculty'],
                'university'=>$request['university'],
                'state'=>true,
            ]);
        Session::flash('message','Usuario creado Correctamente');
        return redirect::to('/admin/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {         
       return view("admin.md_usuarios.perfil_usuario");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $users = User::all();
        $user = \App\User::find($id);

        $show = view('admin.md_usuarios.show',['users'=>$users]);
        
        $new = view('admin.md_usuarios.new');

        $edit =view('admin.md_usuarios.edit',['user'=>$user]);
        

         return view('admin.md_usuarios.index',[
                                                'show'=>$show,
                                                'new'=>$new,
                                                'edit'=>$edit,
                                                ]);
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

        $user_copia = \App\User::find($id);
        
        $user_copia->fill($request->all());
        $arreglo_1=explode(" ",$request['last_name'],2);
        $cadena_contra="fisi.".strtolower($arreglo_1[0]);
        $user_copia->password=bcrypt($cadena_contra);
        if($request->tipo_academico=="Pregrado"){
            $user_copia->id_user_type=1;
            $user_copia->username=$request->code;
        }else if($request->tipo_academico=="Postgrado"){
            $user_copia->id_user_type=2;
            $user_copia->username=$request->dni;
        }else if($request->tipo_academico=="Profesor"){
            $user_copia->id_user_type=3;
            $user_copia->username=$request->code;
        }else if($request->tipo_academico=="Externo"){
            $user_copia->id_user_type=4;
            $user_copia->username=$request->dni;
        }else if($request->tipo_academico=="Administrativo"){
            $user_copia->id_user_type=5;
            $user_copia->username=$request->dni;
        }else{
            $user_copia->id_user_type=6;
            $user_copia->username=$request->code;
        }
        $user_copia->save();
        Session::flash('message','Usuario editado correctamente');
        $users = User::all();
        $user = \App\User::find($id);
        $show = view('admin.md_usuarios.show',['users'=>$users]);
        
        $new = view('admin.md_usuarios.new');

        $edit =view('admin.md_usuarios.edit',['user'=>$user]);
        

         return view('admin.md_usuarios.index',[
                                                'show'=>$show,
                                                'new'=>$new,
                                                'edit'=>$edit,
                                                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        
        $user->delete();
        
        Session::flash('message','Usuario eliminado Correctamente');
        return redirect::to('/admin/usuarios');
    }
}
