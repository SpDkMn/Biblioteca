<script type="text/javascript">
//countdown_dateFuture sera el limite para los prestamos que se sacara en configuraciones
countdown_dateFuture=new Date(2017,7,24,00,00,00);
  function countdown_UpdateCount(countdown_dateFuture,contenedor,cDias,cHoras,cMin,cSeg)
    {dateNow=new Date();
    timediff=Math.abs(countdown_dateFuture.getTime() - dateNow.getTime());
    delete dateNow;
    if(timediff<0){
      document.getElementById('contador_container').style.display="none";
    }else {
      days=hours=mins=secs=0;
      out="";
      timediff=Math.floor(timediff/1000);days=Math.floor(timediff/86400);
      timediff=timediff % 86400;hours=Math.floor(timediff/3600);
      timediff=timediff % 3600;mins=Math.floor(timediff/60);
      timediff=timediff % 60;secs=Math.floor(timediff);
      if(document.getElementById(contenedor)){
        document.getElementById(cDias).innerHTML=days+" D";
        document.getElementById(cHoras).innerHTML=hours+ " H" ;
        document.getElementById(cMin).innerHTML=mins+ " min";
        document.getElementById(cSeg).innerHTML=secs+ " seg" ;
      }
      setTimeout("countdown_UpdateCount(countdown_dateFuture,'contador_container','contador_dias','contador_horas','contador_minutos','contador_segundos')", 1000);
    }
  }window.onload=function(){
    countdown_UpdateCount(countdown_dateFuture,'contador_container','contador_dias','contador_horas','contador_minutos','contador_segundos');
  }
</script>

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
    <table id="tablePrestamo" class="table table-bordered table-hover">
      <thead>
        <tr>
            <th class="text-center">Tipo de item</th>
            <th class="text-center">Titulo</th>
            <th class="text-center">Ejemplar</th>
            <th class="text-center">Usuario</th>
            <th class="text-center">Personal Adm.</th>
            <th class="text-center">Fecha de Prestamo</th>
            <th class="text-center">Lugar</th>
            <th class="text-center">Tiempo restante</th>
            <th class="text-center">Devolver</th>
          </tr>
      </thead>
      <tbody>
    @foreach($pedidos as $pedido)
      @if($pedido->state == 1)
      <!-- Obteniendo el tipo de item -->
        <?php switch ($pedido->typeItem) {case 1 : $tipo = "Libro"; break;case 2 : $tipo = "Tesis/Tesina"; break;case 3 :$tipo = "Revista";break;}?>
      <!-- fin-->
      <!-- Obteniendo el usuario -->
      <?php  $user = App\User::find($pedido->id_user); ?>
      <?php $cont=0; ?>
      <tr>
        <td class="text-center"><label class="label label-success">{{$tipo}}</label></td>
        <?php if($pedido->typeItem==2){ $item=App\Thesis::find($pedido->id_item); }

              if($pedido->typeItem==1){ $item=App\Book::find($pedido->id_item); }

              if($pedido->typeItem==3){ $item=App\Magazine::find($pedido->id_item); }

              if($pedido->typeItem==4){ $item=App\Compendium::find($pedido->id_item); }
        ?>
        <td><a href="#" data-toggle="modal" data-target="#ModalCopy">{{$item->title}}</a></td>
          <div class="modal fade" id="ModalCopy" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <form>
                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>MATERIAL :</strong> {{$item->title}}</h3>
                   </div>
                   <div class="modal-body">
                       <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Ubicacion</strong><?php for($i=0;$i<18;$i++){echo "&nbsp";}?>:&nbsp{{ $item->location }}</p>

                       <p><?php for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Clasificación</strong>
                            <?php
                            for($i=0;$i<12;$i++){echo "&nbsp";} echo ":";

                              if($pedido->typeItem=="tesis")
                                foreach($item->thesisCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->clasification); }
                              if($pedido->typeItem=="libro"){
                                foreach($item->bookCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->clasification); } }

                              if($pedido->typeItem=="revista")
                                foreach($item->magazines_copies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->numero); }

                            ?>
                       </p>
                       <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Codigo de Barras</strong>
                          <?php
                            for($i=0;$i<4;$i++){echo "&nbsp";} echo ":";

                              if($pedido->typeItem=="tesis")
                                foreach($item->thesisCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->barcode); }
                              if($pedido->typeItem=="libro"){
                                foreach($item->bookCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->barcode); } }

                              if($pedido->typeItem=="revista")
                                foreach($item->magazines_copies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->barcode); }

                            ?>
                        </p>

                        <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Número de Ingreso</strong>          <?php
                            for($i=0;$i<2;$i++){echo "&nbsp";} echo ":";

                              if($pedido->typeItem=="tesis")
                                foreach($item->thesisCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->incomeNumber); }
                              if($pedido->typeItem=="libro"){
                                foreach($item->bookCopies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->incomeNumber); } }

                              if($pedido->typeItem=="revista")
                                foreach($item->magazines_copies as $copia){
                                  if($copia->copy == $pedido->id_copy) echo ($copia->incomeNumber); }

                         ?>
                        </p>

                       <p><?php    for($i=0;$i<36;$i++){echo "&nbsp";} ?> <strong>Autores</strong>
                                <?php for($i=0;$i<21;$i++){echo "&nbsp";}?>:&nbsp
                                <?php $cont=0; ?>
                                @foreach($item->authors as $author)
                                  @if($author->pivot->type == true)
                                  <?php $cont=$cont+1; ?>
                                  @endif
                                @endforeach
                                <?php $cont2=2; ?>
                                @foreach($item->authors as $author)
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
        <td>{{$pedido->copy}}</td>
        <td><a href="#" data-toggle="modal" data-target="#ModalCopy2">{{$user->name}}</a></td>
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

        </td>
        <td class="text-center"><label class="label label-warning"><?php if($pedido->place==0) echo "Sala"; else echo "Domicilio"; ?></label></td>
        <td>
          <div id="contador_container">
            <span id="contador_dias" ></span>
            <span id="contador_horas" ></span>
            <span id="contador_minutos" ></span>
            <span id="contador_segundos" ></span>
          </div>
        </td>
        <td class="text-center">
          <form method="POST"  action="{{ url('/admin/prestamos/devolver') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$pedido->id}}">
          <!-- <a type="submit" class="btn btn-success" onclick="detenerse()"><i class="fa fa-external-link"></i></a> -->
          <button type="submit" name="prestar" onclick="detenerse()" class="btn btn-success">Devolver</button>

          </form>
        </td>
      </tr>
      @endif
     @endforeach
      </tbody>
    </table>
  <div>
 </div>
</div>


<!-- <script type="text/javascript">
    function countdown(contador){
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
 </script> -->
<!--
  esto va en php
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
 -->
