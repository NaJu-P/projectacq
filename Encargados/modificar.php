<?php
	require '../conexion.php';
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM producto WHERE id = '$id'";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);
	
?>
<html lang="es">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/estilos_encargados.css">
	<link rel="icon" type="image/jpg" href="../img/photo.jpg">
</head>

<body>
    <div class="head">
        <div class="logo">
            <a href="../">ACQ Project</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h3 style="text-align:center">MODIFICAR REGISTRO</h3>
        </div>
        <form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
            <table class="tabla">
                <tr class="esc_1">
                    <th>PRODUCTO</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>DESCRIPCION</th>
                </tr>

                <tr class="esc_2">
                    <td><input type="text" required name="pro" value="<?php echo $row['nomproducto'];?>"></td>
                    <td><input type="number" name="cant" value="<?php echo $row['cantidadentrada']; ?>" min="0"
                            value="1"></td>
                    <td><input type="number" name="pre" value="<?php echo $row['preciocompra'];?>" min="50" value="50"
                            step="50"></td>
                    <td><select class="seleccion" name="fal" value="<?php echo $row['descripcionproducto']; ?>">
                            <option>Si</option>
                            <option>No</option>
                        </select></td>
                </tr>
            </table>
            <div class="form-group">
                <a href="../Encargados" class="btn-default"><b>Regresar</b></a>
                <div class="btn-primary">
                    <p><b>Guardar</b></p>
                    <input type="submit">
                </div>
            </div>
        </form>
    </div>
</body>

</html>