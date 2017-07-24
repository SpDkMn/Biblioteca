<div class="box box-warning collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">Informacion de Libros</h3>

    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div> 
  </div>

  <div class="box-body table-responsive">
     
    <table id="bookTable" class="table table-bordered table-striped">
        <tr>
          <th>Titulo</th>
          <th>Autor</th>
          <th>Editorial</th>
          <th>Nº ejemplares</th>
          <th>Clasificacion</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>    
      @foreach($books as $book)
        <tr>
          <td>
            
            <a href="#" data-id="{{$book->id}}" class="contenido">{{$book->title}}</a>


          </td>
          <td>
            <?php $cont=0; ?>
            @foreach($book->authors as $author)
              @if($author->pivot->type == true)
              <?php $cont=$cont+1; ?>
              @endif
            @endforeach 
            <?php $cont2=2; ?>
            @foreach($book->authors as $author)
              @if($author->pivot->type == true)
              {{$author->name}}
                @if($cont2<=$cont)
                ,
                @endif
              @endif
              <?php $cont2=$cont2+1; ?>
            @endforeach   
          </td> 
          <td>
            @foreach($book->editorials as $editorial)
              @if($editorial->pivot->type == true)
                {{$editorial->name}}
              @endif
            @endforeach
          </td>
          
        <td>
          <?php $cont=0 ?>
          @foreach($book->bookCopies as $copy)
            <?php $cont=$cont+1; ?>
          @endforeach
          {{$cont}}
        </td>
        <td>{{$book->clasification}}</td>
        <td><a type="button" data-id="{{$book->id}}" class="button-content btn btn-success editar"><i class="fa fa-pencil"></i></a></td>
        

        <!--ELIMINACION DE UNA TESIS MEDIANTE MODAL-->

          <td><center><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#ModalCopy<?php echo $book->id; ?>"><i class="fa fa-trash"></i></button></center></td>


          <div class="modal modal-danger fade" id="ModalCopy<?php echo $book->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
        
             <div class="modal-dialog" role="document">
               <div class="modal-content">
                 <form>
                   
                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>MATERIAL :</strong> {{ $book->title}}</h3>
                   </div>


                   <div class="modal-body">
                       <p class="text-center"><strong>¿ Desea eliminar dicha libro ?</strong></p>
                   </div>

                   <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                        <a href="{{route('book.destroy',$book->id)}}" type="button" class="btn btn-outline">Eliminar</a>
                   </div>
                 </form>
               </div>
            </div>
          </div>
      <!--FIN DE LA ELIMINACION DE UNA TESIS MEDIANTE MODAL-->








        
      </tr>
      @endforeach
      
    </table>      
  </div>
</div>

  <script>
    $(document).ready(function() {
      $(".editar").on('click',function(event){
        $id = $(this).data('id')
         $("#div-new").html('<div class="box box-success box-solid"><div class="box-header with-border"><h3 class="box-title">Editar</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
         $("#div-new").load('{{ url("/admin/book/") }}/' + $id + '/edit'); 
      });
    });
  </script>




  <script>
    $(document).ready(function(){
      $(".contenido").on('click',function(event){
        
        $id = $(this).data('id');
        $("#div-new").html('<div class="box box-warning box-solid"><div class="box-header with-border"><h3 class="box-title">Cargando</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
       $("#div-new").load('{{ url("/admin/book/") }}/' + $id+'/show2');
      })
    })
  </script>