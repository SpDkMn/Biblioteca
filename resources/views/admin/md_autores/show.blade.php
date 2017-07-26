
<div class="box box-warning">
	<div class="box-header with-border">
		<h3 class="box-title">Listado de Autores</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<br>

	<div class="box-body">

		<!---->
		<!--BUSQUEDA Y FILTROS-->
		<!--  {!!Form::model(Request::all(),['route'=>'autor.index','method'=>'GET','class'=>'navbar-form navbar-right','role'=>'search'])!!}
    <div class="form-group">
        {!!Form::text('name',null,['class'=>'form-control', 'placeholder'=>'Nombre del autor'])!!}
        {!!Form::select('category[]',['Libro'=>'Libro','Revista'=>'Revista','Tesis'=>'Tesis','Compendio'=>'Compendio'],null,['id'=>'example-multiple-selected','multiple'=>'multiple'])!!}
         
    </div>   
    <button type="submit" class="btn btn-primary">Buscar</button><br>
      
    {!!Form::close()!!}   -->
		<!--FIN BUSQUEDA Y FILTROS-->


		<table id="example1" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th class="text-center">Nombre</th>
					<th class="text-center">Categoria</th>
					<th class="text-center">Editar</th>
					<th class="text-center">Eliminar</th>
				</tr>
			</thead>

			<!--$Categories es la variable que almacena los filtros de busqueda-->
			@if($categories==null) @foreach($authors as $author)
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

				<td class="text-center"><button type="button"
						data-id="{{$author->id}}" class="btn btn-success editar"
						@if(!$editar) disabled @endif>
						<i class="fa fa-pencil"></i>
					</button></td>

				<td class="text-center"><button type="button"
						data-id="{{$author->id}}" data-name="{{$author->name}}"
						class="btn btn-danger eliminar" data-toggle="modal"
						data-target="#delted" @if(!$eliminar) disabled @endif>
						<i class="fa fa-trash"></i>
					</button></td>
			</tr>
        @endforeach

      @else
        @foreach($authors as $author)

            <?php
            $array = null;
            $i = 0;
            foreach ($author->categories as $category) {
               
               $array[$i] = $category->id;
               $i = $i + 1;
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
				<td><a href="{{route('autor.edit',$author->id)}}"
					class="btn btn-success editar" @if(!$editar) disabled @endif><i
						class="fa fa-pencil"></i></a></td>
				<td><button type="button" data-id="{{$author->id}}"
						data-name="{{$author->name}}" class="btn btn-danger eliminar"
						data-toggle="modal" data-target="#delted"
						@if(!$eliminar) disabled @endif>
						<i class="fa fa-trash"></i>
					</button></td>
			</tr>
			@endif @endforeach @endif
		</table>
	</div>


	@section('script')
	<script src="{{ URL::asset('js/jquery.multi-select.js')}}"></script>
	<script type="text/javascript">
    <!-- Note the missing multiple attribute! -->
      $(document).ready(function() {
        $(document).ready(function() {
          $('#example-multiple-selected').multiselect();
        });
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
          $('.modal-body').html('<p>¿Esta seguro que quiere eliminar el editorial ' + $name +'?</p>');
          $('#confirmaDelete').data('id',$(this).data('id'))
        });
        $("#confirmaDelete").on('click',function(event){
          $id = $('#confirmaDelete').data('id')
          $.ajax({
            
            url: '{{ url("/admin/editorial") }}/'+$id,

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