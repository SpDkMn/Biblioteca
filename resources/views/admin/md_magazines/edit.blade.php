<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nuevo</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>

  <!-- /.box-header -->
  <form method="POST" action="{{ url('/admin/magazines') }}">
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
                        <input type="text" class="form-control" name="title" id="inputTitle" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <select class="form-control" name="author">
                        {{-- Seleccionando de la lista de autores que pertenecen a la categoria revista --}}
                        @foreach($autores as $autor)
                          @foreach($autor->categories as $category)
                            @if($category->name == "revista"){
                              <option value="{{ $autor->id }}">{{ $autor->name}}</option>
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
                        <input type="text" class="form-control" name="issn" id="inputISSN" placeholder="">
                    </div>

                 </div>
               </div>
            {{-- Panel Item  --}}
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h3 class="panel-title">Item</h3>
              </div>
              <div class="panel-body">
                  <div class="form-group">
                      <label for="inputClasification">Clasificación</label>
                      <input type="text" class="form-control" name="clasification" id="inputClasification" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="inputIncomeNumber">Nº Ingreso</label>
                      <input type="text" class="form-control" value="asd" name="incomeNumber" id="inputIncomeNumber" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="inputBarcode">Código de barra</label>
                      <input type="text" class="form-control" name="barcode" id="inputBarcode" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="inputCopy">Ejemplar</label>
                      <input type="number" class="form-control" name="copy" id="inputCopy" placeholder="">
                  </div>
              </div>
            </div> {{-- end item --}}

        {{-- falta - > Agregar patrones  --}}

        {{-- Panel Contenido --}}
            <div class="panel panel-default" id="contentPanel">
              <div class="panel-heading ">
                  <h3 class="panel-title col-xs-11">Contenido</h3>
                  <span id="agregarContenido" class="fa fa-plus"></span>
              </div>

              <div class="panel-body">
                  <div class="form-group">
                    <label for="inputTitleContent">Título</label>
                    <input type="text" class="form-control" name="titleContent" id="inputTitleContent" placeholder="">
                  </div>
                  <!--  Por el momento no hay limite de colaboradores-->
                  <div class="form-group">
                    <label>Colaborador</label>
                    {{-- Seleccionando autores que pertenecen a la categoria de colaboradores --}}
                    <select class="form-control select2" multiple="multiple" name ="collaborator[]" data-placeholder="Seleccione los colaboradores" style="width: 100%;">
                      @foreach($autores as $autor)
                        @foreach($autor->categories as $category)
                          @if($category->name == "colaborador"){
                            <option value="{{ $autor->id }}">{{ $autor->name}}</option>
                          }
                          @endif
                        @endforeach
                      @endforeach
                    </select>
                  </div>

                </div>
              </div> {{-- end Contenido --}}
            </div> {{-- end box-body --}}

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Editar</button>
    </div>
  </form>
</div>
