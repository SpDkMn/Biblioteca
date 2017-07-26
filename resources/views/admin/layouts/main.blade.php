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

     <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}">

     <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-combined.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/estiloLibros.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/magazinesStyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/dataTables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/tableConfig.css')}}">

    <script src="{{ URL::asset('js/jquery-2.2.3.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="{{URL::asset('css/bootstrap-multiselect.css')}}">


   <script src="{{URL::asset('js/bootstrap-multiselect.js')}}"></script>


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
      <div><select class="multiple">Accion de las empresas</select></div>


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
    @yield('plugins')

      <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{ URL::asset('js/fastclick.js')}}"></script>
    <script src="{{ URL::asset('js/app.min.js')}}"></script>
    <script src="{{URL::asset('plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ URL::asset('js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.inputmask.js')}}"></script>

    <script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap-datetimepicker.pt-PE.js')}}"></script>

    <script type="text/javascript">
    //fecha + hora formato 24 horas
      $('.fecha1').datetimepicker({
        format: 'yyyy-MM-dd hh:mm:ss',
        language: 'pt-PE'
      });
      //fecha+hora formato 12 horas
      $('.fecha2').datetimepicker({
        language: 'pt-PE',
        pick12HourFormat: true
      });

      //Solo hora formato 12 horas
      $('.fecha3').datetimepicker({
        format: 'hh:mm:ss',
        pickDate: false,
        pick12HourFormat: true
      });
      //solo hora formato 12 horas
      $('.fecha4').datetimepicker({
        pickDate: false,
        pick12HourFormat: true
      });
      //Solo fecha
      $('.fecha5').datetimepicker({
        language: 'pt-PE',
        pickTime: false
      });
    </script>      

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


</script>
    @yield('scriptContent')
    @yield('scriptItem')
    @yield('scriptDelete')
    @yield('scriptTable')
    @yield('scriptTableExtend')
    @yield('scriptSelect')
    @yield('scriptModal')
    @yield('scriptModalContent')
    @yield('script')
    @yield('scriptSelectAutorPrincipal')


<script>
  //Inicializador de los inputmask
  $("[data-mask]").inputmask();
</script>


<script>
    $(function() {
      //Initialize Select2 Elements
    $(".select2").select2();
    });
</script>

    <!--
     <script>
        $(function() {
            $('#ms').change(function() {
                console.log($(this).val());
            }).multipleSelect({
                width: '100%'
            });
        });
    </script>
    -->

  </body>
</html>
