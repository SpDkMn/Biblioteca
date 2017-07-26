@extends('admin.layouts.main') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Editoriales <small> -- </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Editoriales</li>
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
