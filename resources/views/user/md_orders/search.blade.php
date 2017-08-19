<meta name="csrf-token" content="{{ csrf_token() }}">
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
        <form action="" method="post" name="search_form" id="search_form">
          <meta name="_token" content="{!! csrf_token() !!}"/>
              <div class="">
                <label>Filtro</label> <span>*</span> <select
                  id="orderCategory" class="form-control"
                  name="orderCategory" style="width: 100%;" required>
                  <option value=”placeholderVal” disabled selected>Seleccione filtro de busqueda</option>
                  <option value="1" >Libros</option>
                  <option value="2">Tesis/Tesinas</option>
                  <option value="3">Revistas</option>
                  <option value="4">Compendios</option>
                </select>
              </div>
            <fieldset>
              <ul class="toolbar clearfix">
                <li><a href="#" class="fontawesome-eye-open"></a></li>
                <li><a href="#" class="fontawesome-comment"></a></li>
                <li><input type="search" autofocus id="search" placeholder="¿Qúe artículo estás buscando?" ></li>
                <li><button type="submit" id="btn-search"><span class="fontawesome-search"></span></button></li>
              </ul>
            </fieldset>
        </form>
      </div>
    </div>
    <div id="resultados">

    </div>

</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
  $('.example-multiple-selected').multiselect();
  $('#orderCategory').select2();
});
</script>

</div>
</div>
