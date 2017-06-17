@extends('admin.layouts.main')
@section('content')

<div class="box box-warning">
  <div class="box-header with-border">
    <h3 class="box-title">Información de Tesis y Tesinas</h3>
    <div class="box-tools pull-right"> 
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div> 
  

 


    <div class="box-body with-border">
          
          <h2><strong><?php for($i=0;$i<26;$i++){echo "&nbsp";}?>&nbsp {{ $thesis->title }}</strong><h2>
    </div>

    <!--Esta es la parte de la editorial y los autores (Principal y secundario)-->
    <div class="col-md-7">
         
      <div class="box box-info box-solid">


         <div class="box-body">
          <!--    A u t o re s -->
              <strong>AUTOR PRINCIPAL</strong>
                  <?php for($i=0;$i<18;$i++){echo "&nbsp";}?>:&nbsp
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
          
         </div>

         <div class="box-body">
          <!--    A u t o re s -->
            <strong>AUTORES SECUNDARIOS</strong>
                    <?php for($i=0;$i<4;$i++){echo "&nbsp";}?>:&nbsp
                  <?php $cont=0; ?>
                  @foreach($thesis->authors as $author)
                    @if($author->pivot->type == false)
                    <?php $cont=$cont+1; ?>
                    @endif
                  @endforeach 
                  <?php $cont2=2; ?>
                  @foreach($thesis->authors as $author)
                    @if($author->pivot->type == false)
                    {{$author->name}}
                      @if($cont2<=$cont)
                      ,
                      @endif
                    @endif
                    <?php $cont2=$cont2+1; ?>
                  @endforeach  
                
          </div>

        <div class="box-body">
              <strong>EDITORIAL</strong>                
                <?php for($i=0;$i<32;$i++){echo "&nbsp";}?>:&nbsp
                @foreach($thesis->editorials as $editorial)
                    @if($editorial->pivot->type == false)
                    {{$editorial->name}}
                    @endif
                  @endforeach 
        </div>

        <div class="box-body">
              <strong>ASESOR</strong>
                <?php $cont2=2; for($i=0;$i<37;$i++){echo "&nbsp";}?>:&nbsp
                {{$thesis->asesor}}
        </div>

        <div class="box-body">
              <strong>CLASIFICACIÓN</strong>
              <?php   for($i=0;$i<23;$i++){echo "&nbsp";}?>:&nbsp
              {{$thesis->clasification}}
        </div><br><br>



        <div class="box-body">
              <strong>CONTENIDO </strong><br>
              <?php   for($i=0;$i<2;$i++){echo "&nbsp";}?>&nbsp
              {{$thesis->conten}}
        </div><br><br>
        <div class="box-body">
              <strong>RESUMEN </strong><br>
              <?php   for($i=0;$i<2;$i++){echo "&nbsp";}?>&nbsp
              {{$thesis->summary}}
        </div><br>

        <div class="box-body">
              <strong>CONCLUSIONES Y RECOMENDACIONES </strong><br>
              <?php   for($i=0;$i<2;$i++){echo "&nbsp";}?>&nbsp
              {{$thesis->recomendacion}}
        </div><br>
        
        <div class="box-body">
              <strong>BIBLIOGRAFÍA </strong><br>
              <?php   for($i=0; $i < 2;$i++){echo "&nbsp";}?>&nbsp
                {{$thesis->bibliografia}}
        </div><br>



    </div>


</div>  
<!--
<div class="col-md-5">
    <img src="{{URL::asset('img/tesis.jpg') }}" style="width:400px;">
</div>
</h1>
-->

    <div class="col-md-5">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-red" style="background: url('../dist/img/photo1.png') center center;" style=" height: 50%;">
              <h3 class="widget-user-username">{{$thesis->title}}</h3> 
              <h5 class="widget-user-desc"><strong>{{$thesis->type}}</strong></h5>
            </div>
            <div class="widget-user-image"><br>
              <img class="img-circle" src="{{URL::asset('img/tesis.jpg') }}" style="height:80px;" alt="User Avatar">
            </div><br>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 border-left">
                  <div class="description-block">
                    <h5 class="description-header">EXTENSIÓN</h5>
                    <span class="description-text">{{$thesis->extension}}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
 
                <div class="col-sm-6 border-right">
                  <div class="description-block">
                    <h5 class="description-header">DIMENSIONES</h5>
                    {{$thesis->dimensions}}
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->  

              </div>
              <!-- /.row -->
              </div>

            <div>
              <div class="row">
                <div class="col-sm-12 border-right">
                  <div>
                    <h5 class="description-header"><strong>DETALLES FÍSICOS</strong></h5>
                    <div class="description-text">{{$thesis->physicalDetails}}</div>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>
            </div><br>

            <div>
              <div class="row">
                <div class="col-sm-12 border-center">
                  <div>
                    <h5 class="description-header"><strong>MATERIAL ADICIONAL</strong></h5>
                    <span class="description-text">{{$thesis->accompaniment}}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
              </div>


            </div>
            <br><br>
          </div>
        </div>




  <!--Aqui termina la parte de los autores y editoriales-->    



  <div class="box-body table-bordered table-responsive table-hover col-md-12">
  	<h4><strong>Ejemplares</strong></h4><br>
      <table class="table table-striped table-bordered table-hover table-condensed">
      	<tr class="bg-gray">
          <th>Condición</th>
          <th class="text-center">Ejemplar</th>
          <th class="text-center">Número de Ingreso</th>
          <th class="text-center">Código de Barras</th>
      		<th class="text-center">Detalles</th>
      <!--		<th class="text-center">Editar</th>
      		<th class="text-center">Eliminar</th>     -->
      	</tr>
        @foreach($thesis->thesisCopies as $copy)

      	<tr @if($copy->availability) class="success" @else class="danger" @endif>
      		
          <td>@if($copy->availability) Habilitado @else Prestado @endif</td>
          <td class="text-center">{{$copy->ejemplar}}</td>
          <td class="text-center">{{$copy->incomeNumber}}</td>
      	
        	<td class="text-center">{{$copy->barcode}} </td>

      
      		<td><center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalCopy<?php echo $copy->id; ?>"><i class="fa fa-tag"></i></button></center></td>
     <!-- <td><center><a type="button" class="button-content btn btn-success"><i class="fa fa-pencil"></i></a></center></td>
 	        <td><center><a type="button" class="button-content btn btn-danger"><i class="fa fa-trash"></i></a></center></td> -->
      	</tr>
      	<!-- MODAL DEL EJEMPLAR -->
      	<div class="modal fade" id="ModalCopy<?php echo $copy->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">
        
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <form>
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	            <h3 class="modal-title text-center text-font-size" id="ModalCopyLabel"><strong>EJEMPLAR&nbsp<?php echo $copy->ejemplar; ?></strong></h3>
                </div>
                <div class="modal-body">
                	
                	<div>
                		
  	              	@if($copy->incomeNumber)
  	              	<p>&nbsp&nbsp&nbspNumero de Ingreso
  					       <?php  	for($i=0;$i<60;$i++){echo "&nbsp";}?>:&nbsp
  	              	{{$copy->incomeNumber}}</p>
  	              	@endif

                	</div>
                	<div>
                		
  	              	@if($copy->barcode!="")
  	          		<p>&nbsp&nbsp&nbspCódigo de Barras
  					       <?php  	for($i=0;$i<65;$i++){echo "&nbsp";}?>:&nbsp
  	              	{{$copy->barcode}}</p>
  	              	@endif
  	              	
  	              	<p>&nbsp&nbsp&nbspEstado
  					         <?php  	for($i=0;$i<85;$i++){echo "&nbsp";}?>:&nbsp
  	              	  @if($copy->availability==1) Habilitado @endif
                      @if($copy->availability==0) Deshabilitado  @endif
                    </p>
  	              	</div>    	     	
                </div>
              
             </div>
              </div>
        </div>
        <!-- Fin Modal Ejemplar -->
      	@endforeach
      </table>
     </div>
     

<!--Aqui va a ir a parte del contenido y resumen  -->

    
  </div>
  <br><br><br>
</div>

@endsection

