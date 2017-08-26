<?php
namespace App\Http\Controllers;
use App\Order as Order;
use Illuminate\Http\Request;

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
   public function index()
   {
    $pedidos = null ; $i = 0 ;
    foreach (Order::all() as $pedido) {
      if ($pedido->state == 0) {
        $pedidos[$i] = $pedido ;
      }
      $i++;
    }
    //$pedidos2 contiene a los pedidos que tienen como estado 0 osea que estan en la espera de ser aceptados o rechazados
      return view('admin.layouts.main',['pedidos' => $pedidos]);
   }
   public function indexUser()
   {
      return view('user.layouts.main');
   }
}
