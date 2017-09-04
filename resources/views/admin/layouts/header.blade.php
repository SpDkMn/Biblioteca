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


<!--Este script va a servir para que parpadee cuando aparezca una notificacion (Falta optimizarlo, solo sirve cuando se recarga la pagina)-->
<script> 
var par=false; 
function parpadeo() { 
    col=par ? 'blue' : 'black'; 
    document.getElementById('txt').style.color=col; 
    par = !par; 
    setTimeout("parpadeo()",500); //500 = medio segundo 
} 
window.onload=parpadeo; 
</script> 


<!-- Este script se encarga de recargar la parte del header con ayax, trayendo los ultimos pedidos -->
<script>
      $(function(){
        liveChat();
      });

    function liveChat()
      { 
        $.ajax({ 
          url: '{{url("/admin/pedidito")}}',
          type:'get',
          data:{_token:'{{csrf_token()}}'},

          success: function(data)
          { 
              $('.contador').append('<span class="label label-warning">'+data['cont']+'</span>');

              $('.actualizador').append('<audio src="{{ URL::asset('sonidos/sonido.mp3') }}" preload="auto" id="demo" autoplay></audio><div class="box-body with-border"><span><strong>* Alumno:  </strong> '+data['nomUsuario']+' </span><br><span><strong>* '+data['nomItem']+' :</strong> '+data['titulo']+' </span><br><span><strong>* Autor:</strong> '+data['autor']+' </span><br><span><strong>* Ejemplar:  </strong> '+data['copy']+' </span><br><span><strong>* Ubicación:</strong> '+data['ubicacion']+' </span><br><div class="box-tools pull-left"><a href="{{ url('/admin/prestamos/prestar') }}" onclick="" class="btn btn-info"> Prestar </a><form id="accept-form" action="{{ url('/admin/prestamos/prestar') }}" method="POST" style=""> <input type="hidden" name="id" value="'+data['id']+'"> </form></div><div class="box-tools pull-right"><a href="{{ url('/admin/prestamos/rechazar') }}" onclick="" class="btn btn-info"> Rechazar </a><form id="denied-form" action="{{ url('/admin/prestamos/rechazar') }}"  method="POST" style=""><input type="hidden" name="id" value="'+data['id']+'"></form></div></div>');
              setTimeout(liveChat,500);       
          },
        });
      }
</script>
		<div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
         <?php  $pedidos = App\Order::all();  ?>
				<li class="dropdown notifications-menu" onclick="funcion2()" id="op2">

        @if(count($pedidos)!=0)<a href="#" class="dropdown-toggle contador" data-toggle="dropdown-menu" id="txt">@endif
        @if(count($pedidos)==0)<a href="#" class="dropdown-toggle contador" data-toggle="dropdown-menu">@endif
						<i class="fa fa-bell-o"></i>
            <span class="label label-warning">
             @if($pedidos!=null){{count($pedidos)}}@endif
            </span>
				</a>
					<ul class="dropdown-menu">
						<li class="header text-center">@if($pedidos!=null){{"Hay ".count($pedidos)}}@else {{"No hay "}} @endif solicitudes pendientes</li>
						<li>
							<ul class="menu actualizador">
              @if($pedidos!=null)
               @foreach($pedidos as $pedido)
  							@if( $pedido->state==0 || $pedido->state ==4 )   <!--Los pedidos de tipo 1 y 4 son para las notificaciones, ver en el controlador LoanController para mas detalle-->
                  <div class="">
                         <div class="box-body with-border">
                             <?php
                               if($pedido->typeItem==2){ $item=App\Thesis::find($pedido->id_item); }
                               if($pedido->typeItem==1){ $item=App\Book::find($pedido->id_item); }
                               if($pedido->typeItem==3){ $item=App\Magazine::find($pedido->id_item); }
                               if($pedido->typeItem==4){ $item=App\Compendium::find($pedido->id_item); }
                             ?>
                              <span><strong>* Alumno:</strong><?php $usuario=App\User::find($pedido->id_user); ?></span><br>
                               <span><strong>* {{$pedido->typeItem}}:</strong> {{$item->title}}</span>
                               <br>
                               <span><strong>* Autor:</strong>
                                           <?php $cont=0; ?>@
                                           @foreach($item->authors as $author)
                                             @if($author->pivot->type == true)
                                             <?php $cont=$cont+1; ?>
                                             @endif
                                           @endforeach
                                           <?php $cont2=2; ?>
                                           @foreach($item->authors as $author)
                                             @if($author->pivot->type == true)
                                             {{$author->name}}
                                               @if($cont2<=$cont)
                                               ,
                                               @endif
                                             @endif
                                             <?php $cont2=$cont2+1; ?>
                                           @endforeach
                        </span><br>
                       <span><strong>* Ejemplar:</strong> {{$pedido->copy}}</span><br>
                       <span><strong>* Ubicación:</strong> {{ $item->libraryLocation }}</span><br>

                               <div class="box-tools pull-left">
                                 <a href="{{ url('/admin/prestamos/prestar') }}"
                                   onclick="event.preventDefault();
                                              document.getElementById('accept-form').submit();"
                                   class="btn btn-info"> Prestar </a>
                                 <form id="accept-form" action="{{ url('/admin/prestamos/prestar') }}"
                                   method="POST" style="display: none;">{{ csrf_field() }}
                                   <input type="hidden" name="id" value="{{$pedido->id}}">
                                 </form>
                               </div>
                               <div class="box-tools pull-right">
                                 <a href="{{ url('/admin/prestamos/rechazar') }}"
                                   onclick="event.preventDefault();
                                              document.getElementById('denied-form').submit();"
                                   class="btn btn-info"> Rechazar </a>
                                 <form id="denied-form" action="{{ url('/admin/prestamos/rechazar') }}"
                                   method="POST" style="display: none;">{{ csrf_field() }}
                                   <input type="hidden" name="id" value="{{$pedido->id}}">
                                 </form>
                               </div>

                       </div>
                  </div>
                </form>
                @endif
							 @endforeach
              @endif
							</ul>
            </li>
						<li class="footer"><a href="solicitudes.html">Ver todos</a></li>
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
