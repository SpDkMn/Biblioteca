@extends('admin.layouts.main') @section('content')

<section class="content-header">
	<h1>
		Sanciones <small> -- </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Sanciones</li>
	</ol>
</section>

<!--Contenido Principal -->

<section class="content">

	<div class="row">

		<div class="col-md-12 " id="div-content">

			<div class="col-md-12 " id="div-content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Sanciones</h3>

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
										<th style="text-align: center;">Codigo</th>
										<th style="text-align: center;">Tipo de usuario</th>
										<th style="text-align: center;">Estado</th>
										<th style="text-align: center;">Visualizar</th>
									</tr>
								</thead>
								<tbody>
									@foreach($users as $user)
										<tr>
											<th style="text-align: center;">{{$user->code}}</th>
											<th style="text-align: center;">{{$user->user_type->name}}</th>
											<th></th>
											<th style="text-align: center;"><a class="btn btn-primary"  href=" {{url('/admin/sanciones/'.$user->id.'/visualizacion')}} "><i class="fa fa-eye"></i></a></th>
										</tr>

									@endforeach

								</tbody>

							</table>
						</div>

					</div>
				</div>
			</div>

		</div>


	</div>




	
</section>

@stop
