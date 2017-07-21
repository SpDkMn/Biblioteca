<div class="modal fade modal-info" id="modalIntroduccion" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-introduccion">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="myModalLabel">Contenidos</h3>
        </div>
        <div class="modal-body" id="modalIntroduccionBody">
          <!-- Agregar Refresh mientras se muestra el modal -->
          <!-- Nota : Falta arreglar el diseño de los contenidos -->
        @foreach($compendios as $compendio)
            @if($compendio->id == $id)
              <div class="jumbotron">
                <div class="container">
                  <h1>{{$compendio->title}}</h1>
                  <p>{{$compendio->introduccion}}</p>
                </div>
              </div>
            @endif
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    <div>
  </div>
