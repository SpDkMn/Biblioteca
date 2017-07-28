<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Para usar el objeto Auth
use Illuminate\Support\Facades\Auth;
// Para usar el Modelo User
use App\Configuration as Configuration;
use App\User as User;
// Para usar el Modelo Profile
use App\Profile as Profile;
// Para usar el Modelo Employee
use App\Employee as Employee;
use App\Holiday as Holiday;
use App\UserType as UserType;
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
         
        $userTypes = UserType::all();
        $verActivar = $editarActivar = true;
        $verFeriado = $crearFeriado = $editarFeriado = $eliminarFeriado = true;
        $verReserva = $crearReserva = $editarReserva = $eliminarReserva = true;
        $verPrestamo = $crearPrestamo = $editarPrestamo = $eliminarPrestamo = true;
        $verDiasLaborables = $editarDiasLaborables= true;
   
        
   $showDiasLaborables = $editDiasLaborables= true;
   if(true)$showDiasLaborables= view('admin.md_configuration.showDiasLaborables');



// Recorremos cada uno de los permisos de 'Activar'
      $showActivar = $editActivar = "";
      if (true){
         $showTipoUsuario = view('admin.md_configuration.showTipoUsuario', [
            "editar" => $editarActivar,
            "userTypes" => $userTypes
         ]);
      }



        // Recorremos cada uno de los permisos de 'Activar'
      $showFeriado = $newFeriado = $editFeriado = $deleteFeriado = "";
      if (true){
         $showFeriado = view('admin.md_configuration.showFeriado', [
            "editar" => $editarActivar,
            "crear" => $newFeriado,
            "eliminar" => $eliminarFeriado
         ]);
      }



     // Recorremos cada uno de los permisos de 'Activar'
      $showReserva = $newReserva = $editReserva = $deleteReserva = "";
      if (true){
         $showReserva = view('admin.md_configuration.showReserva', [
            "editar" => $editarReserva,
            "crear" => $crearReserva,
            "eliminar" => $eliminarReserva
         ]);
      }


     // Recorremos cada uno de los permisos de 'Activar'
      $showPrestamo = $newPrestamo = $editPrestamo = $deletePrestamo = "";
      if (true){
         $showPrestamo = view('admin.md_configuration.showPrestamo', [
            "editar" => $editarPrestamo,
            "crear" => $crearPrestamo,
            "eliminar" => $eliminarPrestamo
         ]);
      }
         


    
        return view( 'admin.md_configuration.index',[
            'showTipoUsuario'=>$showTipoUsuario,
            'showFeriado'=>$showFeriado,
            'showReserva'=>$showReserva,
            'showPrestamo'=>$showPrestamo,
            'showDiasLaborables'=>$showDiasLaborables 
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
        
        Configuration::create([
            'startMonday'=>$request['boton3'],
            'endMonday'=>$request['boton4'],
            'startTuesday'=>$request['boton7'],
            'endTuesday'=>$request['boton8'],
            'startWednesday'=>$request['boton11'],
            'endWednesday'=>$request['boton12'],
            'startThursday'=>$request['boton15'],
            'endThursday'=>$request['boton16'],
            'startFriday'=>$request['boton19'],
            'endFriday'=>$request['boton20'],
            'startSaturday'=>$request['boton23'],
            'endSaturday'=>$request['boton24'],
            'startSunday'=>$request['boton27'],
            'endSunday'=>$request['boton28'],
            ]);
        // Holiday::create([
        //         'item'=>$request->item,
        //         'start'=>$request->inicioFeriado,
        //         'end'=>$request->finFeriado,
        //         'id_configuration'=>1,
        //     ]);

   $userTypes = UserType::all();
        $verActivar = $editarActivar = true;
        $verFeriado = $crearFeriado = $editarFeriado = $eliminarFeriado = true;
        $verReserva = $crearReserva = $editarReserva = $eliminarReserva = true;
        $verPrestamo = $crearPrestamo = $editarPrestamo = $eliminarPrestamo = true;
        $verDiasLaborables = $editarDiasLaborables= true;

    //Redireccionamos a la seccion general de Configuraciones
        
       $showDiasLaborables = $editDiasLaborables= true;
   if(true)$showDiasLaborables= view('admin.md_configuration.showDiasLaborables');

// Recorremos cada uno de los permisos de 'Activar'
      $showActivar = $editActivar = "";
      if (true){
         $showTipoUsuario = view('admin.md_configuration.showTipoUsuario', [
            "editar" => $editarActivar,
            "userTypes" => $userTypes
         ]);
      }

        // Recorremos cada uno de los permisos de 'Activar'
      $showFeriado = $newFeriado = $editFeriado = $deleteFeriado = "";
      if (true){
         $showFeriado = view('admin.md_configuration.showFeriado', [
            "editar" => $editarActivar,
            "crear" => $newFeriado,
            "eliminar" => $eliminarFeriado
         ]);
      }

     // Recorremos cada uno de los permisos de 'Activar'
      $showReserva = $newReserva = $editReserva = $deleteReserva = "";
      if (true){
         $showReserva = view('admin.md_configuration.showReserva', [
            "editar" => $editarReserva,
            "crear" => $crearReserva,
            "eliminar" => $eliminarReserva
         ]);
      }

     // Recorremos cada uno de los permisos de 'Activar'
      $showPrestamo = $newPrestamo = $editPrestamo = $deletePrestamo = "";
      if (true){
         $showPrestamo = view('admin.md_configuration.showPrestamo', [
            "editar" => $editarPrestamo,
            "crear" => $crearPrestamo,
            "eliminar" => $eliminarPrestamo
         ]);
      }
         
    
        return view( 'admin.md_configuration.index',[
            'showTipoUsuario'=>$showTipoUsuario,
            'showFeriado'=>$showFeriado,
            'showReserva'=>$showReserva,
            'showPrestamo'=>$showPrestamo,
            'showDiasLaborables'=>$showDiasLaborables 
            ]);


  }



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

