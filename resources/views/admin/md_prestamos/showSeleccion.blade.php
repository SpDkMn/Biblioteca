<div class="box box-warning">
  


  <div class="box-header with-border">
  <h2 class="all-tittles"><i class="fa fa-th-large"></i> Total de Prestamos del mes de </h2>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
    <?php $tipo_tesis=$tipo_libros=$tipo_revistas=$tipo_compendios=0; ?>
     @foreach($pedidos as $pedido)
        @if($pedido->state == 1)
            <?php 
              if($pedido->typeItem=="tesis" || $pedido->typeItem=="tesina") $tipo_tesis++; 

              if($pedido->typeItem=="libro") $tipo_libros++; 

              if($pedido->typeItem=="revista") $tipo_revistas++;

              if($pedido->typeItem=="compendio") $tipo_compendios++;
            ?>
        @endif
    @endforeach

    <div class="">  

        <section class="full-reset text-center" style="padding:2px 0;">
            
       <!--     <article class="tile">
                <div class="tile-icon full-reset"><i class="glyphicon glyphicon-book"></i></div>
                <div class="tile-name all-tittles">General</div>
                <div class="tile-num full-reset">77</div>
            </article>-->
            
            <article class="tile">
                <div class="tile-icon full-reset"><i class="fa fa-book"></i></div>
                <div class="tile-name all-tittles">Libros</div>
                <div class="tile-num full-reset">{{$tipo_libros}}</div>
            </article>

            <article class="tile">
                <div class="tile-icon full-reset"><i class="fa fa-graduation-cap"></i></div>
                <div class="tile-name all-tittles">Tesis</div>
                <div class="tile-num full-reset">{{$tipo_tesis}}</div>
            </article>
            
            <article class="tile">
                <div class="tile-icon full-reset"><i class="fa fa-bookmark"></i></div>
                <div class="tile-name all-tittles">Revistas</div>
                <div class="tile-num full-reset">{{$tipo_revistas}}</div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><i class="glyphicon glyphicon-book"></i></div>
                <div class="tile-name all-tittles">Compendios</div>
                <div class="tile-num full-reset">{{$tipo_compendios}}</div>
            </article>
           
        </section>

 </div>

</div>
