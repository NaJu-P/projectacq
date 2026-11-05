<?php
	
	require '../conexion.php';

	if (isset($_POST['pro'])){
		$id = $_POST['id'];
		$productos = $_POST['pro'];
		if (preg_match('/^[0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $productos)) {
			echo "Invalid product name. Please enter text and/or numbers.";
			$productos = "";
		}else{
			if (preg_match('/^[A-Za-z0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $productos)){
				$productos = $_POST['pro'];  
			}else{
				$productos = "";
			}
		}

		$cantidad = $_POST['cant'];
		if (preg_match('/^[A-Za-z!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $cantidad)){
			$cantidad = null;
		}else{
			if (preg_match('/^[0-9,.\s]+$/', $cantidad)){
				$cantidad = $_POST['cant'];  
			}else{
				$cantidad = null;
			}
		}

		$precio = $_POST['pre'];
		if (preg_match('/^[A-Za-z!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $precio)){
			$precio = null;
			echo "<h3>Solo se permite numeros y decimales.</h3>";
		}else{
			if (preg_match('/^[0-9,.\s]+$/', $precio)){
				$precio = $_POST['pre']; 

				$sql1 = "UPDATE tienda SET precio='$precio' WHERE producto='$productos'";
				$resultado1 = $mysqli->query($sql1);
			}else{
				$precio = null;
				echo "<h1>Solo se permite numeros y decimales.</h1>";
			}
		}

		$descripcion = $_POST['fal'];
		$sql = "UPDATE producto SET nomproducto='$productos', cantidadentrada='$cantidad', preciocompra='$precio', descripcionproducto='$descripcion' WHERE id ='$id'";
		$resultado = $mysqli->query($sql);
	}
	
?>

<html lang="es">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/estilos_encargados.css">
	<link rel="icon" type="image/jpg" href="../img/photo.jpg">
</head>

<body>
    <div class="container">
            <div class="row_2">
                <?php if($resultado) { ?>
                <h3>REGISTRO MODIFICADO</h3>
                <?php } else { ?>
                <h3>ERROR AL MODIFICAR</h3>
                <?php } ?>

                <a href="../Encargados">Regresar</a>

            </div>
    </div>
</body>

</html>