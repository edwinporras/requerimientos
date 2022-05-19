<?php 
  include_once "php/header.php";
    if (isset($_REQUEST['registro'])){
        $serv="localhost";
        $user="admin";
        $pass="rux69jyf3pta";
        $namedb="proj_req";
    
        /**
         * Conexion BD y registro del formulario
         */
        $conn = mysqli_connect($serv, $user, $pass, $namedb);

        /**Respuestade los campos del formulario */
        $correook = $_REQUEST["correo"]??'';
        $telenfok = $_REQUEST["password"]??'';

        $registro="INSERT INTO usuarios(email, pass, nombre ) 
        VALUES ('$correook', '$telenfok', '$nombreok')";

        $result= mysqli_query($conn, $registro);
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
        <div class="containerMainSuperior">
           <div class="panel panel-danger">
            <!-- <div class="panel panel-heading">
              REGISTRO DE USUARIO
            </div> -->
            <div class="containerMainInferior">
              <form action="" id="formulario">
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
                  <div class="formulario__mensaje" id="formulario__mensaje">
                      <p>
                          <i class="mensj_errorf_icono fa fa-exclamation-triangle"><b class="mensj_errorf">Error:</b>Por favor rellena el formulario correctamente.</i>
                      </p>
                  </div>

                <button type="submit" class="btn btn-primary btn-block btn-flat" name="registro" id="registrarNuevo">Ingresar</button>
              </form>
            </div>
          </div>
        </div>
         
<?php 
  include_once "php/footer.php";
?>
<script src="js/validaciones.login.js"></script>
