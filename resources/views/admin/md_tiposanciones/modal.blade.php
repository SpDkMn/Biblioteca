<?php
	use App\PenaltyOrder;
?>
<style type="text/css">
	table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 30px auto;
	text-align: left;
	width: 800px;
}	
th {
	background: #9A6B40;
	color: #fff;
  font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
}
th:after {
	
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 100%;
}

th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}

td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms;
}

td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

tr {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:nth-child(odd) td {
	background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}

</style>
<script>
    function accion()
    {	
    		var filaOrden=document.getElementById("filaOrden");
    		var arregloDiv=filaOrden.getElementsByTagName("*");
    		var cantidad=arregloDiv.length/4;
    		var arreglo = new Array(cantidad);
    		for(var i=0;i<cantidad;i++){
    			arreglo[i]=document.getElementById("duracion"+(i+1)).value;
    		}
    		var myJson = JSON.stringify(arreglo);

        $.ajax({
            type:'GET', //aqui puede ser igual get
            url: '/admin/tiposanciones/'+{{$tipoSancion->id}}+'/guardarcambio',//aqui va tu direccion donde esta tu funcion php
            data: {myJson: myJson},//aqui tus datos
         });
    }
    function anadir(){
    	var filaOrden=document.getElementById("filaOrden");
    		var arregloDiv=filaOrden.getElementsByTagName("*");
    		var cantidad=arregloDiv.length/4;
    	$('#filaOrden').append(
        	'<tr id="fila'+(cantidad+1)+'"><td style="text-align: center; font: bold 120% monospace;">'+(cantidad+1)+'</td><td style="text-align: center;font: bold 120% arial;"><input id="duracion'+(cantidad+1)+'"" name="duracion'+(cantidad+1)+'" value="ciclo" style="width: 55px; border-radius: 5px; text-align: center;"></td></tr>');
    	$.ajax({
            type:'GET', //aqui puede ser igual get
            url: '/admin/tiposanciones/'+{{$tipoSancion->id}}+'/anadirorden',//aqui va tu direccion donde esta tu funcion php
            data: {},//aqui tus datos
         });
    	
    }
    function quitar(){
    	var filaOrden=document.getElementById("filaOrden");
    		var arregloDiv=filaOrden.getElementsByTagName("*");
    		var cantidad=arregloDiv.length/4;
    		$('#fila'+cantidad).remove();
    		$.ajax({
            type:'GET', //aqui puede ser igual get
            url: '/admin/tiposanciones/'+{{$tipoSancion->id}}+'/quitarorden',//aqui va tu direccion donde esta tu funcion php
            data: {},//aqui tus datos
         });
    }
</script>

<div class="box-body" id="cuadro_ingresar_sancion" style="background-color: #17C43B; margin-left: 0px;padding: 0px; ">
	
			
			
		<div class="box box-success box-solid"
			style="margin-bottom: 0px; background-color: #17C43B;">
			<div class="box-header with-border"
				style=" margin-bottom: 0px; border-color: #17C43B; ">
				<p class="box-title" style="text-align: center; width: 100%;font-size:30px; font-weight: 5px;">Castigo " {{$tipoSancion->symbol}} "</p>
				<div class="box-tools pull-right" >
					<button type="button" class="btn btn-primary"
				data-dismiss="modal" style="width: 40px; "><i class="fa fa-close"></i></button>
				</div>

			</div>
			<div style="background-color: #17C43B;  font-size:30px; padding-left: 9px;padding-top: 7px;padding-bottom: 9px; font: bold 150% monospace;">{{$tipoSancion->cause}}</div> 
			<hr style="border: 0.5px solid #00A65A; height: 0px; text-align: center; margin: 0px;">
			<div class="box-body " style="background-color: #17C43B; height: 450px;  overflow:auto; margin-bottom: 0px; margin-top: 10px;">

				<div class="table-responsive" style="width: 66%; margin:auto;">
				<table class="table table-bordered table-striped" >
					<thead>
			            <tr >
			              <th style="text-align: center; font-size:20px;">Orden</th>
			              <th style="text-align: center; font-size:20px;">Duración</th>
			            </tr>    
			        </thead>
			        <tbody id="filaOrden">
				        @foreach($tipoSancion->penaltyOrders as $orden)
			                <tr id="fila{{$orden->order}}">
			                  <td style="text-align: center; font: bold 120% monospace;">{{$orden->order}}</td>
			                  <td style="text-align: center;font: bold 120% arial;"><input id='duracion{{$orden->order}}' name="duracion{{$orden->order}}" value='{{$orden->penaltyTime}}' style="width: 55px; border-radius: 5px; text-align: center;"></td>
			                </tr>
		                @endforeach
	         		</tbody>
				</table>
				</div>
			</div>		
		</div>
		<div style=" margin-top: 0px; height: 50px;  margin-top: 0px; background-color: #17C43B;display: table; width: 100%; text-align: center;">
			<div style="display: table-cell;vertical-align: middle;">
				<a class="btn btn-primary"  onClick="anadir();" style="font-size:18px;">Añadir uno</a>
				<a class="btn btn-primary" onClick="quitar();" style="margin-left:12%;margin-right: 10%; font-size:18px;">Quitar uno</a>
				<button type="submit" class="btn btn-primary" style="font-size:18px;"  name="guardarCambio" onClick="accion();">
							Guardar cambios
				</button>
			</div>
		</div>
	
</div>
