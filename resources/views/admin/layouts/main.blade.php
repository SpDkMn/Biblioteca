   <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Biblioteca</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ URL::asset('css/modalStyles.css')}}"><!--Estilos de la ventana  modal-->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    @yield('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    {{-- AdminLTE --}}
    <link rel="stylesheet" href="{{URL::asset('css/AdminLTE.min.css')}}">
    {{-- end AdminLTE --}}
    {{-- Magazine Style --}}
    <link rel="stylesheet" href="{{ URL::asset('css/magazinesStyle.css')}}">
    {{-- end Magazine Style --}}
    {{-- dataTables --}}
    <link rel="stylesheet" href="{{URL::asset('css/dataTables.bootstrap.css')}}">
    {{-- end dataTables --}}
    <link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css')}}">
    {{--end  Magazine Style --}}
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-multiselect.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ URL::asset('js/jquery-2.2.3.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('admin.layouts.header')
      <!-- Left side column. contains the logo and sidebar -->
      @include('admin.layouts.aside')
      <div class="content-wrapper">
        @yield('content')
      </div>

      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0.0
        </div>
        <strong>Copyright &copy; 2016 <a href="#">SpDkMn</a>.</strong> All rights
        reserved.
      </footer>
    </div>

    <!-- ./wrapper -->
    <script src="{{ URL::asset('js/jquery-2.2.3.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('js/bootstrap-multiselect.js')}}"></script>
    @yield('plugins')
    <script src="{{ URL::asset('js/fastclick.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.inputmask.js')}}"></script>

    <script src="{{ URL::asset('js/app.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.min.js')}}"></script>
    <!-- Selector multiple  -->
    <script src="{{ URL::asset('js/select2.full.min.js')}}"></script>
    <script src="{{ URL::asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.slimscroll.min.js')}}"></script>

    <!-- Los js de abajo seran guardados en un solo archivo .js  -->
    <!-- js para Inicializar el selector multiple -->
    @yield('scriptSelect')
    <!-- js para agregar mas contenidos a una revista -->
    @yield('scriptContent')
    <!-- js para agregar mas items a una revista -->
    @yield('scriptItem')
    @yield('scriptDelete')
    <!-- js para cambiar el dataTable a español -->
    @yield('scriptTable')
    @yield('scriptTableExtend')
    @yield('scriptModal')
    @yield('scriptModalContent')
    <!-- js para mostrar el modal , editar , eliminar -->
    <!-- Js para enviar el id de una revista seleccionada -->
    @yield('script')
  </body>
</html>
