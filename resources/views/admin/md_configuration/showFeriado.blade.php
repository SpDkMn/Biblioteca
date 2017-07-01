<div class="box-body">
  <div class="bs-example" data-example-id="simple-nav-tabs"> 
    <ul class="nav nav-tabs">
      <li class="active"><a href="#agregar" data-toggle="tab">Agregar</a></li>
      <li><a href="#editar" data-toggle="tab">Editar</a></li>
      <li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>
    </ul>
    <div class="tab-content">
      <!-- Primer panel -->
      <div class="tab-pane active" id="agregar">
        <div class="box-body">
          <div class="form-group">
           {!! view('admin.md_configuration.newFeriado') !!}
          </div>
        </div>
      </div>
      <!-- Segundo Panel -->
      <div class="tab-pane fade" id="editar">
        <div class="box-body">
          <div class="form-group">
            <label>EDITAR</label>
          </div>
        </div>
      </div><!-- End Box-Body -->
      <!-- Tercer Panel -->
      <div class="tab-pane fade" id="eliminar">
       <div class="box-body">
        <div class="form-group">
          <label>ELIMINAR</label>
        </div>
      </div>
    </div> 
  </div>
</div>  
</div> 
<!-- /.box-body -->