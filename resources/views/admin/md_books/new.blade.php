<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nuevo</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  
  <div class="box-body">
    
    <div class="col-md-6">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Libro</h3>
          <div class="box-tools pull-right"> 
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div> 
        </div>
          <div class="box-body">
          
            <div class="bs-example" data-example-id="simple-nav-tabs"> 
              <ul class="nav nav-tabs">
                <li class="active"><a href="#primero" data-toggle="tab">Primero</a></li>
                <li><a href="#segundo" data-toggle="tab">Segundo</a></li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane active" id="primero">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Titulo</label>
                      <input type="text" name="title" class="form-control" id="title">
                      <br><label>Resto de Titulo</label>
                      <input type="text" name="secondaryTtle" class="form-control" id="secondaryTitle">
                      <br><label>Clasificacion</label>
                      <input type="text" name="clasification" class="form-control" id="clasification">
                      <br>
                      <label>Autor</label>
                      <p>
                        &nbsp&nbsp&nbsp&nbspPrincipal<?php   for($i=0;$i<20;$i++){echo "&nbsp";}?>:&nbsp<input type="text" name="">
                      </p>
                      <p>
                        &nbsp&nbsp&nbsp&nbspSecundario<?php   for($i=0;$i<15;$i++){echo "&nbsp";}?>:&nbsp<input type="text" name="">
                      </p>
                      <br>
                      <label>Editorial</label>
                      <p>
                        &nbsp&nbsp&nbsp&nbspPrincipal<?php   for($i=0;$i<20;$i++){echo "&nbsp";}?>:&nbsp<input type="text" name="">
                      </p>
                      <p>
                        &nbsp&nbsp&nbsp&nbspAnexo<?php   for($i=0;$i<25;$i++){echo "&nbsp";}?>:&nbsp<input type="text" name="">
                      </p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="segundo">
                  <div class="form-group">
                    <br><label>Resumen</label>
                    <textarea class="form-control" rows="3" name="summary" id="inputSummary" placeholder=""></textarea> 
                    <br><label>Contenido</label>
                    <input type="text" name="" class="form-control">
                    <br><label>Descripcion Fisica</label>
                    <br>
                    
                    <div class="row">
                      <div class="col-md-4">
                        <div id="example1_filter" class="dataTables_filter">
                          <label>Extension:<input type="text" class="form-control input-sm" placeholder="" aria-controls="example1" size="6"></label>
                        </div>
                      </div> 
                      <div class="col-md-8"> 
                      </div>
                      <div class="col-md-4">
                        <div id="example1_filter" class="dataTables_filter">
                          <label>Otros detalles fisicos:<input type="text" class="form-control input-sm" placeholder="" aria-controls="example1" size="6"></label>
                        </div>
                      </div> 
                      <div class="col-md-8"></div>
                    </div>
                      

                      <br><div class="col-md-4">
                        <div id="example1_filter" class="dataTables_filter">
                          <label>Dimensiones:<input type="text" class="form-control input-sm" placeholder="" aria-controls="example1" size="6"></label>
                        </div>
                      </div> 

                      <br><div class="col-md-4">
                        <div id="example1_filter" class="dataTables_filter">
                          <label>Material de acompañamiento:<input type="text" class="form-control input-sm" placeholder="" aria-controls="example1" size="6"></label>
                        </div>
                      </div> 
                    
                    <br>
                    </div>
                    <div class="col-md-4">
                      <div id="example1_filter" class="dataTables_filter">
                        <label>Extension:<input type="search" class="form-control" placeholder="" aria-controls="example1"></label>
                      </div>
                    </div>  

                    <br>
                    <br>
                  
                  </div>                  
                </div>
              </div> 

            </div>

            

          </div>
      </div> 
    </div>

    <div class="col-md-6">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Item</h3>
          <div class="box-tools pull-right"> 
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div> 
        </div>
          <div class="box-body">
          
            <div class="container" role="tabpanel">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#primero" data-toggle="tab">Primero</a></li>
                <li><a href="#segundo" data-toggle="tab">Segundo</a></li>
              </ul>
            
              <div class="tab-content">
                <div class="tab-pane active" id="primero">
                  <div class="box-body">
                    <div class="form-group">
                      <label>Titulo</label>
                      <input type="text" name="title" class="form-control" id="title">
                      <label>Resto de Titulo</label>
                      <input type="text" name="secondaryTtle" class="form-control" id="secondaryTitle">
                      <label>Clasificacion</label>
                      <input type="text" name="clasification" class="form-control" id="clasification">
                      <label>Autor</label>
                      <p>
                        Principal<input type="text" name="">
                      </p>
                      <p>
                        Secundario<input type="text" name="">
                      </p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="segundo">bbbbbbbb</div>
              </div> 
            </div>
          
          </div>
      </div> 
    </div>


  </div>
</div>


@section('scriptContent')
  <script type="text/javascript">
  $(document).ready(function(){

    var idCont = 1 ; //global
    
    
    // Cuando haga click en agregarContenido
    $('#agregarCapitulo').click(function(){
      // Guardar el panel donde se encuentra la seccion contenido
      var container = $('#bookPanel');
      var cont = idCont+1;
      var ChapterBody = '<div class="input-group">'+
      						'<span class="input-group-addon">'+cont+'</span>'+
      						'<input type="text" id="inputChapter" name="chapter'+idCont+'" class="form-control">'+
      						'<span class="input-group-addon"><i class="fa fa-remove"></i></span>'+
	                 	'</div>';
    	


      $(container).append(ChapterBody);
      idCont = idCont + 1 ;


    });
  });
  </script>
@endsection



@section('scriptItem')
  <script type="text/javascript">
  $(document).ready(function(){
    var idCont = 1 ; //global
    // Cuando haga click en agregarContenido
    $('#agregarItem').click(function(){

      // Guardar el panel donde se encuentra la seccion contenido
      var container = $('#itemPanel');
      var buttonClose = '<span class="btn " id="eliminarContenido'+idCont+'">'
                          +'<i class="fa fa-times"></i>'+
                        '</span>';
      var itemBody = '<div class="panel-body">'+
                            '<div class="form-group">'+
                                '<label for="inputClasification">Clasificación</label>'+
                                '<input type="text" class="form-control" name="clasification'+idCont+'" id="inputClasification" placeholder="">'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label for="inputIncomeNumber">Nº Ingreso</label>'+
                                '<input type="text" class="form-control" name="incomeNumber'+idCont+'" id="inputIncomeNumber" placeholder="">'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label for="inputBarcode">Código de barra</label>'+
                              '<input type="text" class="form-control" name="barcode'+idCont+'" id="inputBarcode" placeholder="">'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label for="inputCopy">Ejemplar</label>'+
                                '<input type="number" class="form-control" name="copy'+idCont+'" id="inputCopy" placeholder="">'+
                            '</div>'+
                        '</div>';
      var boxItem = '<div class="box box-primary" id="boxID'+idCont+'">'+ itemBody +'</div>';

      $(container).append(boxItem);
      idCont = idCont + 1 ;
    });
  });
  </script>
@endsection



						