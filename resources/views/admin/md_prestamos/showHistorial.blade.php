<div class="box box-warning">
  <div class="box-header with-border">
    <h2 class="all-tittles"><i class="fa fa-history"></i> Historial</h2>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <hr>
  <div class="box-body">
    <table id="tableHistorial" class="table table-bordered table-hover">
      <thead>
        <tr>
            <th>Estado</th>
            <th class="text-center">Tipo de item</th>
            <th>Titulo</th>
            <th>Ejemplar</th>
            <th>Usuario</th>
            <th>Personal Adm.</th>
            <th>Fecha de Prestamo</th>
            <th>Fecha de Devolución</th>
            <th>Lugar</th>
          </tr>
      </thead>
      <tbody>
    @foreach($pedidos as $pedido)
      @if($pedido->state == 2 || $pedido->state == 3)
      <!-- Obteniendo el tipo de item -->
        <?php switch ($pedido->typeItem) {case 1 : $tipo = "Libro"; break;case 2 : $tipo = "Tesis/Tesina"; break;case 3 :$tipo = "Revista";break;}?>
      <!-- fin-->
      <!-- Obteniendo el estado de item -->
        <?php switch ($pedido->state) {case 0 : $estado = "En espera"; break;case 1 : $estado = "Aceptado"; break;case 2 :$estado = "Rechazado";break;case 3 :$estado = "Entregado";break;}?>
      <!-- fin-->
      <!-- Obteniendo el usuario -->
      <?php  $user = App\User::find($pedido->id_user); ?>
      <tr>
        <?php if($pedido->typeItem==2){ $item=App\Thesis::find($pedido->id_item); }

              if($pedido->typeItem==1){ $item=App\Book::find($pedido->id_item); }

              if($pedido->typeItem==3){ $item=App\Magazine::find($pedido->id_item); }

              if($pedido->typeItem==4){ $item=App\Compendium::find($pedido->id_item); }
        ?>


        <td><span class="label @if($pedido->state==2) label-danger @else label-info @endif">{{$estado}}</span></td>
        <td class="text-center"><label class="label label-success">{{$tipo}}</label></td>
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
        <td>{{$pedido->startDate}}</td>
        <td>{{$pedido->endDate}}</td>
        <td class="text-center"><label class="label label-warning"><?php if($pedido->place==0) echo "Sala"; else echo "Domicilio"; ?></label></td>
      </tr>
      @endif
     @endforeach
      </tbody>
    </table>
  <div>
 </div>
</div>
