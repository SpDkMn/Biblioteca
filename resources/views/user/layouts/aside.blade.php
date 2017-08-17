<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{url('img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MENU DE NAVEGACIÓN</li>
      <li @if(URL::full() == url('admin/configurations'))class="active"@endif><a href="{{ url('admin/configurations') }}"><i class="fa fa-dashboard"></i><span>Panel de control</span></a></li>
      <li @if(URL::full() == url('/admin/solicitudes'))class="active"@endif><a href="{{ url('/admin/solicitudes') }}"><i class="fa fa-bell"></i> <span>Solicitudes</span><span class="pull-right-container"><small class="label pull-right bg-blue">4</small></span></a></li>
      <li @if(URL::full() == url('/admin/prestamos'))class="active"@endif><a href="{{ url('/admin/prestamos') }}"><i class="fa fa-asl-interpreting"></i> <span>Prestamos</span></a></li>
      {{-- ADMINISTRATION --}}
      <li class="treeview @if(URL::full() == url('/admin/profiles') || URL::full() == url('/admin/employees')) active @endif  ">
        <a href="#">
          <i class="fa fa-table"></i> <span>Administración</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li @if(URL::full() == url('/admin/profiles'))class="active"@endif><a href="{{ url('/admin/profiles') }}"><i class="fa fa-user-secret"></i> <span>Perfiles</span></a></li>
          <li @if(URL::full() == url('/admin/employees'))class="active"@endif><a href="{{ url('/admin/employees') }}"><i class="fa fa-male"></i> <span>Empleados</span></a></li>
        </ul>
      </li>
      {{-- END ADMINISTRATION --}}
      {{-- SEARCH --}}
      <li class="treeview @if(URL::full() == url('/admin/profiles') || URL::full() == url('/admin/employees')) active @endif  ">
        <a href="#">
          <i class="fa fa-table"></i><span>Busqueda</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <!-- <li @if(URL::full() == url('/admin/profiles'))class="active"@endif><a href="{{ url('/admin/profiles') }}"><i class="fa fa-user-secret"></i> <span>Perfiles</span></a></li> -->
        </ul>
      </li>
      {{-- END SEARCH --}}



       {{-- COMPENDIUM MANAGEMENT--}}
      {{--  <li class="treeview @if(URL::full() == url('/admin/magazines')) active @endif  ">
        <a href="#">
          <i class="fa fa-table"></i><span>Revistas y Compendios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
     </li> --}}
      {{-- END COMPENDIUM MANAGMENT--}}
      
       


        {{-- MAGAZINE MANAGEMENT--}}
      <li class="treeview @if(URL::full() == url('/admin/magazines') || URL::full() == url('/admin/compendium')) active @endif  ">
        <a href="#">
          <i class="fa fa-table"></i><span>Material de Lectura</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            
            <li @if(URL::full() == url('/admin/book'))class="active"@endif><a href="{{ url('/admin/book') }}"><i class="fa fa-book"></i> <span>Libros</span></a></li>
       
            <li @if(URL::full() == url('/admin/thesis'))class="active"@endif><a href="{{ url('/admin/thesis') }}"><i class="fa fa-graduation-cap"></i> <span> Tesis - Tesina</span></a></li>

            <li @if(URL::full() == url('/admin/magazines'))class="active"@endif><a href="{{ url('/admin/magazines') }}"><i class="fa fa-"></i> <span>Revistas</span></a></li>
            <li @if(URL::full() == url('/admin/compendium'))class="active"@endif><a href="{{ url('/admin/compendium') }}"><i class="fa fa-"></i> <span>Compendios</span></a></li>

            
            {{-- <li @if(URL::full() == url('/admin/magazines/delete'))class="active"@endif><a href="{{ url('/admin/magazines/delete') }}"><i class="fa fa-"></i> <span>Eliminar</span></a></li>
            <li @if(URL::full() == url('/admin/magazines/show'))class="active"@endif><a href="{{ url('/admin/magazines/show') }}"><i class="fa fa-"></i> <span>Mostrar</span></a></li>   --}}
        </ul>
      </li>
      {{-- END MAGAZINE MANAGMENT--}}



       <li @if(URL::full() == url('/admin/autor'))class="active"@endif><a href="{{ url('/admin/autor') }}"><i class="fa fa-male"></i> <span>Autores</span></a></li>

       


       <li @if(URL::full() == url('/admin/editorial'))class="active"@endif><a href="{{ url('/admin/editorial') }}"><i class="fa fa-newspaper-o"></i> <span>Editorial</span></a></li>



      <li class="treeview @if(URL::full() == url('/admin/castigos') || URL::full() == url('/admin/castigados')) active @endif  ">
        <a href="#">
          <i class="fa fa-table"></i> <span>Sanciones</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li @if(URL::full() == url('/admin/castigos'))class="active"@endif><a href="{{ url('/admin/castigos') }}"><i class="fa fa-th"></i> <span>Castigos</span></a></li>
          <li @if(URL::full() == url('/admin/castigados'))class="active"@endif><a href="{{ url('/admin/castigados') }}"><i class="fa fa-"></i> <span>Castigados</span></a></li>
        </ul>
      </li>
      <li class="treeview @if(URL::full() == url('/admin/items') || URL::full() == url('/admin/ejemplares') || URL::full() == url('/admin/lugares') || URL::full() == url('/admin/categorias') || URL::full() == url('/admin/estados'))  active @endif  ">
        <a href="#">
          <i class="fa fa-table"></i> <span>Productos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li @if(URL::full() == url('/admin/items'))class="active"@endif><a href="{{ url('/admin/items') }}"><i class="fa fa-book"></i> <span>Items</span></a></li>
          <li @if(URL::full() == url('/admin/ejemplares'))class="active"@endif><a href="{{ url('/admin/ejemplares') }}"><i class="fa fa-book"></i> <span>Ejemplares</span></a></li>
          <li @if(URL::full() == url('/admin/lugares'))class="active"@endif><a href="{{ url('/admin/lugares') }}"><i class="fa fa-map"></i> <span>Lugares</span></a></li>
          <li @if(URL::full() == url('/admin/categorias'))class="active"@endif><a href="{{ url('/admin/categorias') }}"><i class="fa fa-list"></i> <span>Categorias</span></a></li>
          <li @if(URL::full() == url('/admin/estados'))class="active"@endif><a href="{{ url('/admin/estados') }}"><i class="fa fa-bookmark-o"></i> <span>Estados</span></a></li>

        </ul>
      </li>
      <li @if(URL::full() == url('/admin/noticias'))class="active"@endif><a href="{{ url('/admin/noticias') }}"><i class="fa fa-book"></i> <span>Noticias</span></a></li>

      <li @if(URL::full() == url('/admin/usuarios'))class="active"@endif><a href="{{ url('/admin/usuarios') }}"><i class="fa fa-users"></i> <span>Usuarios</span></a></li>


      <li @if(URL::full() == url('/admin/escuelas'))class="active"@endif><a href="{{ url('/admin/escuelas') }}"><i class="fa fa-users"></i> <span>Escuelas</span></a></li>
      <li @if(URL::full() == url('/admin/devoluciones'))class="active"@endif><a href="{{ url('/admin/devoluciones') }}"><i class="fa fa-"></i> <span>Devoluciones</span></a></li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
