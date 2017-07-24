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

    <div class="box-body col-md-7">
      <h3><b><font face="Calibri">Resumen</font></b></h3>
      <div class="container">
        {{$book->summary}}
        </div> 
        <h3><b><font face="Calibri">Contenido</font></b></h3>
        @foreach($book->chapters as $chapter)
          <p>&nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp{{$chapter->number}}.&nbsp&nbsp&nbsp&nbsp{{$chapter->name}}</p>
        @endforeach
        <h3><b><font face="Calibri">Descripcion Fisica</font></b></h3>
        <p>&nbsp&nbsp&nbsp&nbsp-Extension                 <?php for($i=0;$i<66;$i++){echo "&nbsp";}?>:&nbsp {{$book->extension}}</p><!-- 17 -->
        <p>&nbsp&nbsp&nbsp&nbsp-Otros detalles fisicos    <?php  for($i=0;$i<45;$i++){echo "&nbsp";}?>:&nbsp {{$book->physicalDetails}}</p><!-- 4 -->
        <p>&nbsp&nbsp&nbsp&nbsp-Dimensiones               <?php for($i=0;$i<60;$i++){echo "&nbsp";}?>:&nbsp {{$book->dimensions}}</p><!-- 15 -->
        <p>&nbsp&nbsp&nbsp&nbsp-Material de Acompañamiento<?php  for($i=0;$i<28;$i++){echo "&nbsp";}?>:&nbsp {{$book->accompaniment}}<p>
      </div>
   
      <!-- Libros similares -->
      <div class="col-md-5">
        <div class="box box-success box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Libros Similares</h3>
            <div class="box-tools pull-right"> 
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
            </div> 
          </div>
          <div class="box-body table-responsive">
              <table class="table table-condensed">
                  <tr>
                    <th><font size="2"></font>Titulo</th>
                    <th><font size="2"></font>Autor</th>
                    <th colspan="2"><font size="2"></font><a type="button" class="button-content btn btn-default btn-xs">Añadir mas  +</a></th>
                    
                  </tr>
                  <tr>
                    <td><font size="2">Analisis Matematico</font></td>
                    <td><font size="2">Venero</font></td>
                    <td><a type="button" class="button-content btn btn-success btn-xs"><i class="fa fa-pencil"></i></a></td>
                    <td><a type="button" class="button-content btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
                  </tr>
                  <tr>
                    <td><font size="2">Topicos de Calculo</font></td>
                    <td><font size="2">Luis Toro</font></td>
                    <td><a type="button" class="button-content btn btn-success btn-xs"><i class="fa fa-pencil"></i></a></td>
                    <td><a type="button" class="button-content btn btn-danger btn-xs"><i class="fa fa-trash"></i></a></td>
                  </tr>
              </table>
          </div> 
        </div>
      </div>
      <!-- fin lifbors recomendados -->
      
      <br>

      <div class="container">
        <?php $cont2=2; for($i=0;$i<280;$i++){echo "&nbsp";}?>
        <a href="#0" type="button" class="button-content btn btn-warning libros"><i class="fa fa-book"></i></a>
        <a href="#1" data-id="{{$book->id}}"  class="btn btn-primary pagina1">1</a>
        <a href="#2" data-id="{{$book->id}}"  class="btn btn-primary active pagina2">2</a>  
      </div>
      <br>
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