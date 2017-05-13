@extends('admin.layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tesis y Tesinas
    <small> -- </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Tesis</li>
  </ol>
</section>  

<!-- Main content -->

<section class="content">

  <div class="row">
     
        <div class="col-md-12 " id="div-content">
          {!! $show !!}
        </div> 
        <div class="col-md-6" id="div-content">
          {!! $new !!}
        </div>  
        <div id="divEdit" class="col-md-6">
          {!! $edit !!}
        </div>      

      
  </div>
  
</section>

{!! $delete !!}

@endsection
