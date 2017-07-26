<!--**************************************************************************************************************
  Este modal sera utilizado cuando se haga la eliminacion de una revista utilizando
  ajax y methodo DELETE , por el momento se esta utilizando un metodo GET
**************************************************************************************************************v*-->
<div class="modal fade modal-danger" id="modalDelete" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id='myModalLabel'>Eliminar Revista</h4>
			</div>
			<div class="modal-body #modalDeleteBody"></div>
			<div class="modal-footer">
				<button type="button" id="confirmarDelete" data-id=""
					class="btn btn-outline">Eliminar</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
