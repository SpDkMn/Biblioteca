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


      {{-- ORDER --}}
      <li @if(URL::full() == url('user/order'))class="active"@endif>
        <a href="{{ url('user/order') }}">
          <i class="fa fa-dashboard"></i><span>Pedidos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li @if(URL::full() == url('/user/orderBook'))class="active"@endif><a href="{{ url('/user/orderBook') }}"><i class="fa fa-user-secret"></i> <span>Libros</span></a></li>
          <li @if(URL::full() == url('/user/orderThesis'))class="active"@endif><a href="{{ url('/user/orderThesis') }}"><i class="fa fa-male"></i> <span>Tesis/Tesinas</span></a></li>
          <li @if(URL::full() == url('/user/orderMagazine'))class="active"@endif><a href="{{ url('/user/orderMagazine') }}"><i class="fa fa-male"></i> <span>Revistas</span></a></li>
        </ul>
      </li>
      {{-- END ORDER --}}
      <li @if(URL::full() == url('/user/'))class="active"@endif><a href="{{ url('/user/') }}"><i class="fa fa-user-secret"></i> <span>Noticias</span></a></li>
      <li @if(URL::full() == url('/user/'))class="active"@endif><a href="{{ url('/user/') }}"><i class="fa fa-user-secret"></i> <span>Historial de Castigos</span></a></li>






    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
