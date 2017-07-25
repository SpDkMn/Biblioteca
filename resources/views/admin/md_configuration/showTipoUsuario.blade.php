<div class="box box-warning collapsed-box">
  <div class="box-header with-border">
    <h3 class="box-title">Configruacion de tipos de usuario</h3>

    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div> 
  </div>

  <div class="box-body table-responsive">
     
    <table id="tipoUsuarioTable" class="table table-bordered table-striped">
        <thead>
          <tr>
          <th>-</th>
          <th>Prestamo Sala</th>
          <th>Prestamo Domicilio</th>
          <th>Castigo</th>
          <th>Tiempo Prestamo</th>
          <th>Cantidad Sala</th>
          <th>Cantidad Domicilio</th>
          <th>Editar</th>
        </tr>    
        </thead>
        <tbody>
          @foreach($userTypes as $type)
            @if($type->name != 'Admin')
              <tr>
                <th>{{$type->name}}</th>
                <td style="text-align: center">
                    <input type="checkbox" class="custom-control-input" @if($type->prestamoSala) checked @endif >
                </td>
                <td style="text-align: center">
                    <input type="checkbox" class="custom-control-input" @if($type->prestamoSala) checked @endif >     
                </td>
                <td style="text-align: center">
                    <input type="checkbox" class="custom-control-input" @if($type->prestamoSala) checked @endif >            
                </td>
                <td>{{$type->tiempoDomicilio}}</td>
                <td>{{$type->cantidadSala}}</td>
                <td>{{$type->cantidadDomicilio}}</td>
                <td><a type="button" class="button-content btn btn-success"><i class="fa fa-pencil"></i></a></td>
              </tr>
            @endif
          @endforeach
        </tbody>
        


    </table>      
  </div>
</div>




  