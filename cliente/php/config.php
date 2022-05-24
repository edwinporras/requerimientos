<?php
    
    // Variables de conexion
    $serv="localhost";
    $user="admin";
    $pass="CONTRASEÑA";
    $namedb="proj_req";

    /**
     * @param mysqli_connect Conexion a la base de datos
     */
    $conn = mysqli_connect($serv, $user, $pass, $namedb);

    if ($conn) {
        echo "Esta conectado!!!!";
    }else {
        echo "No esta conectado";
    }
?>