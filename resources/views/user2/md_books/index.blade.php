@extends('user2.layouts.main')
 @section('content')
 <style type="text/css">
 #container-book{
	width: 960px;
	min-height: 700px;
	padding: 20px;
	background-color: #FFF;
	border: solid 1px #CCC;
	margin: 20px 0px;
	border-radius: 5px; 
	-moz-border-radius: 5px; 
	-webkit-border-radius: 5px; 
}
.input-busqueda{
	width: 80%;
	padding: 6px;
}
.centrado{
	text-align: center;
}
 </style>
 

<div class="container" id="container-book">

		<div class="centrado" id="logo">
			<br><br><br><br><br>
			<img src="http://biblioteca.app/img/logo.png"  width="400" alt="Bibliofisi.com" title="Bibliofisi.com">
			<br><br><br>
		</div>
		<div class="form centrado">
			<form action="" method="post" name="search_form" id="search_form">
				<meta name="_token" content="{!! csrf_token() !!}"/>
				<input type="text" name="search" id="search" class="input-busqueda">
			</form>
		</div>
		<br>
		<div id="resultados">

    	</div>
	</div>
@endsection
