


<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nuevo</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  
  <div class="box-body">
    
    <div class="col-md-6">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Libro</h3>
          <div class="box-tools pull-right"> 
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div> 
        </div>
        <form method="POST" action="{{ url('/admin/book' )}}">
            {{ csrf_field() }}   
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
                          <label>Titulo</label>
                          <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <!--1. Fin de Titulo -->

                        <!--2. Resto de Titulo -->
                        <div class="form-group">
                          <label>Resto de Titulo</label>
                          <input type="text" name="secondaryTitle" class="form-control" id="secondaryTitle">
                        </div>                    
                        <!--2. Fin Resto de Titulo -->

                        <!--3. Clasificacion -->
                        <div class="form-group">
                          <label>Clasificacion</label>
                          <input type="text" name="clasification" class="form-control" id="clasification">
                        </div>
                        <!--3. Fin clasificacion -->
                        
                        <!--4. Autor -->
                        <div class="form-group">
                          <label>Autor</label>
                          <!--4.1. Autor Principal -->
                            <p>
                              &nbsp&nbsp&nbsp&nbspPrincipal<?php   for($i=0;$i<20;$i++){echo "&nbsp";}?>:&nbsp&nbsp&nbsp&nbsp
                              <select class="form-control select2" name="primaryAuthor[]" multiple="multiple" style="width: 66%;">
                                @foreach($autores as  $autor)
                                  @foreach($autor->categories as $category)
                                    @if($category->id == 1)
                                      <option value="{{ $autor->id }}">{{$autor->name}}</option>
                                    @endif
                                  @endforeach
                                @endforeach
                              </select>
                            </p>
                          <!--4.1. Fin Autor Principal-->
                          <!-- 4.2. Autor Secundario -->
                            <p>
                              &nbsp&nbsp&nbsp&nbspSecundario<?php   for($i=0;$i<15;$i++){echo "&nbsp";}?>:&nbsp&nbsp&nbsp&nbsp
                              <select class="form-control select2" name="secondaryAuthor[]" multiple="multiple" style="width: 66%;">
                                @foreach($autores as  $autor)
                                  @foreach($autor->categories as $category)
                                    @if($category->id == 1)
                                      <option value="{{ $autor->id }}">{{$autor->name}}</option>
                                    @endif
                                  @endforeach
                                @endforeach
                              </select>
                            </p>
                          <!--4.2. Fin Autor Secundario -->
                        </div>
                        <!--4. Fin Autor -->
                        
                        <!-- 5. Editorial -->
                          <div class="form-group">
                            <label>Editorial</label>
                            <!-- 5.1. Editorial Principal -->
                              <p>
                                &nbsp&nbsp&nbsp&nbspPrincipal<?php   for($i=0;$i<20;$i++){echo "&nbsp";}?>:&nbsp&nbsp&nbsp&nbsp
                                <select class="form-control select2" name="editorial[]" style="width: 66%;">
                                    @foreach($editoriales as  $editorial)
                                      @foreach($editorial->categories as $category)
                                        @if($category->name == "libro"){
                                          <option value="{{ $editorial->id }}">{{$editorial->name}}</option>
                                        }@endif
                                      @endforeach
                                    @endforeach
                                </select>
                              </p> 
                            <!-- 5.1. Fin Editorial Principal -->
                            <!-- 5.2. Editorial Secundaria -->
                              <p>
                                &nbsp&nbsp&nbsp&nbspAnexo<?php   for($i=0;$i<25;$i++){echo "&nbsp";}?>:&nbsp&nbsp&nbsp&nbsp
                                <select class="form-control select2" name="secondaryEditorial[]" multiple="multiple" style="width: 66%;">
                                @foreach($editoriales as  $editorial)
                                  @foreach($editorial->categories as $category)
                                    @if($category->name == "libro"){
                                      <option value="{{ $editorial->id }}">{{$editorial->name}}</option>
                                    }@endif
                                  @endforeach
                                @endforeach
                                </select>
                              </p>
                            <!-- 5.2. Fin Editorial Secundario -->
                          </div>
                        <!-- 5. Fin Editorial -->

                    </div><!-- End Box-body -->
                  </div><!-- End Primer Panel -->

                  <!-- Segundo Panel -->
                  <div class="tab-pane fade" id="segundo">
                    <div class="box-body">
                      
                      <!-- 1. Resumen -->
                      <div class="form-group">
                        <label>Resumen</label>
                        <textarea class="form-control" rows="3" name="summary" id="inputSummary" placeholder=""></textarea> 
                      </div>
                      <!-- 1. Fin Resumen -->

                      <!-- 2. Capitulos -->
                      <div class="form-group">
                        <label>Capitulos</label>
                        <div id="contenedor">
                          <div class="input-group">
                            <span class="input-group-addon">1</span>
                            <input type="text" id="campo_1" name="chapter[0]" class="form-control">
                            <span id="agregarCampo"  class="input-group-addon"><i class="fa fa-plus"></i></span>
                          </div>

                        </div>
                      </div>
                      <!-- 2. Fin capitulos -->

                      <div class="form-group">
                      <label>Descripcion Fisica</label>
                        <div class="form-horizontal">
                         <div for="ejemplo_password_3" class="col-xs-6 control-label">Extension</div>
                        <div class="col-xs-6">
                          <input type="text" name="extension"  class="form-control">
                        </div>

                        <div for="ejemplo_password_3" class="col-xs-6 control-label">Otros detalles fisicos</div>
                        <div class="col-xs-6">
                          <input type="text" name="physicalDetails" class="form-control">
                        </div>

                        <div for="ejemplo_password_3" class="col-xs-6 control-label">Dimensiones</div>
                        <div class="col-xs-6">
                          <input type="text" name="dimensions" class="form-control">

                        </div>
                        <div for="ejemplo_password_3" class="col-xs-6 control-label">Material de Acompañamiento</div>
                          <div class="col-xs-6">
                            <input type="text" name="accompaniment" class="form-control">
                          </div>
                        </div>   

                      </div>
                      
                    </div><!-- End Box-Body -->
                  </div><!-- End Segundo Panel -->
                </div>   

              </div><!-- End nav-bar -->       
            </div><!-- End Box-body -->
        </form>
      </div><!-- End Box-solid -->
    </div><!-- End col-md-6 -->

    <div class="col-md-6">
      <div class="box box-success box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Item</h3>
          <div class="box-tools pull-right"> 
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
          </div> 
        </div>
        <div class="box-body">
          <div class="bs-example" data-expample-id="simple-nav-tabs">
             <ul class="nav nav-tabs" id="contenedor-pestañas">
              <li class="active"><a href="#item1">Item1&nbsp<span type="button"><i class="fa fa-remove"></i></span></a></li>
              <li><a type="button" href="#" class="agregarItem">+</a></li>
             </ul>
             
            <!--************************** CONTENIDO DE ITEM 1 ***********************************-->
             <div class="tab-content"  id="contenedor-item">
               <div class="tab-pane active" id="item1">
                  <div class="box-body">
                    <div class="bs-example" data-example-id="simple-nav-tabs"> 
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#primero1" data-toggle="tab">Primero</a></li>
                          <li><a href="#segundo1" data-toggle="tab">Segundo</a></li>
                          <li><a href="#tercero1" data-toggle="tab">Tercero</a></li>
                        </ul>

                        <div class="tab-content">
                          <div class="tab-pane active" id="primero1">
                            <div class="box-body">
                              <div class="form-group">
                                <label>Numero de Ingreso</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Codigo de Barras</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Fecha de Ingreso</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Edicion</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Gestion</label>
                                <input type="text" name="" class="form-control">
                              </div>

                            </div>
                          </div>
                          
                          <div class="tab-pane fade" id="segundo1">
                            <div class="box-body">
                              <div class="form-group">
                                <label>Modalidad de Adquision</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option>Compra</option> 
                                    <option>Donacion</option>
                                    <option>Adquisicion</option>                               
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Fuente de Adquisicion</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Precio de Adquisicion</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Fecha de Adquisicion</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Ubicacion</label>
                                <input type="text" name="" class="form-control">
                              </div>

                            </div>
                          </div>

                          <div class="tab-pane fade" id="tercero1">
                            <div class="box-body">
                              <div class="form-group">
                                <label>Tipo de Impresion</label>
                                <select class="form-control select2" style="width: 100%;">
                                    <option>Impresion</option> 
                                    <option>Reimpresion</option>                              
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Lugar de Publicacion</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Fecha de Adquisicion</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>Telefono</label>
                                <input type="text" name="" class="form-control">
                              </div>

                              <div class="form-group">
                                <label>RUC</label>
                                <input type="text" name="" class="form-control">
                              </div>
                            </div>
                          </div>
                        
                        </div><!-- End Tab Content--> 
                                  
                    </div><!-- End navbar -->
                  </div><!-- End box-body -->
               </div><!-- End tab-pane -->

             </div><!-- End tab-content -->
             <!--*************************** FIN CONTENIDO ITEM1 ***********************************-->

       
          </div><!-- End nav.bar -->

        </div><!-- End box-body -->
      </div><!-- End box-solid -->

    </div><!-- End coll-md-6 -->

  </div>
</div>

<script>
  $(document).ready(function(){
    var contenedorPestañas = $("#contenedor-pestañas");
    var contenedorItem = $('#contenedor-item');
    var AddButton1 = $("#agregarItem");
    var x = $("#contenedor-pestañas ul").length+1;
    var FieldCount = x;

    $(".agregarItem").click(function(){
      
      FieldCount++;
    

      $(contenedorPestañas).append('<li><a href="#item2">Item'+FieldCount+'</a></li>');
        
      $(contenedorItem).append(

              '<div class="tab-pane fade" id="item2">'
                 +'<div class="box-body">'
                   +'<div class="bs-example" data-example-id="simple-nav-tabs"> '
                    +'<ul class="nav nav-tabs">'
                      +'<li class="active"><a href="#primero2" data-toggle="tab">Primero</a></li>'
                      +'<li><a href="#segundo2" data-toggle="tab">Segundo</a></li>'
                      +'<li><a href="#tercero2" data-toggle="tab">Tercero</a></li>'
                    +'</ul>'

                    +'<div class="tab-content">'
                      +'<div class="tab-pane active" id="primero2">'
                       +'<div class="box-body">'
                          +'<div class="form-group">'
                            +'<label>Numero de Ingreso</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Codigo de Barras</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Fecha de Ingreso</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Edicion</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Gestion</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                        +'</div>'
                      +'</div>'
                      
                      +'<div class="tab-pane fade" id="segundo2">'
                        +'<div class="box-body">'
                          +'<div class="form-group">'
                            +'<label>Modalidad de Adquision</label>'
                            +'<select class="form-control select2" style="width: 100%;">'
                                +'<option>Compra</option> '
                                +'<option>Donacion</option>'
                                +'<option>Adquisicion</option>  '                             
                            +'</select>'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Fuente de Adquisicion</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Precio de Adquisicion</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Fecha de Adquisicion</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Ubicacion</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                        +'</div>'
                      +'</div>'

                      +'<div class="tab-pane fade" id="tercero2">'
                        +'<div class="box-body">'
                          +'<div class="form-group">'
                            +'<label>Tipo de Impresion</label>'
                            +'<select class="form-control select2" style="width: 100%;">'
                                +'<option>Impresion</option>' 
                                +'<option>Reimpresion</option>   '                           
                            +'</select>'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Lugar de Publicacion</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Fecha de Adquisicion</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>Telefono</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'

                          +'<div class="form-group">'
                            +'<label>RUC</label>'
                            +'<input type="text" name="" class="form-control">'
                          +'</div>'
                        +'</div>'
                      +'</div>'
                    
                    +'</div><!-- End Tab Content--> '
                                
                  +'</div><!-- End navbar -->'
                 +'</div><!-- End box-body -->'
               +'</div><!-- End tab-pane -->');

      x++;
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
            $(contenedor).append('<div class="input-group"><span class="input-group-addon">'+FieldCount+'</span><input type="text" id="campo_'+FieldCount+'" name="chapter['+array+']" class="form-control"><span id="eliminarCampo"  class="input-group-addon eliminar"><i class="fa fa-remove"></i></span></div>');
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







<!-- <div class="form-horizontal" role="form">
  <div class="form-group">
    <p for="ejemplo_email_3" class="col-md-2 control-label">Email</p>
    <div class="col-md-2"></div>
    <div class="col-md-8" >
      <input type="email" class="form-control" id="ejemplo_email_3"
             placeholder="Email" style="width: 80%;">
    </div>
  </div>
</div> -->




        <!--************************** CONTENIDO DE ITEM 1 ***********************************-->
             <div class="tab-content"  id="contenedor-item">
               <div class="tab-pane active" id="item1">
                 <div class="box-body">
                   <div class="bs-example" data-example-id="simple-nav-tabs"> 
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#primero1" data-toggle="tab">Primero</a></li>
                      <li><a href="#segundo1" data-toggle="tab">Segundo</a></li>
                      <li><a href="#tercero1" data-toggle="tab">Tercero</a></li>
                    </ul>

                    <div class="tab-content">
                      <div class="tab-pane active" id="primero1">
                        <div class="box-body">
                          <div class="form-group">
                            <label>Numero de Ingreso</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Codigo de Barras</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Fecha de Ingreso</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Edicion</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Gestion</label>
                            <input type="text" name="" class="form-control">
                          </div>

                        </div>
                      </div>
                      
                      <div class="tab-pane fade" id="segundo1">
                        <div class="box-body">
                          <div class="form-group">
                            <label>Modalidad de Adquision</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option>Compra</option> 
                                <option>Donacion</option>
                                <option>Adquisicion</option>                               
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Fuente de Adquisicion</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Precio de Adquisicion</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Fecha de Adquisicion</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Ubicacion</label>
                            <input type="text" name="" class="form-control">
                          </div>

                        </div>
                      </div>

                      <div class="tab-pane fade" id="tercero1">
                        <div class="box-body">
                          <div class="form-group">
                            <label>Tipo de Impresion</label>
                            <select class="form-control select2" style="width: 100%;">
                                <option>Impresion</option> 
                                <option>Reimpresion</option>                              
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Lugar de Publicacion</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Fecha de Adquisicion</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>Telefono</label>
                            <input type="text" name="" class="form-control">
                          </div>

                          <div class="form-group">
                            <label>RUC</label>
                            <input type="text" name="" class="form-control">
                          </div>
                        </div>
                      </div>
                    
                    </div><!-- End Tab Content--> 
                                
                  </div><!-- End navbar -->
                 </div><!-- End box-body -->
               </div><!-- End tab-pane -->
             </div><!-- End tab-content -->
             <!--*************************** FIN CONTENIDO ITEM1 ***********************************-->