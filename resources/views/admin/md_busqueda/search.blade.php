<div class=" box box-primary">
  <div class="box-header with-border">
    <i class="fa fa-info"></i>
    <h3 class="box-title">BUSQUEDA</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
<div class="box-body">
  <div class="container-search">
    <div class="container">
      <form action="{{ url('/admin/search') }}" method="POST">
        <fieldset>
          <ul class="toolbar clearfix">
            <li><a href="#" class="fontawesome-eye-open"></a></li>
            <li><a href="#" class="fontawesome-comment"></a></li>
            <li><input type="search" id="search" placeholder="¿Qúe artículo estás buscando?"></li>
            <li><button type="submit" id="btn-search"><span class="fontawesome-search"></span></button></li>
          </ul>
        </fieldset>
      </form>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <input type="button" name="" value="">
    </div>
    <div class="col-md-6">
      <input type="button" name="" value="">
    </div>
  </div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>TEST1</th>
        <th>TEST2</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>PRUEBA1</td>
        <td>PRUEBA1</td>
      </tr>
    </tbody>
  </table>
</div>
</div>
<script type="text/javascript">
function buscar() {
  var textoBusqueda = $("input #search").val();
  if (textoBusqueda != "") {
          $.post('{{ url("/admin/search/")}}', {valorBusqueda: textoBusqueda}, function(mensaje) {
              $("#resultadoBusqueda").html(mensaje);
          });
      } else {
          ("#resultadoBusqueda").html('');
  	};

};
</script>
