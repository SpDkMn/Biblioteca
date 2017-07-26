<div class="modal fade" id="modalContent" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h3 class="modal-title" id="myModalLabel">Contenidos</h3>
			</div>
			<div class="modal-body" id="modalContentBody">
				<!-- Agregar Refresh mientras se muestra el modal -->
				<!-- Nota : Falta arreglar el diseño de los contenidos -->
				@foreach($revistas as $revista) @if($revista->id == $id)
				<div class="list-group">
					@foreach($revista->contents as $contenido) <a href="#"
						class="list-group-item ">
						<p class="list-group-item-text">{{$contenido->title}}</p>
						<h4 class="list-group-item-heading">
							@foreach($contenido->authors as $autor)
							<li>{{$autor->name}},</li> @endforeach
						</h4>
					</a> @endforeach
				</div>
				@endif @endforeach
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
		<div></div>
		<!-- Este js debe ser cargado inmediatamente despues de cargar esta vista , de lo contrario no
    activara la lista del contenido
    Nota : Corregir esto , y colocarlo en show / script en caso de que este diseño quede , de lo
  contrario eliminar este script y tmb el que se encuentra en script-->
		<script type="text/javascript">
    $(document).ready(function(){
      $('.list-group-item').hover(
        function(){
          $(this).addClass('active');
        },
        function(){
          $(this).removeClass('active');
        }
      );
    })
  </script>