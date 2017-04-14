<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Informacion de Tesis y Tesinas</h3>

    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div> 
  </div>

  <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>TÍTULO</th>
                  <th>AUTOR</th>
                  <th>TIPO DE ÍTEM</th>
                  <th>Nº EJEMPLARES</th>
                  <th>EDITAR</th>
                  <th>ELIMINAR</th>
                </tr>
                </thead>
                
                <tbody>
                @foreach($thesiss as $thesis)
                <tr>
                  <td>
                    <a href="#" data-id="{{$thesis->id}}" id="contenid">{{$thesis->title}}</a>
                  </td>
                  <td>
                    <?php $cont=0; ?>
                        @foreach($thesis->authors as $author)
                          @if($author->pivot->type == true)
                          <?php $cont=$cont+1; ?>
                          @endif
                        @endforeach 
                        <?php $cont2=2; ?>
                        @foreach($thesis->authors as $author)
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
                  <?php if($thesis->category_id ==3) echo "Tesis";
                        else if ($thesis->category_id ==7) echo "Tesina";
                  ?>
                  
                  </td>
                <td>
                      <?php $cont=0 ?>
                      @foreach($thesis->thesisCopies as $copy)
                        <?php $cont=$cont+1; ?>
                      @endforeach
                      {{$cont}}
                </td>
                <td><a type="button" class="button-content btn btn-success"><i class="fa fa-pencil"></i></a></td>  
                <td><a type="button" class="button-content btn btn-danger"><i class="fa fa-trash"></i></a></td> 
              </tr>
               
               @endforeach
                </tbody>
                
              </table>
    </div>
</div>



@section('script')
  <script>
    $(document).ready(function(){
      $("#contenid").on('click',function(event){

        $id = $(this).data('id');
        $("#div-content").html('<div class="box box-warning box-solid"><div class="box-header with-border"><h3 class="box-title">Informacion de la tesis</h3><div class="box-tools pull-right"><button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button></div></div><div class="box-body"></div><div class="overlay"><i class="fa fa-refresh fa-spin"></i></div></div>')
       $("#div-content").load('{{ url("/admin/thesis/") }}/' + $id+'?page=1');
      })
    })
  </script>


@endsection
