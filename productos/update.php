<?php
	
	require 'conexion.php';

	if (isset($_POST['pro'])){
		$id = $_POST['id'];
		$cantidad = $_POST['cant'];

		$codigo = $_POST['codigo'];

		$sql1 = "SELECT*FROM tienda WHERE codigo = '$codigo'";
		$consulta = $mysqli->query($sql1);
		while ($fila = $consulta->fetch_array()){
			$precio_old = $fila['precio'];
		}

		$suma = $precio_old*$cantidad;
		$precio = $suma;

		$producto = $_POST['pro'];		

		$sql = "UPDATE pedidos SET producto='$producto', precio='$precio', cantidad='$cantidad' WHERE id ='$id'";
		$resultado = $mysqli->query($sql);
	}
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/jpg" href="img/photo.jpg">
		<link rel="stylesheet" href="css/estilos 4.css">
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3 style="color: white;">REGISTRO MODIFICADO</h3>
				<?php } else { ?>
				<h3 style="color: white;">ERROR AL MODIFICAR</h3>
				<?php } ?>
				
				<a href="../productos">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
