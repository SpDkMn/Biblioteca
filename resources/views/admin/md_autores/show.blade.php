<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Listado de Autores</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <br>
<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
       <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Busqueda Normal</a>
       </li>
       <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Busqueda Avanzada</a>
      </li>
    </ul>
<div id="myTabContent" class="tab-content">
   <!-- ESTA SECCION REALIZA LA BUSQUEDA NORMAL (Solo del nombre del autor) -->
   <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

       {!!Form::model(Request::all(),['route'=>'autor.index','method'=>'GET','class'=>'navbar-form navbar-left','role'=>'search']) !!}
         <div class="form-group">
         {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del autor']) !!}
         </div>
         <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button><br>
       {!!Form::close()!!}
   </div>

<!-- ESTA SECCION REALIZA LA BUSQUEDA AVANZADA(Busca el nombre del autor y la categoria a la q pertenece) -->
   <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
       {!!Form::model(Request::all(),['route'=>'autor.index','method'=>'GET','class'=>'navbar-form navbar-left','role'=>'search']) !!}
       <div class="form-group">
           {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del autor']) !!}
           <script>
           //Para el uso del multiselector
             $(document).ready(function() {
                $('#example-multiple-selected').multiselect();
                                         });
           </script>
       <div class="form-group">
           <select class="form-control select2" multiple="multiple" data-placeholder="Categoria" name="category[]" style="width: 100%;">
               <option>Libro</option>
               <option>Revista</option>
                <option>Tesis</option>
               <option>Compendio</option>
            </select>
       </div>
       </div>
             <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button><br>
           {!!Form::close()!!}
      </div>
     </div>
</div>

<!-- ESTA SECCION PERMITE MOSTRAR LOS DATOS DE LOS AUTORES EN UNA TABLA -->
    <table class="table table-bordered table-hover">
      <tr>
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
      @if($categories==null)
          @foreach($authors as $author)
          <tr>
            <td>{{$author->name}}</td>
            <?php $aux=0; ?>
            <td>
                @foreach($author->categories as $category)
                    @if($aux>0),@endif
                    {{$category->name}}
                    <?php $aux=$aux+1; ?>
                @endforeach
            </td>
            <td><a href="{{route('autor.edit',$author->id)}}" class="btn btn-success editar"><i class="fa fa-pencil" @if(!$editar) disabled @endif></i></a></td>
            <td><button type="button" data-id="{{$author->id}}" data-name="{{$author->name}}" class="btn btn-danger eliminar" data-toggle="modal" data-target="#delted" @if(!$eliminar) disabled @endif><i class="fa fa-trash"></i></button></td>
         </tr>
          @endforeach
      @else
      @foreach($authors as $author)
            <?php
              $array=null;
              $i=0;
              foreach ($author->categories as $category) {
                $array[$i] = $category->id;
                $i=$i+1;
              }
            ?>
            @if($array==$categories)
               <tr>
                  <td>{{$author->name}}</td>
                  <?php $aux=0; ?>
                  <td>
                      @foreach($author->categories as $category)
                        @if($aux>0),@endif
                        {{$category->name}}
                        <?php $aux=$aux+1; ?>
                      @endforeach
                  </td>
            <td><a href="{{route('autor.edit',$author->id)}}" class="btn btn-success editar" @if(!$editar) disabled @endif><i class="fa fa-pencil"></i></a></td>
            <td><button type="button" data-id="{{$author->id}}" data-name="{{$author->name}}" class="btn btn-danger eliminar" data-toggle="modal" data-target="#delted" @if(!$eliminar) disabled @endif><i class="fa fa-trash"></i></button></td>
        </tr>
      @endif
    @endforeach
  @endif
 </table>
</div>
{!! $authors->appends(Request::only(['name','category']))->render() !!}

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
