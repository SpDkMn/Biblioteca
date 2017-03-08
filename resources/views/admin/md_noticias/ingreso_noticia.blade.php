@extends('admin.layouts.main')
  
@section('content')
	<style type="text/css">
      #cuadro_ingresar_noticia{
        padding-top: 15px;
        //background-color: yellow;
      }
      #titulo_ingresar_noticia{
        margin-top: 0px;
        margin-bottom: 20px;
        margin-left:39%;
        
      }
    </style>
    <script type="text/javascript">
      function handleFileSelect(evt) {
        
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0,f=0 ; f = files[i]; i++) {
alert("entro");
      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
      
    }
  }
  document.getElementById('archivo').addEventListener('change', handleFileSelect, false);
    </script>
    
 <!--onchange="handleFileSelect() -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <div class="box-body" id="cuadro_ingresar_noticia">

      @if(count($errors)>0)
    <div class="alert alert-danger alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <ul>
        @foreach($errors->all() as $error)
          <li>{!!$error!!}</li>
        @endforeach
      </ul>
    </div>
  @endif
                  <div class="col-md-3" id="boton_crear_noticia" style="padding-left: 10px; margin-top: 7px;">
                      
                      <a href="http://127.0.0.1:8000/admin/noticias_creacion/show" class="btn btn-primary">Vista de Noticia</a>
                   </div>
                  <h1 id="titulo_ingresar_noticia">Ingresar Noticia</h1>
                  <form class="form-horizontal" role="form" method="POST" action="http://127.0.0.1:8000/admin/noticias" enctype="multipart/form-data" files="true" name="formulario_ingreso_noticia" id="formulario_ingreso_noticia">
                  <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                  <div class="form-group">
            <label for="titulo" class="control-label col-md-2">Titulo:</label>
            <div class="col-md-9">
              <input type="text" class="form-control" id="titulo" placeholder="Titulo" name="titulo">
            </div>
          </div>

          <div class="form-group">
            <label for="palabra_clave" class="control-label col-md-2">Palabra clave:</label>
            <div class="col-md-9">
              <select name="palabra_clave" id="palabra_clave" class="form-control">
                <option value="sin_especificar" selected>Sin especificar</option>
                <option value="autores">Autores</option>
                <option value="editoriales">Editoriales</option>
                <option value="revistas">Revistas</option>
              </select>
            </div>
          </div>

                  <div class="form-group">
                      <label for="contenido" class="control-label col-md-2">Contenido:</label>
                      <br/><br/>
                      <div class="box-body pad col-md-10 col-md-offset-1">

                          <textarea id="editor1" name="contenido" rows="10" cols="80" >Escribe aquí el contenido de la Noticia
                          </textarea>
                    </div>
                  </div>

                  <div class="form-group">

            <label for="archivo" class="control-label col-md-2">Imagen:</label>
            <div class="col-md-10">
              <div class="btn btn-default btn-file">
                          <i class="fa fa-paperclip"></i> Seleccionar archivo
                         <input type="file" name="urlImg" id="archivo" class="form-control" onchange="funcion_1()">
                        </div>
                        <div class=" inline help-block">Max. 32MB</div>
                        <div class="inline help-block hidden" id="imagen_1"></div>
              <!--<input type="file" name="urlImg" id="archivo" class="form-control"> -->
            </div>
        </div>
        
        
        <script type="text/javascript">
      function funcion_1(){
        var valor_imagen;
          valor_imagen=document.getElementById("archivo");
          if(valor_imagen.value=="")
          {
            alert("esta vacio");
          }
          else
          {
           
            var parrafaso_1=document.getElementById("imagen_1");
            var arreglo_imagen= valor_imagen.value.split("\u005C")
         
             document.getElementById('imagen_1').innerHTML = arreglo_imagen[arreglo_imagen.length-1];
            
           
            parrafaso_1.setAttribute("class","inline help-block");
           document.getElementById('localizacion').disabled=false;
            
           
          }
      }
    </script> 
          <!--<script type="text/javascript">
        window.onload = function()
        {
          var valor_imagen;
          valor_imagen=document.getElementById("archivo");
          if(valor_imagen.value=="")
          {
            alert("esta vacio");
          }
          else
          {
            alert("esta lleno");
            alert(valor_imagen.value);
          }
        }
    </script> -->
        <!--<div class="form-group">
          <label for="archivo" class="control-label col-md-2">Archivo:</label>
          <div class="col-md-10">
            <input type="file" name="urlImg" id="archivo" class="form-control">
          </div>
        </div> -->

        <div class="form-group">
            <label for="localizacion" class="control-label col-md-2">Localización:</label>
            <div class="col-md-9">
              <select name="localizacion" id="localizacion" class="form-control" disabled>
                <option value="arriba_izquierda" selected>arriba-izquierda</option>
                <option value="arriba_derecha">arriba-derecha</option>
                <option value="arriba">arriba</option>
                <option value="abajo">abajo</option>
              </select>
            </div>
        </div>
        
                <div class="form-group">
                   <div class="col-md-1 col-md-offset-4">
                      <button class="btn btn-primary"><i class="fa fa-envelope-o"></i>Enviar</button>
                   </div>
                    <div class="col-md-1 col-md-offset-1">
                      <button type="reset" name="resetButton" class="btn btn-danger"><i class="fa fa-pencil"></i>Reiniciar</button>
                    </div>
                </div>

                </form>
              </div>
     <!-- jQuery 2.1.4 -->
     <script src="{{ URL::asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
     <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    <!-- Slimscroll -->
    <script src="{{ URL::asset('js/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('js/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('js/demo.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ URL::asset('js/icheck.min.js')}}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::asset('js/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <!-- Page Script -->
    <script src="{{ URL::asset('js/bootstrap3-wysihtml5.all.min.js')}}"></script>
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