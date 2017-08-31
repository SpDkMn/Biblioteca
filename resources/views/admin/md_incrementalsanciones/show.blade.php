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
						<th style="text-align: center;">Orden</th>
						<th style="text-align: center;">Duración</th>
						<th style="text-align: center;">Guardar</th>
					</tr>
				</thead>
				<tbody>
						@foreach($incrementalpenalties as $incrementalpenalty)
							<tr>
						<td id="celda_izquierda" style="text-align: center;">{{ $incrementalpenalty->id }}</td>

						<td style="text-align: center"><input type="text" name="additional_time" value="{{$incrementalpenalty->additional_time}}" class="tableConfig" > </td>

						<td id="celda" style="text-align: center;"><a type="button"
							data-id="{{$incrementalpenalty->id}}" class="btn btn-success editar"
							href="{{route('incrementalsanciones.edit',$incrementalpenalty->id)}}"><i
								class="fa fa-pencil"></i></a></td>


					</tr>
					@endforeach

				</tbody>

			</table>


		</div>

	</div>
</div>