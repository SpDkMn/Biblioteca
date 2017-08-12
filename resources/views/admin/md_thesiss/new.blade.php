  


  <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><strong>Agregar Nuevo Material</strong></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
     @if(count($errors)>0)
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li> 
          @endforeach
        </ul>
      </div>
     @endif
  <form method="POST" action="{{ url('/admin/thesis') }}"  onsubmit="return validarFormulario ()">
    {{ csrf_field() }}


     <div class="box-body">
        <!---->
        <!--***************************** PANEL DE NUEVA TESIS *************************************-->
         <div class="box box-success box-solid"> 
            <div class="box-header with-border">
              <h3 class="box-title">Tesis y Tesina</h3>
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
                <li><a href="#tercero" data-toggle="tab">Tercero</a></li>
                <li><a href="#cuarto" data-toggle="tab">Cuarto</a></li>
             </ul>

          <div class="tab-content">
          
                    <!-- Primer panel -->
            <div class="tab-pane active" id="primero">
      
              <div class="box-body">
                  <div class="form-group">
                    <label>TIPO DE ITEM</label>
                      <p>
                        <input type="radio" class="flat" name="tipo" value="tesis" checked="" required/> Tesis 
                        <br>
                        <input type="radio" class="flat" name="tipo" value="tesina"/> Tesina
                      </p>
                  </div>

                  <div class="form-group">
                        <label for="inputTitle">Titulo *</label>
                        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="">
                  </div>
                    
                  <div class="form-group">
                        <label>Autor Principal *</label>
                        <select class="form-control" id="selectAutorMain" name="autorMain[]" multiple="multiple" style="width: 100%;" data-placeholder="Autor Principal" onsubmit="return validacion()" required>
                            @foreach($autores as  $autor)
                              @foreach($autor->categories as $category)
                                @if($category->name == "tesis/tesina")
                                  <option value="{{ $autor->id }}">{{$autor->name}}</option>
                                @endif
                              @endforeach
                            @endforeach
                        </select>
                  </div>

                  <div class="form-group">
                        <label>Autor Secundario</label>
                        <select class="form-control select2" id="listAutorSecond" name="autorSecond[]" multiple="multiple" style="width: 100%;" data-placeholder="Autor Secundario">
                            @foreach($autores as  $autor)
                              @foreach($autor->categories as $category)
                                @if($category->name == "tesis/tesina")
                                  <option value="{{ $autor->id }}">{{$autor->name}}</option>
                                @endif
                              @endforeach
                            @endforeach
                        </select>
                  </div>

                  <div class="form-group">
                        <label>Editorial *</label>
                        <select class="form-control select2" name="editorial" style="width: 100%;" required>
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
                      <label for="Clasification">Clasificación *</label>
                      <input type="text" class="form-control" name="clasification" id="inputClasification" placeholder="">
                  </div>

                    
                  <div class="form-group">
                        <label>Asesor *</label>
                        <select class="form-control select2" name="asesor" style="width: 100%;" required>
                            @foreach($autores as  $autor)
                              @foreach($autor->categories as $category)
                                @if($category->name == "asesor")
                                  <option value="{{ $autor->name }}">{{$autor->name}}</option>
                                @endif
                              @endforeach
                            @endforeach                      
                        </select>
                  </div>
                  <div class="form-group">
                      <label>E . A . P : </label>
                      <select class="form-control select2" name="escuela" style="width: 100%;">
                        <option name="escuela">Ingeniería de Sistemas</option>
                        <option name="escuela">Ingeniería de Software</option>
                      </select>
                  </div>                     
              </div>
          </div>
        <!--Fin de la primera division-->



        <!-- Segundo Panel -->
          <div class="tab-pane fade" id="segundo">
              <div class="box-body">
                       
                        <!-- 1. Resumen -->
                   
                    <div class="form-group">
                        <label for="inputEdition">Edicion</label>
                        <input type="text" onkeypress="return isNumberKey(event)" class="form-control" name="edition" id="inputEdition" placeholder="_ _ _ _">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Extension *</label>
                        <input type="text" onkeypress="return isNumberKey(event)" class="form-control" name="extension" id="inputEXTENSION" placeholder="_ _ _">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Dimensiones *</label>
                        <input type="text" class="form-control" name="dimension" id="inputDimension" placeholder="_ _ x _ _" onclick="agregaDimension()">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Detalles Físicos</label>
                        <input type="text" class="form-control" name="detalles" id="inputDetalles" placeholder="" onclick="agregaDetalles()">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Material Adicional</label>
                        <input type="text" class="form-control" name="materialad" id="inputMaterial" placeholder="" onclick="agregaMaterial()">
                    </div>

                    <div class="form-group">
                      <label>Ubicación *</label>
                      <select class="form-control select2" name="ubicacion" style="width: 100%;">
                        <option name="ubicacion">Stand A1</option>
                        <option name="ubicacion">Stand A2</option>
                        <option name="ubicacion">Stand A3</option>
                        <option name="ubicacion">Stand A4</option>
                        <option name="ubicacion">Stand A5</option>
                        <option name="ubicacion">Stand B1</option>
                        <option name="ubicacion">Stand B2</option>
                        <option name="ubicacion">Stand B3</option>
                        <option name="ubicacion">Stand B4</option>
                        <option name="ubicacion">Stand B5</option>
                        <option name="ubicacion">Stand C1</option>
                        <option name="ubicacion">Stand C2</option>
                        <option name="ubicacion">Stand C3</option>
                        <option name="ubicacion">Stand C4</option>
                        <option name="ubicacion">Stand C5</option>
                        <option name="ubicacion">Stand D1</option>
                        <option name="ubicacion">Stand D2</option>
                        <option name="ubicacion">Stand D3</option>
                        <option name="ubicacion">Stand D4</option>
                        <option name="ubicacion">Stand D5</option>
                        <option name="ubicacion">Stand E1</option>
                        <option name="ubicacion">Stand E2</option>
                        <option name="ubicacion">Stand E3</option>
                        <option name="ubicacion">Stand E4</option>
                        <option name="ubicacion">Stand E5</option>
                      </select>
                  </div>  

                    <div class="form-group">
                        <label for="inputEXTENSION">Lugar de sustentacion</label>
                        <input type="text" class="form-control" name="lugarsus" id="inputEXTENSION" value="Facultad de Ingeniería de Sistemas - UNMSM">
                    </div>

                        
              </div><!-- End Box-Body -->
           </div><!-- End Segundo Panel -->
                 
      
                  

                  <!-- Tercer Panel -->
          <div class="tab-pane fade" id="tercero">
              <div class="box-body">
                        
                        <!-- 1. Resumen -->
                    <div class="form-group">
                        <label for="inputSummary">Resumen</label>
                        <textarea class="form-control" rows="3" name="summary" id="inputSummary" placeholder="">No presenta resumen</textarea> 
                     </div>

                     <div class="form-group">
                        <label for="inputContent">Contenido</label>
                        <textarea class="form-control" rows="3" name="contenido" id="inputContent" placeholder="">No presenta contenido</textarea> 
                     </div>  
                    
                    <div class="form-group">
                        <label for="inputConclusion">Conclusiones</label>
                        <textarea class="form-control" rows="3" name="conclusions" id="inputConclusion"  placeholder="">No presenta conclusiones</textarea> 
                    </div>

                    <div class="form-group">
                        <label for="inputRecomend">Recomendaciones</label>
                        <textarea class="form-control" rows="3" name="recomendacion" id="inputRecomend"  placeholder="">No presenta conclusiones</textarea> 
                    </div>

                    <div class="form-group">
                        <label for="inputBibliografia">Bibliografía</label>
                        <textarea class="form-control" rows="3" name="bibliografia" id="inputBibliografia"  placeholder="">No presenta bibliografia</textarea> 
                    </div>
                        
               </div><!-- End Box-Body -->
          </div><!-- End Tercer  Panel -->





              <!-- Cuarto Panel -->
            <div class="tab-pane fade" id="cuarto">
               
                <div class="box box-default box-solid" id="itemBox">
              <div class="box-header">
                  <h3 class="box-title">Item principal</h3>
                  <!-- Cambiar por un diseño mas atractivo cuando este funcionando -->
                  <div class="box-tools pull-right">
                    <button type="button" id="agregarItem" class="btn btn-box-tool"><i class="fa fa-plus"></i></button>
                  </div>
              </div>
              <div class="box-body">
                  
                  <div class="form-group">
                      <label for="inputIncomeNumber">Nº Ingreso *</label>
                      <input type="text" onkeypress="return isNumberKey(event)" class="form-control solo-numeros" name="incomeNumber0" id="inputIncomeNumber"  placeholder="_ _ _ _ _ _">
                  </div>
                  <div class="form-group">
                      <label for="inputBarcode">Código de barra *</label>
                      <input type="text" onkeypress="return isNumberKey(event)" class="form-control solo-numeros" value="20000000" name="barcode0" id="inputBarcode" data-inputmask='"mask": "200000009999"' data-mask>
                  </div>
                  <div class="form-group">
                      <label for="inputCopy">Ejemplar *</label>
                      <input type="text" onkeypress="return isNumberKey(event)" class="form-control solo-numeros" value="1" name="copy0" id="inputCopy" placeholder="" required>
                  </div>
              </div>
            </div>




             </div><!-- End Cuarto Panel -->

          </div>
        </div>
      </div>

                
        </div><!-- End Box-solid -->
      </div><!-- End col-md-6 -->



    <div class="box-footer">
       <button type="submit" class="btn btn-primary" id="eliminarItem">Crear</button>
    </div>

  </form>

</div>




<script type="text/javascript">
  function agregaDimension(){
    document.getElementById("inputDimension").value = "30 cm";
  }
  function agregaDetalles(){
    document.getElementById("inputDetalles").value = "Contiene cuadros, imagenes, esquemas, mapas";
  }
  function agregaMaterial(){
    document.getElementById("inputMaterial").value = "Viene incorporado con 1 cd";
  }
</script>

@section('scriptSelectAutorPrincipal')
  <script type="text/javascript">
    $(function () {
      //Inicializar selectores de las editoriaes , principales y secundarias
        //Selectores generales
        //Select del autor
        $(".select2").select2();
        var $listaSec = $("#listAutorSecond").select2();
        var $listaPrim = $("#selectAutorMain").select2({
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
        $(".clearSelect2").on("click", function (){ $listaSec.val(null).trigger("change"); });
      //INICIO DE  PRUEBA -> Deshabilitar una opcion
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
            if ($('#listAutorSecond').val()!=null) {
              //Guardando los datos seleccionados (editoriales secundarias) en un arreglo
              datos = $('#listAutorSecond').val().slice();
              //Recorriendo los datos seleccionados para compararlo con el que se esta deshabilitando
              for (var i = 0; i < datos.length; i++) {
                //Si lo encuentra entonces
                if(opc==datos[i]) {
                  //Eliminando opciones seleccionadas de AUTORES secundarias
                  $('#listAutorSecond').val(null);
                  //Agregando nuevamente los elementos seleccionados
                  for (var i = 0; i < datos.length; i++) {
                    if (datos[i]==opc) {
                      // alert("datos["+i+"]: "+datos[i]+"   Opcion: "+opc);
                      //Guardando la posicion del elemento que se encuentra seleccionado y se quiere deshabilitar
                      var pos = datos.indexOf(""+opc+"");
                      //Eliminando opcion que se deshabilitara en las listas de opciones seleccionadas de autores secundarias
                      datos.splice(pos, 1);
                    }
                  }
                }
              }
            }
            //Deshabilita la opcion seleccionada
            $("#listAutorSecond option").each(function(){
              //Comparando opcion para deshabilitar
              if(opc==$(this).attr('value')){
                //Deshabilitando la opcion
                $(this).attr("disabled","disabled");
                // alert('Deshabilitando opcion '+$(this).text()+' valor '+ $(this).attr('value'));
                //Reinicializando
                reiniciarSelect('#listAutorSecond');
              }
            });
          }
          function habilitar(opcD){
            //Eliminando y volviendo a inicializar el selector cuando se habilite las opciones , sin esto
            //solo se muestra deshabilitado la primera vez que se inicia el selector
            reiniciarSelect('#listAutorSecond');
            //fin
            $("#listAutorSecond option").each(function(){
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
      //FIN DE PRUEBAS
     //Definiendo los tooltip
        $('[data-toggle="tooltip"]').tooltip();
        //Declarando inputmask para el issn y barcode , Los patrones seran agregados al final
        $("[data-mask]").inputmask();
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
                                '<input type="text" onkeypress="return isNumberKey(event)" class="form-control" name="incomeNumber'+idCont+'" id="inputIncomeNumber" placeholder="_ _ _ _ _ _">'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label for="inputBarcode">Código de barra</label>'+
                              '<input type="text" onkeypress="return isNumberKey(event)" class="form-control" value="20000000" name="barcode'+idCont+'" id="inputBarcode" placeholder="">'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<label for="inputCopy">Ejemplar</label>'+
                                '<input type="text" onkeypress="return isNumberKey(event)" value="'+(idCont+1)+'" class="form-control" name="copy'+idCont+'" id="inputCopy" placeholder="">'+
                            '</div>'+
                        '</div>';
      var itemPanel = '<div class="BoxItemThesi box box-default box-solid" id="itemBoxID'+idCont+'">'+itemHeader+itemBody +'</div>';
      $(container).after(itemPanel);
      idCont = idCont + 1 ;
    });
    $('#eliminarItem').click(function(){
        $('.BoxItemThesi:hidden').remove();
    })
  });
  </script>
@endsection


