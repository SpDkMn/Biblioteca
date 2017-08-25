
<div class="box box-warning">
  <div class="box-header with-border">
  <h2 class="all-tittles"><i class="fa fa-th-large"></i> Historial de Pedidos</h2>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse">
        <i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <hr>
  <div class="box-body">
    <table id="example1" class="table table-bordered table-hover">
       <thead>
        <tr>
            <th>Item</th>
            <th>Ejm</th>
            <th>Titulo</th>
            <th>Usuario</th>
            <th>Fecha pedido</th>
            <th>Prestamo</th>
        </tr>
      </thead>
     <tbody>
    @foreach($pedidos as $pedido)
      @if($pedido->state == 1)
      <tr>
        <td> {{$pedido->typeItem}} </td>
        <?php
              $tipo = null ;
              if($pedido->typeItem==2){ $tipo=App\Thesis::find($pedido->id_item);}
              if($pedido->typeItem==1){ $tipo=App\Book::find($pedido->id_item); }
              if($pedido->typeItem==3){ $tipo=App\Magazine::find($pedido->id_item); }
              if($pedido->typeItem==3){ $tipo=App\Compendium::find($pedido->id_item); }
              $user = App\User::find($pedido->id_user);
        ?>
        <td>{{$pedido->copy}}</td>

        <!--INICIO DEL MODAL DEL MATERIAL-->
        <td><a href="#" data-toggle="modal" data-target="#ModalCopy">{{$tipo->title}}</a></td>
          <div class="modal fade" id="ModalCopy" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <form>

                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>MATERIAL : </strong> {{$tipo->title}} </h3>
                   </div>

                   <div class="modal-body">
                       <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Ubicacion</strong><?php for($i=0;$i<18;$i++){echo "&nbsp";}?>:&nbsp{{ $tipo->libraryLocation }}</p>

                       <p><?php for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Clasificación</strong>
                            <?php
                            for($i=0;$i<12;$i++){echo "&nbsp";} echo ":";
                              if($pedido->typeItem==2)
                                foreach($tipo->thesisCopies as $copia){
                                  if($copia->copy == $pedido->copy) echo ($copia->clasification); }
                              if($pedido->typeItem==1){
                                foreach($tipo->bookCopies as $copia){
                                  if($copia->copy == $pedido->copy) echo ($copia->clasification); } }
                              if($pedido->typeItem==3)
                                foreach($tipo->magazines_copies as $copia){
                                  if($copia->copy == $pedido->copy) echo ($copia->numero); }
                            ?>
                        </p>
                        <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Codigo de Barras</strong>
                          <?php
                            for($i=0;$i<4;$i++){echo "&nbsp";} echo ":";
                              if($pedido->typeItem==2)
                                foreach($tipo->thesisCopies as $copia){
                                  if($copia->copy == $pedido->copy) echo ($copia->barcode); }
                              if($pedido->typeItem==1){
                                foreach($tipo->bookCopies as $copia){
                                  if($copia->copy == $pedido->copy) echo ($copia->barcode); } }
                              if($pedido->typeItem==3)
                                foreach($tipo->magazines_copies as $copia){
                                  if($copia->copy == $pedido->copy) echo ($copia->barcode); }
                            ?>
                        </p>

                        <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Número de Ingreso</strong>          <?php
                            for($i=0;$i<2;$i++){echo "&nbsp";} echo ":";

                              if($pedido->typeItem==2)
                                foreach($tipo->thesisCopies as $copia){
                                  if($copia->copy == $pedido->copy) echo ($copia->incomeNumber); }
                              if($pedido->typeItem==1){
                                foreach($tipo->bookCopies as $copia){
                                  if($copia->copy == $pedido->copy) echo ($copia->incomeNumber); } }

                              if($pedido->typeItem==3)
                                foreach($tipo->magazines_copies as $copia){
                                  if($copia->copy == $pedido->copy) echo ($copia->incomeNumber); }

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
                       <p><?php    for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Ejemplar</strong><?php for($i=0;$i<20;$i++){echo "&nbsp";}?>:&nbsp {{$pedido->copy}} </p>

                   </div>
                 </form>
               </div>
            </div>
          </div>


        <td>{{$user->name}}</td>


        <td>{{$pedido->startDate}}</td>
        <td><?php if($pedido->place==0) echo "Sala"; else echo "Domicilio"; ?></td>
      </tr>
      @endif
    @endforeach
    </tbody>
  </table>
</div>
</div>
