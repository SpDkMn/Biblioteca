@extends('admin.layouts.main')

@section('content')



<section class="content">
<div id="wrapper">


    

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Estadísticas </h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-dashboard"></i> Calculos porcentuales</li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-book fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{$numBooks}}</p>
                    <p class="announcement-text">Libros</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Ver los libros
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-graduation-cap fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{$numThesis}}</p>
                    <p class="announcement-text">Tesis</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Ver las tesis
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{$numMagazines}}</p>
                    <p class="announcement-text">Revistas</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Ver revistas
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">{{$numCompendium}}</p>
                    <p class="announcement-text">Compendios</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Ver los compendios
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Numero de libros pedidos</h3>
              </div>
              <div class="panel-body">
                <div id="container" style="width: 1500px; height: 400px; margin: 0 auto"></div>
                        <script language="JavaScript">
                        function drawChart() {
                           // Define the chart to be drawn.
                           var data = google.visualization.arrayToDataTable([
                              ['Year', 'Libros', 'Tesis'],
                             
                              ['Enero',  900,      390],
                              ['Febrero',  1000,      400],
                              ['Marzo',  1170,      440],
                              ['Abril',  1250,       480],
                              ['Mayo',  1530,      540],
                              ['Junio',  1530,      540],
                              ['Julio',  1530,      540],
                              ['Agosto',  1530,      540],
                              ['Setiembre',  1530,      540],
                              ['Octubre',  1530,      540],
                              ['Noviembre',  1530,      540],
                              ['Diciembre',  1530,      540],
                              ]);

                           var options = {
                              title: 'Prestamos (en millones)'      
                           };  

                           // Instantiate and draw the chart.
                           var chart = new google.visualization.ColumnChart(document.getElementById('container'));
                           chart.draw(data, options);
                        }
                        google.charts.setOnLoadCallback(drawChart);
                        </script>
              </div>
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          
           <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Libros mas pedidos</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Codigo<i class="fa fa-sort"></i></th>
                        <th>Clasificación <i class="fa fa-sort"></i></th>
                        <th>N° Ingreso <i class="fa fa-sort"></i></th>
                        <th>Título <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>3319</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <a href="#">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Tesis mas pedidas</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Codigo<i class="fa fa-sort"></i></th>
                        <th>Clasificación <i class="fa fa-sort"></i></th>
                        <th>N° Ingreso <i class="fa fa-sort"></i></th>
                        <th>Título <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>16200199</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                      <tr>
                        <td>3319</td>
                        <td>TESIS 23 FISI</td>
                        <td>134024</td>
                        <td>Generacion de ideas</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <a href="#">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-money"></i> Usuarios que mas piden</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>Codigo <i class="fa fa-sort"></i></th>
                        <th>Nombre <i class="fa fa-sort"></i></th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>16200222</td>
                        <td>Juan Luna de Aponte Marcavalle</td>
                     
                      </tr>
                      <tr>
                        <td>16200222</td>
                        <td>Juan Luna de Aponte Marcavalle</td>
                     
                      </tr>
                      <tr>
                        <td>16200222</td>
                        <td>Juan Luna de Aponte Marcavalle</td>
                 
                      </tr>
                      <tr>
                        <td>16200222</td>
                        <td>Juan Luna de Aponte Marcavalle</td>
                     
                      </tr>
                      <tr>
                        <td>16200222</td>
                        <td>Juan Luna de Aponte Marcavalle</td>
                    
                      </tr>
                     
                    </tbody>
                  </table>
                </div>
                <div class="text-right">
                  <a href="#">Ver detalles <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div><!-- /.row -->

      </div>

 </div>
 </section>



@endsection
