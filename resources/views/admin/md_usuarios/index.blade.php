@extends('admin.layouts.main') @section('content')
<!-- Content Header (Page header) -->



<section class="content-header">
	<h1>
		Usuarios <small> -- </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Usuarios</li>
	</ol>
</section>

<!-- Main content -->

<section class="content">

	<div class="row">

		<div class="col-md-12 " id="div-content">

			<div class="col-md-12 " id="div-content">{!! $show !!}</div>

			<div class="col-md-6" id="div-content">{!! $new !!}</div>
			<div class="col-md-6" id="div-edit">{!! $edit !!}</div>
		</div>


	</div>




	<!-- /.col -->
	<!-- /.row -->
</section>

@stop
