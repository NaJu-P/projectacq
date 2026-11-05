<?php 
   ob_start();
   require '../conexion.php';
   session_start();
   $id_usuario = $_SESSION['id_usuario'];
   $cuenta = $_SESSION['cuenta'];
?>
<!DOCTYPE html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos 4.css" />
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>Project ACQ-productos</title>
</head>

<body>
    <div id="page" data-mi-variable="<?php echo htmlspecialchars($cuenta); ?>">
        <div class="page-nav">
            <h1>Mi tienda</h1>
            <a id="checkout" class="button-checkout" href="../acq%20project">Pagar</a>
        </div>
        <div id="mensaje" class="mensaje">
            <p><b>Se ha agregado satisfactoriamente.</b></p>
        </div>
        <div class="page-content">
            <form id="product-container" class="product-container" method="POST"
                action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h3>Cerveza corona</h3>
                <img src="img/corona.jfif">
                <div class="titulo">
                    <h1 class="descuento-precio">$50</h1>
                    <h1>$25</h1>
                </div>
                <div class="opciones" id="opciones">
                    <input type=" number" name="cant" value="1" min="1">
                    <div class="button-add">
                        <p>Agregar</p>
                        <input type="submit" name="enviar" value="6">
                    </div>
                </div>
            </form>

            <form id="product-container" class="product-container" method="POST"
                action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h3>Carne</h3>
                <img src="img/carne.jpg" />
                <div class="titulo">
                    <h1 class="descuento-precio">$300</h1>
                    <h1>$150</h1>
                </div>
                <div class="opciones">
                    <input type="number" name="cant" value="1" min="1">
                    <abbr title="Descuento de la pagina">
                        <div class="image-container">
                            <h2>%50</h2>
                        </div>
                    </abbr>
                    <div class="button-add">
                        <p>Agregar</p>
                        <input type="submit" name="enviar" value="6">
                    </div>
                </div>
            </form>

            <form id="product-container" class="product-container" method="POST"
                action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h3>Muebles</h3>
                <img src="img/muebles.jpg" />
                <h1>$250</h1>
                <div class="opciones">
                    <input type="number" name="cant" value="1" min="1">
                    <abbr title="Ofertas de suscripción!!">
                        <div class="image-container-1">
                            <h2>%20</h2>
                        </div>
                    </abbr>
                    <div class="button-add">
                        <p>Agregar</p>
                        <input type="submit" name="enviar" value="6">
                    </div>
                </div>
            </form>

            <form id="product-container" class="product-container" method="POST"
                action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h3>Pesas</h3>
                <img src="img/pesas.jpg" />
                <div class="titulo">
                    <h1 class="descuento-precio">$200</h1>
                    <h1>$100</h1>
                </div>
                <div class="opciones">
                    <input type="number" name="cant" value="1" min="1">
                    <abbr title="Descuento de la pagina">
                        <div class="image-container">
                            <h2>%50</h2>
                        </div>
                    </abbr>
                    <div class="button-add">
                        <p>Agregar</p>
                        <input type="submit" name="enviar" value="6">
                    </div>
                </div>
            </form>

            <form id="product-container" class="product-container" method="POST"
                action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h3>Comestibles</h3>
                <img src="img/muebles.webp" />
                <h1>$10</h1>
                <div class="opciones">
                    <input type="number" name="cant" value="1" min="1">
                    <abbr title="Ofertas de suscripción!!">
                        <div class="image-container-1">
                            <h2>%20</h2>
                        </div>
                    </abbr>
                    <div class="button-add">
                        <p>Agregar</p>
                        <input type="submit" name="enviar" value="6">
                    </div>
                </div>
            </form>
            <form id="product-container" class="product-container" method="POST"
                action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h3>Comestibles</h3>
                <img src="img/muebles.webp" />
                <h1>$10</h1>
                <div class="opciones">
                    <input type="number" name="cant" value="1" min="1">
                    <abbr title="Ofertas de suscripción!!">
                        <div class="image-container-1">
                            <h2>%20</h2>
                        </div>
                    </abbr>
                    <div class="button-add">
                        <p>Agregar</p>
                        <input type="submit" name="enviar" value="6">
                    </div>
                </div>
            </form>
            <form id="product-container" class="product-container" method="POST"
                action="<?php echo $_SERVER['PHP_SELF'];?>">
                <h3>Comestibles</h3>
                <img src="img/muebles.webp" />
                <h1>$10</h1>
                <div class="opciones">
                    <input type="number" name="cant" value="1" min="1">
                    <abbr title="Ofertas de suscripción!!">
                        <div class="image-container-1">
                            <h2>%20</h2>
                        </div>
                    </abbr>
                    <div class="button-add">
                        <p>Agregar</p>
                        <input type="submit" name="enviar" value="6">
                    </div>
                </div>
            </form>
        </div>

        <?php
        $hora=date("H:i:s");
        
            if (isset($_POST['enviar'])){

                    $codigo = $_POST['enviar'];
                    $cantidad = $_POST['cant'];
        
                    $consulta = "SELECT * FROM tienda WHERE codigo = '$codigo'"; 
                    $resultado = $mysqli->query($consulta);
        
                    if ($resultado->num_rows > 0) { 
                    while ($fila = $resultado->fetch_assoc()) {
                        $producto = $fila['producto'];
                        $precio = $fila['precio_tienda']; 
                      }   
                    }
        
                    $producto1 = "";
                    $cantidad1 = "";
        
                    $sql1 = "SELECT*FROM pedidos WHERE codigo = '$codigo' AND id_usuario ='$id_usuario'";
                    $consulta3 = $mysqli->query($sql1);
                    
                    while($fila1=mysqli_fetch_array ($consulta3)){
                        if ($fila1['codigo'] == $codigo){
                            $producto1 = $fila1["producto"];
                            $cantidad1 = $fila1['cantidad'];
                        }
                    }
                    

        
                    if(($producto1 == "") && ($cantidad1 == "")){
                        if ($cantidad >= 2){
                            $suma = $precio*$cantidad;
                            $precio = $suma;
                        }
                
                        $consulta1 = "INSERT INTO pedidos (id, codigo, id_usuario, producto, precio, cantidad, fecha, descuento) VALUES (NULL, '$codigo', '$id_usuario', '$producto', '$precio', '$cantidad', '$hora', '');";
                        $resultado1 = $mysqli->query($consulta1);
        
                    }else{
                        $suma1 = $cantidad1+$cantidad;
                        $suma = $precio*$suma1;
                        $precio = $suma;
        
                        $sql2 = "UPDATE pedidos SET producto='$producto', precio='$precio', cantidad='$suma1' WHERE id_usuario ='$id_usuario' AND codigo ='$codigo'";
                        $consulta4 = $mysqli->query($sql2);
                    }
                    
                    header("Location: ../productos");
                    exit;
                    
                    if ((!$consulta) || (!$sql1) || (!$consulta1) || (!$sql2)) {
                     header("Location: ../servidor%20caido");
                     exit;
                    }
            } 
            ?>
        <div class="contenedor">
            <div class="boton">
                <a href="../lista">Ver mi lista de productos</a>
            </div>
        </div>
        <script src="js/main.js" defer></script>
</body>

</html>