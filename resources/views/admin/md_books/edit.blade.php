<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Editar</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>

	<form action="{{ route('book.update', $book->id) }}" method="POST">
		{{ csrf_field() }} {{ method_field('PUT') }}

		<div class="box-body">

			<div class="col-md-6">
				<div class="box box-success box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Libro</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool"
								data-widget="collapse">
								<i class="fa fa-minus"></i>
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
								<!-- Primer panel -->
								<div class="tab-pane active" id="primero">
									<div class="box-body">
										<!--1. Titulo -->
										<div class="form-group">
											<label>Titulo</label> <input type="text" name="title"
												class="form-control" id="title" value="{{$book->title}}"
												required>
										</div>
										<!--1. Fin de Titulo -->

										<!--2. Resto de Titulo -->
										<div class="form-group">
											<label>Resto de Titulo</label> <input type="text"
												name="secondaryTitle" class="form-control"
												id="secondaryTitle" value="{{$book->secondaryTitle}}">
										</div>
										<!--2. Fin Resto de Titulo -->

										<!--3. Clasificacion -->
										<div class="form-group">
											<label>Clasificacion</label> <input type="text"
												name="clasification" class="form-control" id="clasification"
												value="{{$book->clasification}}" required>
										</div>
										<!--3. Fin clasificacion -->

										<div class="form-group">
											<label>Edicion</label> <input type="text" name="edition"
												class="form-control" id="edition" value="{{$book->edition}}"
												required>
										</div>


										
										<div class="form-group">
											<label>Autor Principal</label> <select
												class="form-control select2" name="primaryAuthor[]"
												multiple="multiple""> @foreach($autores as $autor)
													@foreach($autor->categories as $category) @if($category->id
													== 1)
													<option value="{{ $autor->id }}"
														<?php
											            foreach ($book->authors as $a) {
											               if ($a->id == $autor->id && $a->pivot->type) {
											                  echo " selected ";
											                  break;
											               }
											            }
											            ?>
           										 	>{{$autor->name}}</option> @endif @endforeach @endforeach
											</select>
										</div>

										<div class="form-group">
											<label>Autor Secundario</label> <select
												class="form-control select2" name="secondaryAuthor[]"
												multiple="multiple">@foreach($autores as $autor)
													@foreach($autor->categories as $category) @if($category->id
													== 1)
													<option value="{{ $autor->id }}"
														<?php
											            foreach ($book->authors as $a) {
											               if ($a->id == $autor->id && !$a->pivot->type) {
											                  echo " selected ";
											                  break;
											               }
											            }?>
											        >{{$autor->name}}</option> @endif @endforeach @endforeach
											</select>
										</div>

										<div class="form-group">
											<label>Editorial</label> <select class="form-control select2"
												name="editorial[]"">@foreach($editoriales as $editorial)
													@foreach($editorial->categories as $category)
													@if($category->name == "libro"){
													<option value="{{ $editorial->id }}"
														<?php
											            foreach ($book->editorials as $e) {
											               if ($e->id == $editorial->id && $e->pivot->type) {
											                  echo " selected ";
											                  break;
											               }
											            }?>
											        >{{$editorial->name}}</option> }@endif @endforeach @endforeach
											</select>
										</div>

										<div class="form-group">
											<label>Anexos</label> <select class="form-control select2"
												name="secondaryEditorial[]" multiple="multiple">@foreach($editoriales as $editorial)
												@foreach($editorial->categories as $category)
													@if($category->name == "libro"){
													<option value="{{ $editorial->id }}"
														<?php
											            foreach ($book->editorials as $e) {
											               if ($e->id == $editorial->id && !$e->pivot->type) {
											                  echo " selected ";
											                  break;
											               }
											            }?>
											        >{{$editorial->name}}</option> }@endif @endforeach @endforeach
											</select>
										</div>

										

									</div>
									<!-- End Box-body -->
								</div>
								<!-- End Primer Panel -->

								<!-- Segundo Panel -->
								<div class="tab-pane fade" id="segundo">
									<div class="box-body">

										<!-- 1. Resumen -->
										<div class="form-group">
											<label>Resumen</label>
											<textarea class="form-control" rows="3" name="summary"
												id="inputSummary">{{$book->summary}}</textarea>
										</div>
										<!-- 1. Fin Resumen -->

										<!-- 2. Capitulos -->

										<div class="form-group">
											<label>Capitulos</label>
											<div id="contenedor">
					                            @foreach($book->chapters as $c)
					                            <?php $cont=$c->number-1; ?>
					                              <div class="input-group">
													<span class="input-group-addon">{{$c->number}}</span> <input
														type="text" id="campo_{{$cont}}" name="chapter[{{$cont}}]"
														class="form-control" value="{{$c->name}}" required>
													@if($cont>0) <span id="eliminarCampo"
														class="input-group-addon eliminar"><i class="fa fa-remove"></i></span>
													@else <span id="agregarCampo" class="input-group-addon"><i
														class="fa fa-plus"></i></span> @endif
												</div>
												@endforeach
											</div>
										</div>

										<!-- 2. Fin capitulos -->

										<div class="form-group">
											<label>Isbn</label> <input type="text" name="isbn"
												class="form-control" value="{{$book->isbn}}">
										</div>

										<div class="form-group">
											<label>Libros relacionados</label> <select
												class="form-control select2" name="relationBook[]"
												multiple="multiple" style="width: 100%;"> @foreach($books as
												$book_aux)
												<option value="{{ $book_aux->id }}">{{$book_aux->name}}</option>
												@endforeach
											</select>
										</div>




										<div class="form-group">
											<label>Ubicacion en Biblioteca</label> <input type="text"
												name="libraryLocation" class="form-control"
												value="{{$book->libraryLocation}}">
										</div>

										<div class="form-group">
											<label>Descripcion Fisica</label>
											<div class="form-horizontal">
												<div for="ejemplo_password_3" class="col-xs-6 control-label">Extension</div>
												<div class="col-xs-6">
													<input type="text" name="extension" class="form-control"
														value="{{$book->extension}}" required>
												</div>

												<div for="ejemplo_password_3" class="col-xs-6 control-label">Otros
													detalles fisicos</div>
												<div class="col-xs-6">
													<input type="text" name="physicalDetails"
														class="form-control" value="{{$book->physicalDetails}}">
												</div>

												<div for="ejemplo_password_3" class="col-xs-6 control-label">Dimensiones</div>
												<div class="col-xs-6">
													<input type="text" name="dimensions" class="form-control"
														value="{{$book->dimensions}}" required>

												</div>
												<div for="ejemplo_password_3" class="col-xs-6 control-label">Material
													de Acompañamiento</div>
												<div class="col-xs-6">
													<input type="text" name="accompaniment"
														class="form-control" value="{{$book->accompaniment}}">
												</div>
											</div>

										</div>

									</div>
									<!-- End Box-Body -->
								</div>
								<!-- End Segundo Panel -->
							</div>

						</div>
						<!-- End nav-bar -->
					</div>
					<!-- End Box-body -->

				</div>
				<!-- End Box-solid -->
			</div>
			<!-- End col-md-6 -->


			<div class="col-md-6">
				<div class="box box-success box-solid">
					<div class="box-header with-border">
						<h3 class="box-title">Item</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool"
								data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="box-body">


						<div class="bs-example" data-expample-id="simple-nav-tabs">


							<ul class="nav nav-tabs" id="contenedor-pestañas">
								<li><a type="button" href="#" class="agregarItem"><i
										class="fa fa-plus"></i></a></li>
								<li><a type="button" href="#" class="eliminarItem"><i
										class="fa fa-remove"></i></a></li>
                <?php $cont=1; ?>
                @foreach($book->bookCopies as $bc)
                  @if($cont==1)
                  <li class="active"><a href="#item{{$cont}}"
									id="cabezera-item{{$cont}}" data-toggle="tab">Item{{$cont}}&nbsp</a></li>
								@else
								<li><a href="#item{{$cont}}" id="cabezera-item{{$cont}}"
									data-toggle="tab">Item{{$cont}}&nbsp</a></li>
                  @endif
                  <?php $cont=$cont+1; ?>
                 @endforeach
                  
               </ul>

							<!--************************** CONTENIDO DE ITEM 1 ***********************************-->
							<div class="tab-content" id="contenedor-item">

               <?php $cont=0; ?>
               <?php $cont2=1; ?>
               @foreach($book->bookCopies as $bc)
                  @if($cont==0)
                  <div class="tab-pane active" id="item{{$cont2}}">
									@else
									<div class="tab-pane fade" id="item{{$cont2}}">
										@endif
										<div class="box-body">
											<div class="bs-example" data-example-id="simple-nav-tabs">
												<ul class="nav nav-tabs">
													<li class="active"><a href="#primero{{$cont2}}"
														data-toggle="tab">Primero</a></li>
													<li><a href="#segundo{{$cont2}}" data-toggle="tab">Segundo</a></li>
													
												</ul>

												<div class="tab-content">
													<div class="tab-pane active" id="primero{{$cont2}}">
														<div class="box-body">
															<div class="form-group">
																<label>clasificacion</label> <input type="text"
																	class="form-control" value="{{$bc->clasification}}" disabled="true">
															</div>
															<div class="form-group">
																<label>Numero de Ingreso</label> <input type="text"
																	name="incomeNumber[{{$cont}}]" class="form-control"
																	value="{{$bc->incomeNumber}}" required>
															</div>

															<div class="form-group">
																<label>Codigo de Barras</label> <input type="text"
																	name="barcode[{{$cont}}]" class="form-control"
																	value="{{$bc->barcode}}" required>
															</div>

															<div class="form-group">
																<label>Volumen</label> <input type="text"
																	name="volume[{{$cont}}]" class="form-control"
																	value="{{$bc->volume}}">
															</div>

															<div class="form-group">
																<label>Gestion</label> <input type="text"
																	name="management[{{$cont}}]" class="form-control"
																	value="{{$bc->management}}" required>
															</div>

															<div class="form-group">
																<label>Disponibilidad</label> <select
																	class="form-control select2"
																	name="availability[{{$cont}}]" style="width: 100%;">
																	<option @if($bc->availability == true) selected
																		@endif>Disponible</option>
																	<option @if($bc->availability == false) selected
																		@endif>No Disponible</option>
																</select>
															</div>

														</div>
													</div>

													<div class="tab-pane fade" id="segundo{{$cont2}}">
														<div class="box-body">
															<div class="form-group">
																<label>Modalidad de Adquision</label> <select
																	class="form-control select2"
																	name="acquisitionModality[{{$cont}}]"
																	style="width: 100%;">
																	<option @if($bc->acquisitionModality == "Compra")
																		selected @endif>Compra</option>

																	<option @if($bc->acquisitionModality == "Donacion")
																		selected @endif>Donacion</option>

																	<option @if($bc->acquisitionModality == "Adquisicion")
																		selected @endif>Adquisicion</option>

																</select>
															</div>

															<div class="form-group">
																<label>Fuente de Adquisicion</label> <input type="text"
																	class="form-control"
																	name="acquisitionSource[{{$cont}}]"
																	value="{{$bc->acquisitionSource}}" required>
															</div>

															<div class="form-group">
																<label>Precio de Adquisicion</label> <input type="text"
																	name="acquisitionPrice[{{$cont}}]" class="form-control"
																	value="{{$bc->acquisitionPrice}}">
															</div>

															<div class="form-group">
																<label>Fecha de Adquisicion</label> <input type="text"
																	name="acquisitionDate[{{$cont}}]" class="form-control"
																	value="{{$bc->acquisitionDate}}" required>
															</div>

															<div class="form-group">
																<label>Tipo de Impresion</label> <select
																	class="form-control select2"
																	name="printType[{{$cont}}]" style="width: 100%;">
																	<option @if($bc->printType == "Impresion") selected
																		@endif >Impresion</option>
																	<option @if($bc->printType == "Reimpresion") selected
																		@endif >Reimpresion</option>
																</select>
															</div>

															<div class="form-group">
																<label>Lugar de Publicacion</label> <input type="text"
																	name="publicationLocation[{{$cont}}]"
																	class="form-control"
																	value="{{$bc->publicationLocation}}" required>
															</div>

															<div class="form-group">
																<label>Fecha de Publicacion</label> <input type="text"
																	name="publicationDate[{{$cont}}]" class="form-control"
																	value="{{$bc->publicationDate}}" required>
															</div>

														</div>
													</div>

												</div>
												<!-- End Tab Content-->

											</div>
											<!-- End navbar -->
										</div>
										<!-- End box-body -->
									</div>
									<!-- End tab-pane -->
                 <?php $cont=$cont +1; ?>
                 <?php $cont2=$cont2 +1; ?>
               @endforeach


               </div>
								<!-- End tab-content -->
								<!--*************************** FIN CONTENIDO ITEM1 ***********************************-->


							</div>
							<!-- End nav.bar -->

						</div>
						<!-- End box-body -->
					</div>
					<!-- End box-solid -->

				</div>
				<!-- End coll-md-6 -->

			</div>

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Editar</button>
				<a href="#0" type="button"
								class="button-content btn btn-warning" id="crearLibro"><i
								class="fa fa-book"></i>Crear Libros</a> 
			</div>
	
	</form>

</div>

<script>
  $(document).ready(function(){
    var contenedorPestañas = $("#contenedor-pestañas");
    var contenedorItem = $('#contenedor-item');
    var AddButton1 = $("#agregarItem");
    var x = $("#contenedor-pestañas li").length-2;
    
    var FieldCount = x;
    var arreglo;
    $(".agregarItem").click(function(){
      
      FieldCount++;
    
      arreglo = FieldCount-1;
      $(contenedorPestañas).append('<li><a href="#item'+FieldCount+'" id="cabezera-item'+FieldCount+'" data-toggle="tab">Item'+FieldCount+'</a></li>');
        
      $(contenedorItem).append(
              '<div class="tab-pane fade" id="item'+FieldCount+'">'
                 +'<div class="box-body">'
                   +'<div class="bs-example" data-example-id="simple-nav-tabs"> '
                    +'<ul class="nav nav-tabs">'
                      +'<li class="active"><a href="#primero'+FieldCount+'" data-toggle="tab">Primero</a></li>'
                      +'<li><a href="#segundo'+FieldCount+'" data-toggle="tab">Segundo</a></li>'
                      +'<li><a href="#tercero'+FieldCount+'" data-toggle="tab">Tercero</a></li>'
                    +'</ul>'
                    +'<div class="tab-content">'
                      +'<div class="tab-pane active" id="primero'+FieldCount+'">'
                       +'<div class="box-body">'
                          +'<div class="form-group">'
                            +'<label>Numero de Ingreso</label>'
                            +'<input type="text" name="incomeNumber['+arreglo+']" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Codigo de Barras</label>'
                            +'<input type="text" name="barcode['+arreglo+']" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Volumen</label>'
                            +'<input type="text" name="volume['+arreglo+']" class="form-control">'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Gestion</label>'
                            +'<input type="text" name="management['+arreglo+']" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Disponibilidad</label>'
                            +'<select class="form-control select2" name="availability['+arreglo+']" style="width: 100%;">'
                                +'<option>Disponible</option>'
                                +'<option>No Disponible</option>'                              
                            +'</select>'
                          +'</div>'
                        +'</div>'
                      +'</div>'
                      
                      +'<div class="tab-pane fade" id="segundo'+FieldCount+'">'
                        +'<div class="box-body">'
                          +'<div class="form-group">'
                            +'<label>Modalidad de Adquision</label>'
                            +'<select class="form-control select2" name="acquisitionModality['+arreglo+']"  style="width: 100%;">'
                                +'<option>Compra</option> '
                                +'<option>Donacion</option>'
                                +'<option>Adquisicion</option>  '                             
                            +'</select>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Fuente de Adquisicion</label>'
                            +'<input type="text" name="acquisitionSource['+arreglo+']" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Precio de Adquisicion</label>'
                            +'<input type="text" name="acquisitionPrice['+arreglo+']" class="form-control">'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Fecha de Adquisicion</label>'
                            +'<input type="text" name="acquisitionDate['+arreglo+']" class="form-control" required>'
                          +'</div>'
                        +'</div>'
                      +'</div>'
                      +'<div class="tab-pane fade" id="tercero'+FieldCount+'">'
                        +'<div class="box-body">'
                          +'<div class="form-group">'
                            +'<label>Tipo de Impresion</label>'
                            +'<select class="form-control select2" name="printType['+arreglo+']" style="width: 100%;">'
                                +'<option>Impresion</option>' 
                                +'<option>Reimpresion</option>   '                           
                            +'</select>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Lugar de Publicacion</label>'
                            +'<input type="text" name="publicationLocation['+arreglo+']" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Fecha de Publicacion</label>'
                            +'<input type="text" name="publicationDate['+arreglo+']" class="form-control" required>'
                          +'</div>'
                         
                        +'</div>'
                      +'</div>'
                    
                    +'</div><!-- End Tab Content--> '
                                
                  +'</div><!-- End navbar -->'
                 +'</div><!-- End box-body -->'
               +'</div><!-- End tab-pane -->');
      x++;
    });
  
    $(".eliminarItem").click(function(){
      if (FieldCount>1) {
        $("#item"+FieldCount).remove();
        $("#cabezera-item"+FieldCount).remove();
        FieldCount = FieldCount-1;
      }
      
    });
    return false;
  });
</script>




<script>
  $(document).ready(function() {

  	$("#crearLibro").on('click',function(event){ 
        $id = $(this).data('id');
        $("#div-new").html('<div class="box box-warning box-solid"><div class="box-header with-border"><h3 class="box-title">Cargando</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
        $("#div-new").load('{{ url("/admin/book/create") }}');
     })

    var MaxInputs       = 100; //Número Maximo de Campos
    var contenedor       = $("#contenedor"); //ID del contenedor
    var AddButton       = $("#agregarCampo"); //ID del Botón Agregar
    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos
    
    $(AddButton).click(function (e) {
        if(x <= MaxInputs) //max input box allowed
        {   
            FieldCount++;
            //agregar campo
            var array = FieldCount-1;
            $(contenedor).append('<div class="input-group"><span class="input-group-addon">'+FieldCount+'</span><input type="text" id="campo_'+FieldCount+'" name="chapter['+array+']" class="form-control" required><span id="eliminarCampo"  class="input-group-addon eliminar"><i class="fa fa-remove"></i></span></div>');
            x++; //text box increment
        }
        return false;
    });
    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
            FieldCount--;
        }
        return false;
    });
  });
</script>
<script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();
      });
</script>

