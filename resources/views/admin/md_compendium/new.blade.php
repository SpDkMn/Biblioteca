<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-book"></i>
    <h3 class="box-title">Nuevo</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <form method="POST" action="{{ url('/admin/compendium') }}">
    {{ csrf_field() }}
        <div class="box-body">
    <!--***************************************************************************************************************************************
                                              PANEL DE INFORMACION
    *******************************************************************************************************************************************-->
            <div class="box box-success box-solid ">
                <div class="box-header">
                    <h3 class="panel-title">Informacion</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputTitle">Título</label>
                        <span>*</span>
                        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputTitle">introduccion</label>
                        <span>*</span>
                        <textarea rows="3" class="form-control" name="introduccion" id="inputintroduccion" placeholder=""></textarea>
                    </div>
                    <div class="form-group">
                        <label>Entidad académica</label>
                        <span>*</span>
                        <select class="form-control select2" name="author">
                          @foreach($autores as $autor)
                            @foreach($autor->categories as $category)
                              @if($category->name == "compendio")
                                <option value="{{ $autor->id }}">{{ $autor->name}}</option>
                              @endif
                            @endforeach
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                            <label>Editorial</label>
                            <span>*</span>
                            <select class="form-control select2" name="editorial" data-placeholder="Editorial" style="width: 100%;">
                            @foreach($editoriales as  $editorial)
                              @foreach($editorial->categories as $category)
                                @if($category->name == "compendio")
                                  <option  value="{{ $editorial->id }}">{{$editorial->name}}</option>
                                @endif
                              @endforeach
                            @endforeach
                            </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                          <!-- <div class="col-lg-4">
                            <label for="volumen">Volumen</label>
                            <input type="number" class="form-control" name="volumen" id="volumen" placeholder="Vol."  min="0">
                          </div> -->
                          <div class="col-lg-6">
                            <label for="numero">Nº</label>
                              <input type="number" class="form-control" name="numero" id="numero" placeholder="Nº X" min="0" max="10">
                          </div>
                          <div class="col-lg-6">
                              <label for="inputClasification">Fecha de edición</label>
                                <input type="text" class="form-control" name="fechaEdicion" data-inputmask='"mask": "2099"' data-mask  id="fechaEdicion" placeholder="XXXX"  >
                          </div>
                        </div>
                    </div>
                  </div>
               </div>
  <!--***************************************************************************************************************************************
                                                      PANEL DE ITEM
  *******************************************************************************************************************************************-->
  <!--Los name terminan en 0 para poder tener un control de los inputs a la hora de enviar los datos al store-->
          <div class="box box-info box-solid" id="itemBox">
              <div class="box-header">
                  <h3 class="box-title">Item principal</h3>
                  <div class="box-tools pull-right">
                    <button type="button" id="agregarItem" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                  </div>
              </div>
              <div class="box-body">
                  <div class="form-group">
                      <label for="inputIncomeNumber">Nº Ingreso</label>
                      <span>*</span>
                      <input type="text" class="form-control" name="incomeNumber0" id="inputIncomeNumber" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="inputCopy">Ejemplar</label>
                      <span>*</span>
                      <input type="number" class="form-control" name="copy0" id="inputCopy" placeholder="" value=1 >
                  </div>
              </div>
            </div>
    <!--***************************************************************************************************************************************
                                                PANEL DE CONTENIDO
    *****************************************************************************************************************************************-->
            <div class="box box-danger box-solid" >
              <div class="box-header ">
                  <h3 class="box-title">Tabla de contenido</h3>
                  <div class="box-tools pull-right">
                    <button type="button" id="agregarContenido" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                  </div>
              </div>
              <div class="box-body">
                  <div  id='contentPanel'>
                      <div class="panel-body">
                        <div class="form-group">
                          <label for="inputTitleContent">Contenido</label>
                          <span>*</span>
                          <input type="text" class="form-control" name="titleContent0" id="inputTitleContent0" placeholder="">
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary" id="newCompendium">Crear</button>
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
        $(".select2").select2();
        $(".selectCollaborator").select2();
        var $listaSec = $("#listEditorialSecond").select2();
        var $listaPrim = $("#listEditorialMain").select2({
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
        //Eliminar las editoriales secundarias que esten seleccionadas
        $(".clearSelect2").on("click", function (){ $listaSec.val(null).trigger("change"); });
        $($listaPrim).on('change',function(e){
          //Almacenando el valor que esta en el selector de editorial principal
          e.preventDefault();
            var opc = $(this).val();
            var txt = $(this).text();
            if(opc!=null){opcD = opc ;deshabilitar(opc);}
            else{habilitar(opcD);}
          });

          function deshabilitar(opc){
            //Elimina las opciones si una de ellas es igual a la seleccionada para ser deshabilitada
            if ($('#listEditorialSecond').val()!=null) {
              //Guardando los datos seleccionados (editoriales secundarias) en un arreglo
              datos = $('#listEditorialSecond').val().slice();
              //Recorriendo los datos seleccionados para compararlo con el que se esta deshabilitando
              for (var i = 0; i < datos.length; i++) {
                //Si lo encuentra entonces
                if (opc==datos[i]) {
                  //Eliminando opciones seleccionadas de editoriales secundarias
                  $('#listEditorialSecond').val(null);
                  //Agregando nuevamente los elementos seleccionados
                  for (var i = 0; i < datos.length; i++) {
                    if (datos[i]==opc) {
                      // alert("datos["+i+"]: "+datos[i]+"   Opcion: "+opc);
                      //Guardando la posicion del elemento que se encuentra seleccionado y se quiere deshabilitar
                      var pos = datos.indexOf(""+opc+"");
                      //Eliminando opcion que se deshabilitara en las listas de opciones seleccionadas de editoriales secundarias
                      datos.splice(pos, 1);
                    }
                  }
                }
              }
            }
            //Deshabilita la opcion seleccionada
            $("#listEditorialSecond option").each(function(){
              //Comparando opcion para deshabilitar
              if(opc==$(this).attr('value')){
                //Deshabilitando la opcion
                $(this).attr("disabled","disabled");
                // alert('Deshabilitando opcion '+$(this).text()+' valor '+ $(this).attr('value'));
                //Reinicializando
                reiniciarSelect('#listEditorialSecond');

              }

            });
          }
          function habilitar(opcD){
            reiniciarSelect('#listEditorialSecond');
            $("#listEditorialSecond option").each(function(){
              if(opcD==$(this).attr('value')){
                $(this).removeAttr('disabled');
              }
            })
          }
          function reiniciarSelect(id){
            $(id).select2('destroy');
            $(id).select2();
          }
     //Definiendo los tooltip
        $('[data-toggle="tooltip"]').tooltip();
        //Declarando inputmask para el issn y barcode , Los patrones seran agregados al final
        $("[data-mask]").inputmask();
    });
  </script>
@endsection
@section('scriptContent')
  <script type="text/javascript">
  $(document).ready(function(){
    var idCont = 1 ;
    function agregarContenido(id,contenedor,cont,select){
      $(id).click(function(){
        // Guardar el panel donde se encuentra la seccion contenido
        var container = $(contenedor);
        var groupTitle = '<div class="form-group">'+
                              '<label for="inputTitleContent">Contenido</label>'+
                              '<span>*</span>'+
                              '<input type="text" class="form-control" name="titleContent'+cont+'" id="inputTitleContent'+cont+'" placeholder="">'+
                         '</div>';
        var linea = '<hr>';
        var groupCollaborator = '<div class="form-group">'+
                                  '<label>Colaboradores</label>'+
                                    '<select class="form-control '+select+'" multiple="multiple" name ="collaborator'+cont+'[]" data-placeholder="Seleccione los colaboradores" style="width: 100%;">'+
                                      '@foreach($autores as $autor)'+
                                        '@foreach($autor->categories as $category)'+
                                          '@if($category->name == "colaborador")'+
                                            '<option value="{!! $autor->id !!}">{{$autor->name}}</option>'+
                                          '@endif '+
                                        '@endforeach '+
                                      '@endforeach '+
                                    '</select>'+
                                  '</div>';
        var contentBody = linea+'<div class="panel-body" id="boxID'+cont+'">'+groupTitle+groupCollaborator+'</div>';
        // var boxContent = '<div class="box box-default" id="boxID'+idCont+'">'+contentBody +'</div>';
    		$(container).append(contentBody);
        cont = cont + 1 ;
        //Inicializar el select2 para mostrar los colaboradores de los nuevos contenidos
        $("."+select).select2();
    	});
    }
    agregarContenido('#agregarContenido','#contentPanel',idCont,'selectCollaborator');
  });
  </script>
@endsection
@section('scriptItem')
  <script type="text/javascript">
  $(document).ready(function(){
    var idCont = 1 ;
    // Cuando haga click en agregarContenido
    $('#agregarItem').click(function(){
      // Guardar el panel donde se encuentra la seccion contenido
      var container = $('#itemBox');
      var titleItem = '<h3 class="panel-title">Item Secundario</h3>';
      var buttonClose ='<div class="box-tools pull-right">  <button type="button" data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button> </div>';
      var itemHeader = '<div class="box-header">'+titleItem+buttonClose+'</div>'
      var itemBody = '<div class="box-body">'+
                            '<div class="form-group">'+
                                '<label for="inputIncomeNumber">Nº Ingreso</label>'+
                                '<span>*</span>'+
                                '<input type="text" class="form-control" name="incomeNumber'+idCont+'" id="inputIncomeNumber">'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label for="inputCopy">Ejemplar</label>'+
                                '<span>*</span>'+
                                '<input type="number" class="form-control" name="copy'+idCont+'" id="inputCopy" value='+(idCont+1)+'>'+
                            '</div>'+
                        '</div>';
      var itemPanel = '<div class="BoxItemMagazine box box-info box-solid" id="itemBoxID'+idCont+'">'+itemHeader+itemBody +'</div>';

      $(container).after(itemPanel);
      $("[data-mask]").inputmask();
      idCont = idCont + 1 ;
    });


    $('#newCompendium').click(function(){
      //Elimina las cajas ocultadas que contiene los items
        $('.BoxItemMagazine:hidden').remove();

    });

  });
  </script>
@endsection
