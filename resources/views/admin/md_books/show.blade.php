<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Informacion de Libros</h3>

    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div> 
  </div>

  <div class="box-body">
    <div class="row">

      <div class="col-lg-3">
        <div class="form-group">
          <div class="input-group">
            
            
            <div class="input-group-btn">
              <button type="button" class="btn btn-default" >
                <span>Cantidad de Libros&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>
              </button>
            
            </div><!-- /btn-group -->
            
            
              <input type="text" class="form-control" aria-label="..." size="">
            

            <div class="input-group-btn">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
              <ul class="dropdown-menu">
                <li><a href="#">5</a></li>
                <li><a href="#">10</a></li>
                <li><a href="#">20</a></li>
                <li><a href="#">30</a></li>
              </ul>
            
            </div><!-- /btn-group -->
          </div><!-- /input-group -->
        </div>
      </div>
     
      <div class="col-lg-5">
        
      </div>

      <div class="col-lg-4">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Nombre de Libro">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
          </span>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-6 -->
      
    </div>
    
    <table class="table table-bordered table-hover">
        <tr>
          <th>Titulo</th>
          <th>Autor</th>
          <th>Editorial</th>
          <th>Nº ejemplares</th>
          <th>ISBN</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>    
      @foreach($books as $book)
        <tr>
          <td>
            
            <a href="#" data-id="{{$book->id}}" class="contenido">{{$book->title}}</a>


          </td>
          <td>
            <?php $cont=0; ?>
            @foreach($book->authors as $author)
              @if($author->pivot->type == true)
              <?php $cont=$cont+1; ?>
              @endif
            @endforeach 
            <?php $cont2=2; ?>
            @foreach($book->authors as $author)
              @if($author->pivot->type == true)
              {{$author->name}}
                @if($cont2<=$cont)
                ,
                @endif
              @endif
              <?php $cont2=$cont2+1; ?>
            @endforeach   
          </td> 
          <td>
            @foreach($book->editorials as $editorial)
              @if($editorial->pivot->type == true)
                {{$editorial->name}}
              @endif
            @endforeach
          </td>
          
        <td>
          <?php $cont=0 ?>
          @foreach($book->bookCopies as $copy)
            <?php $cont=$cont+1; ?>
          @endforeach
          {{$cont}}
        </td>
        <td>{{$book->isbn}}</td>
        <td><a type="button" class="button-content btn btn-success"><i class="fa fa-pencil"></i></a></td>

        <td><a type="button" class="button-content btn btn-danger"><i class="fa fa-trash"></i></a></td> 
      </tr>
      @endforeach
      
    </table>      
  </div>
</div>


  <script>
    $(document).ready(function(){
      $(".contenido").on('click',function(event){
        
        $id = $(this).data('id');
        $("#div-content").html('<div class="box box-warning box-solid"><div class="box-header with-border"><h3 class="box-title">Cargando</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
       $("#div-content").load('{{ url("/admin/book/") }}/' + $id+'?page=1');
      })
    })
  </script>
