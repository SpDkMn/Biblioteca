<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-book"></i>
    <h3 class="box-title">Nuevo</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <form method="POST" action="{{ url('/admin/magazines') }}">
    {{ csrf_field() }}
        <div class="box-body">
    <!--***************************************************************************************************************************************
                                              PANEL DE INFORMACION
    *******************************************************************************************************************************************
    -->
            <div class="box box-success box-solid ">
                <div class="box-header">
                    <h3 class="panel-title">Informacion</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputTitle">Titulo</label>
                        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <select class="form-control select2" name="author">
                          <!--  Seleccionando la lista de autores que pertenecen a la categoria revista -->
                          @foreach($autores as $autor)
                            @foreach($autor->categories as $category)
                              @if($category->name == "revista")
                                <option value="{{ $autor->id }}">{{ $autor->name}}</option>
                              @endif
                            @endforeach
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Editorial</label>
                        <div class="row">
                          <div class="col-xs-4">
                            <select id="selectEditorialMain"  class="form-control" name="editorialP[]" multiple="multiple" data-placeholder="Editorial Principal" style="width: 100%;">
                            @foreach($editoriales as  $editorial)
                              @foreach($editorial->categories as $category)
                                @if($category->name == "revista")
                                  <option  value="{{ $editorial->id }}">{{$editorial->name}}</option>
                                @endif
                              @endforeach
                            @endforeach
                            </select>
                          </div>
                          <div class="col-xs-8">
                            <!-- Este div permite tener dos inputs en una sola fila  -->
                            <div class="input-group ">
                              <select id="listEditorialSecond" class="form-control select2" name="editorial[]" multiple="multiple" data-placeholder="Anexos" style="width: 97%;">
                              @foreach($editoriales as  $editorial)
                                @foreach($editorial->categories as $category)
                                  @if($category->name == "revista")
                                    <option value="{{ $editorial->id }}">{{$editorial->name}}</option>
                                  @endif
                                @endforeach
                              @endforeach
                              </select>

                              <!--  *****************  PROBANDO **********************
                              Probando colocar un boton para poder eliminar todas las editoriales seleccionadas solo con un click
                              Nota : Terminar diseño del boton -->                                                            <!--Eliminar esto luego  solo es PRUEBA-->
                              <div class="input-group-btn ">
                                <button type="button" class="btn btn-danger btn-flat clearSelect2" data-toggle="tooltip" data-placement="top" title="Elimina todas las opciones seleccionadas"><i class="fa fa-times"></i></button>
                              </div>

                              <!-- FIN PRUEBA -->
                            </div>

                          </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputISSN">ISSN</label>

                        <input type="text" class="form-control" name="issn" id="inputISSN" data-inputmask='"mask": "9999-9999"' data-mask>
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
          <div class="box box-info box-solid" id="itemBox">
              <div class="box-header">
                  <h3 class="box-title">Item principal</h3>
                  <!-- Cambiar por un diseño mas atractivo cuando este funcionando -->
                  <div class="box-tools pull-right">
                    <button type="button" id="agregarItem" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                  </div>
              </div>
              <div class="box-body">
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
                      <input type="text" class="form-control" name="barcode0" id="inputBarcode" data-inputmask='"mask": "200000000999"' data-mask>
                  </div>
                  <div class="form-group">
                      <label for="inputCopy">Ejemplar</label>
                      <input type="number" class="form-control" name="copy0" id="inputCopy" placeholder="">
                  </div>
              </div>
            </div>
    <!--***************************************************************************************************************************************
                                                PANEL DE CONTENIDO
      *****************************************************************************************************************************************
      -->
            <div class="box box-danger box-solid" id="contentPanel">
              <div class="box-header ">
                  <h3 class="box-title">Contenido</h3>
                  <div class="box-tools pull-right">
                    <button type="button" id="agregarContenido" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                  </div>
              </div>
              <div class="box-body">
                  <div class="form-group">
                    <label for="inputTitleContent">Título</label>
                    <input type="text" class="form-control" name="titleContent0" id="inputTitleContent0" placeholder="">
                  </div>
                  <div class="form-group">
                    <label>Colaborador</label>
                    <select class="form-control select2" multiple="multiple" name ="collaborator0[]" data-placeholder="Seleccione los colaboradores" style="width: 100%;">
                      @foreach($autores as $autor)
                        @foreach($autor->categories as $category)
                          @if($category->name == "colaborador")
                            <option value="{{ $autor->id }}">{{ $autor->name}}</option>
                          @endif
                        @endforeach
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>

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
@section('scriptSelect')
  <script type="text/javascript">
    $(function () {
      //Inicializar elmentos select2
      //Prueba: Guardamos la el valor del elemento select con la clase select2 en una variable llamada $lista
      var $listaSec = $(".select2").select2();
      var $listaPrim = $("#selectEditorialMain").select2({
         maximumSelectionLength: 1,
         language: {
           noResults: function() {
             return "No hay resultado";
           },
           searching: function() {
             return "Buscando..";
           }
         }

      });

      // PRUEBA : Cuando hagamos click en el boton con clase clearSelect2 agregara ::nulo en las opciones seleccionadas del select que esta en la variable $lista
      //Esto seguira probandose , luego de que este todo funcionando recien se eliminaran los comentarios
      // *****************  PROBANDO **********************
      $(".clearSelect2").on("click", function () { $listaSec.val(null).trigger("change"); });
      // FIN DE PRUEBA


      //Eliminar esto luego -> solo es PRUEBA
      //Definiendo los tooltip
      $('[data-toggle="tooltip"]').tooltip();

      //Declarando inputmask para el issn y barcode , Los patrones seran agregados al final
      $("[data-mask]").inputmask();
    }
    );
    </script>
@endsection
@section('scriptContent')
  <script type="text/javascript">
  $(document).ready(function(){
    var idCont = 1 ; //global
    //Agregando un contenido màs
  	$('#agregarContenido').click(function(){
      // Guardar el panel donde se encuentra la seccion contenido
      var container = $('#contentPanel');
      var buttonClose = '<button id="eliminarContenido'+idCont+'" class="btn btn-xs btn-danger btn-block" type="button" name="button" ><i class="fa fa-times"></i></button>';
      var contentHeader = '<div class="box-header with-border">'+buttonClose+'</div>'
      var groupTitle = '<div class="form-group">'+
                            '<label for="inputTitleContent">Título</label>'+
                            '<input type="text" class="form-control" name="titleContent'+idCont+'" id="inputTitleContent'+idCont+'" placeholder="">'+
                       '</div>';
      var linea = '<hr>';
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
      var contentBody = linea+'<div class="panel-body" id="boxID'+idCont+'">'+groupTitle+groupCollaborator+'</div>';
      // var boxContent = '<div class="box box-default" id="boxID'+idCont+'">'+contentBody +'</div>';

  		$(container).append(contentBody);
      idCont = idCont + 1 ;
      //Inicializar el select2 para mostrar los colaboradores de los nuevos contenidos
      $(".select2").select2();
  	});
    //Nota: Falta hacer funcionar el boton x -> eliminar el box
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
      var container = $('#itemBox');
      var titleItem = '<h3 class="panel-title">Item Secundario</h3>';
      var buttonClose ='<div class="box-tools pull-right">  <button type="button" id="eliminarItem" data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button> </div>';
      var itemHeader = '<div class="box-header">'+titleItem+buttonClose+'</div>'
      var itemBody = '<div class="box-body">'+
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
      var itemPanel = '<div class="box box-info box-solid" id="itemBoxID'+idCont+'">'+itemHeader+itemBody +'</div>';

      $(container).after(itemPanel);
      idCont = idCont + 1 ;
    });
    //Agregando funcion para poder reutilziaar el codigo en editar -> agregar mas items
    //Nota: Hubo un error al guardarlo en una funcion en magazineJS , no lo reconocía

    $('#eliminarItem').click(function(){

    })

    //Nota: Falta hacer funcionar el boton x -> eliminar el box


  });
  </script>
@endsection
