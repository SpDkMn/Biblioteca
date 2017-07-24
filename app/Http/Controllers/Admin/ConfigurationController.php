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

use App\Holiday as Holiday;

use DateTime;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $verActivar = $editarActivar = true;
        $verFeriado = $crearFeriado = $editarFeriado = $eliminarFeriado = true;
        $verReserva = $crearReserva = $editarReserva = $eliminarReserva = true;
        $verPrestamo = $crearPrestamo = $editarPrestamo = $eliminarPrestamo = true;
        // Recorremos cada uno de los permisos de 'Activar'
    /*    foreach($j2a['Activar Prestamos'] as $dato){
          foreach($dato as $key => $value){
            if($value == true){
              switch($key){
                case 'ver': $verActivar = true;break;
                case 'editar': $editarActivar = true; break;
              }
            }
          }
        }  */
        $showActivar = $editActivar ="";
        if(true)$showTipoUsuario= view('admin.md_configuration.showTipoUsuario',["editar"=>$editarActivar]);
        // Recorremos cada uno de los permisos de 'Activar'
       
        
    /*    //Feriados
        foreach($j2a['Feriados'] as $dato){
          foreach($dato as $key => $value){
            if($value == true){
              switch($key){
                case 'ver': $verFeriado = true;break;
                case 'crear': $crearFeriado = true;break;
                case 'editar': $editarFeriado = true; break;
                case 'eliminar': $eliminarFeriado = true; break;
              }
            }
          }
        }      */
        $showFeriado = $newFeriado = $editFeriado = $deleteFeriado = "";
        if(true) $showFeriado = view('admin.md_configuration.showFeriado',["editar"=>$editarActivar , "crear"=>$newFeriado , "eliminar"=>$eliminarFeriado]);
     /*   if($crearFeriado)$newFeriado = view('admin.md_configuration.newFeriado');
        if($editarFeriado)$editFeriado = view('');
        if($eliminarFeriado)$deleteFeriado = view('');  */
        // Recorremos cada uno de los permisos de 'Activar'
    /*    foreach($j2a['Tiempo de Reserva'] as $dato){
          foreach($dato as $key => $value){
            if($value == true){
              switch($key){
                case 'ver': $verReserva = true;break;
                case 'crear': $crearReserva = true;break;
                case 'editar': $editarReserva = true; break;
                case 'eliminar': $eliminarReserva = true; break;
              }
            }
          }
        }  */
         $showReserva = $newReserva = $editReserva = $deleteReserva = "";
        if(true)$showReserva = view('admin.md_configuration.showReserva',["editar"=>$editarReserva , "crear"=>$crearReserva , "eliminar"=>$eliminarReserva]);
    /*    if($crearReserva)$newReserva = view('');
        if($editarReserva)$editReserva = view('',["editar"=>$editarReserva]);
        if($eliminarReserva)$deleteReserva = view('');   */
        // Recorremos cada uno de los permisos de 'Activar'
     /*   foreach($j2a['Tiempo de Prestamo'] as $dato){
          foreach($dato as $key => $value){
            if($value == true){
              switch($key){
                case 'ver': $verPrestamo = true;break;
                case 'crear': $crearPrestamo = true;break;
                case 'editar': $editarPrestamo = true; break;
                case 'eliminar': $eliminarPrestamo = true; break;
              }
            }
          }
        }    */
         $showPrestamo = $newPrestamo = $editPrestamo = $deletePrestamo = "";
        if(true)$showPrestamo = view('admin.md_configuration.showPrestamo',["editar"=>$editarPrestamo , "crear"=>$crearPrestamo , "eliminar"=>$eliminarPrestamo]);
      /*  if($crearReserva)$newPrestamo = view('');
        if($editarReserva)$editPrestamo = view('',["editar"=>$editarPrestamo]);
        if($eliminarReserva)$deletePrestamo = view("");*/
        return view( 'admin.md_configuration.index',[
            'showTipoUsuario'=>$showTipoUsuario,
            'showFeriado'=>$showFeriado,
            'showReserva'=>$showReserva,
            'showPrestamo'=>$showPrestamo
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

        Holiday::create([
                'item'=>$request->item,
                'start'=>$request->inicioFeriado,
                'end'=>$request->finFeriado,
                'id_configuration'=>1,
            ]);

        return redirect('admin/configurations');
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
        //
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
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}