<div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Titulo</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
      </button>
    </div>
  </div>

  <div class="box-body">
            
                 <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/usuarios') }}" enctype="multipart/form-data" files="true" name="formulario_ingreso_usuario" id="formulario_ingreso_usuario">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">


                        <div class="form-group">
                            <label for="tipo_academico" class="control-label col-md-2">Tipo Academico:</label>
                            <div class="col-md-9">
                              <select name="tipo_academico" id="tipo_academico" class="form-control"" required>
                                <option value="Pregrado" selected>Pregrado</option>
                                <option value="Postgrado">Postgrado</option>
                                <option value="Profesor">Profesor</option>
                                <option value="Externo">Externo</option>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Admin">Admin</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="control-label col-md-2">Nombre:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="name" placeholder="Nombre" name="name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="control-label col-md-2">Apellidos:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="last_name" placeholder="Apellidos" name="last_name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="control-label col-md-2">Codigo:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="code" placeholder="Codigo" name="code">
                            </div>
                        </div>

                        <div class="form-group" id="cuadro_dni">
                            <label for="dni" class="control-label col-md-2">DNI:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="dni" placeholder="DNI" name="dni">
                            </div>
                        </div>

                        <div class="form-group" id="cuadro_telefono">
                            <label for="home_phone" class="control-label col-md-2">Telefono:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="home_phone" placeholder="Telefono" name="home_phone">
                            </div>
                        </div>

                        <div class="form-group" id="cuadro_celular">
                            <label for="phone" class="control-label col-md-2">Celular:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="phone" placeholder="Telefono" name="phone">
                            </div>
                        </div>

                        <div class="form-group" id="cuadro_correo">
                            <label for="email" class="control-label col-md-2">Correo:</label>
                            <div class="col-md-9">
                              <input type="email" class="form-control" id="email" placeholder="Correo" name="email" required>
                            </div>
                        </div>

                        <div class="form-group" id="cuadro_direccion">
                            <label for="address" class="control-label col-md-2">Direccion:</label>
                            <div class="col-md-9">
                              <input type="text" class="form-control" id="address" placeholder="Direccion" name="address" required>
                            </div>
                        </div>

                    

                        <div class="form-group" id="cuadro_escuela">
                            <label for="school" class="control-label col-md-2">Escuela:</label>
                            <div class="col-md-9">
                              <select name="school" id="school" class="form-control" required>
                                <option value="Sistemas" selected>Sistemas</option>
                                <option value="Software">Software</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group" id="cuadro_facultad">
                            <label for="faculty" class="control-label col-md-2">Facultad:</label>
                            <div class="col-md-9">
                              <select name="faculty" id="faculty" class="form-control" required>
                                <option value="Ingenieria de Sistemas e Informatica" selected>Facultad de Ingeniería de Sistemas e Informática</option>
                                <option value="Ciencias Sociales">Facultad de Ciencias Sociales</option>
                                <option value="Derecho">Facultad de Derecho</option>
                                <option value="Ingenieria de Minas">Facultad de Ingenieria de Minas</option>
                              </select>
                            </div>
                        </div>

                        <div class="form-group " id="cuadro_universidad">
                            <label for="university" class="control-label col-md-2">Universidad:</label>
                            <div class="col-md-9">
                              <select name="university" id="university" class="form-control" required>
                                <option value="Universidad Nacional Mayor de San Marcos" selected>Universidad Nacional Mayor de San Marcos</option>
                                <option value="Universidad Nacional de Ingeniería">Universidad Nacional de Ingeniería</option>
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
        </div>
       