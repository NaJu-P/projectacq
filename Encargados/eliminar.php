<?php
	
	require '../conexion.php';

	$id = $_GET['id'];
	
	$sql = "DELETE FROM producto WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	
?>

<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/estilos_encargados.css">
		<link rel="icon" type="image/jpg" href="../img/photo.jpg">
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
				<?php if($resultado) { ?>
				<h3>REGISTRO ELIMINADO</h3>
				<?php } else { ?>
				<h3>ERROR AL ELIMINAR</h3>
				<?php } ?>
				
				<a href="../Encargados">Regresar</a>
				
				</div>
			</div>
		</div>
	</body>
</html>
