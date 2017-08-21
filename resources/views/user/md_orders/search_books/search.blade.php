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
            <fieldset>
              <ul class="toolbar clearfix searchBooks">
                <li><a href="#" class="fontawesome-eye-open"></a></li>
                <li><a href="#" class="fontawesome-comment"></a></li>
                <li><input type="search" autofocus id="search" placeholder="¿Qúe libro estás buscando?" ></li>
                <li><button type="submit" id="btn-search"><span class="fontawesome-search"></span></button></li>
              </ul>
            </fieldset>
        </form>
      </div>
    </div>
    <div id="resultadosBook">

    </div>

</div>
</div>
</div>
</div>
