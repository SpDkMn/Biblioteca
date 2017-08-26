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
    <table id="tablePedido" class="table table-bordered table-hover">
       <thead>
        <tr>
            <th>Estado</th>
            <th>Tipo de Item</th>
            <th>Ejemplar</th>
            <th>Titulo</th>
            <th>Usuario</th>
            <th>Fecha pedido</th>
            <th>Prestamo</th>
            <th>Prestar</th>
        </tr>
      </thead>
     <tbody>
    @foreach($pedidos as $pedido)
      @if($pedido->state==0)
      <!-- Obteniendo el estado -->
        <?php switch ($pedido->state) {case 0 : $estado = "En espera"; break;case 1 : $estado = "Aceptado"; break;case 2 :$estado = "Rechazado";break;}?>
      <!-- fin-->
      <tr>
        <td class="text-center"><label class="label label-info">{{$estado}}</label></td>
        <td class="text-center">
          <?php
          switch ($pedido->typeItem) {
            case 1: echo "Libro";  break;
            case 2: echo "Thesis"; break;
            case 3: echo "Revista";break;
          }?>
        </td class="text-center">
        <?php
              $item = null ;
              if($pedido->typeItem==2){ $item=App\Thesis::find($pedido->id_item);}
              if($pedido->typeItem==1){ $item=App\Book::find($pedido->id_item); }
              if($pedido->typeItem==3){ $item=App\Magazine::find($pedido->id_item); }
              if($pedido->typeItem==3){ $item=App\Compendium::find($pedido->id_item); }
              $user = App\User::find($pedido->id_user);
        ?>
        <td class="text-center">{{$pedido->copy}}</td>
        <!--INICIO DEL MODAL DEL MATERIAL-->
        <td class="text-center"><a href="#" data-toggle="modal" data-target="#ModalCopy">{{$item->title}}</a></td>
        <div class="modal fade" id="ModalCopy" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
                <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                      <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>MATERIAL : </strong> {{$item->title}} </h3>
                 </div>

                 <div class="modal-body">
                     <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Ubicacion</strong><?php for($i=0;$i<18;$i++){echo "&nbsp";}?>:&nbsp{{ $item->libraryLocation }}</p>

                     <p><?php for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Clasificación</strong>
                          <?php
                          for($i=0;$i<12;$i++){echo "&nbsp";} echo ":";
                            if($pedido->typeItem==2)
                              foreach($item->thesisCopies as $copia){
                                if($copia->copy == $pedido->copy) echo ($copia->clasification); }
                            if($pedido->typeItem==1){
                              foreach($item->bookCopies as $copia){
                                if($copia->copy == $pedido->copy) echo ($copia->clasification); } }
                            if($pedido->typeItem==3)
                              foreach($item->magazines_copies as $copia){
                                if($copia->copy == $pedido->copy) echo ($copia->numero); }
                          ?>
                      </p>
                      <p><?php  for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Codigo de Barras</strong>
                        <?php
                          for($i=0;$i<4;$i++){echo "&nbsp";} echo ":";
                            if($pedido->typeItem==2)
                              foreach($item->thesisCopies as $copia){
                                if($copia->copy == $pedido->copy) echo ($copia->barcode); }
                            if($pedido->typeItem==1){
                              foreach($item->bookCopies as $copia){
                                if($copia->copy == $pedido->copy) echo ($copia->barcode); } }
                            if($pedido->typeItem==3)
                              foreach($item->magazines_copies as $copia){
                                if($copia->copy == $pedido->copy) echo ($copia->barcode); }
                          ?>
                      </p>

                      <p><strong>Número de Ingreso</strong>          <?php
                          for($i=0;$i<2;$i++){echo "&nbsp";} echo ":";

                            if($pedido->typeItem==2)
                              foreach($item->thesisCopies as $copia){
                                if($copia->copy == $pedido->copy) echo ($copia->incomeNumber); }
                            if($pedido->typeItem==1){
                              foreach($item->bookCopies as $copia){
                                if($copia->copy == $pedido->copy) echo ($copia->incomeNumber); } }

                            if($pedido->typeItem==3)
                              foreach($item->magazines_copies as $copia){
                                if($copia->copy == $pedido->copy) echo ($copia->incomeNumber); }

                       ?>
                      </p>
                     <p><?phpfor($i=0;$i<36;$i++){echo "&nbsp";} ?> <strong>Autores</strong>
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
                     <p><?php    for($i=0;$i<36;$i++){echo "&nbsp";}?> <strong>Ejemplar</strong><?php for($i=0;$i<20;$i++){echo "&nbsp";}?>:&nbsp {{$pedido->copy}} </p>
                 </div>
             </div>
          </div>
        </div>
        <td class="text-center"><span>{{$user->name}}</span></td>
        <td class="text-center">{{$pedido->startDate}}</td>
        <td class="text-center">@if($pedido->place==0){{"Sala"}}@else{{"Domicilio"}}@endif</td>
        <td>
          <form method="POST"  action="{{ url('/admin/prestamos/prestar') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$pedido->id}}">
            <button type="submit" name="prestar" class="btn btn-info" >Prestar</button>
          </form>
        </td>
      </tr>
      @endif
    @endforeach
    </tbody>
  </table>
</div>
</div>
