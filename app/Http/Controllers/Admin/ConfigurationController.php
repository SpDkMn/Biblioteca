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
      // Recorremos cada uno de los permisos de 'Activar'
      $showActivar = $editActivar = "";
      if (true)
         $showTipoUsuario = view('admin.md_configuration.showTipoUsuario', [
            "editar" => $editarActivar,
            "userTypes" => $userTypes
         ]);
      // Recorremos cada uno de los permisos de 'Activar'
      $showFeriado = $newFeriado = $editFeriado = $deleteFeriado = "";
      if (true)
         $showFeriado = view('admin.md_configuration.showFeriado', [
            "editar" => $editarActivar,
            "crear" => $newFeriado,
            "eliminar" => $eliminarFeriado
         ]);
      
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
      return view('admin.md_configuration.index', [
         'showTipoUsuario' => $showTipoUsuario,
         'showFeriado' => $showFeriado,
         'showReserva' => $showReserva,
         'showPrestamo' => $showPrestamo
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
      Configuration::create([
         'mondaySetting' => $request->mondaySetting,
         'tuesdaySetting' => $request->tuesdaySetting,
         'wednesdaySetting' => $request->wednesdaySetting,
         'thursdaySetting' => $request->thursdaySetting,
         'fridaySetting' => $request->fridaySetting,
         'saturdaySetting' => $request->saturdaySetting,
         'sundaySetting' => $request->sundaySetting,
         'startMonday' => $request->startMonday,
         'startTuesday' => $request->startTuesday,
         'startWednesday' => $request->startWednesday,
         'startThursday' => $request->startThursday,
         'startFriday' => $request->startFriday,
         'startSaturday' => $request->startSaturday,
         'startSunday' => $request->startSunday,
         'endSunday' => $request->endSunday,
         'endMonday' => $request->endMonday,
         'endTuesday' => $request->endTuesday,
         'endWednesday' => $request->endWednesday,
         'endThursday' => $request->endThursday,
         'endFriday' => $request->endFriday,
         'endSaturday' => $request->endSaturday,
         'endSunday' => $request->endSunday
      ]);
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
      //
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
      //
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      //
   }
}