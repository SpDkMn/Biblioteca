

<!-- Este script se encarga de recargar la parte del header trayendo los ultimos pedidos -->



<script>
  function actualiza(){
    $("#recarga").load('{{ url("/admin/prestamos/create") }}');
  }
  setInterval( "actualiza()", 5000 );

 </script>	 

	<div class="navbar-custom-menu">
		<ul class="nav navbar-nav" id="recarga">
			<?php 
				$cont=0;
				$pedidos=App\Order::all(); 
				 foreach($pedidos as $pedido){ 
				 	if($pedido->state==0) 
						 $cont++;   // 0: espera , 1: aceptado, 2: rechazado
				}
			?>	

			 <a href="#" class="dropdown-toggle " data-toggle="dropdown-menu"><li class="dropdown notifications-menu open" onclick="funcion2()" id="opcion2"><i class="fa fa-weixin"></i> <span class="label label-warning">{{$cont}}</span>
				<ul class="dropdown-menu" >
					<li class="header text-center" ><h4><strong>Pedidos recientes</strong></h4></li>
					<li style=" max-height:90%;">
					  <ul class="menu" >
						 @foreach($pedidos as $pedido)
							@if( $pedido->state==0 )
							 <div class="" >
					            <div class="box-body with-border" >
					               	<?php
					               		if($pedido->typeItem==2){ $tipo=App\Thesis::find($pedido->id_item); }
								        if($pedido->typeItem==1){ $tipo=App\Book::find($pedido->id_item); }
								        if($pedido->typeItem==3){ $tipo=App\Magazine::find($pedido->id_item); }
								        if($pedido->typeItem==4){ $tipo=App\Compendium::find($pedido->id_item); }
					               	?>
					                    <span><strong>* Alumno:</strong><?php $usuario=App\User::find($pedido->id_user); ?></span><br>
					                    
										<span><strong>* {{$pedido->typeItem}}:</strong> {{$tipo->title}}</span><br>  <span><strong>* Autor:</strong> 
				                             
										</span><br>
										<span><strong>* Ejemplar:</strong> {{$pedido->id_copy}}</span><br>
										<span><strong>* Ubicación:</strong> {{ $tipo->location }}</span><br>
						                <div class="box-tools pull-left">
						                	 <a href="#" id="" name="button2" class="btn btn-primary" data-widget="remove" onclick='alert("Prestamo realizado con exito!")'>Prestar</a>
						 
						                    <button type="button" class="btn btn-info" data-widget="remove" onclick='alert("Desea cancelar el prestamo?")'>Cancelar prestamo
						                    </button>
						                </div>
						        </div>         
							 </div>

							 @endif
							@endforeach
						</ul>
					  </li>

					<li class="text-center">...</li>
				    </ul>
				</li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu" onclick="funcion1()" id="opcion3">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="{{url('img/user2-160x160.jpg')}}" class="user-image" alt="User Image"> <span class="hidden-xs">{{ Auth::user()->name }}</span>
				</a>
					<ul class="dropdown-menu">
						<li class="user-header"><img src="{{url('img/user2-160x160.jpg')}}" class="img-circle"
							alt="User Image">
							<p>
								{{ Auth::user()->name }} <small>{{ Auth::user()->last_name }}</small>
							</p>
						</li>
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
					</ul>
				</li>
			</ul>
		</div>
	
