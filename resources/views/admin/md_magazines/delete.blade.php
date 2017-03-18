<div class="modal fade modal-danger" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id='myModalLabel'>Eliminar Revista</h4>
      </div>
      <div class="modal-body" id="modalDeleteBody">
        {!!Form::open(['route'=>['magazines.destroy',$revista->],'method'=>'DELETE'])!!}
          <div class="form-group">
              <label for="">Desea eliminar la siguiete revista</label>
              <label for="">{{$revista->id}}</label>
          </div>
          {!!Form::submit('Eliminar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Eliminar</span>','class'=>'btn btn-danger btn-sm m-t-10'])}
        {!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button type="button" id="confirmarDelete" data-id="" class="btn btn-outline">Eliminar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
