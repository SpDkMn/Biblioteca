@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="box box-primary">
    <div class="box-header with-border">
        <i class="fa fa-info"></i>
        <h3 class="box-title">Información de compendios</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
        <!-- /.box-header -->
    <div class="box-body">
        <table id="magazineTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Compendio</th>
                    <th>Introducción</th>
                    <!-- <th>Subtitulo</th> -->
                    <th>clasificación</th>
                    <th>Entidad académica</th>
                    <th>Ejemplar</th>
                    <th>Editorial</th>
                    <th>Contenido</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
              @foreach($compendios as $compendio)
                <tr>
                  <!-- <td class="details-control"></td> -->
                  <td>{{$compendio->title}}</td>
                  <td>
                    <button type="button" data-id="{{$compendio->id}}"  class="btn btn-info showIntroduccion" data-toggle="modal" data-target="#modalIntroduccion"><i class="fa fa-book"></i></button>
                  </td>
                  <td>
                    <span>Nº{{$compendio->numero}}</span>
                    <span>{{$compendio->fechaEdicion}}</span>
                  </td>
                  <td>{{$compendio->author->name}}</td>

                  <td>
                  <button type="button" data-id="{{$compendio->id}}" class="btn btn-success showItem"><i class="fa fa-book"></i></button>
                  </td>
                  <td>
                    @foreach($editoriales as $editorial)
                      @if($editorial->id == $compendio->editorial_id)
                        <span>{{$editorial->name}}</span>
                      @endif
                    @endforeach
                  </td>

                      <td>
                        <!-- <a class="button-content"  href="{{route('magazines.show',$compendio->id)}}" >click aqui</a>
                      href="{{route('magazines.edit',$compendio->id)}}-->
                        <!-- href="{{route('magazines.show',$compendio->id)}}" -->
                        <!-- data-toggle="modal" data-target="#modalContent" no seran agregados  , puesto que con esto inicializa el modal pero cuando su valor es null
                      luego tiene el id cargado y al presionar cualquiera , muestra el contenido anterior-->
                        <button type="button" data-id="{{$compendio->id}}" class="btn btn-success showContent"><i class="fa fa-bookmark"></i></button>
                      </td>
                      <td>
                        <button type="button" data-id="{{$compendio->id}}" class="btn btn-success editar"><i class="fa fa-edit"></i></button>
                      </td>
                      <td>
                        <a type="button" class="button-content btn btn-danger"  href="{{route('compendium.destroy',$compendio->id)}}"><i class="fa fa-trash"></i></a>
                        <!--  Borrar comentario cuando el metodo para eliminar sea DELETE y se use ajax -->
                        <!-- <button type="button" data-id="{{$compendio->id}}"  data-name="{{$compendio->title}}" class="deleteButton btn btn-danger"  data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i></button></td> -->
                      </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>compendio</th>
                <th>Introduccion</th>
                <!-- <th>Subtitulo</th> -->
                <th>Entidad académica</th>
                <th>Ejemplar</th>
                <th>Editorial</th>
                <th>Contenido</th>
                <th></th>
                <th></th>
              </tr>
            </tfoot>
        </table>
    </div>
</div>


<!-- Button trigger modal -->
@section('script')
    <script type="text/javascript">
      $(document).ready(function() {
        //Mostrar contenido de una compendio
        $('.showContent').on('click',function(event){
          $id = $(this).data('id');
          $(".showContent").attr("disabled","disabled")
          $('#divContent').load('{{ url("/admin/compendium/") }}/' + $id + '/content');
          $.ajax({
             beforeSend: function(){
                 $("#modalContentBody").html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
             },
             success: function(){
               $('#modalContent').modal();
               //Habilita los botones de mostrar contenido
               $(".showContent").removeAttr("disabled","disabled");
             }
           });
          })
          //prueba mostrar modal
          $(".showIntroduccion").on('click', function(event) {
            $id = $(this).data('id')
            $("#modalIntroduccionBody").html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>')
            $("#modalIntroduccionBody").load('{{ url("/admin/compendium") }}/' + $id+ '/introduccion');
          })

          // //Mostrar introduccion de una compendio
          // $('.showIntroduccion').on('click',function(event){
          //   $id = $(this).data('id');
          //   $(".showIntroduccion").attr("disabled","disabled")
          //   $('#divIntroduccion').load('{{ url("/admin/compendium/") }}/' + $id + '/introduccion');
          //   $.ajax({
          //      beforeSend: function(){
          //          $("#modalIntroduccionBody").html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
          //      },
          //      success: function(){
          //        $('#modalIntroduccion').modal();
          //        //Habilita los botones de mostrar contenido
          //        $(".showIntroduccion").removeAttr("disabled","disabled");
          //
          //      }
          //    });
          //   })

        //Mostrar items de una compendio
        $('.showItem').on('click',function(event){
          $id = $(this).data('id');
          $(".showItem").attr("disabled","disabled")
          //Cargando el modal mientras se espera la aparicion del contenido de la compendio
          $('#divItem').load('{{ url("/admin/compendium/") }}/' + $id + '/itemDetail');
          //Intentando deshabilitar el boton mostar contenido luego de que se ha hecho click
          $.ajax({
            //Antes de enviar la peticion al servidor
             beforeSend: function(){
               //Esta es una prueba para mostrar un refresh antes de que aparesca el contenido
               //Nota : Falta arreglar / No muestra sin antes poner el modal() , pero luego al aparecer el contenido vuelve a cargarlo
               // , no es continuo
                 $("#modalItemBody").html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
             },
             //Cuando termina de cargar la peticion exitosamente , sin errores
             complete: function(){
               //Muestra el modal
               $('#modalItem').modal();
               //Habilita los botones de mostrar contenido
               $(".showItem").removeAttr("disabled","disabled");

             }
           });
          })
        //Editar una compendio sin dirigirse a otra url
        $(".editar").on('click',function(event) {
          $id = $(this).data('id');
          //Mostrando recarga
          $("#divEdit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>');
          //Cargando datos de la url para editar
          $("#divEdit").load('{{ url("/admin/compendium/") }}/' + $id + '/edit');
        });
        //Eliminar -> Prueba{
          //Esta funcion es para mostrar el modal luego de que se termina de completar la peticion al servidor ,
          // ponemos una bandera para evitar que aparesca el modal con cualquier otra peticion
          // function cargaCompleta(band){
          // Nota : Este es un manejador de evento ajax global , sera cambiado por un manejador local
          //  $(document).ajaxSuccess(function(){
          //     //Personalizar para cualquier otras peticiones agregando un switch
          //       if (band == true) {
          //         $('#modalContent').modal();
          //         band = false ;
          //       }
          //     });
          // }

          // Borrar comentario cuando el metodo para eliminar sea DELETE y se use ajax
          // $(".deleteButton").on('click',function(event) {
          //   $name = $(this).data('name');
          //   $id = $(this).data('id');
          //   $('.modal-body').html('<p>¿Esta seguro que quiere eliminar la compendio ' + $name +'?</p>');
          //   //Agregando la el id de la compendio
          //   $('#confirmarDelete').data('id',$id);

          // Borrar comentario cuando el metodo para eliminar sea DELETE y se use ajax
          // $("#confirmarDelete").on('click',function(event){
          //   $id = $('#confirmarDelete').data('id');
          //   $.ajax({
          //     url: '{{ url("/admin/magazines/")}}'+$id,
          //     type: 'POST',
          //     data: {'_token': '{{csrf_token()}}'},
          //     success: function(result) {
          //       location.reload();
          //     }
          //   })
          //   })
          // });
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
        },
    });
  });
  </script>
@endsection
