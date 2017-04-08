     <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nuevo</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <form method="POST" action="{{ url('/admin/magazines') }}">
    {{ csrf_field() }}
        <div class="box-body">
<!--***************************************************************************************************************************************
                                          PANEL DE INFORMACION
*******************************************************************************************************************************************
-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informacion</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="inputTitle">Titulo</label>
                        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <select class="form-control" name="author">
                  <!--  Seleccionando la lista de autores que pertenecen a la categoria revista -->
                        @foreach($autores as $autor)
                          @foreach($autor->categories as $category)
                            @if($category->name == "revista"){
                              <option value="{{ $autor->id }}">{{ $autor->name}}</option>
                            }
                            @endif
                          @endforeach
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Editorial</label>
                        <select class="form-control select2" name="editorial[]" multiple="multiple" data-placeholder="Editorial Principal - Editorial Secundaria" style="width: 100%;">
                        @foreach($editoriales as  $editorial)
                          @foreach($editorial->categories as $category)
                            @if($category->name == "revista"){
                              <option value="{{ $editorial->id }}">{{$editorial->name}}</option>
                            }@endif
                          @endforeach
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputISSN">ISSN</label>
                        <input type="text" class="form-control" name="issn" id="inputISSN" placeholder="">
                    </div>

                 </div>
               </div>
<!--***************************************************************************************************************************************
                                                    PANEL DE ITEM
*******************************************************************************************************************************************
-->
<!--
  Los name terminan en 0 para poder tener un control de los inputs a la hora de enviar los datos al store
 -->
          <div class="panel panel-default" id="itemPanel">
              <div class="panel-heading">
                  <h3 class="panel-title col-xs-11">Item</h3>
                  <!-- Cambiar por un diseño mas atractivo cuando este funcionando -->
                  <span id="agregarItem" class="fa fa-plus"></span>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                      <label for="inputClasification">Clasificación</label>
                      <input type="text" class="form-control" name="clasification0" id="inputClasification" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="inputIncomeNumber">Nº Ingreso</label>
                      <input type="text" class="form-control" name="incomeNumber0" id="inputIncomeNumber" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="inputBarcode">Código de barra</label>
                      <input type="text" class="form-control" name="barcode0" id="inputBarcode" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="inputCopy">Ejemplar</label>
                      <input type="number" class="form-control" name="copy0" id="inputCopy" placeholder="">
                  </div>
              </div>
            </div>
<!--***************************************************************************************************************************************
                                            PANEL DE CONTENIDO
*******************************************************************************************************************************************
 -->
            <div class="panel panel-default" id="contentPanel">
              <div class="panel-heading ">
                  <h3 class="panel-title col-xs-11">Contenido</h3>
                  <!-- Cambiar por un diseño mas atractivo cuando este funcionando -->
                  <span id="agregarContenido" class="fa fa-plus"></span>
              </div>

              <div class="panel-body">
                  <div class="form-group">
                    <label for="inputTitleContent">Título</label>
                    <input type="text" class="form-control" name="titleContent0" id="inputTitleContent0" placeholder="">
                  </div>
                  <!--  Por el momento no hay limite de colaboradores-->
                  <div class="form-group">
                    <label>Colaborador</label>
                    <select class="form-control select2" multiple="multiple" name ="collaborator0[]" data-placeholder="Seleccione los colaboradores" style="width: 100%;">
                      @foreach($autores as $autor)
                        @foreach($autor->categories as $category)
                          @if($category->name == "colaborador"){
                            <option value="{{ $autor->id }}">{{ $autor->name}}</option>
                          }
                          @endif
                        @endforeach
                      @endforeach
                    </select>
                  </div>

                </div>
              </div> {{-- end Contenido --}}
            </div> {{-- end box-body --}}

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Crear</button>
    </div>
  </form>
</div>
<!-- /.box -->
<!--***************************************************************************************************************************************
                                            PANEL DE JS
*******************************************************************************************************************************************
 -->

@section('scriptContent')
  <script type="text/javascript">
  $(document).ready(function(){
    var idCont = 1 ; //global
  	// Cuando haga click en agregarContenido
  	$('#agregarContenido').click(function(){
      // Guardar el panel donde se encuentra la seccion contenido
      var container = $('#contentPanel');
      var buttonClose = '<span class="btn " id="eliminarContenido'+idCont+'">'
                          +'<i class="fa fa-times"></i>'+
                        '</span>';
      var groupTitle = '<div class="form-group">'+
                            '<label for="inputTitleContent">Título</label>'+
                            '<input type="text" class="form-control" name="titleContent'+idCont+'" id="inputTitleContent'+idCont+'" placeholder="">'+
                       '</div>';
      var groupCollaborator = '<div class="form-group">'+
                                '<label>Colaborador</label>'+
                                  '<select class="form-control select2" multiple="multiple" name ="collaborator'+idCont+'[]" data-placeholder="Seleccione los colaboradores" style="width: 100%;">'+
                                    '@foreach($autores as $autor)'+
                                      '@foreach($autor->categories as $category)'+
                                        '@if($category->name == "colaborador")'+
                                          '<option value="{!! $autor->id !!}">{{$autor->name}}</option>'+
                                        '@endif '+
                                      '@endforeach '+
                                    '@endforeach '+
                                  '</select>'+
                                '</div>';
      var bodyContent = '<div class="panel-body">'+groupTitle+groupCollaborator+'</div>';
      var boxContent = '<div class="box box-primary" id="boxID'+idCont+'">'+bodyContent +'</div>';

  		$(container).append(boxContent);
      idCont = idCont + 1 ;
      //Inicializar el select2 para mostrar los colaboradores de los nuevos contenidos
      $(".select2").select2();
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
@section('scriptSelect')
  <script type="text/javascript">
    $(function () {
      //Inicializar elmentos select2
      $(".select2").select2();}
    );
    </script>
@endsection
