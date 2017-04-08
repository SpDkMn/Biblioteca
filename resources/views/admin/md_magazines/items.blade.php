<div class="modal  fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"><i class="fa fa-book"></i>   Item</h4>
        </div>
        <div class="modal-body" id="modalItemBody">
          @foreach($revistas as $revista)
            @if($revista->id == $id)
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">Ejemplar</th>
                  <th>Clasificación</th>
                  <th>Numero de ingreso</th>
                  <th>Codigo de barra</th>
                  <th style="width: 40px">Estado</th>
                </tr>
                @foreach($revista->magazines_copies as $copia)
                  <tr>
                    <td>{{$copia->copy}}.</td>
                    <td>{{$copia->clasification}}</td>
                    <td>{{$copia->incomeNumber}}</td>
                    <td>{{$copia->barcode}}</td>
                    <td><span class="label label-warning">Disponible</span></td>
                  </tr>
                @endforeach
              </table>
            @endif
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    <div>
  </div>
