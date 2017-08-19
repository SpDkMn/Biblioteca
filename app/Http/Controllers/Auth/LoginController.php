<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Crypt;
use App\employee as Employee;
use App\User as User;

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
      $users = User::all();

      foreach ($users as $u) {
        if($u->email == $request->username && $request->password == Crypt::decrypt($u->employee2->password)){
          Auth::loginUsingId($u->id);
          return redirect()->intended('admin/noticias');
        }
      }
      dd("ERROR : 484515x121 :v");
   }

   public function __construct()
   {
      $this->middleware('guest', [
         'except' => 'logout'
      ]);
   }
}
