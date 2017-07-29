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

//ESTO DE ABAJO DEBE SER BORRADO -> LO DE ARRIBA ES LO MISMO PERO OPTMIZADO ,
// LO DE ABAJO NO FUNCIONA CUANDO NO HAY CONFIGURACION AGREGADA

// $i = 0;
// $configuraciones = App\Configuration::all();
// foreach ($configuraciones as $configura) {
//    $i ++;
// }
// $configuracion = App\Configuration::find($i);
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
					<th class="text-center">Desactivar</th>
					<th class="text-center">Activar</th>
					<th class="text-center">Desde</th>
					<th class="text-center" style="width: 40px">Hasta</th>

				</tr>
				<tr>

					<td class="text-center" style="font-weight: bold;">Lunes</td>
					<td class="text-center"><input name="boton1" id="boton1"
						type="button" value="Deshabilitar"
						onclick="desactivar(this.name,'boton3,boton4');funcion3()" /></td>
					<td class="text-center"><input name="boton2" id="boton2"
						type="button" value="Habilitar"
						onclick="activar(this.name,'boton3,boton4')" /></td>

					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton3" id="boton3"

								value="@if($band){{$configuracion->startMonday}}@endif" style="width: 80px;"
								value="" class="txtPickter" type="text" disabled /> <span
								class="add-on" style="width: 25px; height: 34px; padding: 7px;">
								<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton4" id="boton4"
								value="@if($band){{$configuracion->endMonday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>

				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Martes</td>
					<td class="text-center"><input name="boton5" id="boton5"
						type="button" value="Deshabilitar"
						onclick="desactivar(this.name,'boton7,boton8');funcion3()" /></td>
					<td class="text-center"><input name="boton6" id="boton6"
						type="button" value="Habilitar"
						onclick="activar(this.name,'boton7,boton8')" /></td>

					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton7" id="boton7"
								value="@if($band){{$configuracion->startTuesday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton8" id="boton8"
								value="@if($band){{$configuracion->endTuesday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Miercoles</td>
					<td class="text-center"><input name="boton9" id="boton9"
						type="button" value="Deshabilitar"
						onclick="desactivar(this.name,'boton11,boton12');funcion3()" /></td>
					<td class="text-center"><input name="boton10" id="boton10"
						type="button" value="Habilitar"
						onclick="activar(this.name,'boton11,boton12')" /></td>

					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton11" id="boton11"
								value="@if($band){{$configuracion->startWednesday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton12" id="boton12"
								value="@if($band){{$configuracion->endWednesday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Jueves</td>
					<td class="text-center"><input name="boton13" id="boton13"
						type="button" value="Deshabilitar"
						onclick="desactivar(this.name,'boton15,boton16');funcion3()" /></td>
					<td class="text-center"><input name="boton14" id="boton14"
						type="button" value="Habilitar"
						onclick="activar(this.name,'boton15,boton16')" /></td>

					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton15" id="boton15"
								value="@if($band){{$configuracion->startThursday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton16" id="boton16"
								value="@if($band){{$configuracion->endThursday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Viernes</td>
					<td class="text-center"><input name="boton17" id="boton17"
						type="button" value="Deshabilitar"
						onclick="desactivar(this.name,'boton19,boton20');funcion3()" /></td>
					<td class="text-center"><input name="boton18" id="boton18"
						type="button" value="Habilitar"
						onclick="activar(this.name,'boton19,boton20')" /></td>

					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton19" id="boton19"
								value="@if($band){{$configuracion->startFriday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton20" id="boton20"
								value="@if($band){{$configuracion->endFriday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Sabado</td>
					<td class="text-center"><input name="boton21" id="boton21"
						type="button" value="Deshabilitar"
						onclick="desactivar(this.name,'boton23,boton24');funcion3()" /></td>
					<td class="text-center"><input name="boton22" id="boton22"
						type="button" value="Habilitar"
						onclick="activar(this.name,'boton23,boton24')" /></td>

					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton23" id="boton23"
								value="@if($band){{$configuracion->startSaturday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton24" id="boton24"
								value="@if($band){{$configuracion->endSaturday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

				<tr>
					<td class="text-center" style="font-weight: bold;">Domingo</td>
					<td class="text-center"><input name="boton25" id="boton25"
						type="button" value="Deshabilitar"
						onclick="desactivar(this.name,'boton27,boton28');funcion3()" /></td>
					<td class="text-center"><input name="boton26" id="boton26"
						type="button" value="Habilitar"
						onclick="activar(this.name,'boton27,boton28')" /></td>

					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton27" id="boton27"
								value="@if($band){{$configuracion->startSunday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
					<td class="text-center">
						<div id="datetimepicker" class="input-append date fecha3">
							<input name="boton28" id="boton28"
								value="@if($band){{$configuracion->endSunday}}@endif" style="width: 80px;"
								class="txtPickter" type="text" disabled /> <span class="add-on"
								style="width: 25px; height: 34px; padding: 7px;"> <i
								data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							</span>
						</div>
					</td>
				</tr>

			</table>

		</div>
		<div class="box-footer">
			<input type="submit" class="btn btn-primary pull-right"
				value="Guardar cambios">
		</div>
	</form>
</div>


<!--Script que permite cambiar el estado de los botones-->
<script type="text/javascript">

//FUNCION DESACTIVAR BOTON
function desactivar(name,nombreBotones){
  var partesBotones = nombreBotones.split(",");
  for(i=0;i<partesBotones.length;i++){
    var boto = document.getElementById(partesBotones[i]);
    var botone = document.getElementById(boto.name);
    botone.disabled = true;   //Cambimos el estado del boton

    document.getElementById(botone.name).setAttribute("value","deshabilitado"); //Agregamos un valor al boton
  }
}


//FUNCION ACTIVAR BOTON
function activar(name,nombreBotones){
  var partesBotones = nombreBotones.split(",");
  for(i=0;i<partesBotones.length;i++){
    var bot = document.getElementById(partesBotones[i]);
    var botones = document.getElementById(bot.name);
    botones.disabled = false;  //Cambiamos el estado del boton


    if(document.getElementById(name).getAttribute("value","Deshabilitar")){
      document.getElementById(botones.name).setAttribute("value","");
      document.getElementById(botones.name).setAttribute("class","txtPickter bg-white");
     }
  }
}
</script>
