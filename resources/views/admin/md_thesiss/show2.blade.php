@extends('admin.layouts.main') @section('content')

<div class="box box-warning">
	<div class="box-header with-border">
		<h3 class="box-title">Información de Tesis y Tesinas</h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse">
				<i class="fa fa-minus"></i>
			</button>
		</div>




		<div class="box-body with-border">
			<h2>
				<strong> TÍTULO: &nbsp {{ $thesis->title }}</strong>
				<h2>
		
		</div>

		<!--Esta es la parte de la editorial y los autores (Principal y secundario)-->




		<div
			class="box-body table-bordered table-responsive table-hover col-md-12">
			<h4>
				<strong>Ejemplares</strong>
			</h4>
			<br>
			<table
				class="table table-striped table-bordered table-hover table-condensed">
				<tr class="bg-gray">
					<th>Condición</th>
					<th class="text-center">Ejemplar</th>
					<th class="text-center">Número de Ingreso</th>
					<th class="text-center">Código de Barras</th>
					<th class="text-center">Detalles</th>
					<!--    <th class="text-center">Editar</th>
          <th class="text-center">Eliminar</th>     -->
				</tr>
				@foreach($thesis->thesisCopies as $copy)

				<tr @if($copy->
					availability) class="success" @else class="danger" @endif>

					<td>@if($copy->availability) Habilitado @else Prestado @endif</td>
					<td class="text-center">{{$copy->ejemplar}}</td>
					<td class="text-center">{{$copy->incomeNumber}}</td>

					<td class="text-center">{{$copy->barcode}}</td>


					<td><center>
							<button type="button" class="btn btn-info" data-toggle="modal"
								data-target="#ModalCopy<?php echo $copy->id; ?>">
								<i class="fa fa-tag"></i>
							</button>
						</center></td>
					<!-- <td><center><a type="button" class="button-content btn btn-success"><i class="fa fa-pencil"></i></a></center></td>
          <td><center><a type="button" class="button-content btn btn-danger"><i class="fa fa-trash"></i></a></center></td> -->
				</tr>
				<!-- MODAL DEL EJEMPLAR -->
				<div class="modal fade" id="ModalCopy<?php echo $copy->id; ?>"
					tabindex="-1" role="dialog" aria-labelledby="ModalCopyLabel">

					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form>
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"
										aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									<br>
									<h3 class="modal-title text-center text-font-size"
										id="ModalCopyLabel">
										<strong>EJEMPLAR&nbsp<?php echo $copy->ejemplar; ?></strong>
									</h3>
								</div>
								<div class="modal-body">

									<div>

										@if($copy->incomeNumber)
										<p>
											&nbsp&nbsp&nbsp<strong>Numero de Ingreso</strong>
                   <?php    for($i=0;$i<45;$i++){echo "&nbsp";}?>:&nbsp
                    {{$copy->incomeNumber}}</p>
										@endif

									</div>
									<div>

										@if($copy->barcode!="")
										<p>
											&nbsp&nbsp&nbsp<strong>Código de Barras</strong>
                   <?php    for($i=0;$i<48;$i++){echo "&nbsp";}?>:&nbsp
                    {{$copy->barcode}}</p>
										@endif

										<p>
											&nbsp&nbsp&nbsp<strong>Estado</strong>
                     <?php    for($i=0;$i<67;$i++){echo "&nbsp";}?>:&nbsp
                      @if($copy->availability==1) Habilitado @endif
                      @if($copy->availability==0) Deshabilitado  @endif
                    </p>
									</div>
									<br>
									<br>
								</div>
						
						</div>
					</div>
				</div>
				<!-- Fin Modal Ejemplar -->
				@endforeach
			</table>
			<br>
			<br>
		</div>






		<div class="box-body with-border">
			<h4>
				<strong> Información del material</strong>
				<h4>
		
		</div>

		<div class="col-md-6">

			<div class="box box-info box-solid">


				<div class="box-body">
					<br>
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
                    <?php for($i=0;$i<6;$i++){echo "&nbsp";}?>:&nbsp
                  <?php $cont=0; ?>
                  @foreach($thesis->authors as $author)
                    @if($author->pivot->type == false)
                       <?php $cont=$cont+1; ?>
                    @endif
                  @endforeach 

                @if($cont>0) 
                  <?php $cont2=1; ?>
                  @foreach($thesis->authors as $author)
                    @if($author->pivot->type == false)
                      {{$author->name}}
                          @if($cont2<=$cont)
                          ,
                          @endif
                    @endif
                    <?php $cont2=$cont2+1; ?>
                  @endforeach  
                @else - - - - - - - - - 
                @endif
                
          </div>

				<div class="box-body">
					<strong>EDITORIAL</strong>                
                <?php for($i=0;$i<30;$i++){echo "&nbsp";}?>:&nbsp
                @foreach($thesis->editorials as $editorial)
                    @if($editorial->pivot->type == false)
                    {{$editorial->name}}
                    @endif
                  @endforeach 
        </div>

				<div class="box-body">
					<strong>ASESOR</strong>
                <?php $cont2=2; for($i=0;$i<34;$i++){echo "&nbsp";}?>:&nbsp
                {{$thesis->asesor}}
        </div>

				<div class="box-body">
					<strong>CLASIFICACIÓN</strong>
              <?php   for($i=0;$i<21;$i++){echo "&nbsp";}?>:&nbsp
              {{$thesis->clasification}}
        </div>
				<br>
				<br>


				<div class="box-body">
					<strong>CONTENIDO </strong><br>
              <?php   for($i=0;$i<2;$i++){echo "&nbsp";}?>&nbsp
              {{$thesis->conten}}
        </div>
				<br>
				<br>
				<div class="box-body">
					<strong>RESUMEN </strong><br>
              <?php   for($i=0;$i<2;$i++){echo "&nbsp";}?>&nbsp
              {{$thesis->summary}}
        </div>
				<br>


				<div class="box-body">
					<strong>BIBLIOGRAFÍA </strong><br>
              <?php   for($i=0; $i < 2;$i++){echo "&nbsp";}?>&nbsp
                {{$thesis->bibliografia}}
        </div>
				<br>

			</div>

		</div>
		<!--
<div class="col-md-5">
    <img src="{{URL::asset('img/tesis.jpg') }}" style="width:400px;">
</div>
</h1>
-->



		<div class="col-md-6">

			<div class="box box-info box-solid">
				<br>

				<div class="box-body">
					<strong>DETALLES FÍSICOS </strong><br>
              <?php   for($i=0;$i<6;$i++){echo "&nbsp";}?>&nbsp
              {{$thesis->physicalDetails}}
        </div>
				<br>
				<div class="box-body">
					<strong>MATERIAL ADICIONAL </strong><br>
              <?php   for($i=0;$i<2;$i++){echo "&nbsp";}?>&nbsp
              {{$thesis->accompaniment}}
        </div>
				<br>

				<div class="box-body">
					<strong>CONCLUSIONES Y RECOMENDACIONES </strong><br>
              <?php   for($i=0;$i<2;$i++){echo "&nbsp";}?>&nbsp
              {{$thesis->recomendacion}}
        </div>
				<br>

				<div class="box-body">
					<strong>EXTENSIÓN</strong>
                <?php $cont2=2; for($i=0;$i<37;$i++){echo "&nbsp";}?>:&nbsp
                {{$thesis->extension}}
        </div>

				<div class="box-body">
					<strong>DIMENSIONES</strong>
              <?php   for($i=0;$i<23;$i++){echo "&nbsp";}?>:&nbsp
              {{$thesis->dimensions}}
        </div>
				<br>
				<br>
				<br>
				<br>


				<center>
					<img src="{{URL::asset('img/tesis.jpg') }}" style="width: 200px;">
				</center>
				<br>
				<br>
				<br> <br>

			</div>

		</div>




	</div>




	<!--Aqui termina la parte de los autores y editoriales-->






	<!--Aqui va a ir a parte del contenido y resumen  -->


</div>
<br>
<br>
<br>
</div>

@endsection

