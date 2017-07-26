@extends('admin.layouts.main') @section('content')
<!-- Content Header (Page header) -->

<div class="arial">
	<section class="content-header">
		<h1>
			Configuraciones <small> -- </small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
			<li class="active">Configuraciones</li>
		</ol>
	</section>

	<!-- Main content -->

	<section class="content">

		<div class="row">
			<div class="col-md-12 " id="div-content">{!!$showTipoUsuario!!}</div>
		</div>
		<div class="row">
			<div class="col-md-6" id="div-new">{!!$showFeriado!!}</div>
			<div class="col-md-6" id="div-new">
				<h1>Mensaje2</h1>
			</div>

		</div>




		<!-- /.col -->
		<!-- /.row -->
	</section>
</div>
@endsection
