<?php

namespace App\Http\Controllers\User;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class LoginController extends Controller
{
  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/user/login';

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function login(Request $request)
  {

     dd("ERROR : 484515x121 :v");
  }

  public function __construct()
  {
     $this->middleware('guest', [
        'except' => 'logout'
     ]);
  }
}
