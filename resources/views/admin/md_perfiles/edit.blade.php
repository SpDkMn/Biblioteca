<div class="box box-success">
  <form role="form" method="POST" action="{{ url('/admin/profiles') }}/{{$perfil['id']}}">
    <input type="hidden" name="_method" value="put" />
    {{ csrf_field() }}
    <div class="box-header with-border">
      <h3 class="box-title">{{$perfil['name']}}</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table class="table table-bordered ">
        <tr>
          <th>Función</th>
          <th>Ver</th>
          <th>Crear</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
        @foreach(json_decode($perfil['JSON'],true) as $key => $value)
        <tr>
          <td>{{$key}}</td>
          @foreach($value as $opcion)
            @foreach($opcion as $checkbox => $bool)
            <td><input type="checkbox" name="{{$key}}[]" value="{{$checkbox}}" @if($bool) checked @endif ></td>
            @endforeach
          @endforeach
        </tr>
        @endforeach
      </table>
    </div>
    <!-- ./box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<!-- /.box -->
