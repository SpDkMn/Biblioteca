@if (count($errors) > 0)
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li> @endforeach
  </ul>
</div>
@endif


<div class="box box-primary">
<<<<<<< HEAD
	<div class="box-header with-border">
		<i class="fa fa-info"></i>
		<h3 class="box-title">Información de revistas</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<table id="magazineTable" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Revista</th>
					<!-- <th>Subtitulo</th> -->
					<th>clasificación</th>
					<th>Entidad académica</th>
					<th>ISSN</th>
					<th>Ejemplar</th>
					<th>Editorial</th>
					<th>Contenido</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>

				@foreach($revistas as $revista)
				<tr>
					<!-- <td class="details-control"></td> -->
					<td>{{$revista->title}}</td>
					<td><span>Vol.{{$revista->volumen}}</span> <span>Nº
							{{$revista->numero}}</span> <span>{{$revista->fechaEdicion}}</span>
					</td>
					<td>{{$revista->author->name}}</td>

					<td><span class="label label-danger">{{$revista->issn}}</span>
						@if($revista->issnD!=0) <span class="label label-info">{{$revista->issnD}}</span>
						@endif</td>
					<td>

						<button type="button" data-id="{{$revista->id}}"
							class="btn btn-success showItem">
							<i class="fa fa-book"></i>
						</button>
					</td>
					<td>@foreach($revista->editorials as $editorial)
						@if($editorial->pivot->type == true) <span
						class="label label-danger">{{$editorial->name}}</span> @else <span
						class="label label-info">{{$editorial->name}}</span> @endif
						@endforeach
					</td>
					<td>
				<button type="button" data-id="{{$revista->id}}"
							class="btn btn-success showContent">
							<i class="fa fa-bookmark"></i>
						</button>
					</td>
					<td>
						<button type="button" data-id="{{$revista->id}}"
							class="btn btn-success editar">
							<i class="fa fa-edit"></i>
						</button>
					</td>
					<td><a type="button" class="button-content btn btn-danger"
						href="{{route('magazines.destroy',$revista->id)}}"><i
							class="fa fa-trash"></i></a> <!--  Borrar comentario cuando el metodo para eliminar sea DELETE y se use ajax -->
						<!-- <button type="button" data-id="{{$revista->id}}"  data-name="{{$revista->title}}" class="deleteButton btn btn-danger"  data-toggle="modal" data-target="#modalDelete"><i class="fa fa-trash"></i></button></td> -->
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Revista</th>
					<th>clasificación</th>
					<!-- <th>Subtitulo</th> -->
					<th>Entidad académica</th>
					<th>ISSN</th>
					<th>Ejemplar</th>
					<th>Editorial</th>
					<th>Contenido</th>
					<th></th>
					<th></th>
				</tr>
			</tfoot>
		</table>
	</div>
=======
  <div class="box-header with-border">
    <i class="fa fa-info"></i>
    <h3 class="box-title">Información de revistas</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="magazineTable" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Revista</th>
          <!-- <th>Subtitulo</th> -->
          <th>clasificación</th>
          <th>Entidad académica</th>
          <th>ISSN</th>
          <th>Ejemplar</th>
          <th>Editorial</th>
          <th>Contenido</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($revistas as $revista)
        <tr>
          <!-- <td class="details-control"></td> -->
          <td>{{$revista->title}}</td>
          <td><span>Vol.{{$revista->volumen}}</span> <span>Nº
              {{$revista->numero}}</span> <span>{{$revista->fechaEdicion}}</span>
          </td>
          <!-- <td>{{$revista->subtitle}}</td> -->
          <td>{{$revista->author->name}}</td>
          <td><span class="label label-danger">{{$revista->issn}}</span>
            @if($revista->issnD!=0) <span class="label label-info">{{$revista->issnD}}</span>
            @endif</td>
          <td>
            <!-- Arreglar diseño luego --> <!--
                  Para insertar una lista de botones con los ejemplares
                    <div class="btn-group">
                      <button aria-haspopup="true" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                      </button>
                    <ul class="dropdown-menu">
                      @foreach($revista->magazines_copies as $copy)
                        @if($copy->magazine_id == $revista->id)
                        <li>
                          <button type="button" data-id="{{$copy->id}}" class="btn copias">{{$copy->copy}}</button>
                        </li>
                        @endif
                      @endforeach
                    </ul>
                  </div> --> <!-- Para mostrar los items usando el modal -->

            <button type="button" data-id="{{$revista->id}}"
              class="btn btn-success showItem">
              <i class="fa fa-book"></i>
            </button>
          </td>
          <td>@foreach($revista->editorials as $editorial)
            @if($editorial->pivot->type == true) <span
            class="label label-danger">{{$editorial->name}}</span> @else <span
            class="label label-info">{{$editorial->name}}</span> @endif
            @endforeach
          </td>
          <td>
            <!-- <a class="button-content"  href="{{route('magazines.show',$revista->id)}}" >click aqui</a>
                      href="{{route('magazines.edit',$revista->id)}}-->
            <!-- href="{{route('magazines.show',$revista->id)}}" --> <!-- data-toggle="modal" data-target="#modalContent" no seran agregados  , puesto que con esto inicializa el modal pero cuando su valor es null
                      luego tiene el id cargado y al presionar cualquiera , muestra el contenido anterior-->
            <button type="button" data-id="{{$revista->id}}"
              class="btn btn-success showContent">
              <i class="fa fa-bookmark"></i>
            </button>
          </td>
          <td>
            <button type="button" data-id="{{$revista->id}}"
              class="btn btn-success editar">
              <i class="fa fa-edit"></i>
            </button>
          </td>
       


          <!--ELIMINACION DE UNA TESIS MEDIANTE MODAL-->

          <td><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalCopy<?php echo $revista->id; ?>"><i class="fa fa-trash"></i></button></center></td>


          <div class="modal modal-danger fade" id="ModalCopy<?php echo $revista->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
        
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <form>
                   
                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>MATERIAL :</strong> {{ $revista->title}}</h3>
                   </div>


                   <div class="modal-body">
                       <p class="text-center"><strong>¿ Desea eliminar dicha revista ?</strong></p>
                   </div>

                   <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                        <a href="{{route('magazines.destroy',$revista->id)}}" type="button" class="btn btn-outline">Eliminar</a>
                   </div>
                 </form>
               </div>
            </div>
          </div>
      <!--FIN DE LA ELIMINACION DE UNA TESIS MEDIANTE MODAL-->





        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>Revista</th>
          <th>clasificación</th>
          <!-- <th>Subtitulo</th> -->
          <th>Entidad académica</th>
          <th>ISSN</th>
          <th>Ejemplar</th>
          <th>Editorial</th>
          <th>Contenido</th>
          <th></th>
          <th></th>
        </tr>
      </tfoot>
    </table>
  </div>
>>>>>>> 77090564ee393913c7b85990d68d0896910300e7
</div>


<!-- Button trigger modal -->
@section('script')
<script type="text/javascript">
      $(document).ready(function() {
        //Mostrar contenido de una revista
        $('.showContent').on('click',function(event){
          $id = $(this).data('id');
          $(".showContent").attr("disabled","disabled")
                $('#modalContent').modal();
          $("#modalContentBody").html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
          $('#divContent').load('{{ url("/admin/magazines/") }}/' + $id + '/content');
          $.ajax({
             beforeSend: function(){
                 $("#modalContentBody").html('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
             },
             success: function(){
               $('#modalContent').modal();
               $(".showContent").removeAttr("disabled","disabled");
             }
           });
				 });
        //Mostrar items de una revista
        $('.showItem').on('click',function(event){
          $id = $(this).data('id');
          $(".showItem").attr("disabled","disabled")
          $('#divItem').load('{{ url("/admin/magazines/") }}/' + $id + '/itemDetail');
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
        //Editar una revista sin dirigirse a otra url
        $(".editar").on('click',function(event) {
          $id = $(this).data('id');
          //Mostrando recarga
          $("#divEdit").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>');
          //Cargando datos de la url para editar
          $("#divEdit").load('{{ url("/admin/magazines/") }}/' + $id + '/edit');
        });

      });
    </script>
@endsection @section('scriptTable')
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
                "sSortAscending" : ": Activar para ordenar la columna de manera ascendente",
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