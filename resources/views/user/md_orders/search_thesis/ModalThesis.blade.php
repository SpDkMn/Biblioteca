<div class="modal-dialog modal-lg" >
  <div class="modal-content">
      <div class="modal-header">
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
                        <th class="itemTable text-center">Clasificacion</th>
                        <th class="itemTable text-center">Estado</th>
                        <th class="itemTable text-center">Pedir</th>
                      </tr>
                      @foreach($b->thesisCopies as $copy)
                      <tr @if($copy->
                        availability) class="success" @else class="danger" @endif>
                        <td class="text-center">{{$copy->incomeNumber}}</td>
                        <td class="text-center">{{$copy->barcode}}</td>
                        <td class="text-center">{{$copy->copy}} @if($copy->availability) <span
                          class="sr-only">Disponible</span> @else <span class="sr-only">No
                            disponible</span> @endif
                        </td>
                        <td class="text-center"><?php if($copy->volume != "") echo ( $copy->volume); else echo "_";  ?></td>
                        <td class="text-center">----</td>
                        <td class="text-center"> @if($copy->availability) <span
                          class="label label-info">Disponible</span>@else<span class="label label-danger">No Disponible</span>@endif</td>
                        <td class="text-center"><button type="button"  name="button"><i class="fa fa-book"></i></button></td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <<div class="col-md-6">

              <div class="box box-info box-solid" style="background: rgba(21, 188, 137, 0.05);">
                 <div class="box-body"><br>
                    <!--    A u t o re s -->
                      <strong>AUTOR PRINCIPAL</strong>
                          <?php for($i=0;$i<20;$i++){echo "&nbsp";}?>:&nbsp
                        <?php $cont=0; ?>
                        @foreach($thesis->authors as $author)
                          @if($author->pivot->type == true)
                          <?php $cont=$cont+1; ?>
                          @endif
                        @endforeach
                        <?php $cont2=2; ?>
                        @foreach($thesis->authors as $author)
                          @if($author->pivot->type == true)
                          {{$author->name}}
                            @if($cont2<=$cont)
                            ,
                            @endif
                          @endif
                          <?php $cont2=$cont2+1; ?>
                        @endforeach

                 </div>

                 <div class="box-body">
                   <!--    A u t o re s -->
                    <strong>AUTORES SECUNDARIOS</strong>
                          <?php $cont=0; ?>
                          @foreach($thesis->authors as $author)
                            @if($author->pivot->type == false)
                               <?php $cont=$cont+1; ?>
                            @endif
                          @endforeach

                        @if($cont>0)
                          <?php $cont2=1; ?>
                          @foreach($thesis->authors as $author)
                            @if($author->pivot->type == false)
                              {{$author->name}}
                                  @if($cont2<=$cont)
                                  ,
                                  @endif
                            @endif
                            <?php $cont2=$cont2+1; ?>
                          @endforeach
                        @else - - - - - - - - -
                        @endif

                  </div>

                <div class="box-body">
                      <strong>EDITORIAL</strong>
                        @foreach($thesis->editorials as $editorial)
                            @if($editorial->pivot->type == false)
                            {{$editorial->name}}
                            @endif
                          @endforeach
                </div>

                <div class="box-body">
                      <strong>ASESOR</strong>
                        {{$thesis->asesor}}
                </div>

                <div class="box-body">
                      <strong>CLASIFICACIÓN</strong>
                      <?php   for($i=0;$i<25;$i++){echo "&nbsp";}?>:&nbsp
                      <?php if($thesis->clasification!=""){ echo($thesis->clasification); } else echo ("- - - - - - - - -");?>
                </div>

                <div class="box-body">
                      <strong>ESCUELA DE PERTEN.</strong>
                      {{$thesis->escuela}}
                </div><br><br>


                <div class="box-body">
                      <strong>CONTENIDO </strong><br>
                      {{$thesis->conten}}
                </div><br><br>
                <div class="box-body">
                      <strong>RESUMEN </strong><br>
                      {{$thesis->summary}}
                </div><br>


                <div class="box-body">
                      <strong>BIBLIOGRAFÍA </strong><br>
                        {{$thesis->bibliografia}}
                </div><br>

              </div>

          </div>
            <div class="col-md-6">

                <div class="box box-info box-solid" style="background: rgba(21, 188, 137, 0.05);"><br>

                  <div class="box-body">
                        <strong>DETALLES FÍSICOS </strong><br>
                        {{$thesis->physicalDetails}}
                  </div><br>
                  <div class="box-body">
                        <strong>MATERIAL ADICIONAL </strong><br>
                        {{$thesis->accompaniment}}
                  </div><br>

                  <div class="box-body">
                        <strong>CONCLUSIONES</strong><br>
                        {{$thesis->conclusions }}
                  </div><br>

                  <div class="box-body">
                        <strong>RECOMENDACIONES </strong><br>
                        {{$thesis->recomendacion}}
                  </div><br>

                  <div class="box-body">
                        <strong>EXTENSIÓN</strong>
                          {{$thesis->extension}} páginas
                  </div>

                  <div class="box-body">
                        <strong>DIMENSIONES</strong>
                        {{$thesis->dimensions}} cm
                  </div><br><br>

                  <div class="box-body" style="width:300px;">
                      <center><i class="fa fa-graduation-cap fa-5x"></i></center>
                  </div>
                   <br><br><br>
                  <br>

                </div>

            </div>
          </div>
        </section>
      </div>
  </div>
</div>
