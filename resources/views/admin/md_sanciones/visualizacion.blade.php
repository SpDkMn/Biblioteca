@extends('admin.layouts.main') @section('content')



<section class="content">

	<div class="row">

		<div class="col-md-10 col-md-offset-1 " id="div-content">

			<div class="col-md-12" id="div-content" style="background-color: yellow;">


				<!-- Cabecera -->
				<div class="col-md-12" style="padding: 0px; height: 170px;">
						<div class="col-md-3" style="background-color: blue;height: 100%;">
							a
						</div>
						<div class="col-md-9" style="background-color: green;height: 100%;">
							a
						</div>
				</div>
				<!-- Cuerpo -->
				<div class="col-md-12" style="background-color: red; height: 500px;">
					<table id="tablaSancion" class="table table-bordered table-hover" >
						<thead>
							<tr>
								<th style="text-align: center;">Codigo</th>
								<th style="text-align: center;">Estado</th>
								<th style="text-align: center;">Item</th>
								<th style="text-align: center;">Duración</th>
								<th style="text-align: center;">Orden</th>
								<th style="text-align: center;">Visualizar</th>
							</tr>
						</thead>
						<tbody>
							@foreach($Usuario->penalties as $penalty)
								<tr>
									<th style="text-align: center;">{{$penalty->user->code}}</th>
									<th style="text-align: center;"><?php
										if($penalty->activity==0){
											echo("Desactivado");
										}else if($penalty->activity==1){
											echo("Activado");
										}else{
											echo("En cola");
										}
									?></th>
									<th style="text-align: center;"></th>
									<th style="text-align: center;">{{$penalty->penaltyOrder->penaltyTime}}</th>
									<th style="text-align: center;">{{$penalty->penaltyOrder->order}}</th>
									<th style="text-align: center;">
										<center>
											<button id="verSancion" type="button" class="btn btn-primary"
												data-toggle="modal"
												data-id="{{$penalty->id}}"
												data-target="#ModalCopy">
												<i class="fa fa-eye"></i>
											</button>
										</center>
									</th>
								</tr>

							@endforeach

						</tbody>

					</table>
<!-- ___________________________________________________________________________________________________________________________  -->
			<div class="modal  fade" id="ModalCopy" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel" >
				<div style="width: 38%;" class="modal-dialog" role="document" >
					<div class="modal-content" style="background-color: red; padding-left: 0px;" >


							<div class="modal-body" id="body-modal-show" style="height: auto;  margin-left: 0px; padding:0px; background-color: red;">

								<!--  ACA COMIENZA EL MODAL ________________________________________________________ -->

								<!--  ACA TERMINA EL MODAL ________________________________________________________ -->

							</div>

					</div>
				</div>
			</div>
<!-- ___________________________________________________________________________________________________________________________  -->
				</div>
				<!-- Pie -->
				<div id="pie" class="col-md-12" style="background-color: purple; padding: 0px; text-align: center; height: 60px;">
					<a id="detenerSancionActual" class="btn btn-primary"  onClick="" style="font-size:22px; margin-right: 350px;background-color: #BFA878;border-color: #8A4C0F; color: black;">Detener Castigo Actual</a>
					<a id="crearSancion" class="btn btn-primary"  style=" font-size:22px;background-color: #BFA878;border-color: #8A4C0F;color:black;" data-toggle="modal" data-id="{{$Usuario->id}}" data-target="#ModalCopy">Añadir Nuevo Castigo</a>
				</div>


			</div>

		</div>


	</div>

<script type="text/javascript">
      $(document).ready(function() {
        $('#tablaSancion').on('click','#verSancion',function(){
        	$('#body-modal-show').append(
        	'<div class="box-body" id="cuadroVerSancion" style="background-color: #17C43B; margin-left: 0px;padding: 0px; "><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>');

        	$( "#body-modal-show" ).load('{{ url("/admin/sanciones/") }}/' + $(this).data('id')+'/modalVerSancion');

      	})
      	$('#pie').on('click','#crearSancion',function(){
        	$('#body-modal-show').append(
        	'<div class="box-body" id="cuadroVerSancion" style="background-color: #17C43B; margin-left: 0px;padding: 0px; "><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>');

        	$( "#body-modal-show" ).load('{{ url("/admin/sanciones/") }}/' + $(this).data('id')+'/crearSancion');

      	})
      	$('#pie').on('click','#detenerSancionActual',function(){
      		
      		var idUsuario="{{$Usuario->id}}"
      		$.ajax({ 
		          url: '{{url("/admin/sanciones")}}/'+idUsuario+'/pararSancion',
		          type:'post',
		          data:{_token:'{{csrf_token()}}'},
		          success: function(data)
		          {
		          	
		          	if(data=="false"){
		          		alert("El usuario actualmente no presenta castigo.");
		          	}
		          }
		         
       		 });
      	})


    });

    </script>


	
</section>

@stop