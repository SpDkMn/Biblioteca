
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Editar</h3> 

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <form role="form" method="POST" action="{{ url('/admin/employees') }}/{{$empleado->id}}">
    <input type="hidden" name="_method" value="put" />
    {{ csrf_field() }}
    <div class="box-body">
      <div class="form-group">
        <label for="inputNombre">Nombres</label>
        <input type="text" class="form-control" name="name" id="inputNombre" placeholder="" value="{{ $empleado->user->name }}">
      </div>
      <div class="form-group">
        <label for="inputApellido">Apellidos</label>
        <input type="text" class="form-control" name="last_name" id="inputApellido" placeholder="" value="{{ $empleado->user->last_name }}">
      </div>
      <div class="form-group">
        <label for="inputMail">Correo</label>
        <input type="email" class="form-control" name="email" id="inputMail" placeholder="" value="{{ $empleado->user->email }}">
      </div>
      <div class="form-group">
        <label>Perfil</label>
        <select class="form-control" name="profile">
          @foreach($perfiles as $perfil)
          <option value="{{ $perfil->id }}" @if($perfil->name == $empleado->profile->name) selected @endif>{{ $perfil->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
  </form>
</div>
<!-- /.box -->
