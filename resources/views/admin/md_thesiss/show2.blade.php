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
        <h2 class="text-center"><strong>{{$thesis->title}}</strong><h2>
  </div>


<!--Esta es la parte de la editorial y los autores (Principal y secundario)-->
<div class="col-md-7">
     <div class="box-body">
        <!--    A u t o re s -->
        <strong>AUTOR PRINCIPAL</strong>
              <?php for($i=0;$i<26;$i++){echo "&nbsp";}?>:&nbsp
            <?php $cont=0; ?>
            @foreach($thesis->authors as $author)
              @if($author->pivot->type == true ||$author->pivot->type == true)
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
              <?php for($i=0;$i<14;$i++){echo "&nbsp";}?>:&nbsp
            <?php $cont=0; ?>
            @foreach($thesis->authors as $author)
              @if($author->pivot->type == false ||$author->pivot->type == true)
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
              <?php for($i=0;$i<22;$i++){echo "&nbsp";}?>:&nbsp
              @foreach($thesis->editorials as $editorial)
                  @if($editorial->pivot->type == false)
                  {{$editorial->name}}
                  @endif
                @endforeach 
      </div>

      <div class="box-body">
            <strong>ASESOR</strong>
              <?php $cont2=2; for($i=0;$i<26;$i++){echo "&nbsp";}?>:&nbsp
              {{$thesis->asesor}}
      </div>

      <div class="box-body">
            <strong>CLASIFICACIÓN</strong>
            <?php   for($i=0;$i<13;$i++){echo "&nbsp";}?>:&nbsp
            {{$thesis->clasification}}
      </div>

      <div class="box-body">
            <strong>EXTENSION</strong>
            <?php   for($i=0;$i<20;$i++){echo "&nbsp";}?>:&nbsp
            {{$thesis->extension}}
      </div>

      <div class="box-body">
            <strong>DIMENSIONES</strong>
            <?php   for($i=0;$i<15;$i++){echo "&nbsp";}?>:&nbsp
            {{$thesis->dimensions}}
      </div>

      <div class="box-body">
            <strong>DETALLES FISICOS</strong>
            <?php   for($i=0;$i<7;$i++){echo "&nbsp";}?>:&nbsp
            {{$thesis->physicalDetails}}
      </div>
      <div class="box-body">
            <strong>MATERIAL ADICIONAL</strong>
            <?php   for($i=0;$i<2;$i++){echo "&nbsp";}?>:&nbsp
            {{$thesis->accompaniment}}
      </div>
</div>  

<div class="col-md-5">
    <img src="{{URL::asset('img/tesis.jpg') }}" style="width:400px;">
</div>
</h1>
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
      		<th class="text-center">Editar</th>
      		<th class="text-center">Eliminar</th>
      	</tr>
        @foreach($thesis->thesisCopies as $copy)

      	<tr @if($copy->availability) class="success" @else class="danger" @endif>
      		
          <td>@if($copy->availability) Habilitado @else Prestado @endif</td>
          <td class="text-center">{{$copy->ejemplar}}</td>
          <td class="text-center">{{$copy->incomeNumber}}</td>
      	
        	<td class="text-center">{{$copy->barcode}} </td>

      
      		<td><center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalCopy<?php echo $copy->id; ?>"><i class="fa fa-tag"></i></button></center></td>
      		<td><center><a type="button" class="button-content btn btn-success"><i class="fa fa-pencil"></i></a></center></td>
 	        <td><center><a type="button" class="button-content btn btn-danger"><i class="fa fa-trash"></i></a></center></td>
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

<div class="col-md-6">
          <!-- DIRECT CHAT SUCCESS -->
        <div class="box box-success direct-chat direct-chat-success">
            <div class="box-header with-border">
              <h3 class="box-title text-center"><strong>Contenido</strong></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    
              </div>

            </div>
            <div class="box-body">
               <td >{{$thesis->conten}}
                </td>  
            </div>
        </div>
</div>


<div class="col-md-6">
          <!-- DIRECT CHAT SUCCESS -->
        <div class="box box-primary direct-chat">
            <div class="box-header with-border">
              <h3 class="box-title"><strong>Resumen</strong></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                  <i class="fa fa-comments"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    
              </div>

            </div>
            <div class="box-body">
               <td >
                 {{$thesis->summary}}
               </td>  
            </div>
        </div>
     </div>
    <!--Aqui termina el cuadro que contiene los contendos--> 
  </div>
</div>

@endsection

