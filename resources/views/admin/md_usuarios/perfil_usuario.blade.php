@extends('admin.layouts.main') @section('content')
<style type="text/css">
.dato {
	font-size: 20px;
	margin-bottom: 3px;
}
</style>

<div class="box-body" id="cuadro_ingresar_usuario">
	<div class="col-md-3">
		<div class="box box-warning box-solid" style="border-color: blue;">
			<div class="box-header with-border" style="background-color: blue;">
				<h3 class="box-title">Perfil</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<h2 style="margin-top: 0px; margin-left: 36px; font-size: 35px;">
					<strong>{{ Auth::user()->code }}</strong>
				</h2>
				<div
					style="background-image: url(/img/avatar5.png); height: 120px; width: 120px; background-repeat: no-repeat; background-position: 50%; border-radius: 50%; background-size: 100% auto; border: 2px solid black; margin-left: 50px; margin-bottom: 17px; margin-top: 10px;"></div>
				<h3 class="profile-username text-center"><?php
   $apellidos = Auth::user()->last_name;
   $nombres = Auth::user()->name;
   $arreglo_1 = explode(" ", $apellidos, 2);
   $arreglo_2 = explode(" ", $nombres, 2);
   $cadena_total = $arreglo_2[0] . " " . $arreglo_1[0];
   
   ?>{{ $cadena_total }}</h3>
				<p class="text-muted text-center">{{ Auth::user()->school }}</p>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

		<div class="box box-warning box-solid" style="border-color: blue;">
			<div class="box-header with-border" style="background-color: blue;">
				<h3 class="box-title">Datos Técnicos</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<strong style="float: left"><i class="fa fa-book margin-r-5"></i>
					Libros Pedidos</strong>
				<div style="margin-left: 170px;">0</div>

				<strong style="float: left"><i class="fa fa-book margin-r-5"></i>
					Tesis Pedidas</strong>
				<div style="margin-left: 170px;">0</div>


				<strong style="float: left"><i class="fa fa-book margin-r-5"></i>
					Castigos</strong>
				<div style="margin-left: 170px;">0</div>

				<strong style="float: left"><i class="fa fa-book margin-r-5"></i>
					Pedido</strong>
				<div style="margin-left: 170px;">No</div>

				<strong style="float: left"><i class="fa fa-book margin-r-5"></i>
					Estado</strong>
        <?php
      if (Auth::user()->state) {
         echo ("<div style='margin-left: 145px;'>Disponible</div>");
      } else {
         echo ("<div style='margin-left: 145px;'>Bloqueado</div>");
      }
      ?>
      </div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

	</div>
	<!-- /.col -->

	<div class="col-md-9">
		<div class="box box-warning box-solid"
			style="border-color: blue; height: 493px;">
			<div class="box-header with-border" style="background-color: blue;">
				<h3 class="box-title">Descripción General</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse">
						<i class="fa fa-minus"></i>
					</button>
				</div>
				<!-- /.box-tools -->
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="box box-solid" style="margin-bottom: 4px;">

					<div class="box-body" style="margin-top: -7px;">

						<dl class="dl-horizontal">

							<dt class="dato">Tipo de Usuario :</dt>
							<dd class="dato" style="margin-top: 2px;"><?php
      if (Auth::user()->id_user_type == 1) {
         echo ("Pregrado");
      } else if (Auth::user()->id_user_type == 2) {
         echo ("Postgrado");
      } else if (Auth::user()->id_user_type == 3) {
         echo ("Profesor");
      } else if (Auth::user()->id_user_type == 4) {
         echo ("Externo");
      } else if (Auth::user()->id_user_type == 5) {
         echo ("Administrativo");
      } else {
         echo ("Admin");
      }
      ?></dd>
							<dt class="dato">Apellidos :</dt>
							<dd class="dato">{{Auth::user()->last_name}}</dd>
							<dt class="dato">Nombres :</dt>
							<dd class="dato">{{Auth::user()->name}}</dd>
							<dt class="dato">Codigo :</dt>
                    <?php
                  if (Auth::user()->code == null) {
                     echo ("<dd class='dato'> ------- </dd>");
                  } else {
                     echo ("<dd class='dato'>" . Auth::user()->code . "</dd>");
                  }
                  ?>
                    <dt class="dato">DNI</dt>
                    <?php
                  if (Auth::user()->dni == null) {
                     echo ("<dd class='dato'> ------- </dd>");
                  } else {
                     echo ("<dd class='dato'>" . Auth::user()->dni . "</dd>");
                  }
                  ?>
                    <dt class="dato">Universidad :</dt>
							<dd class="dato">{{Auth::user()->university}}</dd>
							<dt class="dato">Facultad :</dt>
							<dd class="dato">{{Auth::user()->faculty}}</dd>
							<dt class="dato">Escuela :</dt>
							<dd class="dato">{{Auth::user()->school}}</dd>
							<dt class="dato">Teléfono de Casa :</dt>
							<dd class="dato">{{Auth::user()->home_phone}}</dd>
							<dt class="dato">Telefono Celular :</dt>
							<dd class="dato">{{Auth::user()->phone}}</dd>
							<dt class="dato">Domicilio :</dt>
							<dd class="dato">{{Auth::user()->address}}</dd>
							<dt class="dato">Correo :</dt>
							<dd class="dato">{{Auth::user()->email}}</dd>

						</dl>

					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->


</div>
@stop
