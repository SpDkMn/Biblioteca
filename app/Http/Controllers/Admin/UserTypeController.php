<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserType as UserType;

class UserTypeController extends Controller
{
    public function index(){

    }

    public function store(Request $request){

    	$userTypes = UserType::all();
    	
    	$cont=0;

    	foreach ($userTypes as $userType) {
    		if($userType->name != 'Admin'){	

    			if(isset($request->pSala[$cont]))
	    			$userType->prestamoSala = true;
	    		else
	    			$userType->prestamoSala = false;

	    		if(isset($request->pDomicilio[$cont]))
	    			$userType->prestamoDomicilio = true;
	    		else
	    			$userType->prestamoDomicilio = false;

	    		if(isset($request->castigado[$cont]))
	    			$userType->castigado = true;
	    		else
	    			$userType->castigado = false;

	    		$userType->cantidadSala = $request->cSala[$cont];
	    		$userType->cantidadDomicilio = $request->cDomicilio[$cont];
	    		$userType->tiempoDomicilio =$request->tPrestamo[$cont];

	    		$userType->save();
	    		$cont++;

	    		}
    		
    		}

    	return redirect('admin/configurations');
    }
} 
