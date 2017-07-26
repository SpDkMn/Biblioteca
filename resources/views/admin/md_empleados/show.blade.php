<div class="box box-warning">
	<div class="box-header with-border">
		<h3 class="box-title"></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table class="table table-bordered table-hover">
			<tr>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Correo</th>
				<th>Perfil</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
			@foreach($empleados as $empleado)
			<tr>
				<td>{{$empleado->user->name}}</td>
				<td>{{$empleado->user->last_name}}</td>
				<td>{{$empleado->user->email}}</td>
				<td>{{$empleado->profile->name}}</td>
				<td><button type="button" data-id="{{$empleado->id}}"
						class="btn btn-success editar" @if(!$editar) disabled @endif>
						<i class="fa fa-pencil"></i>
					</button></td>
				<td><button type="button" data-id="{{$empleado->id}}"
						data-name="{{$empleado->user->name}}"
						class="btn btn-danger eliminar" data-toggle="modal"
						data-target="#deleted" @if(!$eliminar) disabled @endif>
						<i class="fa fa-trash"></i>
					</button></td>
			</tr>

			@endforeach
		</table>
	</div>
	<!-- ./box-body -->
</div>
<!-- /.box -->

@section('script')
<script type="text/javascript">
      $(document).ready(function() {
        @if($editar)
        $(".editar").on('click',function(event) {
          $id = $(this).data('id') 
          $("#div-edit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse">khggjfjgj<i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
          $("#div-edit").load('{{ url("/admin/employees/") }}/' + $id + '/edit');
        });
        @endif
        @if($eliminar)
        $(".eliminar").on('click',function(event) {
          $username = $(this).data('name')
          $('.modal-body').html('<p>¿Esta seguro que quiere eliminar el empleado ' + $username +'?</p>');
          $('#confirmaDelete').data('id',$(this).data('id'));
        });

        $("#confirmaDelete").on('click',function(event){
          $id = $('#confirmaDelete').data('id')
          $.ajax({
            url: '{{ url("/admin/employees") }}/'+$id,
            type: 'DELETE',
            data: {'_token': '{{csrf_token()}}'},
            success: function(result) {
              location.reload();
            }
          })
        })
        @endif
      });
    </script>
@endsection
