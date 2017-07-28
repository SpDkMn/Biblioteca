<form method="POST" action="{{ url('/admin/configurations')}}">
       {{ csrf_field() }}
            <div class="box-body">
              <div class="form-group">
                <label>Asunto: </label>
                <input type="text" name="item" class="form-control" id="asunto">
              </div>

              <div class="form-group">
                <label>Inicio de feriado</label>
                <div id="datetimepicker" class="input-append date fecha1">
                  <input type="text" name="inicioFeriado" class="txtPickter"></input>
                  <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                  </span>
                </div>
              </div>

              <div class="form-group">
                <label>Fin de feriado</label>
                <div id="datetimepicker"  class="input-append date fecha1">
                  <input type="text" name="finFeriado" class="txtPickter"></input>
                  <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                  </span>
                </div>
              </div>
          
            </div>
            <!-- /.box-body -->
          <!-- /.box -->


    <div class="box-footer">
      <button type="submit" class="btn btn-primary" id="newFeriado">Crear</button>
    </div>
  </form>




