@extends('admin.layouts.main') @section('content')

<section class="content-header">
	<h1>
		 Sanciones incrementales <small> -- </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Sanciones incrementales</li>
	</ol>
</section>

<!--Contenido Principal -->
<!--
	LOS ID SON UNICOS NO PUEDEN REPETIRSE , SI ESOS DIV-CONTENT NO SE CAMBIAN SERÁN ELIMINADOS

-->


<section class="content">

	<div class="row">

		<div class="col-md-12 " id="div-content">

			<div class="col-md-7 " id="div-content">{!! $show !!}</div>

			<div class="col-md-5" id="div-content">

				<div class="col-md-12" id="div-content">{!! $new !!}</div>
				<div class="col-md-12" id="div-edit">{!! $edit !!}</div>

			</div>
		</div>


	</div>





</section>

@stop
