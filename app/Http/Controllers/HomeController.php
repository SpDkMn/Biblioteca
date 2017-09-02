<?php
namespace App\Http\Controllers;
use App\Order as Order;
use App\Employee as Employee;
use App\Magazine as Magazine;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\User as User;

class HomeController extends Controller
{

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('auth');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Http\Response
    */
    // si es null -> es usuario
    // si no es null -> es empleado
   public function index()
   {
     if(Auth::User()->employee2!=null)
        return view('admin.layouts.main');
   }
   public function indexUser()
   {
      if(Auth::User()->employee2!=null){
        Auth::logout();
        return view('user2.auth.login');
      }
      return view('user.layouts.main');
   }
}
