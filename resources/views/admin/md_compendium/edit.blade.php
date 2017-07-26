<div class="box box-primary">
	<div class="box-header with-border">
		<i class="fa fa-edit"></i>
		<h3 class="box-title">Editar</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<!-- /.box-header -->
	@if($id!=null) @foreach($compendios as $compendio) @if($compendio->id
	== $id)
	<form method="POST" action="{{ url('/admin/compendium')}}/{{$id}}">
		<!-- Envia los datos a la funcion update del controlador luego de presionar edit -->
		<input type="hidden" name="_method" value="put" /> {{ csrf_field() }}
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
						<label for="inputTitle">Titulo</label> <input type="text"
							class="form-control" value="{{$compendio->title}}" name="title"
							id="inputTitle" placeholder="">
					</div>
					<div class="form-group">
						<label for="inputTitle">introduccion</label> <span>*</span>
						<textarea rows="3" class="form-control" name="introduccion"
							id="inputintroduccion" placeholder="">{{$compendio->introduccion}}</textarea>
					</div>
					<div class="form-group">
						<label>Entidad académica</label> <select
							class="form-control select" name="author">
							<!-- Cargando opciones de autores --> @foreach($autores as
							$autor) @foreach($autor->categories as $category)
							@if($category->name == "compendio"){
							<!-- Si el id del autor del bucle es igual al autor de la compendio seleccionada  -->
							@if($autor->id == $compendio->author->id)
							<!-- Entonces muestro al autor como seleccionado -->
							<option value="{{ $autor->id }}" selected>{{ $autor->name}}</option>
							@else
							<!-- sino solo muestro al autor como una opcion -->
							<option value="{{ $autor->id }}">{{ $autor->name}}</option>
							@endif
							<!-- finsi --> } @endif @endforeach @endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Editorial</label> <span>*</span> <select
							class="form-control select2" name="editorial"
							data-placeholder="Editorial" style="width: 100%;">
                            @foreach($editoriales as  $editorial)
                              <?php $band = false ; ?>
                              @foreach($editoriales as $editorial)
                                @if($editorial->id == $compendio->editorial_id)
                                  <?php $band = true ; ?>
                                @endif
                              @endforeach

                              @if($band)
                                  <option value="{{$editorial->id }}"
								selected>{{$editorial->name}}</option>
                                  <?php $band = false; ?>
                                @else
                                  @foreach($editorial->categories as $category)
                                    @if($category->name == "compendio")
                                      <option
								value="{{ $editorial->id }}">{{$editorial->name}}</option>
							@endif @endforeach @endif @endforeach
						</select>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
								<label for="numero">Nº</label> <input type="number"
									value="{{$compendio->numero}}" class="form-control"
									name="numero" id="numero" placeholder="Nº X" min="0" max="10">
							</div>
							<div class="col-lg-6">
								<label for="inputClasification">Fecha de edición</label> <input
									type="text" value="{{$compendio->fechaEdicion}}"
									class="form-control" name="fechaEdicion"
									data-inputmask='"mask": "2099"' data-mask id="fechaEdicion"
									placeholder="XXXX">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--***************************************************************************************************************************************
                                         PANEL DE ITEM
*******************************************************************************************************************************************
-->
        <?php $contItem = 0  ?>
            @foreach($compendio->compendium_copies as $item)
              @if($loop->first)
              <div class="box box-info box-solid"
				id="{{'itemPanel'.$contItem}}">
				<div class="box-header">
					<h3 class="box-title">Item Principal</h3>
					<div class="box-tools pull-right">
						<button type="button" id="agregarItemEdit"
							class="btn btn-box-tool">
							<i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="inputIncomeNumber">Nº Ingreso</label> <span>*</span> <input
							type="text" class="form-control" value="{{$item->incomeNumber}}"
							name="{{'incomeNumber[]'}}" id="inputIncomeNumber" placeholder="">
					</div>
					<div class="form-group">
						<label for="inputCopy">Ejemplar</label> <span>*</span> <input
							type="number" class="form-control" value="{{$item->copy}}"
							name="{{'copy[]'}}" id="inputCopy" placeholder="">
					</div>
				</div>
			</div>
			@else
			<div class="BoxItemMagazineEdit box box-info box-solid"
				id="{{'itemPanel'.$contItem}}">
				<div class="box-header">
					<h3 class="panel-title">Item Secundario</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool"
							class="eliminarItem" data-widget="remove">
							<i class="fa fa-times"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="inputIncomeNumber">Nº Ingreso</label> <span>*</span> <input
							type="text" class="form-control" value="{{$item->incomeNumber}}"
							name="{{'incomeNumber[]'}}" id="inputIncomeNumber" placeholder="">
					</div>
					<div class="form-group">
						<label for="inputCopy">Ejemplar</label> <span>*</span> <input
							type="number" class="form-control" value="{{$item->copy}}"
							name="{{'copy[]'}}" id="inputCopy" placeholder="">
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
        <?php $contContent = 0  ?>
                <div class="box box-danger box-solid"
				id="{{'contentPanel'.$contContent}}">
				<div class="box-header ">
					<h3 class="panel-title">Tabla de contenido</h3>
					<div class="box-tools pull-right">
						<button type="button" id="agregarContenidoCont"
							class="btn btn-box-tool">
							<i class="fa fa-plus"></i>
						</button>
					</div>
				</div>
				<!-- PRUEBA  -->
				<div class="box-body">
					<div id="contentPanelEdit">
						@foreach($compendio->contents as $contenido) @if($loop->first)
						<div class="panel-body">
							<div class="form-group">
								<label for="inputTitleContent">Contenido</label> <input
									type="text" class="form-control"
									name="{{'titleContent'.$contContent}}"
									id="{{'inputTitleContent'.$contContent}}" placeholder=""
									value="{{$contenido->title}}">
							</div>
						</div>
						@else
						<div class="panel-body" id="{{'boxID'.$contContent}}">
							<div class="form-group">
								<label for="inputTitleContent">Contenido</label> <input
									type="text" class="form-control"
									name="{{'titleContent'.$contContent}}"
									id="{{'inputTitleContent'.$contContent}}" placeholder=""
									value="{{$contenido->title}}">
							</div>
						</div>
                        @endif
                        <?php $contContent = $contContent +1 ?>
                        @endforeach
                      </div>
				</div>
				<!--***************************************************************************************************************************************
                                          BOTON DE EDITAR
*******************************************************************************************************************************************
-->
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary" id="editMagazine">Editar</button>
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
                  var container = $('#contentPanelEdit');
                  var buttonClose = '<button id="eliminarContenido'+idContt+'" class="btn btn-xs btn-danger btn-block" type="button" name="button" ><i class="fa fa-times"></i></button>';
                  var contentHeader = '<div class="box-header with-border">'+buttonClose+'</div>'
                  var groupTitle = '<div class="form-group">'+
                                        '<label for="inputTitleContent">Contenido</label>'+
                                        '<input type="text" class="form-control" name="titleContent'+idContt+'" id="inputTitleContent'+idContt+'" placeholder="">'+
                                   '</div>';
                  var linea = '<hr>';
                  var contentBody = '<div class="panel-body" id="boxID'+idContt+'">'+groupTitle+'</div>';
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
            var buttonClose ='<div class="box-tools pull-right">  <button type="button" data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button> </div>';
            var itemHeader = '<div class="box-header">'+titleItem+buttonClose+'</div>'
            var itemBody = '<div class="box-body">'+
                                  '<div class="form-group">'+
                                      '<label for="inputIncomeNumber">Nº Ingreso</label>'+
                                      '<input type="text" class="form-control" name="{{'incomeNumber[]'}}" id="inputIncomeNumber" placeholder="">'+
                                  '</div>'+
                                  '<div class="form-group">'+
                                  '<div class="form-group">'+
                                      '<label for="inputCopy">Ejemplar</label>'+
                                      '<input type="number" class="form-control" name="{{'copy[]'}}" id="inputCopy" placeholder="" >'+
                                  '</div>'+
                              '</div>';
            var itemPanel = '<div class="BoxItemMagazineEdit box box-info box-solid" id="itemPanel'+idCont+'">'+itemHeader+itemBody +'</div>';
            $(container).after(itemPanel);
            idCont = idCont + 1 ;
          })
          $('#editMagazine').on('click',function(){
            //Eliminando los valores que tienen para poder eliminarlos en la base de datos
            $('.BoxItemMagazineEdit:hidden .form-group').find(':input').val(null);
          });
          //Cuando se hace click en editar
            $('#editMagazine').click(function(){
              //Elimina las cajas ocultadas que contiene los items
                $('.BoxItemMagazineEdit:hidden').remove();
            });
        });
      </script>
@endif @endforeach @endif
