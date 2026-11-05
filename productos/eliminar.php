<?php
	
	require 'conexion.php';

	$id = $_GET['id'];
	
	$sql = "DELETE FROM pedidos WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/jpg" href="photo.jpg">
		<link rel="stylesheet" href="css/estilos 4.css">
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3 style="color: white;">REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3 style="color: white;">ERROR AL ELIMINAR</h3>
				<?php } ?>
				
				<a href="../productos">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
