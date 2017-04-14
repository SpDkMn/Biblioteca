<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Información de Tesis</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
        <!-- /.box-header -->
    <div class="box-body">
        <table id="Table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tipo de Item</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Editorial</th>
                    <th>Contenido</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach($thesiss as $thesis)
                <tr>
                  <td>{{$thesis->title}}</td>

                  <?php 
                    foreach ($thesis->authors as $author) {
                        if($author->category == 7){
                            echo "<td>".$author->name."</td>";
                          break;
                        }
                    }
                  ?>

                  <td>{{$thesis->isbn}}</td>
                  
                        <!-- Falta : Agregar lista de copias que tiene la revista y seleccionar una de ella para luego actualizar
                        los campos que no se reitan como son las copias -->
                  
                  <?php 
                    foreach ($thesis->authors as $author) {
                        if($editorial->category == 7){
                            echo "<td>".$editorial->name."</td>";
                          break;
                        }
                    }
                  ?>

                      <td>
                        <button type="button" data-id="{{$revista->id}}" class="btn btn-success button-content" data-toggle="modal" data-target="#modalContent" ><i class="fa fa-bookmark"></i></button></td>
                      </td>
                      <td>
                        <a href="{{route('magazines.edit',$revista->id)}}" class="btn btn-success click""><i class="fa fa-edit"></i></a>
                      </td>
                      <td>
                        <button type="button" data-id="{{$revista->id}}" data-name="{{$revista->title}}" class="deleteButton btn btn-danger"  data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i></button></td>
                      </td>
                </tr>
              @endforeach

              <!-- Button trigger modal -->
              <div class="modal fade" id="modalContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Contenidos</h4>
                      </div>
                      <div class="modal-body">
                        <div class="list-group">
                          @foreach($revistas as $revista)
                          <!-- si revista->id == id:data , entonces-->
                            <a href="#" class="list-group-item ">
                              @foreach($contenidos as $contenido)
                                @if($contenido->magazine_id == $revista->id)
                                  <h4 class="list-group-item-heading">
                                    {{$contenido->title}}
                                  </h4>
                                  <p class="list-group-item-text">
                                    @foreach($contenido->authors as $autor)
                                      <li>{{$autor->name}}</li>
                                    @endforeach
                                </p>
                                  @endif
                                @endforeach
                            </a>
                          <!-- fin si -->
                          @endforeach
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                      </div>
                    </div>
                  </div>
                </div>
            </tbody>
            <tfoot>
              <tr>
                    <th>Tipo de Item</th>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>ISSN</th>
                    <th>Clasificación</th>
                    <th>Contenido</th>
              </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- Falta : moverlo a delete.blade.php -->
<!-- Modal para la confirmacion de la eliminacion de una revista -->
<div class="modal fade modal-danger" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id='myModalLabel'>Eliminar Tesis</h4>
      </div>
      <div class="modal-body" id="modalDeleteBody">

      </div>
      <div class="modal-footer">
        <button type="button" id="confirmarDelete" data-id="" class="btn btn-outline">Eliminar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@section('scriptDelete')
    <script type="text/javascript">
      $(document).ready(function() {
        $(".editar").on('click',function(event) {
          $id = $(this).data('id')
          $("#div-edit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
          $("#div-edit").load('{{ url("/admin/employees/") }}/' + $id + '/edit');
        });
        $(".deleteButton").on('click',function(event) {
          $name = $(this).data('name')
          $('#modalDeleteBody').html('<p>¿Esta seguro que quiere eliminar la revista ' + $name +'?</p>');
          //Agregando la el id de la revista
          $('#confirmarDelete').data('id',$(this).data('id'))
        });
        $("#confirmarDelete").on('click',function(event){
          $id = $('#confirmarDelete').data('id')
          $.ajax({
            url: '{{ url("/admin/magazines") }}/'+$id,
            data: {'_token': '{{csrf_token()}}'},
            success: function(result) {
              location.reload();
            }
          })
        })
      });
    </script>
@endsection

@section('scriptTable')
  <script type="text/javascript">
  $(function () {
    $('#magazineTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "stateSave": false, //Guarda el estado actual de la pagina
        "language" : {
            "sProcessing" : "Procesando...",
            "sLenghtMenu" : "Mostrar _MENU_ registros",
            "sZeroRecords" : "No se encontraron resultados",
            "sEmptyTable" : "Ningún dato disponible en esta tabla",
            "sInfo" : "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty" : "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered" : "(filtrado de un total de _MAX_ registros",
            "sInfoPosFix" : "",
            "sSearch" : "Buscar: ",
            "sUrl" : "" ,
            "sInfoThousands": ",",
            "sLoadingRecords" : "Cargando...",
            "oPaginate": {
                "sFirst" : "Primero",
                "sLast" : "Último",
                "sNext" : "Siguiente" ,
                "sPrevious" : "Anterior"
            },

            "oAria" : {
                "sSortAscending" : ": Actibar para ordenar la columna de manera ascendente",
                "sSordtDescending" : ": Activar para ordenar la columna de manera descendente"
            },

            "lengthMenu" : "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron registros",
            "info" : "Página _PAGE_ de _PAGES_",
            "infoEmpty" : "No hay registros"
        }
    });


  });
  </script>
@endsection
@section('scriptModal')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.list-group-item').hover(
        function(){
          $(this).addClass('active');
        },
        function(){
          $(this).removeClass('active');
        }
      );
    })
  </script>
@endsection
<!-- Falta : Arreglar problema con mostrar modal  -->
@section('scriptModalContent')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.button-content').click(function(){
        var id = $(this).data('id');
        var modalContent = '<div class="modal fade" id="modalContent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'+
          '<div class="modal-dialog" role="document">'+
            '<div class="modal-content">'+
              '<div class="modal-header">'+
                '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                '<h4 class="modal-title" id="myModalLabel">Contenidos</h4>'+
              '</div>'+
              '<div class="modal-body">'+
                '<div class="list-group">'+
                '  @foreach($revistas as $revista)'+
                    '@if($revista->id == '+id+')'+
                    '<a href="#" class="list-group-item ">'+
                      '@foreach($contenidos as $contenido)'+
                        '@if($contenido-> magazine_id == $revista->id)'+
                          '<h4 class="list-group-item-heading">'+
                            '{{$contenido->title}}'+
                          '</h4>'+
                          '<p class="list-group-item-text">'+
                            '@foreach($contenido->authors as $autor)'+
                              '<li>{{$autor->name}}</li>'+
                          '  @endforeach'+
                        '</p>'+
                        '  @endif'+
                      '  @endforeach'+
                    '</a>'+
                    '@endif'+
                  '@endforeach'+
                '</div>'+
              '</div>';

              var modal = '<button>123</button>';
      $('.magazineTable').after(modal);
      })
    });
  </script>
@endsection