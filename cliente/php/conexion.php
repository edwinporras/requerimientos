<?php
    /**
     * @param genera_codigo captura en un arreglo los numeros de 0-9 con las letras del abecedario
     * se inicializa y mediante un ciclo se generan dos valores instanciando el metodo @param numero_aleatorio
     * dandoles valores aleatorios
     * al final se le indica el largo de caracteres
     */
    function genera_codigo ($longitud) {
        $caracteres = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
        $codigo = '';

        for ($i = 1; $i <= $longitud; $i++) {
            $codigo .= $caracteres[numero_aleatorio(0, 35)];
        }

        return $codigo;
    }

    function numero_aleatorio ($ninicial, $nfinal) {
        $numero = rand($ninicial, $nfinal);

        return $numero;
    }

    $ver = genera_codigo(6);

        // Captura de algunos campos despues del request
        $nombreok = $_POST["nombre"];
        $correook = $_POST["correo"];
        $telenfok = $_POST["password"];
        $descriok = $_POST["descripcion"];
        
        // Conexion a la base de datos
        include_once "config.php";

        // Guardar registro
        $registro="INSERT INTO usuarios(email, pass, nombre ) 
        VALUES ('$correook', '$telenfok', '$nombreok')";

        /**
         * @param mysqli_query Metodo para guardar el registro
         */
        $result= mysqli_query($conn, $registro);

       echo $result;

       /**
         * Condicional si se ejecuta y se guarda que pase por true se contruye el cuerpo del mensaje Gmail
         *  */
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
           
            $msg .= " <br> Gracias por confiar en nosotros, este bono te proporcionara el 20% de descuento en la primera compra <br> codigo: ". $ver . " \r\n";
            
            $msg .= " </p>
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
        }
?>
