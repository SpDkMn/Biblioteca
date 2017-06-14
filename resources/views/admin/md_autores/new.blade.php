<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Nuevo</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
 
      
    
  <!-- /.box-header -->
 
  <form method="POST" action="{{ url('/admin/autor') }}">
    {{ csrf_field() }}
    <div class="box-body">

      <div class="form-group">
        <label for="inputNombre">Nombre </label>
        <input type="text" class="form-control" name="name" id="inputNombre" placeholder="">
      </div>
      
      <div class="form-group">
        <label>Categoria</label>
      <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione la categoria" name="category[]" style="width: 100%;">
        <option>libro</option>
        <option>revista</option>
        <option>tesis/tesina</option>
        <option>compendio</option>
        <option>colaborador</option>
        <option>asesor</option>
      </select>
        
      </div>


    </div>
   
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Crear</button>
    </div>
  </form>
  
</div>
<!-- /.box -->