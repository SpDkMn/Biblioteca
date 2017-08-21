<!-- Main content -->
@if($magazines!=null)
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Revistas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="MagazinesTableOrder" class="table table-bordered table-hover">
                <thead>
                <tr style="background:#E7FAE2;">
                  <th>Revista</th>
                  <th>Entidad Académica</th>
                  <th>Editorial</th>
                  <th>Ejemplares</th>
                  <th>Disponibles</th>
                  <th>Información</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($magazines as $magazine)
                  <tr>
                    <td class="text-center"><span>{{$magazine->title}} - Edición {{$magazine->fechaEdicion}}</span></td>
                    <td class="text-center">{{$revista->author->name}}</td>
                    <td>@foreach($revista->editorials as $editorial)
                      @if($editorial->pivot->type == true) <span
                      class="label label-danger">{{$editorial->name}}</span> @else <span
                      class="label label-info">{{$editorial->name}}</span> @endif
                      @endforeach
                    </td>
                      @foreach($magazine->magazines_copies as $copy){{$loop->count}}@endforeach
                    </td>
                    <td class="text-center">
                      <?php $contMagazineCopiesAvailability = 0 ?>
                      @foreach($magazine->magazines_copies as $copy)
                        @if($copy->availability == true)
                          <?php $contMagazineCopiesAvailability = $contMagazineCopiesAvailability+1 ?>
                        @endif
                      @endforeach
                      {{$contMagazineCopiesAvailability}}</td>

                    <td class="text-center"><button type="button" data-id="{{$magazine->id}}"
            						data-name="{{$magazine->name}}" class="btn_info"
            						data-toggle="modal" data-target="#ModalMagazineInfo">

            						<i class="fa fa-info"></i>
            					</button></td>
                  </tr>

                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Revista</th>
                    <th>Entidad Académica</th>
                    <th>Editorial</th>
                    <th>Ejemplares</th>
                    <th>Disponibles</th>
                    <th>Información</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
      </div>
      <!-- /.col -->
      </div>
    <!-- /.row -->
  </section>

  <div class="modal modal fade" id="ModalMagazineInfo" tabindex="-1" role="dialog" aria-labelledby="ModalMagazineInfoLabel">
  </div>


@endif
  <!-- /.content -->
  <script>
  $(function () {
    $('#MagazinesTableOrder').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script type="text/javascript">
    $(document).ready(function() {
      $(document).ready(function() {
        $('#example-multiple-selected').multiselect();
      });

      $(".btn_info").on('click',function(event){
        $id = $(this).data('id')
          $("#ModalMagazineInfo").html('<div class="modal-dialog modal-lg" ><div class="modal-content"><div class="modal-header"></div><div class="modal-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div></div>')
          $("#ModalMagazineInfo").load('{{ url("/user/orderMagazine/") }}/' + $id + '/edit');
      });

    });
  </script>
