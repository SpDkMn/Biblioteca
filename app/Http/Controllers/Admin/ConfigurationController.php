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


      if (true){
         $showDiasLaborables = view('admin.md_configuration.showDiasLaborables');
      }

      if (true) {
         $showTipoUsuario = view('admin.md_configuration.showTipoUsuario', [
            "userTypes" => $userTypes
         ]);
      }

      if(true){
        $showFeriados = view('admin.md_configuration.showFeriados');
      }

      return view('admin.md_configuration.index', [
         'showTipoUsuario' => $showTipoUsuario,
         'pedidos' => null ,
         'showDiasLaborables' => $showDiasLaborables,
         'showFeriados' => $showFeriados
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
         'startMonday' => $request['boton3'],
         'endMonday' => $request['boton4'],
         'startTuesday' => $request['boton7'],
         'endTuesday' => $request['boton8'],
         'startWednesday' => $request['boton11'],
         'endWednesday' => $request['boton12'],
         'startThursday' => $request['boton15'],
         'endThursday' => $request['boton16'],
         'startFriday' => $request['boton19'],
         'endFriday' => $request['boton20'],
         'startSaturday' => $request['boton23'],
         'endSaturday' => $request['boton24'],
         'startSunday' => $request['boton27'],
         'endSunday' => $request['boton28']
      ]);

      $userTypes = UserType::all();


      if (true){
         $showDiasLaborables = view('admin.md_configuration.showDiasLaborables');
      }

      if (true) {
         $showTipoUsuario = view('admin.md_configuration.showTipoUsuario', [
            "userTypes" => $userTypes
         ]);
      }

      if(true){
        $showFeriados = view('admin.md_configuration.showFeriados');
      }

      return view('admin.md_configuration.index', [
         'showTipoUsuario' => $showTipoUsuario,
         'showDiasLaborables' => $showDiasLaborables,
         'showFeriados' => $showFeriados
      ]);

   }

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
