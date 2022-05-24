<?php
    include_once "config.php";

    $correook = $_POST["correo"];
    $telenfok = $_POST["password"];

    $registro="INSERT INTO usuarios(email, pass, nombre ) 
    VALUES ('$correook', '$telenfok', '$nombreok')";

    $result= mysqli_query($conn, $registro);
    echo $result;
?>