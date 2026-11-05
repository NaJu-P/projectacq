<?php
	
	$mysqli = new mysqli('', '', '', '');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>