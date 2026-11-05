<?php
	require '../conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM pedidos WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<html lang="es">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/estilos 4.css" rel="stylesheet">
    <link rel="icon" type="image/jpg" href="img/photo.jpg">
</head>

<body>
    <div class="container">
        <br><br>
        <div class="row">
            <h3 style="text-align:center; color: white;">MODIFICAR REGISTRO</h3>
        </div>
        <br>
        <form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
            <input type="hidden" id="" name="id" value="<?php echo $row['id']; ?>">
            <table class="tabla">
                <tr class="esc_1">
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>

                <tr class="esc_2">
                    <?php 
						require '../conexion.php';

						$sql = "SELECT producto FROM tienda";
						$resultado = $mysqli->query($sql);

						?>
                    <td><input type="number" name="codigo" value="<?php echo $row['codigo'];?>" readonly></td>
                    <td><select name="pro">
                            <option><?php echo $row['producto'];?></option>
                            <?php if ($resultado->num_rows > 0) { while ($fila = $resultado->fetch_assoc()) { echo "<option>".$fila['producto']."</option>"; } }?>
                        </select></td>
                    <td><input type="number" name="pre" value="<?php echo $row['precio'];?>" readonly></td>
                    <td><input type="number" name="cant" value="<?php echo $row['cantidad'];?>"></td>
                </tr>
            </table>
            <div class="form-group">
                <a href="../productos" class="btn-default"><b>Regresar</b></a>
                <div class="btn-primary">
                    <p><b>Guardar</b></p>
                    <input type="submit">
                </div>
            </div>
        </form>
    </div>
</body>

</html>