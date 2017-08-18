@extends('user.layouts.main')
 @section('content')
 <section class="content-header">
	<h1>
		Busqueda <small> -- </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
		<li class="active">Busqueda</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			{!!$search!!}
		</div>
	</div>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-12">

		</div>
	</div>
</section>
@endsection
