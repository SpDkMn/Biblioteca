@extends('admin.layouts.main') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Empleados <small> -- </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Empleados</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">{!! $show !!}</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-md-6">{!! $new !!}</div>
		<!-- /.col -->

		<div id="div-edit" class="col-md-6">{!! $edit !!}</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>
{!! $delete !!}
<!-- /.content -->
@endsection
