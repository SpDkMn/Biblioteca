<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Titulo</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<div class="box-body" style="padding-left: 60px; margin-right: 0px;">

		<div>

			<table id="example1" class="table table-bordered table-hover" >
				<thead>
					<tr>
						<th style="text-align: center;">ID</th>
						<th style="text-align: center;">Nombre</th>
						<th style="text-align: center;">Causa</th>
						<th style="text-align: center;">Visualizar</th>
						<th style="text-align: center;">Editar</th>
						<th style="text-align: center;">Eliminar</th>
					</tr>
				</thead>
				<tbody>
				@foreach($typepenalties as $typepenalty)
						<tr>
<<<<<<< HEAD
=======

>>>>>>> 908a9996a750eac8f38d8d378f6ea11ab51be15d
						<td id="celda_izquierda" style="text-align: center;">{{ $typepenalty->id }}</td>

						<td class="celda" style="text-align: center;">{{ $typepenalty->symbol }}</td>

						<td class="celda" style="text-align: center;">{{ $typepenalty->cause }}</td>

						<td class="celda"><center>
								<button id="show" type="button" class="btn btn-primary"
									data-toggle="modal"
									data-id="{{$typepenalty->id}}"
									data-target="#ModalCopy">
									<i class="fa fa-eye"></i>
								</button>
							</center></td>
						<td class="celda" style="text-align: center;"><a type="button"
							data-id="{{$typepenalty->id}}" class="btn btn-success editar"
							href="{{route('tiposanciones.edit',$typepenalty->id)}}"><i
								class="fa fa-pencil"></i></a></td>


						<td class="celda_derecha" style="text-align: center;">

							<form action="{{ route('tiposanciones.destroy',$typepenalty->id )}}"
								method="POST">

								<input name="_method" type="hidden" value="DELETE"> {{csrf_field() }}
								<button type="submit" data-id="{{$typepenalty->id}}"
									class="btn btn-danger eliminar">
									<i class="fa fa-trash"></i>
								</button>

							</form>

						</td>
<<<<<<< HEAD
	</tr>
=======





					</tr>
>>>>>>> 908a9996a750eac8f38d8d378f6ea11ab51be15d
					@endforeach

				</tbody>

			</table>
<!-- ___________________________________________________________________________________________________________________________  -->
			<div class="modal  fade" id="ModalCopy" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel" >
				<div style="width: 38%;" class="modal-dialog" role="document" >
					<div class="modal-content" style="background-color: red; padding-left: 0px;" >


							<div class="modal-body" id="body-modal-show" style="height: auto;  margin-left: 0px; padding:0px; background-color: red;">

								<!--  ACA COMIENZA EL MODAL ________________________________________________________ -->

								<!--  ACA TERMINA EL MODAL ________________________________________________________ -->

							</div>

					</div>
				</div>
			</div>
<!-- ___________________________________________________________________________________________________________________________  -->
		</div>

	</div>
</div>



<script type="text/javascript">
      $(document).ready(function() {
        $(".editar").on('click',function(event) {
          $id = $(this).data('id')
          $("#div-edit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
          $("#div-edit").load('{{ url("/tiposanciones/") }}/' + $id + '/edit');
        });
        $('#example1').on('click','#show',function(){
        	$('#body-modal-show').append(
        	'<div class="box-body" id="cuadro_ingresar_sancion" style="background-color: #17C43B; margin-left: 0px;padding: 0px; "><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
<<<<<<< HEAD
        	$( "#body-modal-show" ).load( "{{url('/admin/tiposanciones/')}}/"+$(this).data('id')+"/modal" );
=======

        	$( "#body-modal-show" ).load( "{{url('/admin/tiposanciones/')}}/"+$(this).data('id')+"/modal" );

>>>>>>> 908a9996a750eac8f38d8d378f6ea11ab51be15d
        })
      });
    </script>
