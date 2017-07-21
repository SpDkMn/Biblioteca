<div class="box box-success">
  <div class="box-header with-border"> 
    <h3 class="box-title">Editar</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>
  <!-- /.box-header -->
 

 <form action="{{ route('autor.update', $author->id) }}" method="POST">

 
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="box-body">

      <div class="form-group">
        <label for="name">Nombre </label>
        <input type="text" class="form-control" name="name" value="{{ $author->name }}">
      </div>
      <?php
      
      $id_1=$id_2=$id_3=$id_4=$id_5=$id_6=false;
      
       foreach($author->categories as $category){
          
            switch($category->name){
              case 'libro': $id_1=true;break;
              case 'revista':$id_2=true;break;
              case 'tesis/tesina': $id_3=true;break;
              case 'compendio': $id_4=true;break;
              case 'colaborador':$id_5=true;break;
              case 'asesor': $id_6=true;break;
            }
       }
       
       ?>   

      <div class="form-group">
        <label>Categoria</label>
      <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione la categoria" name="category[]" style="width: 100%;">
      @if($id_1)<option selected>libro</option>
      @else<option>libro</option>@endif
      
      @if($id_2)<option selected>revista</option>
      @else<option>revista</option>@endif

      @if($id_3)<option selected>tesis/tesina</option>
      @else<option>tesis/tesina</option>@endif

      @if($id_4)<option selected>compendio</option>
      @else<option>compendio</option>@endif

      @if($id_5)<option selected>colaborador</option>
      @else<option>colaborador</option>@endif

      @if($id_6)<option selected>asesor</option>
      @else<option>asesor</option>@endif

      </select>
        
      </div>
      <script> $(document).ready(function(){$('.select2').select2();}) </script>

    </div>
   
    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Editar</button>
    </div>
  </form>
  
</div>