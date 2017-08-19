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
                      <h3 class="box-title text-center" id="book_title"></h3>
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
                      <!--    @foreach($book->bookCopies as $copy)
                          <tr @if($copy->
                            availability) class="success" @else class="danger" @endif>
                            <td class="text-center">{{$copy->incomeNumber}}</td>
                            <td class="text-center">{{$copy->barcode}}</td>
                            <td class="text-center">{{$copy->copy}} @if($copy->availability) <span
                              class="sr-only">Disponible</span> @else <span class="sr-only">No
                                disponible</span> @endif
                            </td>
                            <td class="text-center"><?php //if($copy->volume != "") echo ( $copy->volume); else echo "_";  ?></td>
                            <td class="text-center">{{$copy->clasification}}</td>
                            <td class="text-center"> @if($copy->availability) <span
                              class="label label-info">Disponible</span>@else<span class="label label-danger">No Disponible</span>@endif</td>
                            <form id="order_form" method="get">
                              <td class="text-center"><button type="submit" class="btn_pedido"  name="button"><i class="fa fa-book"></i></button></td>
                            </form>
                          </tr>
                        @endforeach -->
                      </table>
                    </div>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="box box-default">
                    <!-- ACOMODAR -->
                    <div class="subtitle" id="book_subtitle"></div>
                    <div class="box-body" id="book_summary"></div>
                    <!--
                      <div class="subtitle">Contenido</div>
                      <ol id="book_chapters">
                        @foreach($book->chapters as $chapter)
                        <li>{{$chapter->name}}</li>
                        @endforeach
                      </ol>

                    -->

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="box box-default">
                    <!-- ACOMODAR -->
                    <ul>
                      <li id="book_extension"></li>
                      <li id="book_details"></li>
                      <li id="book_dimensions"></li>
                      <li id="book_accompaniment"></li>
                    </ul>
                    <!-- ACOMODAR -->

                  </div>
                </div>
              </div>
            </section>
          </div>
      </div>
    </div>
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

<?php
use App\Book as Book;
	$books = Book::all();
	$objJson = json_encode($books);
?>

<script type="text/javascript">
    $(document).ready(function() {
      $(document).ready(function() {
        $('#example-multiple-selected').multiselect();
      });


      $(".btn_info").on('click',function(event) {
        $id = $(this).data('id')

        var books = eval(<?php echo $objJson; ?>);
        for(i=0;i<books.length;i++){
    			if(books[i].id == $id){
            break;
    			}
    		}

        $('#book_title').html(books[i].title);
        $('#book_subtitle').html(books[i].secondaryTitle);
        $('#book_summary').html(books[i].summary);
        $('#book_extension').html("Extension:"+books[i].extension);
        $('#book_details').html("Otros detalles fisicos:"+books[i].physicalDetails)
        $('#book_dimensions').html("Extension:"+books[i].dimensions);
        $('#book_accompaniment').html("Material de Acompañamiento:"+books[i].accompaniment);
      });

    });
  </script>
