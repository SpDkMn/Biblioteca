<!DOCTYPE>
<html>
<!-- Mirrored from www.falconmasters.com/demos/curso_webdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Aug 2017 05:43:53 GMT -->
<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/user/estilos.css') }}"/>

		<title>Biblioteca</title>

        <script src="{{ URL::asset('js/jquery-latest.min.js')}}"></script>
        <script src="{{ URL::asset('js/slides.min.jquery.js')}}"></script>


		<script>
            $(function(){
                $("#slideshow").slides();
            });
        </script>
        
	</head>

<body>

	@include('user2.layouts.header')

	<section id="wrap">

		<div class="content-wrap">@yield('content')</div>

		<footer>
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

	@yield('plugins')

</body>


<!-- Mirrored from www.falconmasters.com/demos/curso_webdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 20 Aug 2017 05:44:07 GMT -->
