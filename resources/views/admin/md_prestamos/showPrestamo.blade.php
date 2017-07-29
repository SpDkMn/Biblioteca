<?php 
$i=0;
$i++;
$thesiss = App\Thesis::all();
?>

<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Informacion de Tesis y Tesinas</h3>

    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div> 
  </div><br>

<?php if($i>1) echo "Pedido realizado exitosamente"; ?>
  <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive table-hover">
                <thead>
                 <tr class="text-center box-success" style="background:#C3CECE;">
                  <th class="text-center">PEDIR<h6></h6></th>
                  <th class="text-center">TIPO DE ÍTEM</th>
                  <th class="text-center">TÍTULO<h6></h6></th>
                  <th class="text-center">AUTOR <h6>(Principal: Casilla Roja)</h6></th>
                  <th class="text-center">ASESOR<h6></h6></th>                  
                  <th class="text-center">E. A. P.</th>
                 </tr>
                </thead>
                
                <tbody>
                @foreach($thesiss as $thesis)
                <tr>
                  
                    <!--ELIMINACION DE UNA TESIS MEDIANTE MODAL-->
                      <?php $i=0;
                          $deshabilitar=0;
                          foreach($thesis->thesisCopies as $copias){ 
                              if($copias->availability==1){
                                $i++;
                              }
                          } 
                          if($i<1) { $deshabilitar=1;}

                      ?>

                  <td><center><button type="button" class="btn btn-success" @if($deshabilitar==1) disabled @endif data-toggle="modal" data-target="#ModalCopy<?php echo $thesis->id; ?>"><i class="fa fa-shopping-cart"></i></button></center></td>


                      <div class="modal modal-default fade" id="ModalCopy<?php echo $thesis->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
                    
                         <div class="modal-dialog" role="document">
                           <div class="modal-content">
                             
                             <form method="POST" action="{{ url('/admin/prestamos')}}/{{$thesis->id}}">
                                 <input type="hidden" name="_method" value="put" />
                                      {{ csrf_field() }}
                               
                              <div class="modal-header" style="background:#DBEFF0">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>MATERIAL PEDIDO</strong></h3><h4 class="text-center"> {{ $thesis->title}}</h4>
                               </div>


                               <div class="modal-body">
                                   
                                  <p>Codigo del alumno &nbsp&nbsp&nbsp&nbsp
                                  <input type="text" placeholder="" name="codigo" required> </p>

                               </div>

                               <div class="modal-footer" style="background:#DBEFF0">
                                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Cancelar</button>
                                    <input type="submit" class="btn btn-primary" value="Pedir">

                               </div>

                             </form>
                           </div>
                        </div>
                      </div>
                  <!--FIN DE LA ELIMINACION DE UNA TESIS MEDIANTE MODAL-->
                  </td>


                  <td class="text-center">
                    {{$thesis->type}}
                  </td>
                  
                  <td>
                    <a href="{{url('admin/thesis/content')}}/{{$thesis->id}}">{{$thesis->title}}</a>
                  </td>

                  <td>
                      @foreach($thesis->authors as $author)
                        @if($author->pivot->type ==0)
                          <span class="label label-info">{{$author->name}}</span>     
                        @endif
                        @if($author->pivot->type ==1)
                            <span class="label label-danger">{{$author->name}}</span>
                        @endif
                      @endforeach
                  </td>

                  <td>
                        {{$thesis->asesor}}
                  </td>
                 
                  
                  <td class="text-center">
                     {{$thesis->escuela}}
                  </td>

       
      

          </tr>             
        @endforeach
      </tbody>               
    
      <thead>
                 <tr class="text-center box-success" style="background:#C3CECE;">
                  <th class="text-center">PEDIR</th>
                  <th class="text-center">TIPO DE ÍTEM</th>
                  <th class="text-center">TÍTULO</th>
                  <th class="text-center">AUTOR </th>
                  <th class="text-center">ASESOR</th>                  
                  <th class="text-center">E. A. P.</th>
                 </tr>
      </thead>
    </table>
  </div>
</div>

