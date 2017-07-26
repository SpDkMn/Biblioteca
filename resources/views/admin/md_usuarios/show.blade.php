<style type="text/css">
#celda {
	border-bottom: 1px solid #6489FA;
}

#celda_izquierda {
	border-bottom: 1px solid #6489FA;
	border-left: 1px solid #6489FA;
}

#celda_derecha {
	border-bottom: 1px solid #6489FA;
	border-right: 1px solid #6489FA;
}

#contenido_celda {
	margin: 0px auto;
	text-align: center;
}

tbody tr:nth-last-child(2n+1):hover {
	background-color: #D5C9D5;
}

tbody tr:nth-last-child(2n+0):hover {
	background-color: #D5C9D5;
}

thead {
	background-color: #6489FA;
}

.conflictivo {
	background-color: #DA4C4C;
}

.dato {
	font-size: 20px;
	margin-bottom: 3px;
}
</style>



<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Titulo</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body" style="padding-left: 60px;">

		<div>

			<table id="example1" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Visualizar</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
						<?php //dd($universities[0]->name);?>
							@foreach($users as $user)
							<tr>
						<td id="celda_izquierda">{{ $user->id }}</td>

						<td id="celda">{{ $user->name }}</td>


						<td id="celda"><center>
								<button type="button" class="btn btn-primary"
									data-toggle="modal"
									data-target="#ModalCopy<?php echo $user->id; ?>">
									<i class="fa fa-eye"></i>
								</button>
							</center></td>

						<div class="modal  fade" id="ModalCopy<?php echo $user->id; ?>"
							tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
							<div style="width: 85%;" class="modal-dialog" role="document">
								<div class="modal-content">
									<form>

										<div class="modal-body" style="height: 530px;">

											<!--  ACA COMIENZA EL MODAL ________________________________________________________ -->

											<div class="box-body" id="cuadro_ingresar_usuario">
												<div class="col-md-3">
													<div class="box box-warning box-solid"
														style="border-color: blue;">
														<div class="box-header with-border"
															style="background-color: blue;">
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
															<h2
																style="margin-top: 0px; margin-left: 36px; font-size: 35px;">
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
															<p class="text-muted text-center">{{ Auth::user()->school
																}}</p>
														</div>
														<!-- /.box-body -->
													</div>
													<!-- /.box -->

													<div class="box box-warning box-solid"
														style="border-color: blue;">
														<div class="box-header with-border"
															style="background-color: blue;">
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
															<strong style="float: left"><i
																class="fa fa-book margin-r-5"></i> Libros Pedidos</strong>
															<div style="margin-left: 170px;">0</div>

															<strong style="float: left"><i
																class="fa fa-book margin-r-5"></i> Tesis Pedidas</strong>
															<div style="margin-left: 170px;">0</div>


															<strong style="float: left"><i
																class="fa fa-book margin-r-5"></i> Castigos</strong>
															<div style="margin-left: 170px;">0</div>

															<strong style="float: left"><i
																class="fa fa-book margin-r-5"></i> Pedido</strong>
															<div style="margin-left: 170px;">No</div>

															<strong style="float: left"><i
																class="fa fa-book margin-r-5"></i> Estado</strong>
        <?php
      if ($user->state == true) {
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
														<div class="box-header with-border"
															style="background-color: blue;">
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
                  if ($user->id_user_type == 1) {
                     echo ("Pregrado");
                  } else if ($user->id_user_type == 2) {
                     echo ("Postgrado");
                  } else if ($user->id_user_type == 3) {
                     echo ("Profesor");
                  } else if ($user->id_user_type == 4) {
                     echo ("Externo");
                  } else if ($user->id_user_type == 5) {
                     echo ("Administrativo");
                  } else {
                     echo ("Admin");
                  }
                  ?></dd>
																		<dt class="dato">Apellidos :</dt>
																		<dd class="dato"><?php echo($user->last_name); ?></dd>
																		<dt class="dato">Nombres :</dt>
																		<dd class="dato"><?php echo($user->name); ?></dd>
																		<dt class="dato">Codigo :</dt>
                    <?php
                  if ($user->code == null) {
                     echo ("<dd class='dato'> ------- </dd>");
                  } else {
                     echo ("<dd class='dato'>" . $user->code . "</dd>");
                  }
                  ?>
                    <dt class="dato">DNI</dt>
                    <?php
                  if ($user->dni == null) {
                     echo ("<dd class='dato'> ------- </dd>");
                  } else {
                     echo ("<dd class='dato'>" . $user->dni . "</dd>");
                  }
                  ?>
                    <dt class="dato">Universidad :</dt>
																		<dd class="dato"><?php echo($user->university); ?></dd>
																		<dt class="dato">Facultad :</dt>
																		<dd class="dato"> <?php echo($user->faculty); ?></dd>
																		<dt class="dato">Escuela :</dt>
																		<dd class="dato"><?php echo($user->school); ?></dd>
																		<dt class="dato">Teléfono de Casa :</dt>
																		<dd class="dato"><?php echo($user->home_phone); ?></dd>
																		<dt class="dato">Telefono Celular :</dt>
																		<dd class="dato"><?php echo($user->phone); ?></dd>
																		<dt class="dato">Domicilio :</dt>
																		<dd class="dato"><?php echo($user->address); ?></dd>
																		<dt class="dato">Correo :</dt>
																		<dd class="dato"><?php echo($user->email); ?></dd>

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


											<!--  ACA TERMINA EL MODAL ________________________________________________________ -->

										</div>
										<div class="modal-footer"
											style="padding: 40px; padding-top: 0px; height: 50px;">
											<button type="button" class="btn btn-primary"
												data-dismiss="modal" style="width: 100px;"padd">Salir</button>
										</div>
									</form>
								</div>
							</div>
						</div>


						<td id="celda" style="text-align: center;"><a type="button"
							data-id="{{$user->id}}" class="btn btn-success editar"
							href="{{route('usuarios.edit',$user->id)}}"><i
								class="fa fa-pencil"></i></a></td>


						<td id="celda_derecha" style="text-align: center;">

							<form action="{{ route('usuarios.destroy',$user->id )}}"
								method="POST">

								<input name="_method" type="hidden" value="DELETE"> {{
								csrf_field() }}
								<button type="submit" data-id="{{$user->id}}"
									class="btn btn-danger eliminar">
									<i class="fa fa-trash"></i>
								</button>

							</form>

						</td>





					</tr>
					@endforeach

				</tbody>

			</table>


		</div>

	</div>
</div>
<div class="modal fade" id="miventana" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">&times;</button>
				<h4>Hola este debe ser la primera ventanaz</h4>
			</div>
			<div class="modal-body">
				<p><?php
   
if ($user != null) {
      echo ($user->name);
   }
   ?></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>





@section('script')
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script type="text/javascript">
      $(document).ready(function() {
        $(".editar").on('click',function(event) {
          $id = $(this).data('id')
          $("#div-edit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
          $("#div-edit").load('{{ url("/usuarios/") }}/' + $id + '/edit');
        });
      });
    </script>

@stop


