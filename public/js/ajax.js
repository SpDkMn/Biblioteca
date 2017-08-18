$(function(){
	$('#search').focus();
	//evita el envio de con enter
	$('#search_form').submit(function(e){
		e.preventDefault();
	})

	$('#search').keyup(function(){
		var envio = $('#search').val();

		$('#resultados').html('<h3><img src="img/loading.gif" width="25" alt=""/> Cargando</h3>');

		$.ajax({
			type: 'GET',
			url: '/user/order/create',
			data: ('search='+envio),
			success: function(resp){
				if(resp!=""){
					$('#resultados').html(resp);
				}
			}
		})
	})
})
