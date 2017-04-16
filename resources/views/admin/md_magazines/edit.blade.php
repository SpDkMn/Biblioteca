<div class="box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-edit"></i>
    <h3 class="box-title">Editar</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  @if($id!=null)
    @foreach($revistas as $revista)
      @if($revista->id == $id)
      <form method="POST" action="{{ url('/admin/magazines')}}/{{$id}}">
        <!-- Envia los datos a la funcion update del controlador luego de presionar edit -->
        <input type="hidden" name="_method" value="put" />
        {{ csrf_field() }}
          <div class="box-body">
<!--***************************************************************************************************************************************
                                          PANEL DE INFORMACION
*******************************************************************************************************************************************
-->
              <div class="box box-success box-solid">
                  <div class="box-header">
                      <h3 class="box-title">Informacion</h3>
                  </div>
                  <div class="box-body">

                      <div class="form-group">
                          <label for="inputTitle">Titulo</label>
                          <input type="text" class="form-control" value="{{$revista->title}}" name="title" id="inputTitle" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Autor</label>

                        <select class="form-control select" name="author" >
                        <!-- Cargando opciones de autores -->
                        @foreach($autores as $autor)
                          @foreach($autor->categories as $category)
                            @if($category->name == "revista"){
                              <!-- Si el id del autor del bucle es igual al autor de la revista seleccionada  -->
                              @if($autor->id == $revista->author->id)
                              <!-- Entonces muestro al autor como seleccionado -->
                              <option value="{{ $autor->id }}" selected>{{ $autor->name}}</option>
                                @else
                              <!-- sino solo muestro al autor como una opcion -->
                              <option value="{{ $autor->id }}">{{ $autor->name}}</option>
                              @endif
                              <!-- finsi -->
                            }
                            @endif
                          @endforeach
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Editorial</label>
                        {{-- Seleccionando editoriales que pertenecen a la categoria revista --}}
                        <div class="row">
                          <div class="col-xs-4">
                            <select id="selectEditorialMainEdit" class="form-control" name="editorialP[]" multiple="multiple" data-placeholder="Editorial Principal" style="width: 100%;">
                              <!-- Este bucle es para mostrar a la editorial seleccionada -->

                              @foreach($editoriales as $editoriall)
                                @foreach($editoriall->categories as $category)
                                  @if($category->name = "revista")
                                  <!-- arreglo con las editoriales de una revista -->
                                    @foreach($revista->editorials as $editorial)
                                      @if($editorial->id == $editoriall->id)
                                        @if($editorial->pivot->type == true)
                                          <option value="{{ $editorial->id }}" selected>{{$editorial->name}}</option>
                                        @endif
                                      @endif
                                    @endforeach
                                    <option value="{{ $editoriall->id }}">{{$editoriall->name}}</option>
                                  @endif
                                @endforeach
                              @endforeach


                            </select>
                          </div>
                          <div class="col-xs-8">
                            <select class="form-control" id="selectEditorialSecondEdit" name="editorial[]" multiple="multiple" data-placeholder="Editorial Secundaria" style="width: 100%;">
                            @foreach($editoriales as  $editorial)
                              @foreach($editorial->categories as $category)
                                @if($category->name == "revista")
                                  <option value="{{ $editorial->id }}">{{$editorial->name}}</option>
                                @endif
                              @endforeach
                            @endforeach
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                          <label for="inputISSN">ISSN</label>
                          <input type="text" class="form-control" name="issn" id="inputISSN" placeholder="" value="{{$revista->issn}}">
                      </div>

                    </div>
                 </div>
<!--***************************************************************************************************************************************
                                         PANEL DE ITEM
*******************************************************************************************************************************************
-->

            <!-- Declarando el contador de items -->
          <?php $contItem = 0  ?>
            @foreach($revista->magazines_copies as $item)
              @if($loop->first)
              <div class="box box-info box-solid" id="{{'itemPanel'.$contItem}}">
                <div class="box-header">
                    <h3 class="box-title ">Item Principal</h3>
                    <div class="box-tools pull-right">
                      <button type="button" id="agregarItemEdit" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputClasification">Clasificación</label>
                        <input type="text" value="{{$item->clasification}}" class="form-control" name="{{'clasification'.$contItem}}" id="inputClasification" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputIncomeNumber">Nº Ingreso</label>
                        <input type="text" class="form-control" value="{{$item->incomeNumber}}" name="{{'incomeNumber'.$contItem}}" id="inputIncomeNumber" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputBarcode">Código de barra</label>
                        <input type="text" class="form-control" value="{{$item->barcode}}" name="{{'barcode'.$contItem}}" id="inputBarcode" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputCopy">Ejemplar</label>
                        <input type="number" class="form-control" value="{{$item->copy}}" name="{{'copy'.$contItem}}" id="inputCopy" placeholder="">
                    </div>
                </div>
              </div>
              @else
                <div class="box box-info box-solid" id="{{'itemPanel'.$contItem}}">
                  <div class="box-header">
                      <h3 class="panel-title">Item Secundario</h3>
                      <div class="box-tools pull-right">
                        <button type="button" id="eliminarItem" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                      </div>
                  </div>
                  <div class="box-body">
                      <div class="form-group">
                          <label for="inputClasification">Clasificación</label>
                          <input type="text" value="{{$item->clasification}}" class="form-control" name="{{'clasification'.$contItem}}" id="inputClasification" placeholder="">
                      </div>
                      <div class="form-group">
                          <label for="inputIncomeNumber">Nº Ingreso</label>
                          <input type="text" class="form-control" value="{{$item->incomeNumber}}" name="{{'incomeNumber'.$contItem}}" id="inputIncomeNumber" placeholder="">
                      </div>
                      <div class="form-group">
                          <label for="inputBarcode">Código de barra</label>
                          <input type="text" class="form-control" value="{{$item->barcode}}" name="{{'barcode'.$contItem}}" id="inputBarcode" placeholder="">
                      </div>
                      <div class="form-group">
                          <label for="inputCopy">Ejemplar</label>
                          <input type="number" class="form-control" value="{{$item->copy}}" name="{{'copy'.$contItem}}" id="inputCopy" placeholder="">
                      </div>
                  </div>
                </div>
                @endif
                <?php $contItem = $contItem  +1  ?>
              @endforeach
<!--***************************************************************************************************************************************
                                          PANEL DE CONTENIDO
*******************************************************************************************************************************************
-->

        <!-- Declarando el contador de items -->
        <?php $contContent = 0  ?>
                <div class="box box-danger box-solid" id="{{'contentPanel'.$contContent}}">
                    <div class="box-header ">
                        <h3 class="panel-title col-xs-11">Contenido</h3>
                        <div class="box-tools pull-right">
                          <button type="button" id="agregarContenidoCont" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                  @foreach($revista->contents as $contenido)
                    @if($loop->first)
                    <!-- PRUEBA  -->
                    <div class="box-body" id="contentPanel0">
                        <div class="form-group">
                          <label for="inputTitleContent">Título</label>
                          <input type="text" class="form-control" name="{{'titleContent'.$contContent}}" id="{{'inputTitleContent'.$contContent}}" placeholder="" value="{{$contenido->title}}">
                        </div>
                    <!--  Por el momento no hay limite de colaboradores-->
                      <div class="form-group">
                        <label>Colaborador</label>
                        <!-- Mostrando seleccion de colaboradores que pertenecen a un contenido -->

                        <select class="form-control select"  multiple="multiple" name ="{{'collaborator'.$contContent.'[]'}}" data-placeholder="Seleccione los colaboradores" style="width: 100%;">
                          <!-- Cargando colaboradores seleccionados -->
                          <!-- Cargando lista de opciones para ser seleccionados  -->
                          <!-- Nota : Corregir error al mostrar lista de opciones  -->
                          @foreach($autores as $autor)
                            @foreach($autor->categories as $category)
                              @if($category->name == "colaborador")
                              <!-- Nota : Corregir esto -->
                                    <!-- Aca estan todos los colaboradores -->
                                    <option value="{{ $autor->id }}" >{{ $autor->name}}</option>


                              @endif
                            @endforeach
                          @endforeach
                        </select>
                      </div>
                    </div>

                    @else
                    <hr>
                          <!-- PRUEBA  -->
                          <div class="panel-body" id="{{'boxID'.$contContent}}">
                              <div class="form-group">
                                <label for="inputTitleContent">Título</label>
                                <input type="text" class="form-control" name="{{'titleContent'.$contContent}}" id="{{'inputTitleContent'.$contContent}}" placeholder="" value="{{$contenido->title}}">
                              </div>
                          <!--  Por el momento no hay limite de colaboradores-->
                            <div class="form-group">
                              <label>Colaborador</label>
                              <!-- Mostrando seleccion de colaboradores que pertenecen a un contenido -->

                              <select class="form-control select"  multiple="multiple" name ="{{'collaborator'.$contContent.'[]'}}" data-placeholder="Seleccione los colaboradores" style="width: 100%;">
                                <!-- Cargando colaboradores seleccionados -->
                                <!-- Cargando lista de opciones para ser seleccionados  -->
                                <!-- Nota : Corregir error al mostrar lista de opciones  -->
                                @foreach($autores as $autor)
                                  @foreach($autor->categories as $category)
                                    @if($category->name == "colaborador")
                                    <!-- Nota : Corregir esto -->
                                          <!-- Aca estan todos los colaboradores -->

                                          <option value="{{ $autor->id }}" >{{ $autor->name}}</option>


                                    @endif
                                  @endforeach
                                @endforeach


                              </select>
                            </div>
                          </div>
                    @endif
                    <?php $contContent = $contContent +1 ?>
                  @endforeach
                </div>
            </div> {{-- end box-body --}}

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
          </div>
        </form>
      </div>
      <!-- Script para mostrar los selectores luego de mostrar el editar -->
      <script type="text/javascript">
        $(".select").select2();
        $listaSecEdit = $("#selectEditorialSecondEdit").select2();
        $listaPrimEdit =  $("#selectEditorialMainEdit").select2({
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

        //Actualizado 9/04/17 04:55
        //INICIO DE  PRUEBA -> Deshabilitar una opcion PARA EDITAR
          $("#selectEditorialMainEdi").on('change',function(e){
            //Almacenando el valor que esta en el selector de editorial principal
            e.preventDefault();
              var opc2 = $(this).val();
              var txt2 = $(this).text();
              //Aun no se por qué no tengo que declarar la variable opcD ,
              //cuando lo declaro var opcD aparece que no esta definido ¿?
              if(opc2!=null){opcD2 = opc2 ;deshabilitar(opc2);}
              else{habilitar(opcD2);}
            });

            function deshabilitar(opc2){
              //Elimina las opciones si una de ellas es igual a la seleccionada para ser deshabilitada
              if ($("#selectEditorialSecondEdit").val()!=null) {
                //Guardando los datos seleccionados (editoriales secundarias) en un arreglo
                datos = $("#selectEditorialSecondEdit").val().slice();
                //Recorriendo los datos seleccionados para compararlo con el que se esta deshabilitando
                for (var i = 0; i < datos.length; i++) {
                  //Si lo encuentra entonces
                  if (opc2==datos[i]) {
                    //Eliminando opciones seleccionadas de editoriales secundarias
                    $("#selectEditorialSecondEdit").val(null);
                    //Agregando nuevamente los elementos seleccionados
                    for (var i = 0; i < datos.length; i++) {
                      if (datos[i]==opc2) {
                        // alert("datos["+i+"]: "+datos[i]+"   Opcion: "+opc);
                        //Guardando la posicion del elemento que se encuentra seleccionado y se quiere deshabilitar
                        var pos = datos.indexOf(""+opc2+"");
                        //Eliminando opcion que se deshabilitara en las listas de opciones seleccionadas de editoriales secundarias
                        datos.splice(pos, 1);
                        //Colocando nuevos datos en la lista de opciones seleccionadas de la editorial secundaria
                        //Nota: Solo falta agregar los nuevos valores
                        // $('#listEditorialSecond').val(["datos[0]","datos[1]","datos[2]"]);
                        //
                        //Mostrar datos para hacer prueba
                        // for (var i = 0; i < datos.length; i++) {
                        //   alert("Nuevos datos["+i+"]: "+datos[i])
                        // }
                      }
                    }
                  }
                }
              }
              //Deshabilita la opcion seleccionada
              $("#listEditorialSecondEdit option").each(function(){
                //Comparando opcion para deshabilitar
                if(opc2==$(this).attr('value')){
                  //Deshabilitando la opcion
                  $(this).attr("disabled","disabled");
                  // alert('Deshabilitando opcion '+$(this).text()+' valor '+ $(this).attr('value'));
                  //Reinicializando
                  reiniciarSelect('#listEditorialSecondEdit');
                  // $('#listEditorialSecond').select2('destroy');
                  // $('#listEditorialSecond').select2();

                }

              });
            }

            function habilitar(opcD){
              //Eliminando y volviendo a inicializar el selector cuando se habilite las opciones , sin esto
              //solo se muestra deshabilitado la primera vez que se inicia el selector
              reiniciarSelect('#listEditorialSecondEdit');
              //fin
              $("#listEditorialSecondEdit option").each(function(){
                if(opcD==$(this).attr('value')){
                  $(this).removeAttr('disabled');
                  // alert('Habilitando opcion '+$(this).text()+' valor '+ $(this).attr('value'))

                }
              })
            }
            function reiniciarSelect(id){
              $(id).select2('destroy');
              $(id).select2();
            }
        //FIN DE PRUEBAS PARA EDITAR
      </script>


            <script type="text/javascript">
              $(document).ready(function(){
                var idContt = {{$contContent}}; //global
                //Agregando un contenido màs
                $('#agregarContenidoCont').click(function(){

                  // Guardar el panel donde se encuentra la seccion contenido
                  var container = $('#contentPanel0');
                  var buttonClose = '<button id="eliminarContenido'+idContt+'" class="btn btn-xs btn-danger btn-block" type="button" name="button" ><i class="fa fa-times"></i></button>';
                  var contentHeader = '<div class="box-header with-border">'+buttonClose+'</div>'
                  var groupTitle = '<div class="form-group">'+
                                        '<label for="inputTitleContent">Título</label>'+
                                        '<input type="text" class="form-control" name="titleContent'+idContt+'" id="inputTitleContent'+idContt+'" placeholder="">'+
                                   '</div>';
                  var linea = '<hr>';
                  var groupCollaborator = '<div class="form-group">'+
                                            '<label>Colaborador</label>'+
                                              '<select class="form-control select3" multiple="multiple" name ="collaborator'+idContt+'[]" data-placeholder="Seleccione los colaboradores" style="width: 100%;">'+
                                                '@foreach($autores as $autor)'+
                                                  '@foreach($autor->categories as $category)'+
                                                    '@if($category->name == "colaborador")'+
                                                      '<option value="{!! $autor->id !!}">{{$autor->name}}</option>'+
                                                    '@endif '+
                                                  '@endforeach '+
                                                '@endforeach '+
                                              '</select>'+
                                            '</div>';

                  var contentBody = linea+'<div class="panel-body" id="boxID'+idContt+'">'+groupTitle+groupCollaborator+'</div>';
                  // var boxContent = '<div class="box box-default" id="boxID'+idContt+'">'+contentBody +'</div>';

                  $(container).append(contentBody);
                  idContt = idContt + 1 ;
                  //Inicializa los selectores que se cargan luego de agregar un contenido más , debe ser diferente al de los demás
                  $(".select3").select2();

                  //Inicializar el select2 para mostrar los colaboradores de los nuevos contenidos
                });
              })
            </script>

      <script type="text/javascript">
        $(document).ready(function(){
          //Convirtiendo a entero contItem -> guarda el numero de item que se muestra inicialmente en editar ,
          //estos seran los que se agregaron , apartir de ahi se podra agregar mas items con id continuo
          var idCont = {{$contItem}};
          $('#agregarItemEdit').click(function(){
            // Guardar el panel donde se encuentra la seccion contenido
            var container = $('#itemPanel0');
            var titleItem = '<h3 class="box-title">Item Secundario</h3>';
            var buttonClose ='<div class="box-tools pull-right">  <button type="button" id="eliminarItemEdit" data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button> </div>';
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
            var itemPanel = '<div class="box box-info box-solid" id="itemPanel'+idCont+'">'+itemHeader+itemBody +'</div>';

            $(container).after(itemPanel);
            idCont = idCont + 1 ;
          })
        });
      </script>

    @endif
  @endforeach
@endif
