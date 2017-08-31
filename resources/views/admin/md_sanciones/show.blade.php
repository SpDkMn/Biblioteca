@extends('admin.layouts.main') @section('content')

<section class="content-header">
	<h1>
		Sanciones <small> -- </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Sanciones</li>
	</ol>
</section>

<!--Contenido Principal -->

<section class="content">

	<div class="row">

		<div class="col-md-12 " id="div-content">

			<div class="col-md-12 " id="div-content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Sanciones</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse">
								<i class="fa fa-minus"></i>
							</button>
						</div>
					</div>
					<div class="box-body" style="padding-left: 60px; margin-right: 0px;">

						<div>

							<table id="tablaSanciones" class="table table-bordered table-hover" >
								<thead>
									<tr>
										<th style="text-align: center;">Codigo</th>
										<th style="text-align: center;">Fin</th>
										<th style="text-align: center;">Item</th>
										<th style="text-align: center;">Duración</th>
										<th style="text-align: center;">Orden</th>
										<th style="text-align: center;">Visualizar</th>
									</tr>
								</thead>
								<tbody>
									@foreach($penalties as $penalty)
										<tr>
											<th style="text-align: center;">{{$penalty->user->code}}</th>
											<th style="text-align: center;">{{$penalty->endPenalty}}</th>
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

					</div>
				</div>
			</div>

		</div>


	</div>

<script type="text/javascript">
      $(document).ready(function() {
        $('#tablaSanciones').on('click','#verSancion',function(){
        	$('#body-modal-show').append(
        	'<div class="box-body" id="cuadroVerSancion" style="background-color: #17C43B; margin-left: 0px;padding: 0px; "><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>');
        $( "#body-modal-show" ).load( "http://bibliofisi.net/admin/sanciones/"+$(this).data('id')+"/modalVerSancion" );
      })
    });

    </script>


	
</section>

@stop