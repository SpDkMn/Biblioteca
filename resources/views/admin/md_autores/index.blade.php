@extends('admin.layouts.main')

@section('content')
<section class="content-header">
  <h1>
    Autores
    <small> -- </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Autores</li>
  </ol>
</section>  
<!-- TABLA MOSTRANDO LOS NOMBRES Y CATEGORIAS DE TODOS LOS AUTORES. -->
<section class="content">
  <div class="row">
     <div class="col-md-5">
         {!!$new!!}
         {!! $edit!!}
     </div>
     <div class="col-md-7">
         {!! $show !!}
     </div>          
  </div>
  
</section>
{!! $delete !!}
@endsection
