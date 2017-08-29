<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Sistema de Biblioteca</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="{{ URL::asset('css/modalStyles.css')}}">
<!--Estilos de la ventana  modal-->
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
@yield('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}">

<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-combined.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('css/estiloLibro.css')}}">

<link rel="stylesheet" href="{{ URL::asset('css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('css/magazinesStyle.css')}}">
<link rel="stylesheet" href="{{URL::asset('css/dataTables.bootstrap.css')}}">
<link rel="stylesheet" href="{{ URL::asset('plugins/select2/select2.min.css') }}">

<link rel="stylesheet" href="{{ URL::asset('plugins/fullcalendar/fullcalendar.css') }}">

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


</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">
    <header class="main-header">
    	<!-- Logo -->
    	<a href="index2.html" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels -->
    		<span class="logo-mini"><b>S</b>B</span> <!-- logo for regular state and mobile devices -->
    		<span class="logo-lg"><b>Sistema </b>de Biblioteca</span>
    	</a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas"
          role="button"> <span class="sr-only">Navegacion</span>
        </a>
        @include('admin.layouts.header')
      </nav>
    </header>
		<!-- Left side column. contains the logo and sidebar -->
		@include('admin.layouts.aside')
		<div class="content-wrapper">@yield('content')</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.0.0
			</div>
			<strong>Copyright &copy; 2017 <a href="#">Bibliofisi</a>.
			</strong> All rights reserved.
		</footer>
	</div>

	<!-- ./wrapper -->
	@yield('plugins')

	<script	src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{ URL::asset('js/fastclick.js')}}"></script>
	<script src="{{ URL::asset('js/app.min.js')}}"></script>
	<script src="{{URL::asset('plugins/select2/select2.full.min.js')}}"></script>

	<script src="{{URL::asset('plugins/fullcalendar/jquery-ui.min.js')}}"></script>
	<script src="{{URL::asset('plugins/fullcalendar/moment.min.js')}}"></script>
	<script src="{{URL::asset('plugins/fullcalendar/fullcalendar.min.js')}}"></script>

	<script src="{{ URL::asset('js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{ URL::asset('js/jquery.slimscroll.min.js')}}"></script>

	<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js')}}"></script>
	<script src="{{ URL::asset('js/bootstrap-datetimepicker.pt-PE.js')}}"></script>
	<script src="{{ URL::asset('js/jquery.inputmask.js')}}"></script>

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
    $("#tablePrestamo").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    $('#tablePedido').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
    $('#tableHistorial').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
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
	@yield('scripts')


<script>
  //Inicializador de los inputmask
  $("[data-mask]").inputmask();
</script>

<!--Que me permita ingresar solo numeros-->
<script language=Javascript>

      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }

</script>

<script>

  function validarFormulario(){

    var txtNombre = document.getElementById('tipo').value;
    var txtEdad = document.getElementById('title').value;
    var txtCorreo = document.getElementById('clasification').value;
    var txtFecha = document.getElementById('asesor').value;
    var cmbSelector = document.getElementById('escuela').selectedIndex;
    var chkEstado = document.getElementById('edition');
    var rbtEstado = document.getElementsByName('extension');

    var banderaRBTN = false;

    //Test campo obligatorio
    if(txtNombre == null || txtNombre.length == 0 || /^\s+$/.test(txtNombre)){
      alert('ERROR: El campo nombre no debe ir vacío o lleno de solamente espacios en blanco');
      return false;
    }

    //Test edad
    if(txtEdad == null || txtEdad.length == 0 || isNaN(txtEdad)){
      alert('ERROR: Debe ingresar una edad');
      return false;
    }

    //Test correo
    if(!(/\S+@\S+\.\S+/.test(txtCorreo))){
      alert('ERROR: Debe escribir un correo válido');
      return false;
    }

    //Test fecha
    if(!isNaN(txtFecha)){
      alert('ERROR: Debe elegir una fecha');
      return false;
    }

    //Test comboBox
    if(cmbSelector == null || cmbSelector == 0){
      alert('ERROR: Debe seleccionar una opcion del combo box');
      return false;
    }

    //Test checkBox
    if(!chkEstado.checked){
      alert('ERROR: Debe seleccionar el checkbox');
      return false;
    }

    //Test RadioButtons
    for(var i = 0; i < rbtEstado.length; i++){
      if(rbtEstado[i].checked){
        banderaRBTN = true;
        break;
      }
    }
    if(!banderaRBTN){
      alert('ERROR: Debe elegir una opción de radio button');
      return false;
    }

    return true;
  }

  </script>

 </body>
</html>
