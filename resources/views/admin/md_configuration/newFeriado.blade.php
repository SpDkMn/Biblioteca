<form method="POST" action="{{ url('/admin/configurations')}}">
            <div class="box-body">
              <div>
                <label>Razon:</label>
                <input type="date" class="form-control pull-right" id="datepicker1">
              </div>
              <!-- Date -->
              <div class="form-group">
                <label>Date:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i> 
                  </div>
                  <input type="date" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
            </div>
            <!-- /.box-body -->
          <!-- /.box -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary" id="newFeriado">Crear</button>
    </div>
  </form>