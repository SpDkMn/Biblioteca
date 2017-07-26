<script type="text/javascript">
  function funcion1(){
    
    if(document.getElementById('op').getAttribute('class')=="dropdown user user-menu"){
      document.getElementById('op').setAttribute("class","dropdown user user-menu open");
    }else{
      document.getElementById('op').setAttribute("class","dropdown user user-menu");
    }
  }

  function funcion2(){
    
    if(document.getElementById('op2').getAttribute('class')=="dropdown notifications-menu"){
      document.getElementById('op2').setAttribute("class","dropdown notifications-menu open");
    }else{
      document.getElementById('op2').setAttribute("class","dropdown notifications-menu");
    }
  }
</script>




<header class="main-header">
	<!-- Logo -->
	<a href="index2.html" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>A</b>LT</span> <!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><b>Admin</b>LTE</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas"
			role="button"> <span class="sr-only">Toggle navigation</span>
		</a>
		<!-- Navbar Right Menu -->
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<!-- Notifications: style can be found in dropdown.less -->
				<li class="dropdown notifications-menu" onclick="funcion2()"
					id="op2"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-bell-o"></i> <span class="label label-warning">10</span>
				</a>
					<ul class="dropdown-menu">
						<li class="header">Hay 10 solicitudes pendientes</li>
						<li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu">
								<li><a href="solicitudes.html"> <i class="fa fa-book text-aqua"></i>
										Programacion en C++
								</a></li>
								<li><a href="solicitudes.html"> <i class="fa fa-book text-aqua"></i>
										Programacion en C#
								</a></li>
								<li><a href="solicitudes.html"> <i class="fa fa-book text-aqua"></i>
										Programacion en Java
								</a></li>
								<li><a href="solicitudes.html"> <i class="fa fa-book text-aqua"></i>
										Programacion en Python
								</a></li>
							</ul>
						</li>
						<li class="footer"><a href="solicitudes.html">View all</a></li>
					</ul></li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu" onclick="funcion1()" id="op"><a
					href="#" class="dropdown-toggle" data-toggle="dropdown"> <img
						src="{{url('img/user2-160x160.jpg')}}" class="user-image"
						alt="User Image"> <span class="hidden-xs">{{ Auth::user()->name }}</span>
				</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header"><img
							src="{{url('img/user2-160x160.jpg')}}" class="img-circle"
							alt="User Image">

							<p>
								{{ Auth::user()->name }} <small>{{ Auth::user()->last_name }}</small>
							</p></li>
						<!-- Menu Body -->
						<li class="user-body">
							<div class="row">
								<div class="col-xs-4 text-center">
									<a href="#">Followers</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Sales</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Friends</a>
								</div>
							</div> <!-- /.row -->
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="{{url('admin/usuarios/show')}}"
									class="btn btn-default btn-flat">Perfil</a>
							</div>
							<div class="pull-right">
								<a href="{{ url('/logout') }}"
									onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
									class="btn btn-default btn-flat"> Salir </a>

								<form id="logout-form" action="{{ url('/logout') }}"
									method="POST" style="display: none;">{{ csrf_field() }}</form>
							</div>
						</li>
					</ul></li>
			</ul>
		</div>

	</nav>
</header>



