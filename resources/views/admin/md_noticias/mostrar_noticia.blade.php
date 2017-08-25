@extends('admin.layouts.main')
<?php $pedidos = 0 ; ?>

<?php $message=Session::get('message')?>
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert"
	id="cuadro_identificacion_envio" style="margin-bottom: 0px">
	<button type="button" class="close" data_dismiss="alert"
		aria-label="Close" id="identificacion_envio"
		onclick="cerrar_identificacion()">
		<span aria-hidden="true">&times;</span>
	</button>
	{{Session::get('message')}}
</div>
@endif
@section('content')
		<?php

$cantidad_elementos = count($variable);
$cantidad_elementos_sobra4 = $cantidad_elementos % 4;
$cantidad_elementos_multiplo4 = $cantidad_elementos - $cantidad_elementos_sobra4;

$cantidad_elementos_divisor = $cantidad_elementos_multiplo4 / 4;
?>
<style type="text/css">
#cuadro_mostrar_noticia {
	padding-top: 15px; //
	background-color: yellow;
}

#titulo_mostrar_noticia {
	margin-top: 0px;
	margin-bottom: 20px;
	margin-left: 39%;
}

.box {
	float: left;
	width: 50px;
}
</style>
<script type="text/javascript">

			function cerrar_identificacion(){
				cuadro_identificacion_envio
				valor_identificacion=document.getElementById("cuadro_identificacion_envio");
				valor_identificacion.setAttribute("class","alert alert-success alert-dismissible hidden");
			}
		</script>
<div class="box-body" id="cuadro_mostrar_noticia">
	<div class="col-md-3" id="boton_crear_noticia"
		style="padding-left: 10px; margin-top: 7px;">

		<a href="{{url('admin/noticias/create')}}" class="btn btn-primary">Crear
			una nueva Noticia</a>
	</div>
	<h1 id="titulo_mostrar_noticia">Vista de Noticias</h1>
		<?php
for ($i = 1; $i <= $cantidad_elementos_divisor; $i ++) {
   ?>
			<div class="row">
		<div class="col-md-3">
			<div class="thumbnail">
						<?php
   if ($variable[($i - 1) * 4]->urlImg == "") {
      $fijo_url = "biblioteca_sinfoto_noticia.jpg";
   } else {
      $fijo_url = $variable[($i - 1) * 4]->urlImg;
   }
   echo "<img src='/imgNoticias/" . $fijo_url . "' alt='Responsive image' class='img-responsive' style='width: 280px; height: 280px;'>";
   ?>
						<div class="caption" style="height: 260px;">
					<div style="height: 150px;">
						<h3
							style="text-align: center; height: 85px; font-weight: bold; margin-top: 0px; justify-content: center; align-content: center; flex-direction: column; overflow: hidden; display: flex;"><?php echo $variable[($i-1)*4]->titulo ?></h3>

						<div
							style="text-align: center; height: 100px; font-size: 15px; display: flex; justify-content: center; align-content: center; flex-direction: column; overflow: hidden"><?php echo $variable[($i-1)*4]->contenido ?></div>
						<div style="padding-left: 18%; margin-top: 8px;">
							<div class="box">{!!link_to_route('noticias.edit',
								$title='Editar', $parameters = $variable[($i-1)*4]->id,
								$attributes = ['class'=>'btn btn-primary'])!!}</div>
							<div class="box" style="margin-left: 17%">
								<form
									action="{{ route('noticias.destroy',$variable[($i-1)*4]->id )}}"
									method="POST">
									<input name="_method" type="hidden" value="DELETE"> {{
									csrf_field() }} <input type="submit"
										class="btn btn-danger btn-x" value="Eliminar">
								</form>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail">
						<?php
   if ($variable[($i - 1) * 4 + 1]->urlImg == "") {
      $fijo_url = "biblioteca_sinfoto_noticia.jpg";
   } else {
      $fijo_url = $variable[($i - 1) * 4 + 1]->urlImg;
   }
   echo "<img src='/imgNoticias/" . $fijo_url . "' alt='Responsive image' class='img-responsive' style='width: 280px; height: 280px;'>";
   ?>
						<div class="caption" style="height: 260px;">
					<div style="height: 150px;">
						<h3
							style="text-align: center; height: 85px; font-weight: bold; margin-top: 0px; justify-content: center; align-content: center; flex-direction: column; overflow: hidden; display: flex;"><?php echo $variable[($i-1)*4+1]->titulo ?></h3>
						<div
							style="text-align: center; height: 100px; font-size: 15px; display: flex; justify-content: center; align-content: center; flex-direction: column; overflow: hidden"><?php echo $variable[($i-1)*4+1]->contenido ?></div>
						<div style="padding-left: 18%; margin-top: 8px;">
							<div class="box">{!!link_to_route('noticias.edit',
								$title='Editar', $parameters = $variable[($i-1)*4+1]->id,
								$attributes = ['class'=>'btn btn-primary'])!!}</div>
							<div class="box" style="margin-left: 17%">
								<form
									action="{{ route('noticias.destroy',$variable[($i-1)*4+1]->id )}}"
									method="POST">
									<input name="_method" type="hidden" value="DELETE"> {{
									csrf_field() }} <input type="submit"
										class="btn btn-danger btn-x" value="Eliminar">
								</form>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail">
						<?php
   if ($variable[($i - 1) * 4 + 2]->urlImg == "") {
      $fijo_url = "biblioteca_sinfoto_noticia.jpg";
   } else {
      $fijo_url = $variable[($i - 1) * 4 + 2]->urlImg;
   }
   echo "<img src='/imgNoticias/" . $fijo_url . "' alt='Responsive image' class='img-responsive' style='width: 280px; height: 280px;'>";
   ?>
						<div class="caption" style="height: 260px;">
					<div style="height: 150px;">
						<h3
							style="text-align: center; height: 85px; font-weight: bold; margin-top: 0px; justify-content: center; align-content: center; flex-direction: column; overflow: hidden; display: flex;"><?php echo $variable[($i-1)*4+2]->titulo ?></h3>
						<div
							style="text-align: center; height: 100px; font-size: 15px; display: flex; justify-content: center; align-content: center; flex-direction: column; overflow: hidden"><?php echo $variable[($i-1)*4+2]->contenido ?></div>
						<div style="padding-left: 18%; margin-top: 8px;">
							<div class="box">{!!link_to_route('noticias.edit',
								$title='Editar', $parameters = $variable[($i-1)*4+2]->id,
								$attributes = ['class'=>'btn btn-primary'])!!}</div>
							<div class="box" style="margin-left: 17%">
								<form
									action="{{ route('noticias.destroy',$variable[($i-1)*4+2]->id )}}"
									method="POST">
									<input name="_method" type="hidden" value="DELETE"> {{
									csrf_field() }} <input type="submit"
										class="btn btn-danger btn-x" value="Eliminar">
								</form>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
		<div class="col-md-3">
			<div class="thumbnail">
						<?php
   if ($variable[($i - 1) * 4 + 3]->urlImg == "") {
      $fijo_url = "biblioteca_sinfoto_noticia.jpg";
   } else {
      $fijo_url = $variable[($i - 1) * 4 + 3]->urlImg;
   }
   echo "<img src='/imgNoticias/" . $fijo_url . "' alt='Responsive image' class='img-responsive' style='width: 280px; height: 280px;'>";
   ?>
						<div class="caption" style="height: 260px;">
					<div style="height: 150px;">
						<h3
							style="text-align: center; height: 85px; font-weight: bold; margin-top: 0px; justify-content: center; align-content: center; flex-direction: column; overflow: hidden; display: flex;"><?php echo $variable[($i-1)*4+3]->titulo ?></h3>

						<div
							style="text-align: center; height: 100px; font-size: 15px; display: flex; justify-content: center; align-content: center; flex-direction: column; overflow: hidden"><?php echo $variable[($i-1)*4+3]->contenido ?></div>
						<div style="padding-left: 18%; margin-top: 8px;">
							<div class="box">{!!link_to_route('noticias.edit',
								$title='Editar', $parameters = $variable[($i-1)*4+3]->id,
								$attributes = ['class'=>'btn btn-primary'])!!}</div>
							<div class="box" style="margin-left: 17%">
								<form
									action="{{ route('noticias.destroy',$variable[($i-1)*4+3]->id )}}"
									method="POST">
									<input name="_method" type="hidden" value="DELETE"> {{
									csrf_field() }} <input type="submit"
										class="btn btn-danger btn-x" value="Eliminar">
								</form>
							</div>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
			<?php
}
?>
			<div class="row">



		<?php
for ($i = 1; $i <= $cantidad_elementos_sobra4; $i ++) {
   ?>
				<div class="col-md-3">
			<div class="thumbnail">
						<?php
   if ($variable[$cantidad_elementos_multiplo4 + $i - 1]->urlImg == "") {
      $fijo_url = "biblioteca_sinfoto_noticia.jpg";
   } else {
      $fijo_url = $variable[$cantidad_elementos_multiplo4 + $i - 1]->urlImg;
   }
   echo "<img src='/imgNoticias/" . $fijo_url . "' alt='Responsive image' class='img-responsive' style='width: 280px; height: 280px;'>";
   ?>
						<div class="caption" style="height: 260px;">
					<div style="height: 150px;">
						<h3
							style="text-align: center; height: 85px; font-weight: bold; margin-top: 0px; justify-content: center; align-content: center; flex-direction: column; overflow: hidden; display: flex;"><?php echo $variable[$cantidad_elementos_multiplo4+$i-1]->titulo ?></h3>

						<div
							style="text-align: center; height: 100px; font-size: 15px; display: flex; justify-content: center; align-content: center; flex-direction: column; overflow: hidden"><?php echo $variable[$cantidad_elementos_multiplo4+$i-1]->contenido ?></div>
						<div style="padding-left: 18%; margin-top: 8px;">
							<div class="box">{!!link_to_route('noticias.edit',
								$title='Editar', $parameters =
								$variable[$cantidad_elementos_multiplo4+$i-1]->id, $attributes =
								['class'=>'btn btn-primary'])!!}</div>
							<!--<a href="#" class="btn btn-primary">Leer mas</a>-->
							<div class="box" style="margin-left: 17%">
								<form
									action="{{ route('noticias.destroy',$variable[$cantidad_elementos_multiplo4+$i-1]->id )}}"
									method="POST">
									<input name="_method" type="hidden" value="DELETE"> {{
									csrf_field() }} <input type="submit"
										class="btn btn-danger btn-x" value="Eliminar">
								</form>
							</div>
							<!--<a style="margin-left: 20px;" href="#" class="btn btn-success">Leer mas</a>-->
						</div>
					</div>

				</div>

			</div>
		</div>
			<?php
}
?>

		</div>
	<div style="padding-left: 45%;">{!!$variable->render()!!}</div>
</div>
@stop
