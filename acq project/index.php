<?php 
    require 'conexion.php';
    session_start();
    $usuario = $_SESSION['usuario'];
    $sql = "SELECT * FROM usuarios WHERE usuario_nombre = '$usuario'";
    $resultado = $mysqli->query($sql);

    if (!$sql) {
        header("Location: ../servidor%20caido");
        exit;
    }

    $fila = mysqli_fetch_assoc($resultado);
    $id_usuario = $fila['usuario_id'];
    $_SESSION['id_usuario'] = $id_usuario;
    $fecha = $fila['fecha'];
            
    $cuenta = $fila['cuenta'];
    $_SESSION['cuenta'] = $cuenta;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="js/script.js" defer></script>
    <link rel="stylesheet" href="css/estilnoo.css">
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>Project ACQ</title>
</head>

<body>
    <header class="header">
        <a href="" class="logo">project ACQ</a>

        <div class="social">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            <a href="#"><i class="fa-brands fa-telegram"></i></a>
        </div>

        <?php 
            $fecha_actual = date("Y");

            $membresia = $fecha_actual - $fecha;

            if (isset($_SESSION['cuenta'])){
                switch($membresia){
                    case "0";
                    $insignia = "<abbr title='insignia por un año de lealtad'><img src='img/insignias1.png'></img></abbr>";
                    case "1":
                    $insignia = "<abbr title='insignia por un año de lealtad'><img src='img/insignias1.png'></img></abbr>";
                    break;
                    case "2":
                    $insignia = "<abbr title='insignia por dos años de lealtad'><img src='img/insignias2.png'></img></abbr>";
                    break;
                    case "3":
                    $insignia = "<abbr title='insignia por tres años de lealtad'><img src='img/insignias3.png'></img></abbr>";
                    break;
                    case "4":
                    $insignia = "<abbr title='insignia por cuatros años de lealtad'><img src='img/insignias4.png'></img></abbr>";
                    break;
                    default:
                    $insignia = "<abbr title='insignia por cuatros años de lealtad'><img src='img/insignias4.png'></img></abbr>";
                }   
            }else{
                $insignia = null;
            }
        ?>

        <nav class="navbar">
            <a href="#">Atencion al cliente</a>
            <a href="#">Compras</a>
            <a href="#">servicios</a>
            <a href="#">contactanos</a>
            <a href="../cerrar%20sesion">Salir</a>
            <?php 
            echo $insignia;
            ?>
        </nav>
    </header>

    <section class=" banner">
        <div class="slider">
            <div class="slide active">
                <img src="img/proyecto.jpeg">
                <div class="left-info">
                    <div class="penetrte-blur">
                        <h1>Project</h1>
                    </div>
                    <div class="content">
                        <br><br>
                        <h3>¿Que somos como empresa?</h3>
                        <?php
                        $bienvenida = "<h1>Bienvenido de nuevo $usuario.</h1>";
                        echo $bienvenida;
                    ?>
                        <p>Somos una empreza dedicada al manejo de productos a todas partes del mundo nos
                            comprometemos
                            a hacer nuestro deber que es el mantener un control de inventario estable en cada una de
                            las
                            empresas que nos contraten haci podemos ayudar a aquellos que ocupen de nuestros
                            servicios y
                            nosotros a ellos.</p>
                    </div>
                </div>
                <div class="right-info">
                    <h1>ACQ</h1>
                    <h>Nos ubicamos en la calle 12Q</h>
                    <p>Para mas informacion(+57 32055875) </p>
                </div>

            </div>

            <div class="slide">
                <img src="img/tienda.jpeg" alt="">
                <div class="left-info">
                    <div class="penetrte-blur">
                        <h1>Pedi</h1>
                    </div>
                    <div class="content">
                        <?php 
                        echo $bienvenida;
                        ?>
                        <h3>¿Como hacer tu pedido en la pagina?</h3>
                        <p>Los productos que vendemos o obtenemos para poner en venta son variados ya que en la
                            mayoria
                            de catalogo vendemos de todo ya sean muebles comida y entre otras cosas del hogar o para
                            empresas para saber mas de los productos que vendemos haga click en tienda.</p>
                        <a href="../Pedidos/" class="btn">Realiza tus compras aqui</a>
                    </div>
                </div>
                <div class="right-info">
                    <h1>dos</h1>
                </div>
            </div>

            <div class="slide">
                <img src="img/entregas.jpeg" alt="">
                <div class="left-info">
                    <div class="penetrte-blur">
                        <h1>Prod</h1>
                    </div>
                    <div class="content">
                        <?php 
                        echo $bienvenida;
                        ?>
                        <h3>Que productos vendemos en nuestra tienda</h3>
                        <p>Nosotros como empresa tenemos muchas formar de que tu puedas hacer tus pedidos ya sea por
                            la
                            pagina web de nuestros servicios o tambien por alguna linea de atencion como alguna red
                            social en todo esto hay algunos requisitos como nombres correos contraseñas ficha
                            asignada
                            al cliente o tambien con los rangos que son premiun gratuito y estandar cada uno con su
                            mejora en ¿fin estas listo para hacer tu pedido?</p>
                        <a href="../Encargados" class="btn">Hacer mi control de inventario</a>
                    </div>
                </div>
                <div class="right-info">
                    <h1>uctos</h1>
                </div>
            </div>

            <div class="slide">
                <img src="img/Proyecto 1.jpeg" alt="">
                <div class="left-info">
                    <div class="penetrte-blur">
                        <h1>Conte</h1>
                    </div>
                    <div class="content">
                        <?php 
                        echo $bienvenida;
                        ?>
                        <h3>Informacion hacerca de nuestra servicios </h3>
                        <p>En esta seccion encontraras la informacion acerca de nuestra pagina sobre todos los
                            contenidos necesarios que ocupas saber como desde los rangos y las formas de pago que
                            puedes
                            hacer en nuestra pagina todo eso con un solo click.</p>
                        <a href="../contenidos/" class="btn">Consulta aqui</a>
                    </div>
                </div>
                <div class="right-info">
                    <h1>nidos</h1>

                    </h3>
                </div>
            </div>
        </div>

        <div class="navigation">
            <span class="prev-btn"><i class="fa-solid fa-chevron-left fa-3x"></i></span>
            <span class="next-btn"><i class="fa-solid fa-chevron-right fa-3x"></i></span>
        </div>
    </section>
</body>

</html>