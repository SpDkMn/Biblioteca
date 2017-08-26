<link href='http://fonts.googleapis.com/css?family=Autour+One' rel='stylesheet' type='text/css'><style type='text/css'>#countdown_container{font-family: 'Autour One', cursive;width:300px;height:172px;background: url("http://gaf210.imvustylez.net/images/countdown-gaf210codes-chocolatecookie1.png") top center no-repeat;margin: 0px auto;}.countdown_box{overflow: hidden;position: absolute;text-align: center;}.countdown_number{width: 51px;height: 26px;font-size:20px;text-align:center;color:#000;}.countdown_number_name{width: 51px;height: 26px;font-size:13px;text-transform:uppercase;color:#000;}#countdown_days{margin-left: 15px;margin-top: 102px;}#countdown_hours{margin-left: 88px;margin-top: 85px;}#countdown_mins{margin-left: 163px;margin-top: 63px;}#countdown_secs{margin-left: 237px;margin-top: 44px;}#countdown_number_name_secs{margin-left: 236px;margin-top: 86px;}#countdown_number_name_mins{margin-left: 162px;margin-top: 106px;}#countdown_number_name_hours{margin-left: 89px;margin-top: 129px;}#countdown_number_name_days{margin-left: 14px;margin-top: 150px;}#countdown_bottompart{margin-left: 4px;margin-top: 8px;width: 188px;height: 26px;color:#ccc;font-size:15px;text-transform:uppercase;}</style><script type="text/javascript">/*courtesy of onlineclock.net*/ countdown_dateFuture=new Date(2017,8,25,00,00,00);function countdown_UpdateCount(){dateNow=new Date();timediff=Math.abs(countdown_dateFuture.getTime() - dateNow.getTime());delete dateNow;if(timediff<0){document.getElementById('countdown_container').style.display="none";}else {days=0;hours=0;mins=0;secs=0;out="";timediff=Math.floor(timediff/1000);days=Math.floor(timediff/86400);timediff=timediff % 86400;hours=Math.floor(timediff/3600);timediff=timediff % 3600;mins=Math.floor(timediff/60);timediff=timediff % 60;secs=Math.floor(timediff);if(document.getElementById('countdown_container')){document.getElementById('countdown_days').innerHTML=days;document.getElementById('countdown_hours').innerHTML=hours;document.getElementById('countdown_mins').innerHTML=mins;document.getElementById('countdown_secs').innerHTML=secs;}setTimeout("countdown_UpdateCount()", 1000);}}window.onload=function(){countdown_UpdateCount();}</script><div id="countdown_container"><div id="countdown_days" class="countdown_box countdown_number"></div><div id="countdown_hours" class="countdown_box countdown_number"></div><div id="countdown_mins" class="countdown_box countdown_number"></div><div id="countdown_secs" class="countdown_box countdown_number"></div><div id="countdown_number_name_secs" class="countdown_box countdown_number_name">Secs</div><div id="countdown_number_name_mins" class="countdown_box countdown_number_name">Mins</div><div id="countdown_number_name_hours" class="countdown_box countdown_number_name">Hours</div><div id="countdown_number_name_days" class="countdown_box countdown_number_name">Days</div><div id="countdown_bottompart" class="countdown_box">Until my Birthday!!</div></div>




<div class="box box-warning">
  <div class="box-header with-border">
    <h2 class="all-tittles"><i class="fa fa-history"></i> Historial de Prestamos</h2>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <hr>

  <div class="box-body">

<?php $cont=0; ?>
@foreach($pedidos as $pedido)
  @if($pedido->state == 1)
    <table id="example3" class="table table-bordered table-hover">
      <thead>
        <tr>
            <th>Cond</th>
            <th>Item</th>
            <th>Titulo</th>
            <th>Ejem</th>
            <th>Usuario</th>
            <th>Personal Adm.</th>
            <th>Fecha de Prestamo</th>
            <th>Prestamo</th>
            <th>Tiempo restante</th>
            <th>Devol</th>
          </tr>
      </thead>
      <tbody>

      <tr>
        <td><input type="button" class="btn btn-info" id="boton" data-original-title="Status" value="Prestado"></td>
        <td> {{$pedido->typeItem}} </td>
       
        <?php if($pedido->typeItem==2){ $tipo=App\Thesis::find($pedido->id_item); }

              if($pedido->typeItem==1){ $tipo=App\Book::find($pedido->id_item); }

              if($pedido->typeItem==3){ $tipo=App\Magazine::find($pedido->id_item); }

              if($pedido->typeItem==4){ $tipo=App\Compendium::find($pedido->id_item); }
        ?>
        <td><a href="#" data-toggle="modal" data-target="#ModalCopy">{{$tipo->title}}</a></td>
          <div class="modal fade" id="ModalCopy" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <form>
                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>MATERIAL :</strong> {{$tipo->title}}</h3>
                   </div>
                   <div class="modal-body">
                       <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Ubicacion</strong><?php for($i=0;$i<18;$i++){echo "&nbsp";}?>:&nbsp{{ $tipo->location }}</p>

                       <p><?php for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Clasificación</strong>
                            <?php
                            for($i=0;$i<12;$i++){echo "&nbsp";} echo ":";

                              if($pedido->typeItem=="tesis")
                                foreach($tipo->thesisCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->clasification); }
                              if($pedido->typeItem=="libro"){
                                foreach($tipo->bookCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->clasification); } }

                              if($pedido->typeItem=="revista")
                                foreach($tipo->magazines_copies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->numero); }

                            ?>
                       </p>
                       <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Codigo de Barras</strong>
                          <?php
                            for($i=0;$i<4;$i++){echo "&nbsp";} echo ":";

                              if($pedido->typeItem=="tesis")
                                foreach($tipo->thesisCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->barcode); }
                              if($pedido->typeItem=="libro"){
                                foreach($tipo->bookCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->barcode); } }

                              if($pedido->typeItem=="revista")
                                foreach($tipo->magazines_copies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->barcode); }

                            ?>
                        </p>

                        <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Número de Ingreso</strong>          <?php
                            for($i=0;$i<2;$i++){echo "&nbsp";} echo ":";

                              if($pedido->typeItem=="tesis")
                                foreach($tipo->thesisCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->incomeNumber); }
                              if($pedido->typeItem=="libro"){
                                foreach($tipo->bookCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->incomeNumber); } }

                              if($pedido->typeItem=="revista")
                                foreach($tipo->magazines_copies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->incomeNumber); }

                         ?>
                        </p>

                       <p><?php    for($i=0;$i<36;$i++){echo "&nbsp";} ?> <strong>Autores</strong>
                                <?php for($i=0;$i<21;$i++){echo "&nbsp";}?>:&nbsp
                                <?php $cont=0; ?>
                                @foreach($tipo->authors as $author)
                                  @if($author->pivot->type == true)
                                  <?php $cont=$cont+1; ?>
                                  @endif
                                @endforeach
                                <?php $cont2=2; ?>
                                @foreach($tipo->authors as $author)
                                  @if($author->pivot->type == true)
                                  {{$author->name}}
                                    @if($cont2<=$cont)
                                    ,
                                    @endif
                                  @endif
                                  <?php $cont2=$cont2+1; ?>
                                @endforeach

                       </p>
                       <p><?php    for($i=0;$i<56;$i++){echo "&nbsp";}?> <strong>Nº de Copia:</strong> 4 </p>
                   </div>
                 </form>
               </div>
            </div>
          </div>
        <td>{{$pedido->id_copy}}</td>
       <td><a href="#" data-toggle="modal" data-target="#ModalCopy2">Usuario</a></td>

          <div class="modal fade" id="ModalCopy2" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">

             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <form>

                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>USUARIO :</strong></h3>

                   </div>


                   <div class="modal-body">

                       <p><?php    for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Nombre:</strong> </p>
                       <p><?php    for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Perfil:</strong></p>

                   </div>
                 </form>
               </div>
            </div>
          </div>

        <td>Mirian Pagan</td>
        <td>{{$pedido->startDate}}
            <?php
                $date = strtotime($pedido->startDate);
                $fechaPedido = date("d/m/Y");
                if(date("a", $date)=="pm"){
                  $año = date("Y", $date);
                  echo '<br>'.$año;
                  $mes = date("m", $date);
                  echo '<br>'.$mes;
                  $dia = date("d", $date);
                  echo '<br>dia pedido '.$dia;
                  $hora = (12+date("h", $date));
                  echo '<br>hora pedida '.$hora;
                  $min = date("i", $date);
                  echo '<br>minuto pedido '.$min;
                  $seg = date("s", $date);
                  echo '<br>segundo pedido '.$seg;
                }
                else{
                  $año = date("Y", $date);
                  echo '<br>'.$año;
                  $mes = date("m", $date);
                  echo  '<br>'.$mes;
                  $dia = date("d", $date);
                  echo '<br>dia pedido '.$dia;
                  $hora = date("h", $date);
                  echo '<br>hora pedida '.$hora;
                  $min = date("i", $date);
                  echo '<br>minuto pedido '.$min;
                  $seg = date("s", $date);
                  echo '<br>segundo pedido '.$seg;
                }


              $tiempo = strtotime($configuracion->endWednesday);
                if(date("a", $tiempo)=="pm"){

                  $horaFinAtencion = (12+date("h", $tiempo));
                  echo '<br>hora de atencion '.$horaFinAtencion;
                  $minFinAtencion = date("i", $tiempo);
                  echo '<br>minuto de atencion'.$minFinAtencion;
                  $segFinAtencion = date("s", $tiempo);
                  echo '<br>segundo de atencion '.$segFinAtencion;

                }
                else{
                  $horaFinAtencion = date("h", $tiempo);
                  echo '<br>hora de atencion '.$horaFinAtencion;
                  $minFinAtencion = date("i", $tiempo);
                  echo '<br>minuto de atencion'.$minFinAtencion;
                  $segFinAtencion = date("s", $tiempo);
                  echo '<br>segundo de atencion '.$segFinAtencion;
                }

              echo "Hoy es dia ". date("d/m/Y") . " y la hora actual es ". date("h:i:s");
              if(date("a")=="pm"){
                  $fechaActual = date("d/m/Y");
                  $tiempoActual = date("h:i:s");
                  echo '<br>'.$tiempoActual;
                  $diaActual = date("d");
                  echo '<br>'.$diaActual;

                  $horaActual = 7 + date("h");
                  echo '<br>'.$horaActual;
                  $horar = date("a");
                  echo '<br>'.$horar;
                  $minActual = date("i");
                  echo '<br>'.$minActual;
                  $segActual = date("s");
                  echo '<br>'.$segActual;
            }
              else {
                  $fechaActual = date("d/m/Y");
                  $tiempoActual = date("h:i:s");
                  echo '<br>'.$tiempoActual;
                  $diaActual = date("d") - 1;
                  echo '<br>'.$diaActual;
                  $horar = date("a");
                  echo '<br>'.$horar;
                  $horaActual = 19 + date("h");
                  echo '<br>'.$horaActual;
                  $minActual = date("i");
                  echo '<br>'.$minActual;
                  $segActual = date("s");
                  echo '<br>'.$segActual;
              }
            //   if($pedido->place=="Sala") $horas = ( $horaFinAtencion - $pedido->startDate );
          ?>
        </td>
        <td><?php if($pedido->place==0) echo "Sala"; else echo "Domicilio"; ?></td>
        <td>

          <p><span id="identificador">0</span></p>
        </td>
        <td class="text-center">
          <a type="submit" class="btn btn-success" onclick="detenerse()"><i class="fa fa-external-link"></i></a>
        </td>
      </tr>
      </tbody>
    </table>
 @endif
@endforeach
  <div>
 </div>
</div>


<script type="text/javascript">


    function countdown(identificador){

    var fecha=new Date('2012','1','10','21','00','00');
    var hoy=new Date();
    var dias=0;
    var horas=0;
    var minutos=0;
    var segundos=0;

    if (fecha>hoy){
        var diferencia=(fecha.getTime()-hoy.getTime())/1000;
        dias=Math.floor(diferencia/86400);
        diferencia=diferencia-(86400*dias);
        horas=Math.floor(diferencia/3600);
        diferencia=diferencia-(3600*horas);
        minutos=Math.floor(diferencia/60);
        diferencia=diferencia-(60*minutos);
        segundos=Math.floor(diferencia);

        document.getElementById(id).innerHTML='Quedan ' + dias + ' D&iacute;as, ' + horas + ' Horas, ' + minutos + ' Minutos, ' + segundos + ' Segundos';

        if (dias>0 || horas>0 || minutos>0 || segundos>0){
            setTimeout("countdown(\"" + id + "\")",1000);
        }
    }
    else{
        document.getElementById('restante').innerHTML='Quedan ' + dias + ' D&iacute;as, ' + horas + ' Horas, ' + minutos + ' Minutos, ' + segundos + ' Segundos';
    }

}



 </script>
