<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Listado de Tesis</h3>

    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>

    {!!Form::model(Request::all(),['route'=> 'autor.index' , 'method'=>'GET','class'=>'navbar-form navbar-right'])!!}
      <div class="form-group">
        {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre del autor'])!!}
        {!!Form::select('category',config('autor-options.types'),null,['class'=>'form-control'])!!}
      </div>  
      <button type="submit" class="btn btn-default">Buscar</button>
    {!!Form::close()!!}
  


  <div class="box-body">

    <table class="table table-bordered table-hover">
      <tr>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>

      @foreach($authors as $author)
      <tr>
        <td>{{$author->name}}</td>
        <td></td>
        <td></td>
        <td></td>
        
        <?php $aux=0; ?>

        <td>
        @foreach($author->categories as $category)
          
            @if($aux>0),@endif
            {{$category->name}}
            <?php $aux=$aux+1; ?>
          
        @endforeach
        </td>

        
        <td><a href="{{route('autor.edit',$author->id)}}" class="btn btn-success editar"><i class="fa fa-pencil"></i></a></td>
        
        <td><button type="button" data-id="{{$author->id}}" data-name="{{$author->name}}" class="btn btn-danger eliminar" data-toggle="modal" data-target="#delted" @if(!$eliminar) disabled @endif><i class="fa fa-trash"></i></button></td>
       
      </tr>

      @endforeach
      
      </table>
  </div>
  
{!! $authors->render() !!}

  </div>

  @section('script')
    <script type="text/javascript">
      $(document).ready(function() {
        @if($editar)
        $(".editar").on('click',function(event) {
          $id = $(this).data('id')
          $("#div-edit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
          $("#div-edit").load('{{ url("/admin/autor/") }}/' + $id + '/edit');
        });
        @endif


        @if($eliminar)
        $(".eliminar").on('click',function(event) {
          $name = $(this).data('name')
          $('.modal-body').html('<p>¿Esta seguro que quiere eliminar el autor ' + $name +'?</p>');
          $('#confirmaDelete').data('id',$(this).data('id'))
        });
        $("#confirmaDelete").on('click',function(event){
          $id = $('#confirmaDelete').data('id')
          $.ajax({            
            url: '{{ url("/admin/autor") }}/'+$id,
            data: {'_token': '{{csrf_token()}}'},
            success: function(result) {
              location.reload();
            }
          })
        })
        @endif
      });
    </script>
@endsection
