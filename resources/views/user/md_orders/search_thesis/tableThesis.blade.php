<!-- Main content -->
@if($thesis!=null)
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Thesis</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="ThesisTableOrder" class="table table-bordered table-hover">
                <thead>
                <tr style="background:#E7FAE2;">
                  <th>Tesis/Tesina</th>
                  <th>Autor</th>
                  <th>Asesor</th>
                  <th>Escuela</th>
                  <th>Disponibles</th>
                  <th>Información</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($thesis as $thesi)
                  <tr>
                    <td class="text-center"><span>{{$thesi->title}} - Edición {{$thesi->edition}}</span></td>
                    <td class="text-center">
                        <?php $cont=0; ?>
                        @foreach($thesi->authors as $author)
                          @if($author->pivot->type == true)
                          <?php $cont=$cont+1; ?>
                          @endif
                        @endforeach
                        <?php $cont2=2; ?>
                        @foreach($thesi->authors as $author)
                          @if($author->pivot->type == true)
                          {{$author->name}}
                            @if($cont2<=$cont)
                            ,
                            @endif
                          @endif
                          <?php $cont2=$cont2+1; ?>
                        @endforeach
                    </td>
                    <td class="text-center">
                      @foreach($thesi->editorials as $editorial)
                        @if($editorial->pivot->type == true) {{$editorial->name}} @endif
                      @endforeach</td>
                    <td class="text-center">
                      @foreach($thesi->ThesisCopies as $copy){{$loop->count}}@endforeach
                    </td>
                    <td class="text-center">
                      <?php $contThesisCopiesAvailability = 0 ?>
                      @foreach($thesi->ThesisCopies as $copy)
                        @if($copy->availability == true)
                          <?php $contThesisCopiesAvailability = $contThesisCopiesAvailability+1 ?>
                        @endif
                      @endforeach
                      {{$contThesisCopiesAvailability}}</td>

                    <td class="text-center"><button type="button" data-id="{{$thesi->id}}"
            						data-name="{{$thesi->name}}" class="btn_info"
            						data-toggle="modal" data-target="#ModalThesisInfo">

            						<i class="fa fa-info"></i>
            					</button></td>
                  </tr>

                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Tesis/Tesina</th>
                    <th>Autor</th>
                    <th>Asesor</th>
                    <th>Escuela</th>
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

  <div class="modal modal fade" id="ModalThesisInfo" tabindex="-1" role="dialog" aria-labelledby="ModalThesisInfoLabel">

  </div>


@endif
  <!-- /.content -->
  <script>
  $(function () {
    $('#ThesisTableOrder').DataTable({
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
          $("#ModalThesisInfo").html('<div class="modal-dialog modal-lg" ><div class="modal-content"><div class="modal-header"></div><div class="modal-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div></div>')
          $("#ModalThesisInfo").load('{{ url("/user/orderThesis/") }}/' + $id + '/edit');
      });

    });
  </script>
