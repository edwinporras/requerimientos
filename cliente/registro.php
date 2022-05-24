<?php 
  //Anidacion del header (MODULARIZACION DE CODIGO)
  include_once "php/header.php";
    // Evento cuando se enviar el formulario y captura data
    if (isset($_REQUEST['registro'])){
        // Conexion a la base de datos
        include_once "php/config.php";

        // Captura de algunos campos despues del request
        $nombreok = $_REQUEST["nombre"]??'';
        $correook = $_REQUEST["correo"]??'';
        $telenfok = $_REQUEST["password"]??'';
        $descriok = $_REQUEST["descripcion"]??'';
        
        // Guardar registro
        $registro="INSERT INTO usuarios(email, pass, nombre ) 
        VALUES ('$correook', '$telenfok', '$nombreok')";

        /**
         * @param mysqli_query Metodo para guardar el registro
         */
        $result= mysqli_query($conn, $registro);

        /**
         * Condicional si se ejecuta y se guarda que pase por true generando una alerta
         * de lo contrario genere un error
         *  */
        if ($result){
        ?>
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Registro</h4>
            Creado correctamente <a href="login.php">Ir al Login</a>
          </div>
        <?php
        }else{
          ?>
            <div class="alert alert-danger" role="alert">
              Error de registro
            </div>
          <?php
        }
    }
       
?>
        <!-- formulario de registro -->
        <div class="containerMainSuperior">
           <div class="panel panel-danger">
            <div class="containerMainInferior">
              <form action="" id="formulario">
                  <div class="formulario__group" id="group_nombre">
                      <label for="nombre" class="formulario_label">Nombre y Apellido</label>
                      <div class="formulario_group-input">
                          <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Ingrese nombre y apellido">
                          <i class="formulario__validacion-estado fa fa-times-circle"></i>
                      </div>
                      <p class="formulario__input-error">
                          Este campo solo debe tener letras y espacios
                      </p>
                  </div>

                  <!-- Campo correo -->
                  <div class="formulario__group" id="group_correo">
                      <label for="correo" class="formulario_label">Correo Electronico</label>
                      <div class="formulario_group-input">
                          <input type="email" class="formulario__input" name="correo" id="correo" placeholder="Digite Correo Electronico">
                          <i class="formulario__validacion-estado fa fa-times-circle"></i>
                      </div>
                      <p class="formulario__input-error">
                          El correo solo debe contener letra, numeros, puntos, guiones y gruion bajo
                      </p>
                  </div>

                  <!-- Campo password -->
                  <div class="formulario__group" id="group_password">
                      <label for="password" class="formulario_label">Contraseña</label>
                      <div class="formulario_group-input">
                          <input type="password" class="formulario__input" name="password" id="password" placeholder="Digite password">
                          <i class="formulario__validacion-estado fa fa-times-circle"></i>
                      </div>
                      <p class="formulario__input-error">
                          La contraseña solo puede contener numeros y el minimo son 7 caracteres
                      </p>
                  </div>

                  <!-- terminos y condiciones -->
                  <div class="formulario__group" id="grupo__terminos">
                      <label class="formulario__label">
                          <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                          Acepto los terminos y condiciones
                      </label>
                  </div>

                  <div class="formulario__mensaje" id="formulario__mensaje">
                      <p>
                          <i class="mensj_errorf_icono fa fa-exclamation-triangle"><b class="mensj_errorf">Error:</b>Por favor rellena el formulario correctamente.</i>
                      </p>
                  </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat" name="registro" id="registrarNuevo">Registrarse</button>
              </form>
            </div>
          </div>
        </div>
         
<?php 
  //Anidacion del footer (MODULARIZACION DE CODIGO)
  include_once "php/footer.php";
?>

<!-- validaciones de campos del formulario registro -->
<script src="js/validaciones.js"></script>