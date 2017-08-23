@extends('user2.layouts.main')
 @section('content')
<div class="container" id="main">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST"
						action="{{ route('loginUser.login') }}" value="{{ csrf_token() }}">
						{{ csrf_field() }}



						<div
							class="form-group">
							<label for="email" class="col-md-4 control-label">E-Mail</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email"
									value="{{ old('email') }}" required>
							</div>
						</div>

						<div
							class="form-group">
							<label for="password" class="col-md-4 control-label">Contraseña</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control"
									name="password" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Ingresar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
