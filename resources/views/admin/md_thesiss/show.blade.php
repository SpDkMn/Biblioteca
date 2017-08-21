<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title"><strong>Informacion de Tesis y Tesinas</strong></h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div><br>

  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive table-hover">
                <thead>
                 <tr class="text-center box-success" style="background:#E7FAE2;">
                  <th class="text-center">CLASIFICACIÓN</th>
                  <th class="text-center">TÍTULO</th>
                  <th class="text-center">AUTOR <h6>(Principal: Casilla Roja)</h6></th>
                  <th class="text-center">ASESOR</th>
                  <th class="text-center">UBICACIÓN</th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                 </tr>
                </thead>
                
                <tbody>
                @foreach($thesiss as $thesis)
                <tr>

                  <td class="text-center">
                    {{$thesis->clasification }}
                  </td>

                  <td>
                    <a href="{{url('admin/thesis/content')}}/{{$thesis->id}}">{{$thesis->title}}</a>
                  </td>

                  <td>
                      @foreach($thesis->authors as $author)
                        @if($author->pivot->type ==0)
                          <span class="label label-info">{{$author->name}}</span>
                        @endif
                        @if($author->pivot->type ==1)
                            <span class="label label-danger">{{$author->name}}</span>
                        @endif
                      @endforeach
                  </td>

                  <td>
                        {{$thesis->asesor}}
                  </td>


                  <td class="text-center">
                     {{$thesis->location}}
                  </td>

       <!--SECCION PARA EDITAR UNA TESIS-->
            <td class="text-center"><button type="button" data-id="{{$thesis->id}}" class="btn btn-success editar"><i class="fa fa-edit"></i></button></td>
        <!--FIN DE LA SECCION PARA EDITAR UNA TESIS-->

      <!--ELIMINACION DE UNA TESIS MEDIANTE MODAL-->

          <td><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalCopy<?php echo $thesis->id; ?>"><i class="fa fa-trash"></i></button></center></td>


          <div class="modal modal-danger fade" id="ModalCopy<?php echo $thesis->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">

             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <form>

                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>MATERIAL :</strong> {{ $thesis->title}}</h3>
                   </div>


                   <div class="modal-body">
                       <p class="text-center"><strong>¿ Desea eliminar dicha {{$thesis->type}} ?</strong></p>
                   </div>

                   <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                        <a href="{{route('thesis.destroy',$thesis->id)}}" type="button" class="btn btn-outline">Eliminar</a>
                   </div>
                 </form>
               </div>
            </div>
          </div>
      <!--FIN DE LA ELIMINACION DE UNA TESIS MEDIANTE MODAL-->


          </tr>
        @endforeach
      </tbody>
      <thead>
                 <tr class="text-center box-success" style="background:#E7FAE2;">
                  <th class="text-center">CLASIFICACIÓN</th>
                  <th class="text-center">TÍTULO</th>
                  <th class="text-center">AUTOR </th>
                  <th class="text-center">ASESOR</th>
                  <th class="text-center">UBICACIÓN</th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                 </tr>
                </thead>
    </table>
  </div>
</div>


<!--SCRIPT PARA EDITAR UNA TESIS-->
@section('script')
   <script type="text/javascript">
        $(".editar").on('click',function(event) {
          $id = $(this).data('id');
          $("#divEdit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>');
          $("#divEdit").load('{{ url("/admin/thesis/") }}/' + $id + '/edit');
        });
    </script>
@endsection
