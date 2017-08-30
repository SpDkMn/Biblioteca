<?php
	$orden=$Sancion->penaltyOrder;
	$orden->with(['typePenalty']);
	$usuario=$Sancion->user;
	$usuario->with(['user_type']);
?>
<div class="box-body" id="cuadroVerSancion" style="margin-left: 0px;padding: 0px; ">
	<div class="box box-success box-solid" style="margin-bottom: 0px; border-color: #C0872B;">
		<div class="box-header with-border" style=" padding:0px; height: 440px;background-color: blue; border-color: #B57128;">

			
			<div class="col-md-4" style=" height: 100%;background-color: #C0872B;">
				<div style="width:90%;height: 50%; background-color:#FDEAB2; margin:auto; margin-top: 16%;padding-top: 5%;">
				 <div style="width:90%; margin:auto;display: table; height: 93%; background-color: green; text-align: center;font-size:40px;">
				 	<div style="display: table-cell;vertical-align: middle;">Estado</div>
				 </div>
				</div>
				<div style="font-size:25px; margin-top: 12px; text-align: center;display: table; height: 35%;"><div style="display: table-cell;vertical-align: middle;">"El alumno ha perdido todo el ciclo, castigo de último nivel"</div></div>
			</div>
			<div class="col-md-8" style="height:100%;background-color: #BFA878;font-size:18px;">
			Tipo de Castigo : "{{$orden->typePenalty->symbol}}" 
			Alumno : "{{$usuario->last_name}}""{{$usuario->name}}" 
			Código : "{{$usuario->code}}"
			Tipo de Usuario : "{{$usuario->user_type->name}}"
			</div>
			<div class="box-tools pull-right" style="margin-top:0px;">
				<button type="button" class="btn btn-primary"
			data-dismiss="modal" style="width: 40px; "><i class="fa fa-close"></i></button>
			</div>

		</div>

		<div class="box-body " style="width: 100% ;    margin: 0px;text-align: center; background-color: #B57128; ">
			<a class="btn btn-primary"  onClick="" style="font-size:18px; margin-right: 150px;background-color: #BFA878;border-color: #8A4C0F; color: black;">Detener Castigo</a>
			<a class="btn btn-primary" onClick="" style=" font-size:18px;background-color: #BFA878;border-color: #8A4C0F;color:black;">Eliminar Castigo</a>
			
		</div>		
	</div>
</div>