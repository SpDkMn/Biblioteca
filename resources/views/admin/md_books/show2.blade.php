<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Informacion del Libro</h3>
    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div> 
  </div>
  
  <div class="box-body">
    
    <div class="box-body with-border">
      <div class="title">{{$book->title}}</div>
      <div class="secondaryTitle">{{$book->secondaryTitle}}</div>
    </div>

  

    <div class="row">
      <div class="col-md-6">
        <div class="box box-success box-solid">
          <div class="box-body table-responsive table-hover">
            <div class="subtitle">Items</div>
              <table class="table">
                <tr>
                  <th class="itemTable">Numero de ingreso</th>
                  <th class="itemTable">Codigo de barras</th>
                  <th class="itemTable">Ejemplar</th>
                  
                  <th class="itemTable">Volumen</th>
                  <th class="itemTable">Clasificacion</th>
                  <th class="itemTable">Contenido</th>
                  
                </tr>
                @foreach($book->bookCopies as $copy)

                <tr @if($copy->availability) class="success" @else class="danger" @endif>
                  <td>{{$copy->incomeNumber}}</td>
                  <td>{{$copy->barcode}}</td>
                  <td>{{$copy->copy}}
                    @if($copy->availability)
                    <span class="sr-only">Disponible</span>
                    @else
                      <span class="sr-only">No disponible</span>
                    @endif
                  </td>
                  
                  <td>{{$copy->volume}}</td>
                  <td>{{$copy->clasification}}</td>

                  <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCopy<?php echo $copy->id; ?>"><i class="fa fa-tag"></i></button></td>
                  
                </tr>
                <!-- MODAL DEL EJEMPLAR -->
                <div class="modal fade" id="ModalCopy<?php echo $copy->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header modalHead1">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h3 class="modal-title text-center text-font-size titleModal1" id="ModalCopyLabel"><strong>EJEMPLAR&nbsp<?php echo $copy->copy; ?></strong></h3>
                      </div>
                      <div class="modal-body modalBody1">
                        
                        <ul>
                          @if($copy->acquisitionModality!="")
                          <li>&nbsp&nbsp&nbspModalidad de Adquisicion
                  <?php   for($i=0;$i<14;$i++){echo "&nbsp";}?>:&nbsp
                          {{$copy->acquisitionModality}}</li>
                          @endif
                          @if($copy->acquisitionSource!="")
                          <li>&nbsp&nbsp&nbspFuente de Adquisicion
                  <?php   for($i=0;$i<21;$i++){echo "&nbsp";}?>:&nbsp
                          {{$copy->acquisitionSource}}</li>
                          @endif
                          @if($copy->acquisitionPrice!="")
                          <li>&nbsp&nbsp&nbspPrecio de Adquisicion
                  <?php   for($i=0;$i<23;$i++){echo "&nbsp";}?>:&nbsp
                          {{$copy->acquisitionPrice}}</li>
                          @endif
                          @if($copy->acquisitionDate)
                          <li>&nbsp&nbsp&nbspFecha de Adquisicion
                  <?php   for($i=0;$i<24;$i++){echo "&nbsp";}?>:&nbsp
                          {{$copy->acquisitionDate}}</li>
                          @endif
                          
                          @if($copy->printType!="")
                          <li>&nbsp&nbsp&nbspTipo de Impresion
                  <?php   for($i=0;$i<29;$i++){echo "&nbsp";}?>:&nbsp
                          {{$copy->printType}}</li>
                          @endif
                          @if($copy->publicationLocation!="")
                        <li>&nbsp&nbsp&nbspLugar de publicacion
                  <?php   for($i=0;$i<24;$i++){echo "&nbsp";}?>:&nbsp
                          {{$copy->publicationLocation}}</li>
                          @endif
                          @if($copy->publicationDate!="")
                  <li>&nbsp&nbsp&nbspFecha de publicacion
                  <?php   for($i=0;$i<23;$i++){echo "&nbsp";}?>:&nbsp
                          {{$copy->publicationDate}}</li>
                          @endif
                          @if($copy->publicationDate!="")
                  <li>&nbsp&nbsp&nbspGestion
                  <?php   for($i=0;$i<50;$i++){echo "&nbsp";}?>:&nbsp
                          {{$copy->management}}</li>
                          @endif
                        </ul>       
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <!-- Fin Modal Ejemplar -->
                @endforeach
              </table>
          </div>

          <div class="content">
            <div class="subtitle">Autores</div>
            <div class="box-body">
              Autor Principal 
              <ul>
              <?php $cont=0;$cont2=2;$cont3=0; ?>
                  @foreach($book->authors as $author)
                    @if($author->pivot->type == true)
                    <?php $cont=$cont+1; ?>
                    @else
                    <?php $cont3=$cont3+1;?>
                    @endif
                  @endforeach 
                  @foreach($book->authors as $author)
                    @if($author->pivot->type == true)
                    <li>{{$author->name}}</li>
                      @if($cont2<=$cont)
                      ,
                      @endif
                    @endif
                    <?php $cont2=$cont2+1; ?>
                  @endforeach  
              </ul>
              @if($cont3>0)
                
                Autor Secundario 
                <ul>
                  @foreach($book->authors as $author)
                      @if($author->pivot->type == false)
                      <li>{{$author->name}}</li>
                        @if($cont2<=$cont3)
                        ,
                        @endif
                      @endif
                      <?php $cont2=$cont2+1; ?>
                 @endforeach
                </ul> 
              @endif  
            </div>
              
            
            <div class="subtitle">Editoriales</div>
            <div class="box-body">             
                Editorial
                
                <?php $cont=0;$cont2=2;$cont3=0; ?>
                    <ul>
                    @foreach($book->editorials as $editorial)
                      @if($editorial->pivot->type == true)
                        <li>{{$editorial->name}}</li>
                      @else
                      <?php $cont3=$cont3+1;?>
                      @endif
                    @endforeach
                    </ul>
                @if($cont3>0)
                  </br>
                  Anexos
                  <ul>
                  @foreach($book->editorials as $editorial)
                      @if($editorial->pivot->type == false)
                      <li>{{$editorial->name}}</li>
                        @if($cont2<=$cont3)
                        ,
                        @endif
                      @endif
                      <?php $cont2=$cont2+1; ?>
                  @endforeach 
                  </ul>
                @endif
            </div>
          </div>
          
            
        </div>
      </div>

      <div class="col-md-6">
        <div class="box box-success box-solid">
          <div class="content">
              <div class="subtitle">Resumen</div>
              <div class="box-body">
                {{$book->summary}}
              </div>
              
              <div class="subtitle">Contenido</div>
              
                <ol>
                  @foreach($book->chapters as $chapter)
                  <li>{{$chapter->name}}</li>
                  @endforeach
                </ol>
              
                
              <div class="subtitle">Descripcion Fisica</div>
              
                <ul>
                  <li>Extension:<?php for($i=0;$i<66;$i++){echo "&nbsp";}?> {{$book->extension}}</li>
                  <li>Otros detalles fisicos: <?php  for($i=0;$i<45;$i++){echo "&nbsp";}?>{{$book->physicalDetails}}</li>
                  <li>Dimensiones:<?php for($i=0;$i<60;$i++){echo "&nbsp";}?> {{$book->dimensions}}</li>
                  <li>Material de Acompañamiento: <?php  for($i=0;$i<28;$i++){echo "&nbsp";}?>{{$book->accompaniment}}</li>
                </ul>
              
             
              <div box-body>
                <a href="#0" type="button" class="button-content btn btn-warning libros"><i class="fa fa-book"></i></a>
                <a href="#1" data-id="{{$book->id}}"  class="btn btn-primary pagina1">1</a>
                <a href="#2" data-id="{{$book->id}}"  class="btn btn-primary active pagina2">2</a>  
              </div>
                      
          </div>
        </div>
      </div>
    </div>

    
  </div>
</div>

   

  <script>
    $(document).ready(function(){
      $(".pagina1").on('click',function(event){
        $id = $(this).data('id');
        $("#div-new").html('<div class="box box-warning box-solid"><div class="box-header with-border"><h3 class="box-title">Cargando</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
        $("#div-new").load('{{ url("/admin/book/") }}/' + $id+'/show2');
      })
      $(".pagina2").on('click',function(event){ 
        $id = $(this).data('id');
        $("#div-new").html('<div class="box box-warning box-solid"><div class="box-header with-border"><h3 class="box-title">Cargando</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
        $("#div-new").load('{{ url("/admin/book/") }}/' + $id+'/show3');
      })
      $(".libros").on('click',function(event){ 
        $id = $(this).data('id');
        $("#div-new").html('<div class="box box-warning box-solid"><div class="box-header with-border"><h3 class="box-title">Cargando</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
        $("#div-new").load('{{ url("/admin/book/create") }}');
      })
    })
  </script>