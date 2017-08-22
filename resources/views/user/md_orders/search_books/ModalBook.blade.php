<div class="modal-dialog modal-lg" >
  <div class="modal-content">
      <div class="modal-header">
              <h3 class="box-title text-center">{{$b->title}}</h3>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box box-default">
                <div class="box-header with-border">
                  <i class="fa fa-book"></i>
                  <h3 class="box-title text-center">{{$b->title}}</h3>
                </div>
                <div class="box-body  no-padding">
                  <table class="table table-hover table-striped table-bordered">
                      <tr>
                        <th class="itemTable text-center">Numero de ingreso</th>
                        <th class="itemTable text-center">Codigo de barras</th>
                        <th class="itemTable text-center">Ejemplar</th>
                        <th class="itemTable text-center">Volumen</th>
                        <th class="itemTable text-center">Estado</th>
                        <th class="itemTable text-center">Pedir sala</th>
                        <th class="itemTable text-center">Pedir domicilio</th>
                      </tr>
                      @foreach($b->bookCopies as $copy)
                      <tr @if($copy->
                        availability) class="success" @else class="danger" @endif>
                        <td class="text-center">{{$copy->incomeNumber}}</td>
                        <td class="text-center">{{$copy->barcode}}</td>
                        <td class="text-center">{{$copy->copy}} @if($copy->availability==1) <span
                          class="sr-only">Disponible</span> @else <span class="sr-only">No
                            disponible</span> @endif
                        </td>
                        <td class="text-center"><?php if($copy->volume != "") echo ( $copy->volume); else echo "_";  ?></td>
                        <td class="text-center"> @if($copy->availability==1) <span class="label label-info">Disponible</span>
                          @elseif($copy->availability==2) <span class="label label-success">Prestado</span>
                          @else<span class="label label-danger">No Disponible</span>@endif</td>

                        <td class="text-center"><button <?php if ($copy->availability!=1):?>disabled<?php endif;?> data-id="{{$b->id}}" type="button" id="realizarPedidoSala" name="button"><i class="fa fa-book"></i></button></td>
                        <td  class="text-center"><button <?php if ($copy->copy==1 || $copy->availability!=1):?>disabled<?php endif;?> data-id="{{$b->id}}" type="button" id="realizarPedidoTesis" name="button"><i class="fa fa-book"></i></button></td>
                        <!-- SUBMODAL DEL PEDIDO -->
                        <!--Esto será activado si no se va a poner los tipso de pedido en la tabla
                        <div id="ModalPedido" class="modal fade" role="dialog">
                            	<div class="modal-dialog">
                            		<div class="modal-content">
                            			<div class="modal-header">
                            				<h4 class="modal-tittle text-center">Realizar pedido</h4>
                                 </div>
                            			<form class="form-horizontal" role="form" id="form-agregar">
                            				<div class="modal-body">
                            					<div class="form-group col-md-12">
                            						<label for="realizarPedido" class="control-label col-sm-4">Nombre: </label>
                            						<div class="col-sm-8">
                            							<input type="text" class="form-control" id="realizarPedido" name="realizarPedido">
                            						</div>
                            					</div>
                            				</div>
                            				<div class="modal-footer">
                            					<button type="button" id="GuardarNombre" name="GuardarNombre" class="btn btn-primary text-center">
                            						<span class="fa fa-"></span><span class="hidden-xs">Pedir Sala</span>
                            					</button>
                                      <button type="button" id="GuardarNombre" name="GuardarNombre" class="btn btn-primary text-center">
                            						<span class="fa fa-"></span><span class="hidden-xs">Pedir Domicilio</span>
                            					</button>
                            				</div>
                            			</form>
                            		</div>
                            	</div> -->
                              <!-- FIN DEL SUBMODAL DE PEDIDO -->
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="box box-default">
                <!-- ACOMODAR -->
                <div class="subtitle">Resumen</div>
                <div class="box-body">{{$b->summary}}</div>
                <div class="subtitle">Contenido</div>
                <ol>
                  @foreach($b->chapters as $chapter)
                  <li>{{$chapter->name}}</li> @endforeach
                </ol>
                <!-- ACOMODAR -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="box box-default">
                <!-- ACOMODAR -->
                <ul>
                  <li>Extension:{{$b->extension}}</li>
                  <li>Otros detalles fisicos:{{$b->physicalDetails}}</li>
                  <li>Dimensiones:{{$b->dimensions}}</li>
                  <li>Material de Acompañamiento: {{$b->accompaniment}}</li>
                </ul>
                <!-- ACOMODAR -->

              </div>
            </div>
          </div>
        </section>
      </div>
  </div>
</div>

<!--
Esto será activado si no se va a poner los tipso de pedido en la tabla
<script type="text/javascript">
$(document).on('click', '#realizarPedido', function() {
     $('#ModalPedido').modal('show');
 });
</script> -->
