		<header>
			<div id="subheader">
				<div id="logotipo"><p><a href="#">Biblioteca Eloy</a></p></div>
				<nav>
					<ul>
						<li><a href="{{ url('/') }}">Inicio</a></li>
						<li><a href="#">Pedidos</a>
							<ul>
								<li><a href="{{ url('user/search2/indexLibro') }}">Libros</a></li>
								<li><a href="">Tesis</a></li>
								<li><a href="">Revistas</a></li>
								<li><a href="">Compendios</a></li>
							</ul>
						</li>
						<li><a href="">Iniciar Sesion</a>
							<ul>
								<li><a href="{{ url('user/login') }}">Usuario</a></li>
								<li><a href="{{ url('loginEmpleado') }}">Empleado</a></li>
							</ul>
						</li>
						<li><a href="{{ url('user/register') }}">Registrar</a></li>
					</ul>
				</nav>
			</div>
		</header>
