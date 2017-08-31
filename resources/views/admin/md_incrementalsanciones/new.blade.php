<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Titulo</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>

	<div class="box-body">

		<form class="form-horizontal" role="form" method="POST"
			action="{{ url('/admin/incrementalsanciones') }}" enctype="multipart/form-data"
			files="true" name="formulario_ingreso_incrementalsancion"
			id="formulario_ingreso_incrementalsancion">
			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">


			<div class="form-group">
				<label for="order" class="control-label col-md-2">Orden:</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="order"
						placeholder="Orden" name="order" required>
				</div>
			</div>

			<div class="form-group">
				<label for="additional_time" class="control-label col-md-2">Duración:(Días)</label>
				<div class="col-md-9">
					<input type="text" class="form-control" id="additional_time" placeholder="Tiempo de Sancion (en dias)"
						name="additional_time">
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

	</div>
</div>