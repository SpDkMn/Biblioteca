<!-- Main content -->
@if($books!=null)
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Libros</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="BooksTableOrder" class="table table-bordered table-hover">
                <thead>
                <tr style="background:#E7FAE2;">
                  <th>Libro</th>
                  <th>Autor</th>
                  <th>Editorial</th>
                  <th>Ejemplares</th>
                  <th>Disponibles</th>
                  <th>Información</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($books as $book)
                  <tr>
                    <td class="text-center"><span>{{$book->title}} - Edición {{$book->edition}}</span></td>
                    <td class="text-center">
                        <?php $cont=0; ?>
                        @foreach($book->authors as $author)
                          @if($author->pivot->type == true)
                          <?php $cont=$cont+1; ?>
                          @endif
                        @endforeach
                        <?php $cont2=2; ?>
                        @foreach($book->authors as $author)
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
                      @foreach($book->editorials as $editorial)
                        @if($editorial->pivot->type == true) {{$editorial->name}} @endif
                      @endforeach</td>
                    <td class="text-center">
                      @foreach($book->bookCopies as $copy){{$loop->count}}@endforeach
                    </td>
                    <td class="text-center">
                      <?php $contBookCopiesAvailability = 0 ?>
                      @foreach($book->bookCopies as $copy)
                        @if($copy->availability == true)
                          <?php $contBookCopiesAvailability = $contBookCopiesAvailability+1 ?>
                        @endif
                      @endforeach
                      {{$contBookCopiesAvailability}}</td>

                    <td class="text-center"><button type="button" data-id="{{$book->id}}"
            						data-name="{{$book->name}}" class="btn_info"
            						data-toggle="modal" data-target="#ModalBookInfo">

            						<i class="fa fa-info"></i>
            					</button></td>
                  </tr>

                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Libro</th>
                    <th>Autor</th>
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

  <div class="modal modal fade" id="ModalBookInfo" tabindex="-1" role="dialog" aria-labelledby="ModalBookInfoLabel">
  </div>


@endif
  <!-- /.content -->
  <script>
  $(function () {
    $('#BooksTableOrder').DataTable({
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
          $("#ModalBookInfo").html('<div class="modal-dialog modal-lg" ><div class="modal-content"><div class="modal-header"></div><div class="modal-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div></div>')
          $("#ModalBookInfo").load('{{ url("/user/search2/") }}/' + $id + '/edit');
      });

    });
  </script>
