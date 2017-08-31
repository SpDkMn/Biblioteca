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


		@if($typepenalty!=null)
		<form class="form-horizontal" role="form" method="POST"
			action="{{ url('/admin/tiposanciones') }}/{{$typepenalty->id}}">
			<input type="hidden" name="_method" value="put" />
    {{ csrf_field() }}

			<div class="form-group">
				<label for="symbol" class="control-label col-md-2">Simbolo:</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="symbol"
						placeholder="Simbolo" name="symbol" value="{{ $typepenalty->symbol }}" required>
				</div>
			</div>

			<div class="form-group">
				<label for="cause" class="control-label col-md-2">Causa:</label>
				<div class="col-md-10 ">
				<textarea  name="cause" rows="5" cols="64" >{{ $typepenalty->cause }}</textarea>
				</div>
			</div>

			<!--<div class="form-group">
				<label for="penalty_time" class="control-label col-md-2" >Duración:(Días)</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="penalty_time" name="penalty_time" value="{{ $typepenalty->penalty_time }}">
				</div>
			</div> -->


			<div class="form-group">
				<div class="col-md-1 col-md-offset-5">
					<button class="btn btn-primary" style="margin-left: 18px;">
						<i class="fa fa-envelope-o"></i>Editar
					</button>
				</div>
			</div>

		</form>
		@else
		<p>Sin Seleccionar</p>
		@endif


	</div>
</div>