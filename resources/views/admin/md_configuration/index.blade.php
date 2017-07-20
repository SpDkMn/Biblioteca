@extends('admin.layouts.main')

@section('content')

<section class="content-header">
  <h1>Configuraciones</h1>

  <div class="row">
    <div class="col-lg-12">
      {!! $showActivar !!}
    </div>
  </div>

  <div class="row"  >
    <div class="col-md-6">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Prestamos</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!! $showPrestamo !!}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-md-6">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Reserva</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!! $showReserva !!}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Feriados</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          {!! $showFeriado !!}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>




    </div>
  </div>



</section>

@endsection