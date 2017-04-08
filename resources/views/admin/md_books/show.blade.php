<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Informacion de Libros</h3>

    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div> 
  </div>

  <div class="box-body">
    <table class="table table-bordered table-hover">
        <tr>
          <th>Titulo</th>
          <th>Autor</th>
          <th>Editorial</th>
          <th>Nº ejemplares</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>    
      @foreach($books as $book)
        <tr>
          <td>
            
            <a href="#" data-id="{{$book->id}}" class="content">{{$book->title}}</a>


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
        <td><a type="button" class="button-content btn btn-success"><i class="fa fa-pencil"></i></a></td>

        <td><a type="button" class="button-content btn btn-danger"><i class="fa fa-trash"></i></a></td> 
      </tr>
      @endforeach
      
    </table>      
  </div>
</div>

@section('script')
  <script>
    $(document).ready(function(){
      $(".content").on('click',function(event){
        $id = $(this).data('id');
       $("#div-content").load('{{ url("/admin/book/") }}/' + $id+'?page=1');
      })
    })
  </script>
@endsection