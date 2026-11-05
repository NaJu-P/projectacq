<!DOCTYPE html>

<head>
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos 4.css" />
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="js/main.js" defer></script>
    <title>Project ACQ-productos</title>
</head>

<body>
    <div class="page-nav">
        <h1>Mi tienda</h1>
        <a id="checkout" class="button-checkout" href="../acq%20project">Pagar</a>
    </div>
    <div class="catalogo">
        <h2>Nuestros catalogos</h2>
    </div>
    <div class="page-content">
        <form id="product-container" class="product-container" method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h3>Cerveza corona</h3>
            <img src="img/corona.jfif">
            <h1>$50</h1>
            <input type="number" name="cant" value="1" min="1">
            <div class="button-add">
                <p>Agregar</p>
                <input type="submit" name="enviar">
            </div>
        </form>

        <form id="product-container" class="product-container" method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h3>Carne</h3>
            <img src="img/carne.jpg" />
            <h1>$300</h1>
            <input type="number" name="cant" value="1" min="1">
            <div class="button-add">
                <p>Agregar</p>
                <input type="submit" name="enviar">
            </div>
        </form>

        <form id="product-container" class="product-container" method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h3>Muebles</h3>
            <img src="img/muebles.jpg" />
            <h1>$250</h1>
            <input type="number" name="cant" value="1" min="1">
            <div class="button-add">
                <p>Agregar</p>
                <input type="submit" name="enviar">
            </div>
        </form>

        <form id="product-container" class="product-container" method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h3>Pesas</h3>
            <img src="img/pesas.jpg" />
            <h1>$200</h1>
            <input type="number" name="cant" value="1" min="1">
            <div class="button-add">
                <p>Agregar</p>
                <input type="submit" name="enviar">
            </div>
        </form>

        <form id="product-container" class="product-container" method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h3>Comestibles</h3>
            <img src="img/muebles.webp" />
            <h1>$10</h1>
            <input type="number" name="cant" value="1" min="1">
            <div class="button-add">
                <p>Agregar</p>
                <input type="submit" name="enviar">
            </div>
        </form>
        <form id="product-container" class="product-container" method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h3>Comestibles</h3>
            <img src="img/muebles.webp" />
            <h1>$10</h1>
            <input type="number" name="cant" value="1" min="1">
            <div class="button-add">
                <p>Agregar</p>
                <input type="submit" name="enviar">
            </div>
        </form>
        <form id="product-container" class="product-container" method="post"
            action="<?php echo $_SERVER['PHP_SELF'];?>">
            <h3>Comestibles</h3>
            <img src="img/muebles.webp" />
            <h1>$10</h1>
            <input type="number" name="cant" value="1" min="1">
            <div class="button-add">
                <p>Agregar</p>
                <input type="submit" name="enviar">
            </div>
        </form>
    </div>
    <div class="ver_lista">
        <a href="../lista%20cerrar">ver lista de productos</a>
    </div>
    <?php
            if (isset($_POST['enviar'])){
                    header('Location: ../productos');
                    exit;	
            }   
        ?>
    </div>
</body>

</html>