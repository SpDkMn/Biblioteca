<div class="box-body" id="cuadroVerSancion" style="margin-left: 0px;padding: 0px; ">
	<div class="box box-success box-solid" style="margin-bottom: 0px; border-color: #C0872B;">
		<form role="form" method="POST" action="{{ url('/admin/sanciones') }}" enctype="multipart/form-data" files="true" name="formularioIngresoSancion"	id="formularioIngresoSancion">
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
		<input type="hidden" name="usuarioId" value="{{ $Usuario->id }}">
		<div class="box-header with-border" style=" padding:0px; height: 440px;background-color: blue; border-color: #B57128;">
			<div class="col-md-8" style="background-color: red; height: 100%;padding-top: 5px;">
				<p style="margin-bottom: 20px; font-size: 30px;">Crear un Castigo</p>
				
					<div class="form-group col-md-12" style="padding: 0px;">
						<label for="typePenalty" class="control-label col-md-3">Escoja el tipo de Castigo:</label>
						<div class="col-md-9">
								<select name="typePenalty" class="form-control col-md-12">
									@foreach($tiposanciones as $tiposancion)
										<option value="{{$tiposancion->id}}">{{$tiposancion->symbol}}</option> 
									@endforeach  
								</select>
							
						</div>
					</div>
					
					<div class="form-group col-md-12" style="padding:0px;" >
						<label for="presenta-libro" class="control-label col-md-2">Presenta libro o tesis:</label>
					</div>

					<div class="form-group col-md-12" style="padding:0px;">
						<label for="contexto" class="control-label col-md-12">Especifica el contexto:</label>
						<div class="col-md-12 ">
							<textarea id="contexto" class="form-control"  name="contexto" rows="5" cols="64" placeholder="Escribe aquí el motivo del tipo de Sanción"></textarea>
						</div>
					</div>

					<div class="form-group col-md-12" style="padding:0px;">
						<label for="codigo" class="control-label col-md-3">Código del usuario:</label>
						<div class="col-md-9">
							<input type="text" class="form-control col-md-9" id="codigo" placeholder="Codigo" name="codigo" value="{{ $Usuario->code }}" required>
						</div>
					</div>
					
				
				
			</div>
			<div class="box-tools pull-right" style="margin-top:0px;">
					<button type="button" class="btn btn-primary" data-dismiss="modal" style="width: 40px; "><i class="fa fa-close"></i></button>
			</div>
		</div>

		<div id="botones" class="box-body " style="width: 100% ;    margin: 0px;text-align: center; background-color: #B57128; ">
			<a id="reiniciarDatos" class="btn"  onClick="" style="font-size:18px; margin-right: 150px;background-color: #BFA878;border-color: #8A4C0F; color: black;">Reiniciar Datos</a>
			<button class="btn btn-primary" style="font-size:18px;background-color: #BFA878;border-color: #8A4C0F;color:black;">
				Guardar Datos
			</button>

		</div>
		</form>		
	</div>
</div>
<script type="text/javascript">
      $(document).ready(function() {
        $('#botones').on('click','#reiniciarDatos',function(){
        	$('#contexto').val("");
      	})
      	

    });

    </script>