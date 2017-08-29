@extends('admin.layouts.main')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Prestamos</li>
  </ol>
</section>

<!-- Main content -->

<section class="content">

  <div class="row">
        <div class="col-md-12 ">
          <div id="print"></div>
          {!! $showPedidos !!}
        </div>
        <div class="col-md-12 ">
          {!! $showPrestamo !!}
        </div>
        <div class="col-md-12 ">
          {!! $showHistorial !!}
        </div>
        <div class="col-md-12 ">
          {!! $showSeleccion !!}
        </div>

  </div>

</section>


@endsection
