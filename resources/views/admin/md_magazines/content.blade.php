<!-- Button trigger modal -->
<!--  Tiene que mostrar solo los contenidos de una revista-->


<div class="modal  fade" id="modalContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo "<h1>Su id es: ".$id."</h1> "?>
          
          <h4 class="modal-title" id="myModalLabel">Contenidos sssss</h4>
        </div>

        <div class="modal-body" id="modalContentBody">
        @foreach($revistas as $revista)
            @if($revista->id == $id)
            <div class="list-group">
              @foreach($revista->contents as $contenido)
              <a href="#" class="list-group-item ">
                <p class="list-group-item-text">{{$contenido->title}}</p>
                  <h4 class="list-group-item-heading">
                    @foreach($contenido->authors as $autor)
                      <li>{{$autor->name}},</li>
                    @endforeach
                  </h4>
              </a>
              @endforeach
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
