<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos 3.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>Project ACQ-Contenidos</title>
</head>

<body>
    <div class="contenedor">
        <div class="encabezado">
            <header class="content header">
                <h1 class="title">CONTENIDOS</h1>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <main>
                <section>
                    <h2 class="header one">BASIC</h2>
                    <ul>
                        <li class="cash"><span>$2.292</span>por mes</li>
                        <li>X Ingsinia de lealtad</li>
                        <li>√ Descuentos exclusivos</li>
                        <li>X Envios rapido o gratis</li>
                        <li>√ Acceso ventas privadas</li>
                        <li>X Explorar catalogo completo</li>
                        <li>√ Ofertas de lealtad</li>
                        <li>X Mejor interfaz</li>
                        <li><button type="submit" name="basic" value="basic">agregar a carrito</button></li>
                    </ul>
                </section>

                <section>
                    <h2 class="header three">PREMIUM</h2>
                    <ul>
                        <li class="cash"><span>$175.92</span>por mes</li>
                        <li>√ Ingsinia de lealtad</li>
                        <li>√ Descuentos exclusivos</li>
                        <li>√ Envios rapido o gratis</li>
                        <li>√ Acceso ventas privadas</li>
                        <li>√ Explorar catalogo completo</li>
                        <li>√ Ofertas de lealtad</li>
                        <li>√ Mejor interfaz</li>
                        <li><button type="submit" name="standard" value="standard">agregar a carrito</button></li>
                    </ul>
                </section>

                <section>
                    <h2 class="header two">STANDARD</h2>
                    <ul>
                        <li class="cash"><span>$5.92</span>por mes</li>
                        <li>√ Ingsinia de lealtad</li>
                        <li>X Descuentos exclusivos</li>
                        <li>X Envios rapido o gratis</li>
                        <li>X Acceso ventas privadas</li>
                        <li>√ Explorar catalogo completo</li>
                        <li>√ Ofertas de lealtad</li>
                        <li>√ Mejor interfaz</li>
                        <li><button type="submit" name="premuim" value="premuim">agregar a carrito</button></li>
                    </ul>
                </section>

            </main>
            <a href="../">No seleccionar ninguna</a>
            <div class="encabezado">
                <div class="imagenes">
                    <section>
                        <h2 class="header three">SERVICIOS DE $PAGA/$GRATUITO</h2>
                        <ul>
                            <li class="cash"><span></span>CONTENIDOS</li>
                            <li>PAGO/ten la posivilidad de Pagar con QR</li>
                            <li>Pago/ten la posibilidad de recibir una Ficha de rapido acceso</li>
                            <li>PAGO/ten la posivilidad de inicio de session rrapida</li>
                            <li>GRATUITO/no obtines beneficios de compras</li>
                            <li>GRATUITO/no podras pagar con codigo QR</li>
                            <li>GRATUITO/no inicio de ssision rapido</li>
                        </ul>
                    </section>
                </div>
        </form>

        <?php 
  require 'conexion.php';
  session_start();
  $usuario = $_SESSION['usuario'];
  
  if (isset($_POST['basic'])){
  
    $cuenta = $_POST['basic'];

    $sql = "UPDATE usuarios SET cuenta='$cuenta' WHERE usuario_nombre ='$usuario'";
    $resultado = $mysqli->query($sql);
    header('Location: ../acq%20project');

    if (!$sql) {
        header("Location: ../servidor%20caido");
        exit;
    }

  }else  if (isset($_POST['standard'])){

    $cuenta = $_POST['standard'];

    $sql = "UPDATE usuarios SET cuenta='$cuenta' WHERE usuario_nombre ='$usuario'";
    $resultado = $mysqli->query($sql);
    header('Location: ../acq%20project');

    if (!$sql) {
        header("Location: ../servidor%20caido");
        exit;
    }

  }if (isset($_POST['premuim'])){

    $cuenta = $_POST['premuim'];

    $sql = "UPDATE usuarios SET cuenta='$cuenta' WHERE usuario_nombre ='$usuario'";
    $resultado = $mysqli->query($sql);
    header('Location: ../acq%20project');

    if (!$sql) {
        header("Location: ../servidor%20caido");
        exit;
    }
  }
  ?>
</body>

</html>