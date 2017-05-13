 <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"><strong>Nuevo Material</strong></h3>
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
     		<!--***************************** PANEL DE NUEVA TESIS *************************************-->
           
          <!--Primera division-->
            <div class="box box-success box-solid">
                <div class="box-header">
                    <h3 class="panel-title">Informacion General</h3>
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
                        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="">
                    </div>
                    
                    <div class="form-group">
                        <label>Autor Principal</label>
                        <select class="form-control select2" id="selectAutorMain" name="autorMain[]" multiple="multiple" style="width: 100%;" data-placeholder="Autor Principal">
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
                        <label>Editorial</label>
                        <select class="form-control select2" name="editorial" style="width: 100%;">
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
                      <input type="text" class="form-control" name="clasification" id="inputClasification" placeholder="">
                  </div>

                    
                    <div class="form-group">
                        <label>Asesor</label>
                        <select class="form-control select2" name="asesor" style="width: 100%;">
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
        <!--Fin de la primera division-->

        <!--Segunda division-->  
          <div class="box box-info box-solid">
                <div class="box-header">
                    <h3 class="box-title">Descripción Física</h3>
                </div>
                <div class="box-body" id="thesisPanel">
                    
                    <div class="form-group">
                        <label for="inputHojas">Nº de hojas</label>
                        <input type="text" class="form-control" name="nhojas" id="inputHojas" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEdition">Edicion</label>
                        <input type="text" class="form-control" name="edition" id="inputEdition" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Extension</label>
                        <input type="text" class="form-control" name="extension" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Dimensiones</label>
                        <input type="text" class="form-control" name="dimension" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Detalles Físicos</label>
                        <input type="text" class="form-control" name="detalles" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Material Adicional</label>
                        <input type="text" class="form-control" name="materialad" id="inputEXTENSION" placeholder="">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Ubicacion</label>
                        <input type="text" class="form-control" name="ubicacion" id="inputEXTENSION" value="Estante Nº ">
                    </div>

                    <div class="form-group">
                        <label for="inputEXTENSION">Lugar de sustentacion</label>
                        <input type="text" class="form-control" name="lugarsus" id="inputEXTENSION" value="Facultad de Ingeniería de Sistemas">
                    </div>

                    
                 </div>
          </div>
        <!--Fin de la segunda division-->

        <!--Inicio de la tercera division-->
            <div class="box box-warning box-solid">
                <div class="box-header">
                    <h3 class="box-title">Resumen y Contenido del Material</h3>
                </div>
                <div class="box-body" id="thesisPanel">
                              
                     <div class="form-group">
                        <label for="inputSummary">Resumen</label>
                        <textarea class="form-control" rows="3" name="summary" id="inputSummary" placeholder=""></textarea> 
                     </div>

                     <div class="form-group">
                        <label for="inputContent">Contenido</label>
                        <textarea class="form-control" name="contenido" id="inputContent" placeholder=""></textarea> 
                     </div>  
                    
                </div>
            </div>
        <!--Fin de la tercera division-->

 				
 			<!--****Inicio de la cuarta division***-->
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
                      <label for="inputIncomeNumber">Nº Ingreso</label>
                      <input type="text" class="form-control" name="incomeNumber0" id="inputIncomeNumber" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="inputBarcode">Código de barra</label>
                      <input type="text" class="form-control" value="20000000" name="barcode0" id="inputBarcode" data-inputmask='"mask": "200000009999"' data-mask>
                  </div>
                  <div class="form-group">
                      <label for="inputCopy">Ejemplar</label>
                      <input type="number" class="form-control" name="copy0" id="inputCopy" placeholder="">
                  </div>
              </div>
            </div>

      <!--Fin de la cuarta division-->

     </div>

    <div class="box-footer">
   <button type="submit" class="btn btn-primary">Crear</button>
  </div>
 </form>

</div>


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
                if (opc==datos[i]) {
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
      var buttonClose ='<div class="box-tools pull-right">  <button type="button" id="eliminarItem" data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button> </div>';
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
                                '<input type="number" class="form-control" name="copy'+idCont+'" id="inputCopy" placeholder="">'+
                            '</div>'+
                        '</div>';
      var itemPanel = '<div class="box box-info box-solid" id="itemBoxID'+idCont+'">'+itemHeader+itemBody +'</div>';
      $(container).after(itemPanel);
      idCont = idCont + 1 ;
    });
    $('#eliminarItem').click(function(){})
  });
  </script>
@endsection