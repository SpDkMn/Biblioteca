@extends('user2.layouts.main')
 @section('content')
<section id="main">

	<section id="content">
		
	</section>

	<section id="slideshow">
		<div class="slides_container">
			<div><a href="#"><img src="imgNoticias/slideshow/slide-1.jpg"/></a></div>
			<div><a href="#"><img src="imgNoticias/slideshow/slide-2.jpg"/></a></div>
			<div><a href="#"><img src="imgNoticias/slideshow/slide-3.jpg"/></a></div>
		</div>
	</section>

	<section id="bienvenidos">
		<article>
			<hgroup><h3>Bienvenidos a nuestro sitio web</h3></hgroup>
			<p>
				<ul>
					<li>+ Lorem ipsum dolor sit amet.</li>
					<li>+ Consectetur adipisicing elit, sed do eiusmod.</li>
					<li>+ Tempor incididunt ut labore et dolore magna aliqua Ut enim ad.</li>
					<li>+ Quis nostrud exercitation ullamco laboris</li>
					<li>+ Consequat. Duis aute irure dolor in</li>

					<p>Cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</ul>
			</p>
		</article>
	</section>

	<section id="contenido">
		<article>
			<hgroup><h2 class="titulo">Este es el titulo del Post, Articulo #1</h2></hgroup>
			<p class="fecha">8 de Septiembre de 2012</p>
			<img class="thumb" src="imgNoticias/thumb1.jpg" alt=""/>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.</br></br>
			Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</article>

		<article>
			<hgroup><h2 class="titulo">Este es el titulo del Post, Articulo #2</h2></hgroup>
			<p class="fecha">8 de Septiembre de 2012</p>
			<img class="thumb" src="imgNoticias/thumb2.jpg" alt=""/>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.</br></br>
			Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</article>
	</section>

	<aside>
		<section class="widget">
			<h3>Articulos Recientes</h3>
			<ul>
				<li><a href="#">This is Photoshop's version</a></li>
				<li><a href="#">Link a un articulo #1</a></li>
				<li><a href="#">Link a un articulo #2</a></li>
				<li><a href="#">Link a un articulo #3</a></li>
				<li><a href="#">Link a un articulo #4</a></li>
			</ul>
		</section>

		<section class="widget">
			<h3>Sitio Recomendado</h3>
			<a href="#"><img src="imgNoticias/publicidad.png" alt=""/></a>
		</section>

	</aside>

</section>
@endsection