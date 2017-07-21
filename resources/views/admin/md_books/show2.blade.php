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
    <h1>{{$book->title}}<h1>
    <h4>{{$book->secondaryTitle}}</h4>
  </div>

  <div class="box-body table-responsive table-hover">
    <h3><b><font face="Calibri">Items</font></b></h3>
      <table class="table">
        <tr>
          <th>Numero de ingreso</th>
          <th>Codigo de barras</th>
          <th>Ejemplar</th>
          
          <th>Volumen</th>
          <th>Clasificacion</th>
          <th>Contenido</th>
          
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
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>EJEMPLAR&nbsp<?php echo $copy->copy; ?></strong></h3>
              </div>
              <div class="modal-body">
                
                <div>
                  @if($copy->acquisitionModality!="")
                  <p>&nbsp&nbsp&nbspModalidad de Adquisicion
          <?php   for($i=0;$i<14;$i++){echo "&nbsp";}?>:&nbsp
                  {{$copy->acquisitionModality}}</p>
                  @endif
                  @if($copy->acquisitionSource!="")
                  <p>&nbsp&nbsp&nbspFuente de Adquisicion
          <?php   for($i=0;$i<21;$i++){echo "&nbsp";}?>:&nbsp
                  {{$copy->acquisitionSource}}</p>
                  @endif
                  @if($copy->acquisitionPrice!="")
                  <p>&nbsp&nbsp&nbspPrecio de Adquisicion
          <?php   for($i=0;$i<23;$i++){echo "&nbsp";}?>:&nbsp
                  {{$copy->acquisitionPrice}}</p>
                  @endif
                  @if($copy->acquisitionDate)
                  <p>&nbsp&nbsp&nbspFecha de Adquisicion
          <?php   for($i=0;$i<24;$i++){echo "&nbsp";}?>:&nbsp
                  {{$copy->acquisitionDate}}</p>
                  @endif
                  
                </div>
                <div>
                  @if($copy->printType!="")
                  <p>&nbsp&nbsp&nbspTipo de Impresion
          <?php   for($i=0;$i<29;$i++){echo "&nbsp";}?>:&nbsp
                  {{$copy->printType}}</p>
                  @endif
                  @if($copy->publicationLocation!="")
                <p>&nbsp&nbsp&nbspLugar de publicacion
          <?php   for($i=0;$i<24;$i++){echo "&nbsp";}?>:&nbsp
                  {{$copy->publicationLocation}}</p>
                  @endif
                  @if($copy->publicationDate!="")
          <p>&nbsp&nbsp&nbspFecha de publicacion
          <?php   for($i=0;$i<23;$i++){echo "&nbsp";}?>:&nbsp
                  {{$copy->publicationDate}}</p>
                  @endif
                  @if($copy->publicationDate!="")
          <p>&nbsp&nbsp&nbspGestion
          <?php   for($i=0;$i<50;$i++){echo "&nbsp";}?>:&nbsp
                  {{$copy->management}}</p>
                  @endif
                </div>            
              </div>
            </div>
          </div>
        </div>
        <!-- <!-- Fin Modal Ejemplar -->
        @endforeach
      </table>
  </div>
  <div class="box-body">
    <h3><b><font face="Calibri">Autores</font></b></h3>
    &nbsp&nbsp&nbspAutor Principal 
    <?php   for($i=0;$i<20;$i++){echo "&nbsp";}?>:&nbsp
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
          {{$author->name}}
            @if($cont2<=$cont)
            ,
            @endif
          @endif
          <?php $cont2=$cont2+1; ?>
        @endforeach  
    @if($cont3>0)
      </br>
      &nbsp&nbsp&nbspAutor Secundario 
      <?php $cont2=2; for($i=0;$i<15;$i++){echo "&nbsp";}?>:&nbsp
      @foreach($book->authors as $author)
          @if($author->pivot->type == false)
          {{$author->name}}
            @if($cont2<=$cont3)
            ,
            @endif
          @endif
          <?php $cont2=$cont2+1; ?>
        @endforeach 
    @endif  
  </div>

  <div class="box-body">
    <h3><b><font face="Calibri">Editoriales</font></b></h3>
    &nbsp&nbsp&nbspEditorial
    <?php   for($i=0;$i<33;$i++){echo "&nbsp";}?>:&nbsp
    <?php $cont=0;$cont2=2;$cont3=0; ?>
        @foreach($book->editorials as $editorial)
          @if($editorial->pivot->type == true)
            {{$editorial->name}}
          @else
          <?php $cont3=$cont3+1;?>
          @endif
        @endforeach
    @if($cont3>0)
      </br>
      &nbsp&nbsp&nbspAnexos
      <?php $cont2=2; for($i=0;$i<35;$i++){echo "&nbsp";}?>:&nbsp
      @foreach($book->editorials as $editorial)
          @if($editorial->pivot->type == false)
          {{$editorial->name}}
            @if($cont2<=$cont3)
            ,
            @endif
          @endif
          <?php $cont2=$cont2+1; ?>
        @endforeach 
    @endif
    </div>
    <br>

    <div class="container">
    <?php $cont2=2; for($i=0;$i<280;$i++){echo "&nbsp";}?>
      <a href="#3" type="button" class="button-content btn btn-warning libros"><i class="fa fa-book"></i></a>
      <a href="#1" data-id="{{$book->id}}"  class="btn btn-primary active pagina1">1</a>
      <a href="#2" data-id="{{$book->id}}"  class="btn btn-primary pagina2">2</a>
    </div>
    <br>
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

