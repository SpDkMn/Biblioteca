<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Editar</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div> 

 <form action="{{ route('autor.update', $author->id) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="box-body">
          <div class="form-group">
            <label for="name">Nombre </label>
            <input type="text" class="form-control" name="name" value="{{ $author->name }}">
          </div>
          <?php
          $id_1=$id_2=$id_3=$id_4=false;
           foreach($author->categories as $category){
                  switch($category->name){
                    case 'Libro': $id_1=true;break;
                    case 'Revista':$id_2=true;break;
                    case 'Tesis': $id_3=true;break;
                    case 'Compendio': $id_4=true;break;
                  }
              }
          ?>   
      <div class="form-group">
        <label>Categoria</label>
              <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione la categoria" name="category[]" style="width: 100%;">
                    @if($id_1)<option selected>Libro</option>
                    @else<option>Libro</option>@endif
                    
                    @if($id_2)<option selected>Revista</option>
                    @else<option>Revista</option>@endif

                    @if($id_3)<option selected>Tesis</option>
                    @else<option>Tesis</option>@endif

                    @if($id_4)<option selected>Compendio</option>
                    @else<option>Compendio</option>@endif
              </select>               
      </div>
    </div>
    <div class="box-footer">
         <button type="submit" class="btn btn-primary">Editar</button>
    </div>
  </form>
</div>