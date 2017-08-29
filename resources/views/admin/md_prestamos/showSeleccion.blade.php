<div class="box box-warning">
  <div class="box-header with-border">
  <h2 class="all-tittles"><i class="fa fa-th-large"></i> Total de Prestamos del mes de Septiembre </h2>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
    <?php $tipo_tesis=$tipo_libros=$tipo_revistas=$tipo_compendios=0; ?>
    @if($pedidos!=null)
     @foreach($pedidos as $pedido)
        @if($pedido->state == 1 || $pedido->state == 3)
            <?php
              if($pedido->typeItem==2) $tipo_tesis++;

              if($pedido->typeItem==1) $tipo_libros++;

              if($pedido->typeItem==3) $tipo_revistas++;

              if($pedido->typeItem==4) $tipo_compendios++;
            ?>
        @endif
      @endforeach
    @endif
    <section class="content">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green">
            <i class="fa fa-book"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Libro</span>
            <span class="info-box-number">{{$tipo_libros}}</span>
          </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green">
            <i class="fa fa-book"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Tesis/Tesinas</span>
            <span class="info-box-number">{{$tipo_tesis}}</span>
          </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green">
            <i class="fa fa-book"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Revistas</span>
            <span class="info-box-number">{{$tipo_revistas}}</span>
          </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green">
            <i class="fa fa-book"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Compendios</span>
            <span class="info-box-number">{{$tipo_compendios}}</span>
          </div>
          </div>
        </div>

        <!-- <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$tipo_libros}}</h3>
              <p>Libros</p>

            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">
              Más información
              <i class="fa fa-arrow-circle-right">

              </i>
            </a>

        </div>
      </div> -->
    </section>
  </div>
