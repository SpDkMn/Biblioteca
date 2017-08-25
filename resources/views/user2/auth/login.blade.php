@extends('layouts.app') @section('content')
<style type="text/css">
* {
	margin: 0px;
	padding: 0px;
}

body {
	background-image: url("{{ URL::asset('img/fondo_login_1.jpeg')}}");
	background-size: 100% 100%;
}

#icono_login {
	width: 35px;
	height: 35px; //
	background-color: red;
	background-image: url("{{ URL::asset('img/icono_login_1.png')}}");
	background-size: 100% 100%;
	float: left;
	margin-top: 16px;
	margin-left: 63px;
}

.boxlogin {
	background-color: #E6E6E6;
	border-radius: 4px;
	box-shadow: 0px 2px 10px #d6d6d6;
	margin: 130px auto;
	width: 320px;
	-webki-border-radius: 4px;
	-moz-border-radius: 4px;
	padding-bottom: 13px;
}

input[type="submit"] {
	margin-top: 14px;
}

#titulo {
	margin-left: 103px;
	width: 200px; //
	background-color: blue;
	font-size: 45px;
	font-weight: bold;
}

#botones_login {
	margin-top: 15px;
	margin-left: 35px;
}

#contrasenia {
	margin-top: 14px;
}

#dni_cuadro {
	margin-top: -5px;
}

#letra_contra, #letra_dni {
	font-size: 20px;
	margin-left: 5px;
}
</style>
<div class="container boxlogin">
  <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/loginUser') }}" value="{{ csrf_token() }}">
    {{ csrf_field() }}

		<div id="icono_login"></div>
		<div id="titulo">Login</div>
		<div id="dni_cuadro">
			<label for="dni" id="letra_dni">Usuario:</label>
			<div>
				<input type="text" class="form-control" id="username"
					placeholder="Username" name="email"/>
			</div>
		</div>

		<div id="contrasenia">
			<label for="password" id="letra_contra">Password:</label>

			<div>
				<input id="password" type="password" class="form-control"
					name="password" required /> @if ($errors->has('password')) <span
					class="help-block"> <strong>{{ $errors->first('password') }}</strong>
				</span> @endif
			</div>
		</div>



		<div id="botones_login">
			<button type="submit" id="boton" class="btn btn-success" >Login</button>

			<a class="btn btn-link" >
				Forgot Your Password? </a>
		</div>

	</form>
</div>

@endsection
