<div class="box box-success"> 
	<div class="box-header with-border">
		<h3 class="box-title">Editar</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<!-- /.box-header -->
	<form role="form" method="POST"
		action="{{ url('/admin/employees') }}/{{$empleado->id}}">
		<input type="hidden" name="_method" value="put" /> {{ csrf_field() }}
		<div class="box-body">
			<div class="form-group">
				<label for="inputCode">Codigo de empleado</label> 
				<input type="text" class="form-control" name="code" id="inputCode" value="{{$empleado->code}}">
			</div>
			<div class="form-group">
				<label>Usuario</label> <select class="form-control select2"
					name="user" id="inputUser2"  disabled>
					<option value="{{$usuario->id}}">{{$usuario->name}}</option>
				</select>
			</div>
			<div class="form-group">
				<label>Perfil</label> <select class="form-control select2" name="profile">
					@foreach($perfiles as $perfil)
					<option value="{{ $perfil->id }}" @if($perfil->name ==
						$empleado->profile->name) selected @endif>{{ $perfil->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="inputPassword">Contraseña nueva</label> <input type="password"
					class="form-control" name="password" id="inputPassword" placeholder="">
			</div>
		</div> 
		<!-- /.box-body -->
		<div class="box-footer">
			<button type="submit" class="btn btn-success" onclick="editar()">Guardar</button>
		</div>
	</form>
</div>
<!-- /.box -->
<script>
    $(function() {
      //Initialize Select2 Elements
    $(".select2").select2();
    });
</script>
<script type="text/javascript">
	function editar(){
		var usuario = document.getElementById("inputUser2");
		usuario.disabled = false;
	}
</script>
