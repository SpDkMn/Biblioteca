<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><strong>Editar Material</strong></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>

  <!-- /.box-header -->
  @if($id!=null)
    @foreach($thesiss as $thesis)
      @if($thesis->id == $id)
      <form method="POST" action="{{ url('/admin/thesis')}}/{{$id}}">
        <!-- Envia los datos a la funcion update del controlador luego de presionar edit -->
        <input type="hidden" name="_method" value="put" />
        {{ csrf_field() }}
          <div class="box-body">
              {{-- Panel Informacion --}}
              <div class="box box-success box-solid">
                  <div class="box-header">
                      <h3 class="box-title">Informacion General</h3>
                  </div>
                  <div class="box-body" id="thesisPanel">

                     <div class="form-group">
                        <label>TIPO DE ITEM</label>
                          <p>
                            
                            <input type="radio" class="flat" name="tipo" value="tesis" checked="" required/> Tesis 
                            <br>
                            <input type="radio" class="flat" name="tipo" value="tesina"/> Tesina
                          </p>
                     </div>

                      <div class="form-group">
                          <label for="inputTitle">Titulo</label>
                          <input type="text" class="form-control" value="{{$thesis->title}}" name="title" id="inputTitle" placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label>Autor Principal</label>
                        <select class="form-control select" id="selectAutorMainEdit" name="autorMain[]" multiple="multiple" style="width: 100%;" data-placeholder="Autor Principal">
                            @foreach($autores as  $autor)
                              @foreach($autor->categories as $category)
                                @if($category->name == "tesis/tesina")
                                  <option value="{{ $autor->id }}"
                                    
                                    <?php 
                                        foreach($thesis->authors as $aut){
                                          if($aut->id == $autor->id && $aut->pivot->type == true){
                                            echo "selected";
                                            break;
                                          }
                                        }
                                    ?>

                                  >{{$autor->name}}</option>
                                @endif
                              @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Autor Secundario</label>
                        <select class="form-control select" id="selectAutorSecondEdit" name="autorSecond[]" multiple="multiple" style="width: 100%;" data-placeholder="Autor Secundario">
                            @foreach($autores as  $autor)
                              @foreach($autor->categories as $category)
                                @if($category->name == "tesis/tesina")
                                  <option value="{{ $autor->id }}"
                                      <?php 
                                        foreach($thesis->authors as $aut){
                                          if($aut->id == $autor->id && $aut->pivot->type == false){
                                            echo "selected";
                                            break;
                                          }
                                        }

                                      ?>

                                  >{{$autor->name}}</option>
                                @endif
                              @endforeach
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Editorial</label>
                        <select class="form-control select" name="editorial" style="width: 100%;">
                        @foreach($editoriales as  $editorial)
                          @foreach($editorial->categories as $category)
                            @if($category->name == "tesis/tesina")
                              <option value="{{ $editorial->id }}">{{$editorial->name}}</option>
                            @endif
                          @endforeach
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="Clasification">Clasificación</label>
                      <input type="text" class="form-control" value="{{$thesis->clasification}}" name="clasification" id="inputClasification" placeholder="">
                  </div>


                  <div class="form-group">
                        <label>Asesor</label>
                        <select class="form-control select" name="asesor" style="width: 100%;">
                        @foreach($autores as  $autor)
                          @foreach($autor->categories as $category)
                            @if($category->name == "asesor")
                              <option value="{{ $autor->name }}">{{$autor->name}}</option>
                            @endif
                          @endforeach
                        @endforeach
                       
                        </select>
                    </div>

                 </div>
               </div>

              
              <!--Segunda division-->  
          <div class="box box-info box-solid">
                <div class="box-header">
                    <h3 class="box-title">Descripción Física</h3>
                </div>
                <div class="box-body" id="thesisPanel">
                    
                    <div class="form-group">
                        <label for="inputHojas">Nº de hojas</label>
                        <input type="text" class="form-control" value="{{$thesis->nhojas}}" name="nhojas" id="inputHojas" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEdition">Edicion</label>
                        <input type="text" class="form-control" value="{{$thesis->edition}}" name="edition" id="inputEdition" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Extension</label>
                        <input type="text" class="form-control" value="{{$thesis->extension}}" name="extension" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Dimensiones</label>
                        <input type="text" class="form-control" value="{{$thesis->dimensions}}" name="dimension" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Detalles Físicos</label>
                        <input type="text" class="form-control" value="{{$thesis->physicalDetails}}" name="detalles" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Material Adicional</label>
                        <input type="text" class="form-control" value="{{$thesis->accompaniment}}" name="materialad" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Ubicacion</label>
                        <input type="text" class="form-control" value="{{$thesis->location}}" name="ubicacion" id="inputEXTENSION" value="Estante Nº ">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Lugar de sustentacion</label>
                        <input type="text" class="form-control" value="{{$thesis->publicationLocation}}" name="lugarsus" id="inputEXTENSION" value="Facultad de Ingeniería de Sistemas">
                    </div>

                    
                 </div>

          </div>
        <!--Fin de la segunda division-->

        <!--Inicio de la tercera division-->
            <div class="box box-warning box-solid">
                <div class="box-header">
                    <h3 class="box-title">Resumen y Contenido del material</h3>
                </div>
                <div class="box-body" id="thesisPanel">
                              
                     <div class="form-group">
                        <label for="inputSummary">Resumen</label>
                        <textarea class="form-control" name="summary" id="inputSummary" placeholder="">{{$thesis->summary}}</textarea> 
                     </div>

                     <div class="form-group">
                        <label for="inputContent">Contenido</label>
                        <textarea class="form-control" name="contenido" id="inputContent" placeholder="">{{$thesis->conten}}</textarea> 
                     </div>  

                     <div class="form-group">
                       <label for="inputRecomend">Conclusiones y Recomendaciones</label>
                         <textarea class="form-control" name="recomendacion" id="inputRecomend" cols="65">{{$thesis->recomendacion}}</textarea>
                     </div>

                     <div class="form-group">
                       <label for="inputBibliografia">Bibliografia</label>
                         <textarea class="form-control" name="bibliografia" id="inputBibliografia" cols="65">{{$thesis->bibliografia}}</textarea>
                     </div>

                    
                </div>
            </div>
      <!--Fin de la tercera division-->

 
            <!-- Declarando el contador de items -->
            <!-- Declarando el contador de items -->
          <?php $contItem = 0  ?>
            @foreach($thesis->thesisCopies as $item)
              @if($loop->first)
              <div class="box box-info box-solid" id="{{'itemPanel'.$contItem}}">
                <div class="box-header">
                    <h3 class="box-title ">Item {{$item->ejemplar}}</h3>
                    <div class="box-tools pull-right">
                      <button type="button" name="copy0" id="agregarItemEdit" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    
                    <div class="form-group">
                        <label for="inputIncomeNumber">Nº Ingreso</label>
                        <input type="text" class="form-control" value="{{$item->incomeNumber}}" name="{{'incomeNumber'.$contItem}}" id="inputIncomeNumber" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="inputBarcode">Código de barra</label>
                        <input type="text" class="form-control" value="{{$item->barcode}}" name="{{'barcode'.$contItem}}" id="inputBarcode" placeholder="">
                    </div>
 
                </div>
              </div>
              @else
                <div class="box box-info box-solid" id="{{'itemPanel'.$contItem}}">
                  <div class="box-header">
                      <h3 class="panel-title">Item {{$item->ejemplar}}</h3>
                      <div class="box-tools pull-right">
                        <button type="button" id="eliminarItem" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                      </div>
                  </div>
                  <div class="box-body">
                      
                      <div class="form-group">
                          <label for="inputIncomeNumber">Nº Ingreso</label>
                          <input type="text" class="form-control" value="{{$item->incomeNumber}}" name="{{'incomeNumber'.$contItem}}" id="inputIncomeNumber" placeholder="">
                      </div>
                      <div class="form-group">
                          <label for="inputBarcode">Código de barra</label>
                          <input type="text" class="form-control" value="{{$item->barcode}}" name="{{'barcode'.$contItem}}" id="inputBarcode" placeholder="">
                      </div>
                      
                  </div>
                </div>
                @endif
              <?php $contItem = $contItem  +1  ?>
            @endforeach
 
               <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Editar</button>
                </div>
        </form>
                   <!-- Script para mostrar los selectores luego de mostrar el editar -->
         
 </div>


<script type="text/javascript">
      
          //Convirtiendo a entero contItem -> guarda el numero de item que se muestra inicialmente en editar ,
          //estos seran los que se agregaron , apartir de ahi se podra agregar mas items con id continuo

          var idCont = {{ $item->ejemplar}} ;
          $('#agregarItemEdit').click(function(){
            // Guardar el panel donde se encuentra la seccion contenido
            var container = $('#itemPanel0');
            var titleItem = '<h3 class="box-title">Item '+(idCont+1)+'</h3>';
            var buttonClose ='<div class="box-tools pull-right">  <button type="button" id="eliminarItemEdit" data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button> </div>';
            var itemHeader = '<div class="box-header">'+titleItem+buttonClose+'</div>'
            var itemBody = '<div class="box-body">'+
                                  
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
                                  '<input type="number" value="'+(idCont+1)+'" class="form-control" name="copy'+idCont+'" id="inputCopy" placeholder="">'+
                                '</div>'+

                            '</div>';

            var itemPanel = '<div class="box box-info box-solid" id="itemPanel'+(idCont-1)+'">'+itemHeader+itemBody +'</div>';
            $(container).after(itemPanel);

            idCont = idCont + 1 ;
          })
      
  </script>


  <script type="text/javascript">
      //Inicializar selectores de las editoriaes , principales y secundarias
        //Selectores generales
        //Select del autor
        $(".select").select2();
        $listaSecEdit = $("#selectAutorSecondEdit").select2();
        $listaPrimEdit = $("#selectAutorMainEdit").select2({
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

        //INICIO DE  PRUEBA -> Deshabilitar una opcion PARA EDITAR
          $("#selectAutorMainEdit").on('change',function(e){
            //Almacenando el valor que esta en el selector de editorial principal
            e.preventDefault();
              var opc2 = $(this).val();
              var txt2 = $(this).text();

              if(opc2!=null){opcD2 = opc2 ;deshabilitar(opc2);}
              else{habilitar(opcD2);}
            });

            function deshabilitar(opc2){
              //Elimina las opciones si una de ellas es igual a la seleccionada para ser deshabilitada
              if ($("#selectAutorSecondEdit").val()!=null) {
                //Guardando los datos seleccionados (editoriales secundarias) en un arreglo
                datos = $("#selectAutorSecondEdit").val().slice();
                //Recorriendo los datos seleccionados para compararlo con el que se esta deshabilitando
                for (var i = 0; i < datos.length; i++) {
                  //Si lo encuentra entonces
                  if (opc2==datos[i]) {
                    //Eliminando opciones seleccionadas de editoriales secundarias
                    $("#selectAutorSecondEdit").val(null);
                    //Agregando nuevamente los elementos seleccionados
                    for (var i = 0; i < datos.length; i++) {
                      if (datos[i]==opc2) {
                        // alert("datos["+i+"]: "+datos[i]+"   Opcion: "+opc);
                        //Guardando la posicion del elemento que se encuentra seleccionado y se quiere deshabilitar
                        var pos = datos.indexOf(""+opc2+"");
                        //Eliminando opcion que se deshabilitara en las listas de opciones seleccionadas de editoriales secundarias
                        datos.splice(pos, 1);
                      }
                    }
                  }
                }
              }
              //Deshabilitar la opcion seleccionada
              $("#selectAutorSecondEdit option").each(function(){
                //Comparando opcion para deshabilitar
                if(opc2==$(this).attr('value')){
                  //Deshabilitando la opcion
                  $(this).attr("disabled","disabled");
                  // alert('Deshabilitando opcion '+$(this).text()+' valor '+ $(this).attr('value'));
                  //Reinicializando
                  reiniciarSelect('#selectAutorSecondEdit');
                }
              });
            }
            function habilitar(opcD){
              //Eliminando y volviendo a inicializar el selector cuando se habilite las opciones , sin esto
              //solo se muestra deshabilitado la primera vez que se inicia el selector
              reiniciarSelect('#selectAutorSecondEdit');
              //fin
              $("#selectAutorSecondEdit option").each(function(){
                if(opcD==$(this).attr('value')){
                  $(this).removeAttr('disabled');
                }
              })
            }
            function reiniciarSelect(id){
              $(id).select2('destroy');
              $(id).select2();
            }
        //FIN DE PRUEBAS PARA EDITAR
      </script>

      
      @endif
    @endforeach
  @endif
