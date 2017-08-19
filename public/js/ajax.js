
$(function(){
	$.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });

	$('#search').focus();
	//evita el envio de con enter
	$('#search_form').submit(function(e){
		e.preventDefault();
	})




	//Cada vez que se selecciona un filtro , lo enviará al controlador

	//1.- Cambio el filtro
	//2.- Hace una busqueda


		$('#orderCategory').change(function(){
			$('#search').keyup(function(){
			var envio_filtro = $('#orderCategory').val();
			var envio = $('#search').val();
			$('#resultados').html('<section class="content"><div class="row"><div class="col-xs-12"><div class="box box-success"><div class="box-header"><h3 class="box-title">Libros</h3></div><div class="box-body"><table id="BooksTableOrder" class="table table-bordered table-hover"><thead><tr style="background:#E7FAE2;"><th>Libro</th><th>Autor</th><th>Editorial</th><th>Ejemplares</th><th>Disponibles</th><th>Información</th></tr></thead><tbody><div class="overlay"><i class="fa fa-refresh fa-spin"</i></div></tbody><tfoot><tr><th>Libro</th><th>Autor</th><th>Editorial</th><th>Ejemplares</th><th>Disponibles</th><th>Información</th></tr></tfoot></table></div></div></div></div></section>');

			$.ajax({
				type: "post",
				url: '/user/search',
				data: {
								search: envio,
								searchType: envio_filtro
						 },
				success: function(resp){
					if(resp!=""){
						$('#resultados').html(resp);
					}
				}
			})

				});
			})



})
