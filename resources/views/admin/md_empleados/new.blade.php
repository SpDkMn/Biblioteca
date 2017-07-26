<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Nuevo</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<!-- /.box-header -->
	<form method="POST" action="{{ url('/admin/employees') }}">
		{{ csrf_field() }}
		<div class="box-body">
			<div class="form-group">
				<label for="inputNombre">Nombres</label> <input type="text"
					class="form-control" name="name" id="inputNombre" placeholder="">
			</div>
			<div class="form-group">
				<label for="inputApellido">Apellidos</label> <input type="text"
					class="form-control" name="last_name" id="inputApellido"
					placeholder="">
			</div>
			<div class="form-group">
				<label for="inputMail">Correo</label> <input type="email"
					class="form-control" name="email" id="inputMail" placeholder="">
			</div>
			<div class="form-group">
				<label>Perfil</label> <select class="form-control" name="profile">
					@foreach($perfiles as $perfil)
					<option value="{{ $perfil->id }}">{{ $perfil->name}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Crear</button>
		</div>
	</form>
</div>
<!-- /.box -->
