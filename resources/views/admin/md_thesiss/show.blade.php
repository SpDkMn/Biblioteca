

<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Informacion de Tesis y Tesinas</h3>

    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div> 
  </div><br>

  <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                 <tr>
                  <th class="text-center">TIPO DE ÍTEM</th>
                  <th class="text-center">TÍTULO</th>
                  <th class="text-center">AUTOR</th>
                  <th class="text-center">ASESOR</th>                  
                  <th class="text-center">Nº Hojas</th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                 </tr>
                </thead>
                
                <tbody>
                @foreach($thesiss as $thesis)
                <tr>
                  
                  <td class="text-center">
                    {{$thesis->type}}
                  </td>
                  
                  <td>
                    <a href="{{url('admin/thesis/content')}}/{{$thesis->id}}">{{$thesis->title}}</a>
                  </td>

                  <td>
                      @foreach($thesis->authors as $author)
                        @if($author->pivot->type ==0)
                          <span class="label label-info">{{$author->name}}</span>     
                        @endif
                        @if($author->pivot->type ==1)
                            <span class="label label-danger">{{$author->name}}</span>
                        @endif
                      @endforeach
                  </td>

                  <td>
                        {{$thesis->asesor}}
                  </td>
                 
                  
                  <td class="text-center">
                     {{$thesis->nhojas}}
                  </td>
                  <!--<td><button type="button"  href="{{route('thesis.edit',$thesis->id)}}" data-id="{{$thesis->id}}" class="btn btn-success editar" ><i class="fa fa-pencil"></i></a></td> -->
              <td><button type="button" data-id="{{$thesis->id}}" class="btn btn-success editar"><i class="fa fa-edit"></i></button></td>  
              <!--<td><button type="button" data-id="{{$thesis->id}}" data-name="{{$thesis->title}}" class="btn btn-danger eliminar" data-toggle="modal" data-target="#delted"><i class="fa fa-trash"></i></button></td>-->
           <!--   <td><a type="button" class="button-content btn btn-danger" href="{{route('thesis.destroy',$thesis->id)}}"><i class="fa fa-trash"></i></a></td>     -->
           {!! Form::open(['route'=>['thesis.destroy',$thesis->id],'method' => 'DELETE']) !!}
          <td><button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>
        {!! Form::close() !!}
              
             </tr>
               
            @endforeach
           </tbody>
                
       </table>
    </div>
</div>



@section('script')
   <script type="text/javascript">
        $(".editar").on('click',function(event) {
          $id = $(this).data('id');
          $("#divEdit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>');
          $("#divEdit").load('{{ url("/admin/thesis/") }}/' + $id + '/edit');
        });

</script>
        <!--
        $(".eliminar").on('click',function(event) {
          $name = $(this).data('name')

          $('.modal-body').html('<p>¿Esta seguro que quiere eliminar la tesis ' +$name +'?</p>');
          $('#confirmaDelete').data('id',$(this).data('id'))
        });
        $("#confirmaDelete").on('click',function(event){
          $id = $('#confirmaDelete').data('id')
          $.ajax({
            url: '{{ url("/admin/thesis") }}/'+$id,
            type: 'DELETE',
            data: {'_token': '{{csrf_token()}}'},
            success: function(result) {
              location.reload();
            }
          })
        })   -->   
        
@endsection
