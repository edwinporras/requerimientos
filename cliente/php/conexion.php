<?php


    // FORMA PARA SABER SI ESTA CONECTADO A LA BASE DE DATOS

    
    $serv="localhost";
    $user="admin";
    $pass="rux69jyf3pta";
    $namedb="proj_req";


    $conn = mysqli_connect($serv, $user, $pass, $namedb);

    if ($conn) {
        echo "Esta conectado!!!!";
    }else {
        echo "No esta conectado";
    }

        $nombreok = $_POST["nombre"];
        $correook = $_POST["correo"];
        $telenfok = $_POST["telefono"];
        $descriok = $_POST["descripcion"];
        

    

        $registro="INSERT INTO usuarios(email, pass, nombre ) 
        VALUES ('$correook', '$telenfok', '$nombreok')";

        $result= mysqli_query($conn, $registro);

       echo $result;

       if (isset($_REQUEST['registro'])){
            $asunto = 'Bienvenido a Desayunos Sorpresa';
            $msg ='<p>test correo body</p>';
            $nombreok = $_POST["nombre"];
            $correook = $_POST["correo"];

            $header = "From: edwinporras2013@gmail.com"."\r\n";
            $header.= "X-Mailer: PHP/".phpversion();
            $mail = @mail($correook, $asunto, $msg, $header);

       }
       

    //    echo "Esta conectado" +$result;
        
    //   }
?>
