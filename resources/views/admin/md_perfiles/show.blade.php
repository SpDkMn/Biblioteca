<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title"></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="box-body">
    <table class="table table-bordered table-hover">
      <tr>
        <th>Perfil</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
      @foreach($perfiles as $perfil)
      <tr>
        <td>{{ $perfil->name }}</td>
        <td><button type="button" data-id="{{$perfil->id}}" class="btn btn-success editar" @if(!$editar) disabled @endif><i class="fa fa-pencil"></i></button></td>
        <td><button type="button" data-id="{{$perfil->id}}" data-name="{{$perfil->name}}" class="btn btn-danger eliminar" data-toggle="modal" data-target="#delted" @if(!$eliminar) disabled @endif><i class="fa fa-trash"></i></button></td>
      </tr>
      @endforeach
    </table>
    <br>
    {!! $new !!}
  </div>
</div>

@section('script')
    <script type="text/javascript">
      $(document).ready(function() {
        @if($editar)
        $(".editar").on('click',function(event) {
          $id = $(this).data('id')
          $("#div-edit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
          $("#div-edit").load('{{ url("/admin/profiles/") }}/' + $id + '/edit');
        });
        @endif
        
        @if($eliminar)
        $(".eliminar").on('click',function(event) {
          $name = $(this).data('name')
          $('.modal-body').html('<p>¿Esta seguro que quiere eliminar el perfil ' + $name +'?</p>');
          $('#confirmaDelete').data('id',$(this).data('id'))
        });

        $("#confirmaDelete").on('click',function(event){
          $id = $('#confirmaDelete').data('id')
          $.ajax({
            url: '{{ url("/admin/profiles") }}/'+$id,
            type: 'DELETE',
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
