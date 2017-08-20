<!DOCTYPE>
<html>
<!-- Mirrored from www.falconmasters.com/demos/curso_webdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Aug 2017 05:43:53 GMT -->
<head> 
		<meta charset="UTF-8">
		
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/user/estilos.css') }}"/>


		<link rel="stylesheet" href="{{ URL::asset('css/modalStyles.css')}}">


		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-combined.min.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/AdminLTE.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/estiloLibro.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/magazinesStyle.css')}}">
		<link rel="stylesheet" href="{{URL::asset('css/dataTables.bootstrap.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('plugins/fullcalendar/fullcalendar.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/app.css')}}">
		<link rel="stylesheet" href="{{ URL::asset('css/tableConfig.css')}}">
		<link rel="stylesheet" href="{{URL::asset('css/bootstrap-multiselect.css')}}">




		<title>Biblioteca</title>

        <script src="{{ URL::asset('js/jquery-latest.min.js')}}"></script>
        <script src="{{ URL::asset('js/slides.min.jquery.js')}}"></script>


		
        
	</head>

<body id="body">

	@include('user2.layouts.header')

	<section id="wrap">

		<div class="content-wrap">
			<div id="main">
				@yield('content')
			</div>
		</div>

		<footer id="footer">
			<section id="acerca-de">
				<article>
				</hgroup><h3>Acerca de nuestro sitio web</h3></hgroup>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur.</p>
				</article>
			</section>

			<section id="redes-s">
				<div class="email"><a href="#"></a></div>
				<div class="twitter"><a href="#"></a></div>
				<div class="youtube"><a href="#"></a></div>
				<div class="facebook"><a href="#"></a></div>
			</section>

		</footer>

		<div id="copyright"><p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit 2012 - 2013.</p></div>

	</section>

	
	
	<script src="{{ URL::asset('js/jquery-2.2.3.min.js')}}"></script>
	<script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('js/bootstrap-multiselect.js')}}"></script>
	<script	src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{ URL::asset('js/fastclick.js')}}"></script>
	<script src="{{ URL::asset('js/app.min.js')}}"></script>
	<script src="{{URL::asset('plugins/select2/select2.full.min.js')}}"></script>
	<script src="{{URL::asset('plugins/fullcalendar/jquery-ui.min.js')}}"></script>
	<script src="{{URL::asset('plugins/fullcalendar/moment.min.js')}}"></script>
	<script src="{{URL::asset('plugins/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{ URL::asset('js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{ URL::asset('js/jquery.slimscroll.min.js')}}"></script>
	<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js')}}"></script>
	<script src="{{ URL::asset('js/bootstrap-datetimepicker.pt-PE.js')}}"></script>

	

	<script type="text/javascript" src="{{URL::asset('js/ajax2.js')}}"></script>


	@yield('plugins')

</body>


<!-- Mirrored from www.falconmasters.com/demos/curso_webdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Aug 2017 05:44:07 GMT -->
