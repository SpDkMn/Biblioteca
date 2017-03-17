$(document).ready(function(){
	var idCont = 1 ;
	var container = $('#contentPanel');
	var buttonClose = '<span class="btn " id="eliminarContenido'+idCont+'"><i class="fa fa-times"></i></span>';
	var groupTitle = '<div class="form-group"><label for="inputTitleContent">Título</label><input type="text" class="form-control" name="titleContent" id="inputTitleContent" placeholder=""></div>'
	var groupCollaborator = '<div class="form-group"><label>Colaborador</label><select class="form-control select2" multiple="multiple" name ="collaborator[]" data-placeholder="Seleccione los colaboradores" style="width: 100%;">@foreach($autores as $autor)	@foreach($autor->categories as $category)	@if($category->name == "colaborador"){<option value="{!! $autor->id !!}">{{ $autor->name}}</option>} @endif @endforeach @endforeach </select></div>'
	var bodyContent = '<div class="panel-body">'+groupTitle+groupCollaborator+'</div>';

	// Cuando haga click en agregarContenido
	$('#agregarContenido').click(function(){
		var boxContent = '<div class="box box-primary" id="boxID'+idCont+'">'+bodyContent +'</div>';
		$(container).append(boxContent);
		idCont = idCont +1 ;
	});

	// Buscar como eliminar el box
	// $('#eliminarContenido').click(function() { // Elimina un elemento por click
	//
	// });

	// $(document).on("click", ".open-AddBookDialog", function () {
	//      var myBookId = $(this).data('id');
	//      $(".modal-body #bookId").val( myBookId );
	// });

});
// 	// more detail for row
// 	  var table = $('#magazineTable').DataTable( {
//         "ajax": "../ajax/data/objects.txt",
//         "columns": [
//             {
//                 "className":      'details-control',
//                 "orderable":      false,
//                 "data":           null,
//                 "defaultContent": ''
//             },
//             { "data": "Revista" },
//             { "data": "Autor" },
//             { "data": "ISSN" },
//             { "data": "Clasificacion" }
//             { "data": "Contenido" }
//         ],
//         "order": [[1, 'asc']]
//     } );

//     // Add event listener for opening and closing details
//     $('#magazineTable tbody').on('click', 'td.details-control', function () {
//         var tr = $(this).closest('tr');
//         var row = table.row( tr );

//         if ( row.child.isShown() ) {
//             // This row is already open - close it
//             row.child.hide();
//             tr.removeClass('shown');
//         }
//         else {
//             // Open this row
//             row.child( format(row.data()) ).show();
//             tr.addClass('shown');
//         }
//     } );

// });

// function format ( d ) {
//     // `d` is the original data object for the row
//     return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
//         '<tr>'+
//             '<td>Full name:</td>'+
//             '<td>'+d.barCode+'</td>'+ //Codigo de barra
//         '</tr>'+
//         '<tr>'+
//             '<td>Extension number:</td>'+
//             '<td>'+d.Clasification+'</td>'+
//         '</tr>'+
//         '<tr>'+
//             '<td>Extra info:</td>'+
//             '<td>And any further details here (images etc)...</td>'+
//         '</tr>'+
//     '</table>';
// }

// $(document).ready(function() {
//     var table = $('#example').DataTable( {
//         "ajax": "../ajax/data/objects.txt",
//         "columns": [
//             {
//                 "className":      'details-control',
//                 "orderable":      false,
//                 "data":           null,
//                 "defaultContent": ''
//             },
//             { "data": "name" },
//             { "data": "position" },
//             { "data": "office" },
//             { "data": "salary" }
//         ],
//         "order": [[1, 'asc']]
//     } );

//     // Add event listener for opening and closing details
//     $('#example tbody').on('click', 'td.details-control', function () {
//         var tr = $(this).closest('tr');
//         var row = table.row( tr );

//         if ( row.child.isShown() ) {
//             // This row is already open - close it
//             row.child.hide();
//             tr.removeClass('shown');
//         }
//         else {
//             // Open this row
//             row.child( format(row.data()) ).show();
//             tr.addClass('shown');
//         }
//     } );
// } );
