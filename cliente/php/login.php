<?php
    $serv="localhost";
    $user="admin";
    $pass="rux69jyf3pta";
    $namedb="proj_req";


    $conn = mysqli_connect($serv, $user, $pass, $namedb);

    $correook = $_POST["correo"];
    $telenfok = $_POST["password"];

    $registro="INSERT INTO usuarios(email, pass, nombre ) 
    VALUES ('$correook', '$telenfok', '$nombreok')";

    $result= mysqli_query($conn, $registro);
    echo $result;
?>