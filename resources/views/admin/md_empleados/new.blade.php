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
				<label for="inputNombre">Codigo de empleado</label> <input type="text"
					class="form-control" name="code" id="inputCode" placeholder="">
			</div>
			<div class="form-group">
				<label>Usuario</label> <select class="form-control select2"
					name="user" id="inputUser"> 
					@foreach($usuarios as $usuario)
					@if($usuario-> id_user_type == 5)
					<option value="{{ $usuario->id }}">{{$usuario->name}}</option>
					@endif
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Perfil</label> <select class="form-control select2" name="profile">
					@foreach($perfiles as $perfil)
					<option value="{{ $perfil->id }}">{{ $perfil->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="inputPassword">Contraseña</label> <input type="password"
					class="form-control" name="password" id="inputPassword" placeholder="">
			</div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Crear</button>
		</div>
	</form>
</div>

<script>
    $(function() {
      //Initialize Select2 Elements
    $(".select2").select2();
    });
</script>
<!-- /.box -->
