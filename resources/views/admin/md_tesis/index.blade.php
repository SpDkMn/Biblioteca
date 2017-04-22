<!DOCTYPE html>
<html>
<head>
	<title>Tabla Dinamica</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<br><br>
		<h2 align="center">Tabla Dinamica</h2>
		<div class="form-group">
			<form id="add_name" name="add_name">
				<table class="table table-bordered" id="dynamic_field">
					<tr>
						<td><input type="text" name="name[]" id="name" class="form-control name_list" placeholder="Enter Name"></td>
						<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
					</tr>
				</table>
				<input type="button" name="submit" id="submit" value="Submit">

			</form>
		</div>

	</div>
</body>
</html>
<script>
	$(document).ready(function(){
		var i = 1;
		$('#add').click(function(){
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" id="name" class="form-control name_list" placeholder="Enter Name"></td><td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  });
		});
		$(document).on('click', '.btn_remove', function(){
			var button_id = $(this).attr("id");
			$("#row"+button_id+"").remove();
		});

		$('#submit').click(function(){
			$.ajax({
				url:"name.php",
				method:"POST",
				data:$('#add_name').serialize(),
				success:function(data)
				{
					alert(data);
					$('#add_name')[0].reset();
				}

			})
		});
	});
</script>
