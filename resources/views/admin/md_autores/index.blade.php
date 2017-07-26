@extends('admin.layouts.main') @section('content') @if(count($errors)>0)
<div class="alert alert-danger" role="alert">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{ $error }}</li> @endforeach
	</ul>
</div>
@endif

<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Autores <small> -- </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Autores</li>
	</ol>
</section>

<!-- Main content -->

<section class="content">

	<div class="row">


		<div class="col-md-4">
			{!!$new!!}
			<div id="div-edit" class="col-md-18">{!! $edit !!}</div>
		</div>

		<div class="col-md-8 ">{!! $show !!}</div>


	</div>




	<!-- /.col -->
	<!-- /.row -->
</section>
{!! $delete !!} @endsection
