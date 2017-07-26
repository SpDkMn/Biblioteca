<div class="box box-primary">
	<div class="box-header with-border ">
		<h3 class="box-title">Titulo</h3>

		<div class="box-tools pull-right ">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>

	<div class="box-body">


		@if($user!=null)
		<form class="form-horizontal" role="form" method="POST"
			action="{{ url('/admin/usuarios') }}/{{$user->id}}">
			<input type="hidden" name="_method" value="put" /> {{ csrf_field() }}



			<div class="form-group">
				<label for="tipo_academico" class="control-label col-md-2">Tipo
					Academico:</label>
				<div class="col-md-9">
					<select name="tipo_academico" id="tipo_academico"
						class="form-control">
                                <?php
                              if ($user->id_user_type == 1) {
                                 echo ("<option value='Pregrado' selected>Pregrado</option>");
                                 echo ("<option value='Postgrado'>Postgrado</option>");
                                 echo ("<option value='Profesor'>Profesor</option>");
                                 echo ("<option value='Externo'>Externo</option>");
                                 echo ("<option value='Administrativo'>Administrativo</option>");
                                 echo ("<option value='Admin'>Admin</option>");
                              } else if ($user->id_user_type == 2) {
                                 echo ("<option value='Pregrado'>Pregrado</option>");
                                 echo ("<option value='Postgrado' selected>Postgrado</option>");
                                 echo ("<option value='Profesor'>Profesor</option>");
                                 echo ("<option value='Externo'>Externo</option>");
                                 echo ("<option value='Administrativo'>Administrativo</option>");
                                 echo ("<option value='Admin'>Admin</option>");
                              } else if ($user->id_user_type == 3) {
                                 echo ("<option value='Pregrado'>Pregrado</option>");
                                 echo ("<option value='Postgrado'>Postgrado</option>");
                                 echo ("<option value='Profesor' selected>Profesor</option>");
                                 echo ("<option value='Externo'>Externo</option>");
                                 echo ("<option value='Administrativo'>Administrativo</option>");
                                 echo ("<option value='Admin'>Admin</option>");
                              } else if ($user->id_user_type == 4) {
                                 echo ("<option value='Pregrado'>Pregrado</option>");
                                 echo ("<option value='Postgrado'>Postgrado</option>");
                                 echo ("<option value='Profesor'>Profesor</option>");
                                 echo ("<option value='Externo'selected>Externo</option>");
                                 echo ("<option value='Administrativo'>Administrativo</option>");
                                 echo ("<option value='Admin'>Admin</option>");
                              } else if ($user->id_user_type == 5) {
                                 echo ("<option value='Pregrado'>Pregrado</option>");
                                 echo ("<option value='Postgrado'>Postgrado</option>");
                                 echo ("<option value='Profesor'>Profesor</option>");
                                 echo ("<option value='Externo'>Externo</option>");
                                 echo ("<option value='Administrativo' selected>Administrativo</option>");
                                 echo ("<option value='Admin'>Admin</option>");
                              } else {
                                 echo ("<option value='Pregrado'>Pregrado</option>");
                                 echo ("<option value='Postgrado'>Postgrado</option>");
                                 echo ("<option value='Profesor'>Profesor</option>");
                                 echo ("<option value='Externo'>Externo</option>");
                                 echo ("<option value='Administrativo'>Administrativo</option>");
                                 echo ("<option value='Admin' selected>Admin</option>");
                              }
                              ?>
                              </select>
				</div>
			</div>

			<div class="form-group">
				<label for="name" class="control-label col-md-2">Nombre:</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="name"
						placeholder="Nombre" name="name" value="{{ $user->name }}">
				</div>
			</div>

			<div class="form-group">
				<label for="last_name" class="control-label col-md-2">Apellidos:</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="last_name"
						placeholder="Apellidos" name="last_name"
						value="{{ $user->last_name }}">
				</div>
			</div>

			<div class="form-group">
				<label for="code" class="control-label col-md-2">Codigo:</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="code"
						placeholder="Codigo" name="code" value="{{ $user->code }}">
				</div>
			</div>

			<div class="form-group" id="cuadro_dni">
				<label for="dni" class="control-label col-md-2">DNI:</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="dni" placeholder="DNI"
						name="dni" value="{{ $user->dni }}">
				</div>
			</div>

			<div class="form-group" id="cuadro_telefono">
				<label for="home_phone" class="control-label col-md-2">Telefono:</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="home_phone"
						placeholder="Telefono" name="home_phone"
						value="{{ $user->home_phone }}">
				</div>
			</div>

			<div class="form-group" id="cuadro_celular">
				<label for="phone" class="control-label col-md-2">Celular:</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="phone"
						placeholder="Telefono" name="phone" value="{{ $user->phone }}">
				</div>
			</div>

			<div class="form-group" id="cuadro_correo">
				<label for="email" class="control-label col-md-2">Correo:</label>
				<div class="col-md-9">
					<input type="email" class="form-control" id="email"
						placeholder="Correo" name="email" value="{{ $user->email }}">
				</div>
			</div>

			<div class="form-group" id="cuadro_direccion">
				<label for="address" class="control-label col-md-2">Direccion:</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="address"
						placeholder="Direccion" name="address"
						value="{{ $user->address }}">
				</div>
			</div>



			<div class="form-group" id="cuadro_escuela">
				<label for="school" class="control-label col-md-2">Escuela:</label>
				<div class="col-md-9">
					<select name="school" id="school" class="form-control">
						<option value="Sistemas"
							<?php  if($user->school=="Sistemas"){echo("selected");} ?>>Sistemas</option>
						<option value="Software"
							<?php  if($user->school=="Software"){echo("selected");} ?>>Software</option>
					</select>
				</div>
			</div>

			<div class="form-group" id="cuadro_facultad">
				<label for="faculty" class="control-label col-md-2">Facultad:</label>
				<div class="col-md-9">
					<select name="faculty" id="faculty" class="form-control">
						<option value="Ingenieria de Sistemas e Informatica"
							<?php  if($user->faculty=="Ingenieria de Sistemas e Informatica"){echo("selected");} ?>>Facultad
							de Ingeniería de Sistemas e Informática</option>
						<option value="Ciencias Sociales"
							<?php  if($user->faculty=="Ciencias Sociales"){echo("selected");} ?>>Facultad
							de Ciencias Sociales</option>
						<option value="Derecho"
							<?php  if($user->faculty=="Derecho"){echo("selected");} ?>>Facultad
							de Derecho</option>
						<option value="Ingenieria de Minas"
							<?php  if($user->faculty=="Ingenieria de Minas"){echo("selected");} ?>>Facultad
							de Ingenieria de Minas</option>
					</select>
				</div>
			</div>

			<div class="form-group " id="cuadro_universidad">
				<label for="university" class="control-label col-md-2">Universidad:</label>
				<div class="col-md-9">
					<select name="university" id="university" class="form-control">
						<option value="Universidad Nacional Mayor de San Marcos"
							<?php  if($user->university=="Universidad Nacional Mayor de San Marcos"){echo("selected");} ?>>Universidad
							Nacional Mayor de San Marcos</option>
						<option value="Universidad Nacional de Ingeniería"
							<?php  if($user->university=="Universidad Nacional de Ingeniería"){echo("selected");} ?>>Universidad
							Nacional de Ingeniería</option>
					</select>
				</div>
			</div>



			<div class="form-group">
				<div class="col-md-1 col-md-offset-4">
					<button class="btn btn-primary">
						<i class="fa fa-envelope-o"></i>Enviar
					</button>
				</div>
				<div class="col-md-1 col-md-offset-1">
					<button type="reset" name="resetButton" class="btn btn-danger">
						<i class="fa fa-pencil"></i>Reiniciar
					</button>
				</div>
			</div>

		</form>
		@else
		<p>Sin Seleccionar</p>
		@endif


	</div>
</div>
