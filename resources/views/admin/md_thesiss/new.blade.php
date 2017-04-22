 <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nuevo</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->

  <form method="POST" action="{{ url('/admin/thesis') }}">
    {{ csrf_field() }}	  
     <div class="box-body">
     		<!---->
     		<!--***************************** PANEL DE TESIS *************************************-->
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Informacion General</h3>
                </div>
                <div class="panel-body" id="thesisPanel">
                    <div class="form-group">
                        <label for="inputTitle">Titulo</label>
                        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label>Autor</label>
                        <select class="form-control select2" name="autor[]" multiple="multiple" style="width: 100%;" data-placeholder="Autor Principal - Autores Secundarios">
                        @foreach($autores as  $autor)
                          @foreach($autor->categories as $category)
                            @if($category->name == "tesis" || $category->name == "tesina" ){
                              <option value="{{ $autor->id }}">{{$autor->name}}</option>
                            }@endif
                          @endforeach
                        @endforeach
                       
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Editorial</label>
                        <select class="form-control select2" name="editorial[]" multiple="multiple" style="width: 100%;">
                        @foreach($editoriales as  $editorial)
                          @foreach($editorial->categories as $category)
                            @if($category->name == "tesis"||$category->name == "tesina"){
                              <option value="{{ $editorial->id }}">{{$editorial->name}}</option>
                            }@endif
                          @endforeach
                        @endforeach
                        </select>
                    </div>

                   <div class="form-group">
                      <label for="inputClasification">Clasificación</label>
                      <input type="text" class="form-control" name="clasification0" id="inputClasification" placeholder="">
                  </div>

                    
                    <div class="form-group">
                        <label>Asesor</label>
                        <select class="form-control select2" name="autor[]" multiple="multiple" style="width: 100%;">
                        @foreach($autores as  $autor)
                          @foreach($autor->categories as $category)
                            @if($category->name == "asesor"){
                              <option value="{{ $autor->id }}">{{$autor->name}}</option>
                            }@endif
                          @endforeach
                        @endforeach
                       
                        </select>
                    </div>
        
                    

                 <!--     <label>Autor (es)</label>
                   <div class="input-group">
  	                	<span class="input-group-addon">1</span>
  	                	<input type="text" id="inputChapter" name="chapter0" class="form-control">
  	                  	<span id="agregarCapitulo"  class="input-group-addon"><i class="fa fa-plus"></i></span>
	                  </div>-->


                 </div>
            </div>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Descripción Física</h3>
                </div>
                <div class="panel-body" id="thesisPanel">
                    
                    <div class="form-group">
                        <label for="inputEXTENSION">Nº de hojas</label>
                        <input type="text" class="form-control" name="extension" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Extension</label>
                        <input type="text" class="form-control" name="extension" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Dimensiones</label>
                        <input type="text" class="form-control" name="extension" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Detalles Físicos</label>
                        <input type="text" class="form-control" name="extension" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Material Adicional</label>
                        <input type="text" class="form-control" name="extension" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Ubicacion</label>
                        <input type="text" class="form-control" name="extension" id="inputEXTENSION" value="Estante Nº ">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Lugar de sustentacion</label>
                        <input type="text" class="form-control" name="extension" id="inputEXTENSION" value="Facultad de Ingeniería de Sistemas">
                    </div>

                    
                 </div>
            </div>
            <!--**************************************************************************************-->

            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Resumen y Contenido del material</h3>
                </div>
                <div class="panel-body" id="thesisPanel">
                              
                    <div class="form-group">
                        <label for="inputSummary">Resumen</label>
                        <textarea class="form-control" rows="3" name="summary" id="inputSummary" placeholder=""></textarea> 
                    </div>

                    <div class="form-group">
                        <label for="inputSummary">Contenido</label>
                        <textarea class="form-control" rows="3" name="summary" id="inputSummary" placeholder=""></textarea> 
                    </div>  
  
                  
                 </div>
            </div>


 				
 			<!--*************************  PANEL DE ITEM  ********************************************-->
          <div class="panel panel-primary" id="itemPanel">
              <div class="panel-heading">
                  <h3 class="panel-title col-xs-11">Item</h3>
                  <!-- Cambiar por un diseño mas atractivo cuando este funcionando -->
                  <span id="agregarItem" class="fa fa-plus"></span>
              </div>
              <div class="panel-body">
                  
                  <div class="form-group">
                      <label for="inputIncomeNumber">Nº Ingreso</label>
                      <input type="text" class="form-control" name="incomeNumber0" id="inputIncomeNumber" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="inputBarcode">Código de barra</label>
                      <input type="text" class="form-control" name="barcode0" id="inputBarcode" placeholder="" value="2000000">
                  </div>
                  <div class="form-group">
                      <label for="inputCopy">Ejemplar</label>
                      <input type="number" class="form-control" name="copy0" id="inputCopy" placeholder="" value="1">
                  </div>
              </div>
           </div>
           <!--***************************************************************************************-->
     </div>

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Crear</button>
    </div>
  </form>

  </div>


@section('scriptContent')
  <script type="text/javascript">
  $(document).ready(function(){

    var idCont = 1 ; //global
    
    
    // Cuando haga click en agregarContenido
    $('#agregarCapitulo').click(function(){
      // Guardar el panel donde se encuentra la seccion contenido
      var container = $('#thesisPanel');
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
                                '<label for="inputIncomeNumber">Nº Ingreso</label>'+
                                '<input type="text" class="form-control" name="incomeNumber'+idCont+'" id="inputIncomeNumber" placeholder="">'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label for="inputBarcode">Código de barra</label>'+
                              '<input type="text" class="form-control" name="barcode'+idCont+'" id="inputBarcode" placeholder="">'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label for="inputCopy">Ejemplar</label>'+
                                '<input type="number" class="form-control" name="copy'+idCont+'" id="inputCopy" placeholder="" value="idCont">'+
                            '</div>'+
                        '</div>';
      var boxItem = '<div class="box box-primary" id="boxID'+idCont+'">'+ itemBody +'</div>';

      $(container).append(boxItem);
      idCont = idCont + 1 ;
    });
  });
  </script>
@endsection



						