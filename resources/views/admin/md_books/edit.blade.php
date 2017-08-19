isbn<div class="box box-primary">
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
											<label>Titulo *</label> <input type="text" name="title"
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
											<label>Clasificacion *</label> <input type="text"
												name="clasification" class="form-control" id="clasification"
												value="{{$book->clasification}}" required>
										</div>
										<!--3. Fin clasificacion -->

										<div class="form-group">
											<label>Edicion</label> <input type="text" name="edition"
												class="form-control" id="edition" value="{{$book->edition}}" onkeypress="return isNumberKey(event)">
										</div>



										<div class="form-group">
											<label>Autor Principal *</label> <select
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
											<label>Editorial *</label> <select class="form-control select2"
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
											<label>Resumen *</label>
											<textarea class="form-control" rows="3" name="summary"
												id="inputSummary" required>{{$book->summary}}</textarea>
										</div>
										<!-- 1. Fin Resumen -->

										<!-- 2. Capitulos -->

										<div class="form-group">
											<label>Capitulos *</label>
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
						                      <label>Ubicación </label>
						                      <select class="form-control select2" name="libraryLocation" id="libraryLocation" value="{{$book->libraryLocation}}" style="width: 100%;">
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
							                        <option name="ubicacion">Stand F1</option>
							                        <option name="ubicacion">Stand F2</option>
							                        <option name="ubicacion">Stand F3</option>
							                        <option name="ubicacion">Stand F4</option>
							                        <option name="ubicacion">Stand F5</option>
							                        <option name="ubicacion">Stand G1</option>
							                        <option name="ubicacion">Stand G2</option>
							                        <option name="ubicacion">Stand G3</option>
							                        <option name="ubicacion">Stand G4</option>
							                        <option name="ubicacion">Stand G5</option>
							                        <option name="ubicacion">Stand H1</option>
							                        <option name="ubicacion">Stand H2</option>
							                        <option name="ubicacion">Stand H3</option>
							                        <option name="ubicacion">Stand H4</option>
							                        <option name="ubicacion">Stand H5</option>
							                        <option name="ubicacion">Stand I1</option>
							                        <option name="ubicacion">Stand I2</option>
							                        <option name="ubicacion">Stand I3</option>
							                        <option name="ubicacion">Stand I4</option>
							                        <option name="ubicacion">Stand I5</option>
							                        <option name="ubicacion">Stand J1</option>
							                        <option name="ubicacion">Stand J2</option>
							                        <option name="ubicacion">Stand J3</option>
							                        <option name="ubicacion">Stand J4</option>
							                        <option name="ubicacion">Stand J5</option>
							                        <option name="ubicacion">Stand K1</option>
							                        <option name="ubicacion">Stand K2</option>
							                        <option name="ubicacion">Stand K3</option>
							                        <option name="ubicacion">Stand K4</option>
							                        <option name="ubicacion">Stand K5</option>
							                        <option name="ubicacion">Stand L1</option>
							                        <option name="ubicacion">Stand L2</option>
							                        <option name="ubicacion">Stand L3</option>
							                        <option name="ubicacion">Stand L4</option>
							                        <option name="ubicacion">Stand L5</option>
							                        <option name="ubicacion">Stand M1</option>
							                        <option name="ubicacion">Stand M2</option>
							                        <option name="ubicacion">Stand M3</option>
							                        <option name="ubicacion">Stand M4</option>
							                        <option name="ubicacion">Stand M5</option>
							                        <option name="ubicacion">Stand N1</option>
							                        <option name="ubicacion">Stand N2</option>
							                        <option name="ubicacion">Stand N3</option>
							                        <option name="ubicacion">Stand N4</option>
							                        <option name="ubicacion">Stand N5</option>
							                        <option name="ubicacion">Stand Ñ1</option>
							                        <option name="ubicacion">Stand Ñ2</option>
							                        <option name="ubicacion">Stand Ñ3</option>
							                        <option name="ubicacion">Stand Ñ4</option>
							                        <option name="ubicacion">Stand Ñ5</option>
							                        <option name="ubicacion">Stand O1</option>
							                        <option name="ubicacion">Stand O2</option>
							                        <option name="ubicacion">Stand O3</option>
							                        <option name="ubicacion">Stand O4</option>
							                        <option name="ubicacion">Stand O5</option>
							                        <option name="ubicacion">Stand P1</option>
							                        <option name="ubicacion">Stand P2</option>
							                        <option name="ubicacion">Stand P3</option>
							                        <option name="ubicacion">Stand P4</option>
							                        <option name="ubicacion">Stand P5</option>
							                        <option name="ubicacion">Stand Q1</option>
							                        <option name="ubicacion">Stand Q2</option>
							                        <option name="ubicacion">Stand Q3</option>
							                        <option name="ubicacion">Stand Q4</option>
							                        <option name="ubicacion">Stand Q5</option>
							                        <option name="ubicacion">Stand R1</option>
							                        <option name="ubicacion">Stand R2</option>
							                        <option name="ubicacion">Stand R3</option>
							                        <option name="ubicacion">Stand R4</option>
							                        <option name="ubicacion">Stand R5</option>
							                        <option name="ubicacion">Stand S1</option>
							                        <option name="ubicacion">Stand S2</option>
							                        <option name="ubicacion">Stand S3</option>
							                        <option name="ubicacion">Stand S4</option>
							                        <option name="ubicacion">Stand S5</option>
							                        <option name="ubicacion">Stand T1</option>
							                        <option name="ubicacion">Stand T2</option>
							                        <option name="ubicacion">Stand T3</option>
							                        <option name="ubicacion">Stand T4</option>
							                        <option name="ubicacion">Stand T5</option>
							                        <option name="ubicacion">Stand U1</option>
							                        <option name="ubicacion">Stand U2</option>
							                        <option name="ubicacion">Stand U3</option>
							                        <option name="ubicacion">Stand U4</option>
							                        <option name="ubicacion">Stand U5</option>
							                        <option name="ubicacion">Stand V1</option>
							                        <option name="ubicacion">Stand V2</option>
							                        <option name="ubicacion">Stand V3</option>
							                        <option name="ubicacion">Stand V4</option>
							                        <option name="ubicacion">Stand V5</option>
							                        <option name="ubicacion">Stand W1</option>
							                        <option name="ubicacion">Stand W2</option>
							                        <option name="ubicacion">Stand W3</option>
							                        <option name="ubicacion">Stand W4</option>
							                        <option name="ubicacion">Stand W5</option>
							                        <option name="ubicacion">Stand X1</option>
							                        <option name="ubicacion">Stand X2</option>
							                        <option name="ubicacion">Stand X3</option>
							                        <option name="ubicacion">Stand X4</option>
							                        <option name="ubicacion">Stand X5</option>
							                        <option name="ubicacion">Stand Y1</option>
							                        <option name="ubicacion">Stand Y2</option>
							                        <option name="ubicacion">Stand Y3</option>
							                        <option name="ubicacion">Stand Y4</option>
							                        <option name="ubicacion">Stand Y5</option>
							                        <option name="ubicacion">Stand Z1</option>
							                        <option name="ubicacion">Stand Z2</option>
							                        <option name="ubicacion">Stand Z3</option>
							                        <option name="ubicacion">Stand Z4</option>
							                        <option name="ubicacion">Stand Z5</option>
						                      </select>
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

												<div for="ejemplo_password_3" class="col-xs-6 control-label">Dimensiones *</div>
												<div class="col-xs-6">
													<input type="text" name="dimensions" class="form-control"
														value="{{$book->dimensions}}" required>

												</div>
												<div for="ejemplo_password_3" class="col-xs-6 control-label">Material
													de Acompañamiento </div>
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
																<label>clasificacion *</label> <input type="text"
																	class="form-control" value="{{$bc->clasification}}" disabled="true">
															</div>
															<div class="form-group">
																<label>Numero de Ingreso *</label> <input type="text"
																	name="incomeNumber[{{$cont}}]" class="form-control"
																	value="{{$bc->incomeNumber}}" required>
															</div>

															<div class="form-group">
																<label>Codigo de Barras *</label> <input type="text"
																	name="barcode[{{$cont}}]" class="form-control"
																	value="{{$bc->barcode}}" required>
															</div>

															<div class="form-group">
																<label>Volumen</label> <input type="text"
																	name="volume[{{$cont}}]" class="form-control"
																	value="{{$bc->volume}}">
															</div>

															<div class="form-group">
																<label>Gestion *</label> <input type="text"
																	name="management[{{$cont}}]" class="form-control"
																	value="{{$bc->management}}" required>
															</div>

															<div class="form-group">
																<label>Disponibilidad</label> <select
																	class="form-control select2"
																	name="availability[{{$cont}}]" style="width: 100%;">
																	<option @if($bc->availability == 1) selected
																		@endif>Disponible</option>
																	<option @if($bc->availability == 0) selected
																		@endif>Desabilitado</option>
																	<option @if($bc->availability == 2) selected
																		@endif>Prestado</option>
																	<option @if($bc->availability == 3) selected
																		@endif>En espera</option>
																</select>
															</div>

														</div>
													</div>

													<div class="tab-pane fade" id="segundo{{$cont2}}">
														<div class="box-body">
															<div class="form-group">
																<label>Modalidad de Adquision *</label> <select
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
																	value="{{$bc->acquisitionSource}}">
															</div>

															<div class="form-group">
																<label>Precio de Adquisicion</label> <input type="text"
																	name="acquisitionPrice[{{$cont}}]" class="form-control"
																	value="{{$bc->acquisitionPrice}}">
															</div>

															<div class="form-group">
																<label>Fecha de Adquisicion</label> <input type="text"
																	name="acquisitionDate[{{$cont}}]" class="form-control"
																	value="{{$bc->acquisitionDate}}">
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
																	value="{{$bc->publicationLocation}}">
															</div>

															<div class="form-group">
																<label>Fecha de Publicacion</label> <input type="text"
																	name="publicationDate[{{$cont}}]" class="form-control"
																	value="{{$bc->publicationDate}}">
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
                            +'<input type="text" name="barcode['+arreglo+']" class="form-control" value="20000000" required>'
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
                                +'<option>Desabilitado</option>'
																+'<option>Prestado</option>'
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
