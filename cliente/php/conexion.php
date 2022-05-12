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

       if ($registro){
            echo "<script>console.log(\"POR ACA PASO\")</script>";
            $asunto = 'Bienvenido a Desayunos Sorpresa';
            $msg ="<!DOCTYPE html>
            <html>
            <head>
                <title>Desayunos sorpresa</title>
                <style>
                    .conatinerMain{
                        height: 50vh;
                        width: 100%;
                        background-size: cover;background-image: url(https://desayunossorpresas.com/wp-content/uploads/2019/06/69637499-marco-colorido-del-cumplea%C3%B1os-con-los-art%C3%ADculos-multicolores-del-partido-en-fondo-azul-marino-feliz-cumpl.jpg);
                    }
                    .textPlano{
                        font-weight: 900; 
                        height: inherit; 
                        color: rgb(255, 255, 255);
                        text-align: center;
                        width: 100%;
                        flex-direction: column !important;
                        justify-content: space-around !important;
                        background-color: #000000b3;
                        text-transform: uppercase;
                        padding-top: 7%;
                    }
                </style>
            </head>
            <body>
                <div class='conatinerMain'>
                    <p class='textPlano'>Bienvenido " . $nombreok . " \r\n";
           
            $msg .= " <br> Gracias por confiar en nosotros, este bono te proporcionara el 20% de descuento en la primera compra <br> codigo: 111225455 </p>
                </div>
            </body>
            </html>";
            $nombreok1 = $_POST["nombre"];
            $correook1 = $_POST["correo"];

            $header = "From: edwinporras2012@gmail.com"."\r\n".
            "Reply-To: edwinporras2012@gmail.com". "\r\n".
            "X-Mailer: PHP/".phpversion(). "\r\n".
            "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $mail = mail($correook, $asunto, $msg, $header);
            if($mail){
                echo '<h1>FUNCIONO</h1>';
            }else{
                echo '<h1>NO FUNCIONO</h1>';
            }

       }
       

    //    echo "Esta conectado" +$result;
        
    //   }
?>
