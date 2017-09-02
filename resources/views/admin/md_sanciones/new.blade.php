<div class="box-body" id="cuadroVerSancion" style="margin-left: 0px;padding: 0px; ">
	<div class="box box-success box-solid" style="margin-bottom: 0px; border-color: #C0872B;">
		<div class="box-header with-border" style=" padding:0px; height: 440px;background-color: blue; border-color: #B57128;">
			<p>Crear un Castigo</p>
			<form>
				<div class="form-group col-md-12" style="background-color: red;">
					<label for="typePenalty" class="control-label col-md-3">Escoja el tipo de Castigo:</label>
					<div class="col-md-9">
							<select name="typePenalty" class="form-control col-md-12">
								@foreach($tiposanciones as $tiposancion)
									<option value="{{$tiposancion->id}}">{{$tiposancion->symbol}}</option> 
								@endforeach  
							</select>
						
					</div>
				</div>
				
				<div class="form-group col-md-12" >
					<label for="presenta-libro" class="control-label col-md-2">Presenta libro o tesis:</label>
				</div>

				<div class="form-group col-md-12">
					<label for="contexto" class="control-label col-md-12">Especifica el contexto:</label>
					0
				</div>
				
			</form>
			<div class="box-tools pull-right" style="margin-top:0px;">
				<button type="button" class="btn btn-primary" data-dismiss="modal" style="width: 40px; "><i class="fa fa-close"></i></button>
			</div>
		</div>

		<div class="box-body " style="width: 100% ;    margin: 0px;text-align: center; background-color: #B57128; ">
			
		</div>		
	</div>
</div>