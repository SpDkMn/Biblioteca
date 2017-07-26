@extends('admin.layouts.main') @section('content')
<!-- Font Awesome -->

<style type="text/css">
#cuadro_actualizar_noticia {
	padding-top: 15px; //
	background-color: yellow;
}

#boton_crear_noticia {
	margin-top: 8px;
}

#titulo_muestra_noticia {
	margin-top: 0px;
	margin-bottom: 20px;
	margin-left: 35%;
}

#titulo_actualizar_noticia, #titulo_noticia { //
	background-color: red;
	text-align: center;
}

#titulo_noticia {
	margin-top: 7px;
}
</style>
<script type="text/javascript">
      function tipo_visualizacion(){
        
        document.getElementById('titulo_noticia').innerHTML = document.getElementById('titulo').value;
        var url_imagen=document.getElementById('urlImg').value;
         if(url_imagen!=""){
         if(document.getElementById('localizacion').value=="arriba")
         {
            document.getElementById('imagen_noticia_arriba').setAttribute("src","/imgNoticias/"+url_imagen);
            document.getElementById('imagen_noticia_arriba').setAttribute("class","img-responsive");
         }   
         if(document.getElementById('localizacion').value=="arriba_izquierda")
         {
            document.getElementById('imagen_noticia_arriba_izquierda').setAttribute("src","/imgNoticias/"+url_imagen);
            document.getElementById('imagen_noticia_arriba_izquierda').setAttribute("class","img-responsive");
         }
         if(document.getElementById('localizacion').value=="arriba_derecha")
         {
           document.getElementById('imagen_noticia_arriba_izquierda').setAttribute("src","/imgNoticias/"+url_imagen);
            document.getElementById('imagen_noticia_arriba_izquierda').setAttribute("class","img-responsive");
            document.getElementById('imagen_noticia_arriba_izquierda').setAttribute("style","width: 190px; height: 190px;float:right; margin-left: 11px; margin-right: 13px; border-style:solid; border-width:4px; margin-bottom: 20px;");
         }
         if(document.getElementById('localizacion').value=="abajo")
         {
          document.getElementById('imagen_noticia_abajo').setAttribute("src","/imgNoticias/"+url_imagen);
            document.getElementById('imagen_noticia_abajo').setAttribute("class","img-responsive");
         }
       }
        
         document.getElementById('contenido_noticia').innerHTML=document.getElementById('editor1').value;

      }
      window.onload = tipo_visualizacion;
    </script>
<div class="box-body" id="cuadro_muestra_noticia" style="">
	<div class="col-md-4" id="boton_crear_noticia"
		style="padding-left: 2px;">
		<a href="http://127.0.0.1:8000/admin/noticias/show"
			class="btn btn-primary">Vista de Noticia</a> <a
			href="http://127.0.0.1:8000/admin/noticias/create"
			class="btn btn-primary" style="margin-left: 5px">Crear una nueva
			Noticia</a>
	</div>
	<h1 id="titulo_muestra_noticia">Visualización de Noticia</h1>
	<div id="semicuadro_muestra_noticia"
		style="width: 900px; background-color: white; margin: auto auto; padding-top: 0px; border-style: solid; border-width: 5px; padding-bottom: 17px;">
		<h2 id="titulo_noticia"></h2>

		<img src="" class='img-responsive hidden' alt='Responsive image'
			style='width: 450px; height: 250px; margin: auto auto;'
			id="imagen_noticia_arriba">


		<div id="cuadro_contenido_imagen_noticia" class="clearfix"
			style="width: 860px; margin: auto auto;">
			<img src="" class='img-responsive hidden' alt='Responsive image'
				style='width: 190px; height: 190px; float: left; margin-left: 11px; margin-right: 13px; border-style: solid; border-width: 4px; margin-bottom: 20px;'
				id="imagen_noticia_arriba_izquierda">
			<p id="contenido_noticia"></p>
		</div>
		<img src="" class='img-responsive hidden' alt='Responsive image'
			style='width: 450px; height: 250px; margin: auto auto;'
			id="imagen_noticia_abajo">
	</div>
</div>
<div class="box-body" id="cuadro_actualizar_noticia">

	@if(count($errors)>0)
	<div class="alert alert-danger alert-dismissible" rol="alert">
		<button type="button" class="close" data-dismiss="alert"
			aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<ul>
			@foreach($errors->all() as $error)
			<li>{!!$error!!}</li> @endforeach
		</ul>
	</div>
	@endif


	<h1 class="cold-md-10" id="titulo_actualizar_noticia">Editar Noticia</h1>
	{!!Form::model($noticia,['route'=>['noticias.update',$noticia->id],'method'=>'PUT','class'=>'form-horizontal'])!!}
	<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
	<div class="form-group">
		{!!Form::label('titulo','Titulo:',['class'=>'control-label
		col-md-2'])!!}
		<div class="col-md-9">
			{!!Form::text('titulo',null,['class'=>'form-control','placeholder'=>'Ingrese
			el Titulo de la Noticia', 'id'=>'titulo'])!!}</div>
	</div>
	<div class="form-group">
		{!!Form::label('palabra_clave','Palabra
		clave:',['class'=>'control-label col-md-2'])!!}
		<div class="col-md-9">{!!Form::select('palabra_clave',
			['sin_especificar' => 'Sin especificar', 'autores' => 'Autores',
			'editoriales'=>'Editoriales','revistas'=>'Revistas'],null,['class' =>
			'form-control'])!!}</div>
	</div>

	<div class="form-group">
		{!!Form::label('contenido','Contenido:',['class'=>'control-label
		col-md-2'])!!} <br />
		<br />
		<div class="box-body pad col-md-10 col-md-offset-1">

			{!!Form::textarea('contenido',null,['class'=>'form-control','placeholder'=>'This
			is my textarea to be replaced with
			CKEditor.','id'=>'editor1','rows'=>'10','cols'=>'80'])!!}</div>
	</div>

	<div class="form-group">
		{!!Form::label('urlImg','URL Imagen:',['class'=>'control-label
		col-md-2'])!!}
		<div class="col-md-9">
			{!!Form::text('urlImg',null,['class'=>'form-control','placeholder'=>'URL
			de la Imagen', 'id'=>'urlImg'])!!}</div>

	</div>
	<div class="form-group hidden" id="div_imagen">
		<div class="col-md-2" style="margin-top: 20px;">
			<div style="margin-left: 133px; font-weight: bold;">Imagen:</div>
		</div>
		<div class="cold-md-9">
			<img src="" class='img-responsive' alt='Responsive image'
				style='max-width: 250px; margin-left: 230px;' id="muestra_imagen">
		</div>
	</div>

	<script type="text/javascript">
       			 	/*var valor_imagen=document.getElementById("titulo").achivo;
       			 	if(archivo==null)
       			 	{
       			 		alert("nulo");
       			 	}
       			 	else{
       			 		alert(valor_imagen);
       			 	}*/
       			  </script>
       			      			 
       			 
				<?php
   // $valor_2 = "<script> document.write(valor_imagen) </script>";
   // echo "valor";
   // $valor_3=($valor_2->getClientOriginalName());
   // echo "variablePHP = ".$valor_3;
   ?>


       			 <div class="form-group">
		{!!Form::label('localizacion','Localización:',['class'=>'control-label
		col-md-2'])!!}
		<div class="col-md-9">{!!Form::select('localizacion',
			['arriba_izquierda' => 'Arriba-Izquierda', 'arriba_derecha' =>
			'Arriba-Derecha', 'arriba'=>'Arriba','abajo'=>'Abajo'],null,['class'
			=> 'form-control','disabled'=>'true', 'id'=>'localizacion',
			'onload'=>'funcion_1()'])!!}</div>
	</div>
	<script type="text/javascript">
               var valor_imagen=document.getElementById("urlImg");
               if(valor_imagen.value=="")
               {
                document.getElementById('urlImg').disabled=true;
               }
               else
               {
                document.getElementById('div_imagen').setAttribute("class","form-group");
                document.getElementById('urlImg').disabled=true;
               
               
                document.getElementById('localizacion').disabled=false;
               
                document.getElementById('muestra_imagen').setAttribute("src","/imgNoticias/"+valor_imagen.value);
               }
             </script>

	<div class="form-group">
		<div class="col-md-1 col-md-offset-5">
			<button class="btn btn-primary" style="margin-left: 20px;">
				<i class="fa fa-envelope-o"></i>Editar
			</button>
		</div>
	</div>

	{!!Form::close()!!}
	<!--</form> -->
</div>

<script
	src="http://localhost/Proyectos/Biblioteca/public/css/jquery-2.2.3.min.js"></script>
<script
	src="http://localhost/Proyectos/Biblioteca/public/css/bootstrap.min.js"></script>
<!-- jQuery 2.1.4 -->
<script src="{{ URL::asset('js/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ URL::asset('js/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('js/fastclick.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('js/app.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('js/demo.js')}}"></script>
<!-- iCheck -->
<script src="{{ URL::asset('js/icheck.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::asset('js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Page Script -->
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
<script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>
@stop
