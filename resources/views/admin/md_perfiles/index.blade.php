@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Perfiles
    <small> -- </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Perfiles</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-5">
      {!! $show !!}
    </div>
    <div id="div-edit" class="col-md-7">
      {!! $edit !!}
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
{!! $delete !!}
@endsection
