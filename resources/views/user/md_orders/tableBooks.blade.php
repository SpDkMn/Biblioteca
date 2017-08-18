<!-- Main content -->
@if($books!=null)
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
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
                    <td class="text-center"><a href="#" data-id="{{$book->id}}" class="contenid">{{$book->title}} - Edición {{$book->edition}}</a></td>
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
                    <td class="text-center">@foreach($book->editorials as $editorial)
                      @if($editorial->pivot->type == true) {{$editorial->name}} @endif
                      @endforeach</td>
                    <td class="text-center">
                      <?php $cont=0 ?>
                      @foreach($book->bookCopies as $copy)
                        <?php $cont=$cont+1; ?>
                      @endforeach
                      {{$cont}}
                    </td>
                    <td class="text-center">{{$book->clasification}}</td>
                    <td>x</td>
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
