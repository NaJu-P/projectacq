<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Estilos 2.css">
    <title>Project ACQ-Registro</title>
    <link rel="icon" type="image/png" href="img/logo.png">
</head>

<body>
    <div class="menu">
        <b>
            <ul>
                <li><a href="../">Project ACQ</a></li>
            </ul>
        </b>
    </div>
    <div class="cuadro">
        <h1>Registro</h1>
        <hr>
        </hr>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="campos">
            <br>

            <b><label>USUARIO</label></b>
            <div class="input">
                <br>
                <input type="text" required name="usuario" placeholder="ejemplo&10">
                <p id="error-usuario" class="error">El usuario ya existe.</p>
            </div>
            <br>

            <b><label>CORREO</label></b>
            <div class="input">
                <br>
                <input type="email" required name="mail" placeholder="ejemplo&10@gmail.com">
            </div>

            <br>
            <b><label>CONTRASEÑA</label></b>
            <div class="input">
                <br>
                <input type="password" required name="contraseña" placeholder="'#' o mas, y tambien 0-9">
            </div>

            <br>
            <b><label>DIRECCION</label></b>
            <div class="input">
                <br>
                <input type="text" name="direccion" placeholder="Calle, carrera complemento o barrio">
                <p>Este no es obligatorio, pero llenello verdaderamente.</p>
            </div>

            <br>
            <div class="enviar">
                <p><b>INGRESAR</b></p>
                <input type="submit" value="ingresar" name="enviar">
            </div>

        </form>

        <b><a href="../inicio%20de%20session" class="volver">Ya tienes una cuenta, inicie sesion</a></b>
    </div>
    <?php 
        require 'conexion.php';
      if (isset($_POST['mail'])){
        session_start();

        $usuario = $_POST['usuario'];

        $sql_verificar = "SELECT * FROM usuarios WHERE usuario_nombre = '$usuario'";
        $resultado_verificar = $mysqli->query($sql_verificar);
    
        if ($resultado_verificar->num_rows > 0) {
            echo "<script>document.getElementById('error-usuario').style.display = 'inline';</script>";
            header('Location: ../Registro/');
            exit;
        }else{
            $_SESSION['usuario'] = $usuario;
        }

        $direccion = $_POST['direccion'];

        $direccion_verdad = strlen($direccion);


        if($direccion_verdad <= 10){
            echo "La dirección es muy corta. Ingrese una dirección más detallada.";

            header('Location: ../Registro/');
            exit;
        }else{
            if (preg_match ('/^[A-Za-z0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $direccion)){
                 $_SESSION['direccion'] = $direccion;
            }else{
                echo "la direccion esta mal echa por favor digitela de nuevo";

                header('Location: ../Registro/');
                exit;
            }
        }

        $mail = $_POST['mail'];
        $contraseña = $_POST['contraseña'];

        $fecha_actual = date("Y");

        if (preg_match('/^[A-Za-z0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~·\s]+$/', $contraseña)){
            
            $sql = "INSERT INTO usuarios (direccion, usuario_nombre, usuario_password, usuario_email, fecha) VALUES ('$direccion', '$usuario', '$contraseña', '$mail', '$fecha_actual');";
            $resultado = $mysqli->query($sql);

            header('Location: ../contenidos/');
        }else{
            echo "<h1>Su contraseña necesita un signo, numeros, y letras mayusculas y minusculas</h1>";

            header('Location: ../Registro/');
            exit;
        }
        
        if ((!$sql_verificar) || (!$sql)) {
            header("Location: ../servidor%20caido");
            exit;
        }
      }
      ?>
</body>

</html>