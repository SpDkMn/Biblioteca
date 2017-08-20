
$(function(){
	$.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });

	$('#search').focus();
	//evita el envio de con enter
	$('#search_form').submit(function(e){
		e.preventDefault();
	})

	
		$('#search').keyup(function(){
			var envio_filtro = $('#orderCategory').val();
			var envio = $('#search').val();

			$('#logo').html('<h2>Buscador de Libros</h2><hr />')

			$('#resultados').html('<h2><img src="http://bibliofisi.net/img/loading.gif"  width="20" alt="" /> Cargando<h2>');

			$.ajax({
				type: "post",
				url: '/user/search2/busquedaLibro',
				data: {
						search: envio,
						 },
				success: function(resp){
					if(resp!=""){
						$('#resultados').html(resp);
					}
				}
			})

		});
		
})