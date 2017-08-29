@extends('admin.layouts.main')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
		Prestamos <small> -- </small>
	</h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li class="active">Prestamos</li>
  </ol>
</section>
<!-- Main content -->

<?php
function obtenerTipoItem($type){
  switch ($type) {case 1 : $tipo = "Libro"; break;case 2 : $tipo = "Tesis/Tesina"; break;case 3 :$tipo = "Revista";break;} return $tipo ;
}
function obtenerEstado($state){
  switch ($state) {case 0 : $estado = "En espera"; break;case 1 : $estado = "Aceptado"; break;case 2 :$estado = "Rechazado";break;case 3 :$estado = "Entregado";break;} return $estado;
}
  function obtenerItem($pedido){
    if($pedido->typeItem==2){ return $item=App\Thesis::find($pedido->id_item); }

    if($pedido->typeItem==1){ return $item=App\Book::find($pedido->id_item); }

    if($pedido->typeItem==3){ return $item=App\Magazine::find($pedido->id_item); }

    if($pedido->typeItem==4){ return $item=App\Compendium::find($pedido->id_item); }
  }
?>
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
