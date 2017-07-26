<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;

class LoginController extends Controller
{
   /*
    * |--------------------------------------------------------------------------
    * | Login Controller
    * |--------------------------------------------------------------------------
    * |
    * | This controller handles authenticating users for the application and
    * | redirecting them to your home screen. The controller uses a trait
    * | to conveniently provide its functionality to your applications.
    * |
    */
   
   use AuthenticatesUsers;

   /**
    * Where to redirect users after login.
    *
    * @var string
    */
   protected $redirectTo = '/login';

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function login(Request $request)
   {
      // dd($request['username']);
      if (Auth::attempt([
         'username' => $request['username'],
         'password' => $request['password']
      ])) {
         // Authentication passed...
         return redirect()->intended('admin/noticias');
      }
      return redirect::to('/login');
   }

   public function __construct()
   {
      $this->middleware('guest', [
         'except' => 'logout'
      ]);
   }
}
