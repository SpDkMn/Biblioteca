  <div class="box box-warning">
    <div class="box-header with-border">
      <h3 class="box-title">Configuracion de tipos de usuario</h3>

      <div class="box-tools pull-right"> 
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div> 
    </div>

    <form method="POST" action="{{ url('/admin/userTypes')}}">
     {{ csrf_field() }}

    <div class="box-body table-responsive">
       
      <table id="tipoUsuarioTable" class="table table-bordered table-striped">
          <thead>
            <tr>
            <th style="text-align: center">Tipo de Usuario</th>
            <th style="text-align: center">Prestamo Sala</th>
            <th style="text-align: center">Prestamo Domicilio</th>
            <th style="text-align: center">Castigo</th>
            <th style="text-align: center">Tiempo Prestamo</th>
            <th style="text-align: center">Cantidad Sala</th>
            <th style="text-align: center">Cantidad Domicilio</th>
          </tr>    
          </thead>
          <tbody>
          <?php $cont=0;?>
            @foreach($userTypes as $type)
              @if($type->name != 'Admin')
              
                <tr>
                  <th>{{$type->name}}</th>
                  <td style="text-align: center">
                      <input type="checkbox" id="pSala{{$cont}}" class="custom-control-input" name="pSala" onclick="Habilitar()" @if($type->prestamoSala) checked @endif >
                  </td>
                  <td style="text-align: center">
                      <input type="checkbox" id="pDomicilio{{$cont}}" class="custom-control-input" name="pDomicilio" onclick="Habilitar()" @if($type->prestamoDomicilio) checked @endif >     
                  </td>
                  <td style="text-align: center">
                      <input type="checkbox" id="castigado{{$cont}}" class="custom-control-input" name="castigado" onclick="Habilitar()" @if($type->castigado) checked @endif >            
                  </td>
                  <td style="text-align: center"><input id="tPrestamo{{$cont}}" type="text" name="tPrestamo" value="{{$type->tiempoDomicilio}}" class="tableConfig" @if(!$type->prestamoDomicilio) disabled @endif></td>
                  <td style="text-align: center"><input id="cSala{{$cont}}" type="text" name="cSala" value="{{$type->cantidadSala}}" class="tableConfig" @if(!$type->prestamoSala) disabled @endif></td>
                  <td style="text-align: center"><input id="cDomicilio{{$cont}}" type="text" name="cDomicilio" value="{{$type->cantidadDomicilio}}" class="tableConfig" @if(!$type->prestamoDomicilio) disabled @endif></ins></td>
                </tr>

                <?php $cont++; ?>
              @endif
            @endforeach
          </tbody>
          
      </table>  

      <button type="submit" class="btn btn-success" id="newFeriado" onclick="Boton()">Guardar</button>

    </div>

    </form>
  </div>
 

<script type="text/javascript">
    function Habilitar(){
      
      var pSala = document.getElementsByName("pSala");
      var pDomicilio = document.getElementsByName("pDomicilio");
      var cSala = document.getElementsByName('cSala');
      var cDomicilio = document.getElementsByName('cDomicilio');
      var tPrestamo = document.getElementsByName('tPrestamo');


      for(i=0;i<pSala.length;i++){
        if(pSala[i].checked){
          cSala[i].disabled = false;
        }else{
          cSala[i].value =" ";
          cSala[i].disabled = true;
        }
      }

      for(i=0;i<pDomicilio.length;i++){
        if(pDomicilio[i].checked){
          tPrestamo.disabled = false;
          cDomicilio.disabled = false;
        }else{
          tPrestamo[i].value = " ";
          tPrestamo[i].disabled =true;
          cDomicilio[i].value = " ";
          cDomicilio[i].disabled = true;
        }
      } 

    }
</script> 

<script type="text/javascript">
  function Boton(){

   // $("#pSala0").attr('name','pSala[0]')
    

    var cont = document.getElementsByName("pSala");

    var aux = cont.length;

    for(i=0;i<aux;i++){

      var idPSala = "#pSala".concat(i);
      var namePSala = 'pSala['.concat(i);
      namePSala = namePSala.concat(']');
      $(idPSala).attr('name',namePSala);

      var idPDomicilio = "#pDomicilio".concat(i);
      var namePDomicilio = 'pDomicilio['.concat(i);
      namePDomicilio = namePDomicilio.concat(']');
      $(idPDomicilio).attr('name',namePDomicilio);

      var idCSala0 = "cSala".concat(i);
      var idCSala = "#cSala".concat(i);
      var nameCSala = 'cSala['.concat(i);
      nameCSala = nameCSala.concat(']');
      $(idCSala).attr('name',nameCSala);
      document.getElementById(idCSala0).disabled = false;

      var idCDomicilio0 = "cDomicilio".concat(i);
      var idCDomicilio = "#cDomicilio".concat(i);
      var nameCDomicilio = 'cDomicilio['.concat(i);
      nameCDomicilio = nameCDomicilio.concat(']');
      $(idCDomicilio).attr('name',nameCDomicilio);
      document.getElementById(idCDomicilio0).disabled = false;

      var idCastigado = "#castigado".concat(i);
      var nameCastigado = 'castigado['.concat(i);
      nameCastigado = nameCastigado.concat(']');
      $(idCastigado).attr('name',nameCastigado);

      var idTPrestamo0 = "tPrestamo".concat(i);
      var idTPrestamo = "#tPrestamo".concat(i);
      var nameTPrestamo = 'tPrestamo['.concat(i);
      nameTPrestamo = nameTPrestamo.concat(']');
      $(idTPrestamo).attr('name',nameTPrestamo);
      document.getElementById(idTPrestamo0).disabled = false;
    }

  }
</script>



  