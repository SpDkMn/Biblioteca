<div class="box box-primary">
  <div class="box-header with-border">
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
              {{-- Panel Informacion --}}
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <h3 class="panel-title">Informacion</h3>
                  </div>
                  <div class="panel-body">

                      <div class="form-group">
                          <label for="inputTitle">Titulo</label>
                          <input type="text" class="form-control" value="{{$revista->title}}" name="title" id="inputTitle" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Autor</label>

                        <select class="form-control" name="author" >
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
                        <select class="form-control select2" name="editorial[]" multiple="multiple" data-placeholder="Seleccione las editoriales" style="width: 100%;">
                          <!-- Cargando lista de editoriales seleccionadas -->
                          @foreach($revista->editorials as $editorial)
                            <option value="{{ $editorial->id }}" selected>{{$editorial->name}}</option>
                          @endforeach
                          <!-- Cargando lista de editoriales para ser seleccionadas -->
                        @foreach($editoriales as  $editorial)
                          @foreach($editorial->categories as $category)
                            @if($category->name == "revista"){
                              <option value="{{ $editorial->id }}">{{$editorial->name}}</option>
                            }@endif
                          @endforeach
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputISSN">ISSN</label>
                        <input type="text" class="form-control" name="issn" id="inputISSN" placeholder="" value="{{$revista->issn}}">
                    </div>

                 </div>
               </div>
            {{-- Panel Item  --}}
            <!-- Declarando el contador de items -->
          <?php $contItem = 0  ?>
            @foreach($revista->magazines_copies as $item)
                <div class="panel panel-default" id="{{'itemPanel'.$contItem}}">
                  <div class="panel-heading">
                      <h3 class="panel-title">Item</h3>
                  </div>
                  <div class="panel-body">
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
                <?php $contItem = $contItem  +1  ?>
              @endforeach
        {{-- falta - > Agregar patrones  --}}

        {{-- Panel Contenido --}}
        <!-- Declarando el contador de items -->
        <?php $contContent = 0  ?>
              @foreach($revista->contents as $contenido)
                <div class="panel panel-default" id="{{'contentPanel'.$contContent}}">
                  <div class="panel-heading ">
                      <h3 class="panel-title col-xs-11">Contenido</h3>
                      <span id="agregarContenido" class="fa fa-plus"></span>
                  </div>
                  <!-- PRUEBA  -->
                  <div class="panel-body">
                      <div class="form-group">
                        <label for="inputTitleContent">Título</label>
                        <input type="text" class="form-control" name="{{'titleContent'.$contContent}}" id="{{'inputTitleContent'.$contContent}}" placeholder="" value="{{$contenido->title}}">
                      </div>
                  <!--  Por el momento no hay limite de colaboradores-->
                    <div class="form-group">
                      <label>Colaborador</label>
                      <!-- Mostrando seleccion de colaboradores que pertenecen a un contenido -->

                      <select class="form-control select2"  multiple="multiple" name ="{{'collaborator'.$contContent.'[]'}}" data-placeholder="Seleccione los colaboradores" style="width: 100%;">
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
                </div> {{-- end Contenido --}}
                <?php $contContent = $contContent +1 ?>
              @endforeach
              </div> {{-- end box-body --}}

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
          </div>
        </form>
      </div>
      <!-- Script para mostrar los selectores luego de mostrar el editar -->
      <script type="text/javascript">
      $(".select2").select2();
      </script>
    @endif
  @endforeach
@endif
