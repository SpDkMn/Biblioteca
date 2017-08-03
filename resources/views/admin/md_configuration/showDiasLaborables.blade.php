<?php
$configuraciones = App\Configuration::all();
//Inicializando bandera
$band = false ;
if ($configuraciones->isNotEmpty()) {
  $configuracion = $configuraciones->last();
  $band = true;
}else {
  $configuracion = collect([]);
}

?>

<!-- Condiciones agregadas para poder mostrar los datos de configuracion solo si no están vacíos -->

<div class="box box-success">
	<div class="box-header">
		<center>
			<h1 class="box-title">Dias Laborables</h1>
		</center>
		<h5 class="text-center bg-green">Habilitar los dias laborales y
			deshabilitar los dias no laborales</h5>
	</div>
	<!-- /.box-header -->

	<form method="POST" action="{{ url('/admin/configurations') }}">
		{{ csrf_field() }}
		<div class="box-body no-padding">

			<table
				class="table table-condensed table-bordered table-hover responsive">
				<tr>
					<th style="width: 10px"></th>
					<th class="text-center">Activar/Desactivar</th>
					<th class="text-center">Desde</th>
					<th class="text-center" style="width: 40px">Hasta</th>

				</tr>
				<tr>

					<td class="text-center" style="font-weight: bold;">Lunes</td>
					<td class="text-center"><input name="boton1" id="check" type="checkbox" onchange="habilitar1(this.checked);" checked/></td>
					
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton3" id="boton3" value="@if($band){{$configuracion->startMonday}}@endif" style="width: 80px;"
								value="" class="txtPickter" type="text" /> <span
								class="add-on" style="width: 25px; height: 34px; padding: 7px;">
								<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton4" id="boton4" value="@if($band){{$configuracion->endMonday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"	style="width: 25px; height: 34px; padding: 7px;"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>

				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Martes</td>
					<td class="text-center"><input name="boton5" id="check" type="checkbox" onchange="habilitar2(this.checked);" checked /></td>
					
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton7" id="boton7" value="@if($band){{$configuracion->startTuesday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"	style="width: 25px; height: 34px; padding: 7px;"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton8" id="boton8" value="@if($band){{$configuracion->endTuesday}}@endif" style="width: 80px;" class="txtPickter" type="text"/> <span class="add-on" style="width: 25px; height: 34px; padding: 7px;"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Miercoles</td>
					<td class="text-center"><input name="boton9" id="check" type="checkbox" onchange="habilitar3(this.checked);" checked/></td>
					
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton11" id="boton11" value="@if($band){{$configuracion->startWednesday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"	style="width: 25px; height: 34px; padding: 7px;"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton12" id="boton12" value="@if($band){{$configuracion->endWednesday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on" style="width: 25px; height: 34px; padding: 7px;"> <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Jueves</td>
					<td class="text-center"><input name="boton13" id="check" type="checkbox" onchange="habilitar4(this.checked);" checked /></td>
					
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton15" id="boton15"
								value="@if($band){{$configuracion->startThursday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton16" id="boton16"
								value="@if($band){{$configuracion->endThursday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Viernes</td>
					<td class="text-center"><input name="boton17" id="check" type="checkbox" onchange="habilitar5(this.checked);" checked /></td>
					
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton19" id="boton19"
								value="@if($band){{$configuracion->startFriday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton20" id="boton20"
								value="@if($band){{$configuracion->endFriday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Sabado</td>
					<td class="text-center"><input name="boton21" id="check" type="checkbox" onchange="habilitar6(this.checked);" checked /></td>
					
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton23" id="boton23"
								value="@if($band){{$configuracion->startSaturday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton24" id="boton24"
								value="@if($band){{$configuracion->endSaturday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Domingo</td>
					<td class="text-center"><input name="boton25" id="check" type="checkbox" onchange="habilitar7(this.checked);" checked /></td>
					
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton27" id="boton27"
								value="@if($band){{$configuracion->startSunday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton28" id="boton28"
								value="@if($band){{$configuracion->endSunday}}@endif" style="width: 80px;"
								class="txtPickter" type="text"/> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

			</table>

		</div>
		<div class="box-footer">
			<input type="submit" class="btn btn-primary pull-right" value="Guardar cambios">
		</div>
	</form>
</div>



<script>
		function habilitar1(value)
		{
			if(value==true)
			{	document.getElementById("boton3").disabled=false;
				document.getElementById("boton4").disabled=false;

			}else if(value==false){
				document.getElementById("boton3").disabled=true;
				document.getElementById("boton4").disabled=true;
				document.getElementById("boton3").value="";
				document.getElementById("boton4").value="";
			}
		}
		function habilitar2(value)
		{
			if(value==true)
			{	document.getElementById("boton7").disabled=false;
				document.getElementById("boton8").disabled=false;
			}else if(value==false){
				document.getElementById("boton7").disabled=true;
				document.getElementById("boton8").disabled=true;
				document.getElementById("boton7").value="";
				document.getElementById("boton8").value="";
			}
		}
		function habilitar3(value)
		{
			if(value==true)
			{	document.getElementById("boton11").disabled=false;
				document.getElementById("boton12").disabled=false;
			}else if(value==false){
				document.getElementById("boton11").disabled=true;
				document.getElementById("boton12").disabled=true;
				document.getElementById("boton11").value="";
				document.getElementById("boton12").value="";
			}
		}
		function habilitar4(value)
		{
			if(value==true)
			{	document.getElementById("boton15").disabled=false;
				document.getElementById("boton16").disabled=false;
			}else if(value==false){
				document.getElementById("boton15").disabled=true;
				document.getElementById("boton16").disabled=true;
				document.getElementById("boton15").value="";
				document.getElementById("boton16").value="";
			}
		}
		function habilitar5(value)
		{
			if(value==true)
			{	document.getElementById("boton19").disabled=false;
				document.getElementById("boton20").disabled=false;
			}else if(value==false){
				document.getElementById("boton19").disabled=true;
				document.getElementById("boton20").disabled=true;
				document.getElementById("boton19").value="";
				document.getElementById("boton20").value="";
			}
		}
		function habilitar6(value)
		{
			if(value==true)
			{	document.getElementById("boton23").disabled=false;
				document.getElementById("boton24").disabled=false;
			}else if(value==false){
				document.getElementById("boton23").disabled=true;
				document.getElementById("boton24").disabled=true;
				document.getElementById("boton23").value="";
				document.getElementById("boton24").value="";
			}
		}
		function habilitar7(value)
		{
			if(value==true)
			{	document.getElementById("boton27").disabled=false;
				document.getElementById("boton28").disabled=false;
			}else if(value==false){
				document.getElementById("boton27").disabled=true;
				document.getElementById("boton28").disabled=true;
				document.getElementById("boton27").value="";
				document.getElementById("boton28").value="";
			}
		}
	</script>

