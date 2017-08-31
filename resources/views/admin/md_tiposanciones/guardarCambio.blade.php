<?php
	$arreglo = json_decode($myJson); 
	use App\TypePenalty;
	use App\PenaltyOrder;
        $arregloOrden=$tipoSancion->penaltyOrders;
        $cantidad=count($arregloOrden);
        for($i=0;$i<$cantidad;$i++){
            $ordenCambiable= PenaltyOrder::find($arregloOrden[$i]->id);
            $ordenCambiable->penaltyTime=$arreglo[$i];
            $ordenCambiable->save();
        }
  ?>