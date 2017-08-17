<form class="form-horizontal" method="POST"
	action="{{ url('/admin/profiles') }}">
	{{ csrf_field() }}
	<div class="input-group margin">
		<input type="text" class="form-control" name="name"> <span
			class="input-group-btn">
			<button type="submit" class="btn btn-primary btn-flat">Crear</button>
		</span>
	</div>
</form>
