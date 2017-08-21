<div class="modal-dialog modal-lg" >
  <div class="modal-content">
      <div class="modal-header">

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
                      @foreach($b->bookCopies as $copy)
                      <tr @if($copy->
                        availability) class="success" @else class="danger" @endif>
                        <td class="text-center">{{$copy->incomeNumber}}</td>
                        <td class="text-center">{{$copy->barcode}}</td>
                        <td class="text-center">{{$copy->copy}} @if($copy->availability) <span
                          class="sr-only">Disponible</span> @else <span class="sr-only">No
                            disponible</span> @endif
                        </td>
                        <td class="text-center"><?php if($copy->volume != "") echo ( $copy->volume); else echo "_";  ?></td>
                        <td class="text-center">{{$copy->clasification}}</td>
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
        
    


