<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nuevo</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>

  <form method="POST" action="{{ url('/admin/autor') }}">
    {{ csrf_field() }}
    <div class="box-body">
        <div class="form-group">
            <label for="inputNombre">Nombre </label>
            <input type="text" class="form-control" name="name" id="inputNombre" required>
        </div>
        <div class="form-group">
            <label>Categoría</label>
              <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione la categoria" name="category[]" style="width: 100%;" required>
                <option>Libro</option>
                <option>Revista</option>
                <option>Tesis</option>
                <option>Compendio</option>
              </select>      
        </div>
    </div>
    <div class="box-footer">
       <button type="submit" class="btn btn-primary">Crear</button>
    </div>
  </form>
</div>