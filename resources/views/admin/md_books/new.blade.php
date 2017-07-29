<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Nuevo</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>


	<form method="POST" id="formulario" action="{{ url('/admin/book') }}">
		{{ csrf_field() }}

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
												class="form-control" id="title" required>
										</div>
										<!--1. Fin de Titulo -->

										<!--2. Resto de Titulo -->
										<div class="form-group">
											<label>Resto de Titulo</label> <input type="text"
												name="secondaryTitle" class="form-control"
												id="secondaryTitle" value="">
										</div>
										<!--2. Fin Resto de Titulo -->

										<!--3. Clasificacion -->
										<div class="form-group">
											<label>Clasificacion</label> <input type="text"
												name="clasification" class="form-control" id="clasification"
												required>
										</div>
										<!--3. Fin clasificacion -->

										<div class="form-group">
											<label>Edicion</label> <input type="text" name="edition"
												class="form-control" id="edition" required>
										</div>

										<!--4. Autor -->
										<div class="form-group">
											<label>Autor Principal</label> <select
												class="form-control select2" name="primaryAuthor[]"
												multiple="multiple""> @foreach($autores as $autor)
												@foreach($autor->categories as $category) @if($category->id
												== 1)
												<option value="{{ $autor->id }}">{{$autor->name}}</option>
												@endif @endforeach @endforeach
											</select>
										</div>

										<div class="form-group">
											<label>Autor Secundario</label> <select
												class="form-control select2" name="secondaryAuthor[]"
												multiple="multiple"> @foreach($autores as $autor)
												@foreach($autor->categories as $category) @if($category->id
												== 1)
												<option value="{{ $autor->id }}">{{$autor->name}}</option>
												@endif @endforeach @endforeach
											</select>
										</div>

										<div class="form-group">
											<label>Editorial</label> <select class="form-control select2"
												name="editorial[]""> @foreach($editoriales as $editorial)
												@foreach($editorial->categories as $category)
												@if($category->name == "libro"){
												<option value="{{ $editorial->id }}">{{$editorial->name}}</option>
												}@endif @endforeach @endforeach
											</select>
										</div>

										<div class="form-group">
											<label>Anexos</label> <select class="form-control select2"
												name="secondaryEditorial[]" multiple="multiple">
												@foreach($editoriales as $editorial)
												@foreach($editorial->categories as $category)
												@if($category->name == "libro"){
												<option value="{{ $editorial->id }}">{{$editorial->name}}</option>
												}@endif @endforeach @endforeach
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
												id="Summary" placeholder=""></textarea>
										</div>
										<!-- 1. Fin Resumen -->

										<!-- 2. Capitulos -->
										<div class="form-group">
											<label>Capitulos</label>
											<div id="contenedor">
												<div class="input-group">
													<span class="input-group-addon">1</span> <input type="text"
														id="campo_1" name="chapter[0]" class="form-control"
														required> <span id="agregarCampo"
														class="input-group-addon"><i class="fa fa-plus"></i></span>
												</div>

											</div>
										</div>
										<!-- 2. Fin <center></center>apitulos -->

										<div class="form-group">
											<label>Isbn</label> <input type="text" name="isbn" id="isbn"
												class="form-control" value="">
										</div>

										<div class="form-group">
											<label>Libros relacionados</label> <select
												class="form-control select2" name="relationBook[]"
												multiple="multiple" style="width: 100%;"> @foreach($books as
												$book)
												<option value="{{ $book->id }}">{{$book->name}}</option>
												@endforeach
											</select>
										</div>

										<div class="form-group">
											<label>Ubicacion en Biblioteca</label> <input type="text"
												name="libraryLocation" class="form-control"
												id="libraryLocation" value="">
										</div>

										<div class="form-group">
											<label>Descripcion Fisica</label>
											<div class="form-horizontal">
												<div for="ejemplo_password_3" class="col-xs-6 control-label">Extension</div>
												<div class="col-xs-6">
													<input type="text" name="extension" id="extension"
														class="form-control" required>
												</div>

												<div for="ejemplo_password_3" class="col-xs-6 control-label">Otros
													detalles fisicos</div>
												<div class="col-xs-6">
													<input type="text" name="physicalDetails"
														id="physicalDetails" class="form-control">
												</div>

												<div for="ejemplo_password_3" class="col-xs-6 control-label">Dimensiones</div>
												<div class="col-xs-6">
													<input type="text" name="dimensions" id="dimensions"
														class="form-control" required>

												</div>
												<div for="ejemplo_password_3" class="col-xs-6 control-label">Material
													de Acompañamiento</div>
												<div class="col-xs-6">
													<input type="text" name="accompaniment" id="accompaniment"
														class="form-control">
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
			<!-- /*/*/*/*/*/*/*/*/*/*/*/*/*/*/ACA ESTA ****************************************/*//////**/*/*/*/ -->

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
								<li class="active"><a href="#item1" id="cabezera-item1"
									data-toggle="tab">Item1&nbsp</a></li>


							</ul>

							<!--************************** CONTENIDO DE ITEM 1 ***********************************-->
							<div class="tab-content" id="contenedor-item">

								<div class="tab-pane active" id="item1">
									<div class="box-body">
										<div class="bs-example" data-example-id="simple-nav-tabs">
											<ul class="nav nav-tabs">
												<li class="active"><a href="#primero1" data-toggle="tab">Primero</a></li>
												<li><a href="#segundo1" data-toggle="tab">Segundo</a></li>
											</ul>

											<div class="tab-content">
												<div class="tab-pane active" id="primero1">
													<div class="box-body">
														<div class="form-group">
															<label>Numero de Ingreso</label> <input type="text"
																name="incomeNumber[0]" id="incomeNumber1"
																class="form-control" required>
														</div>

														<div class="form-group">
															<label>Codigo de Barras</label> <input type="text"
																name="barcode[0]" id="barcode1" class="form-control"
																required>
														</div>

														<div class="form-group">
															<label>Volumen</label> <input type="text"
																name="volume[0]" id="volume1" class="form-control">
														</div>

														<div class="form-group">
															<label>Gestion</label> <input type="text"
																name="management[0]" id="management1"
																class="form-control" required>
														</div>

														<div class="form-group">
															<label>Disponibilidad</label> <select
																class="form-control select2" name="availability[0]"
																style="width: 100%;">
																<option>Disponible</option>
																<option>No Disponible</option>
															</select>
														</div>


													</div>
												</div>

												<div class="tab-pane fade" id="segundo1">
													<div class="box-body">
														<div class="form-group">
															<label>Modalidad de Adquision</label> <select
																class="form-control select2"
																name="acquisitionModality[0]" id="acquisitionModality1"
																style="width: 100%;">
																<option>Donacion</option>
																<option>Compra</option>
																<option>Adquisicion</option>
															</select>
														</div>

														<div class="form-group">
															<label>Fuente de Adquisicion</label> <input type="text"
																class="form-control" name="acquisitionSource[0]"
																id="acquisitionSource1" required>
														</div>

														<div class="form-group">
															<label>Precio de Adquisicion</label> <input type="text"
																name="acquisitionPrice[0]" class="form-control"
																id="acquisitionPrice1">
														</div>

														<div class="form-group">
															<label>Fecha de Adquisicion</label> <input type="text"
																name="acquisitionDate[0]" class="form-control"
																id="acquisitionDate1" required>
														</div>

														<div class="form-group">
															<label>Tipo de Impresion</label> <select
																class="form-control select2" name="printType[0]"
																style="width: 100%;">
																<option>Impresion</option>
																<option>Reimpresion</option>
															</select>
														</div>

														<div class="form-group">
															<label>Lugar de Publicacion</label> <input type="text"
																name="publicationLocation[0]" class="form-control"
																id="publicationLocation1" required>
														</div>

														<div class="form-group">
															<label>Fecha de Publicacion</label> <input type="text"
																name="publicationDate[0]" class="form-control"
																id="publicationDate1" required>
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

			<!-- ***/*/*/*/*/*/*/*/*/*/*ACA ESTA ****************************************/*//////**/*/*/*/ -->
		</div>

		<div class="box-footer">
			<button type="submit" id="btn" class="btn btn-primary">Crear</button>
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
                    +'</ul>'
                    +'<div class="tab-content">'
                      +'<div class="tab-pane active" id="primero'+FieldCount+'">'
                       +'<div class="box-body">'
                          +'<div class="form-group">'
                            +'<label>Numero de Ingreso</label>'
                            +'<input type="text" name="incomeNumber['+arreglo+']" id="incomeNumber'+FieldCount+'" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Codigo de Barras</label>'
                            +'<input type="text" name="barcode['+arreglo+']" id="barcode'+FieldCount+'" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Volumen</label>'
                            +'<input type="text" name="volume['+arreglo+']" id="volume'+FieldCount+'" class="form-control">'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Gestion</label>'
                            +'<input type="text" name="management['+arreglo+']" id="management'+FieldCount+'" class="form-control" required>'
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
                                +'<option>Donacion</option> '
                                +'<option>Compra</option>'
                                +'<option>Adquisicion</option> '
                            +'</select>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Fuente de Adquisicion</label>'
                            +'<input type="text" name="acquisitionSource['+arreglo+']" id="acquisitionSource'+FieldCount+'" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Precio de Adquisicion</label>'
                            +'<input type="text" name="acquisitionPrice['+arreglo+']" id="acquisitionPrice'+FieldCount+'" class="form-control" >'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Fecha de Adquisicion</label>'
                            +'<input type="text" name="acquisitionDate['+arreglo+']" id="acquisitionDate'+FieldCount+'" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Tipo de Impresion</label>'
                            +'<select class="form-control select2" name="printType['+arreglo+']" style="width: 100%;">'
                                +'<option>Impresion</option>'
                                +'<option>Reimpresion</option>   '
                            +'</select>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Lugar de Publicacion</label>'
                            +'<input type="text" name="publicationLocation['+arreglo+']" id="publicationLocation'+FieldCount+'" class="form-control" required>'
                          +'</div>'
                          +'<div class="form-group">'
                            +'<label>Fecha de Publicacion</label>'
                            +'<input type="text" name="publicationDate['+arreglo+']" id="publicationDate'+FieldCount+'" class="form-control" required>'
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
    (function(){
      var formulario = document.getElementById('formulario');
      var title = document.getElementById('title');
      var validarTitulo = function(e){
        if(formulario.title.value == ""){
          alert("No relleno campo de titulo");
          e.preventDefault();
        }
      };
      var validarClasificacion = function(e){
        if(formulario.clasification.value == ""){
          alert("Campo clasificacion obligatorio");
          e.preventDefault();
        }
      };
      var validarAutor = function(e){
        alert(formulario.primaryAuthor.value);
        if(formulario.primaryAuthor.value[0] == null){
          alert("No selecciono autor");
          e.preventDefault();
        }
      };
      var validar = function(e){
          validarTitulo(e);
          validarClasificacion(e);
      };
      formulario.addEventListener("submit",validar);
    } ())
</script>
