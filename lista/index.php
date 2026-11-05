<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nerko+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos 4.css" />
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="js/main.js" defer></script>
    <title>Project ACQ-productos</title>
</head>

<body>
    <div class="container">
        <div class="page-nav">
            <h1>Tienda</h1>
        </div>
        <div class="tabla">
            <div class="mensaje">
                <h1>Su lista de productos</h1>
            </div>
            <table>
                <tr class="esc_1">
                    <th>id</th>
                    <th>Codigo</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Funciones</th>
                </tr>
                <?php
        require '../conexion.php';
        session_start();
        $id_usuario = $_SESSION['id_usuario'];

            $consulta2 = "SELECT * FROM pedidos WHERE id_usuario = '$id_usuario' ORDER BY fecha DESC"; 
            $resultado2 = $mysqli->query($consulta2);
        
                while($row = $resultado2->fetch_array(MYSQLI_ASSOC)) { ?>
                <tr class="esc_2">
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['codigo']; ?></td>
                    <td><?php echo $row['producto']; ?></td>
                    <td>$<?php echo $row['precio']; ?></td>
                    <td><?php echo $row['cantidad']; ?></td>
                    <td class="link"><a href="modificar.php?id=<?php echo $row['id']; ?>"><img
                                src="img/boligrafo.png"></img></a>
                        <a href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>"><img
                                src="img/papelera.png"></a>
                    </td>
                </tr>
                <?php } 
            
            $sql = "SELECT SUM(precio) AS total_ventas FROM pedidos WHERE id_usuario = '$id_usuario'";
            $resultado3 = $mysqli->query($sql);
            
            if ($resultado3->num_rows > 0) {
            $fila = $resultado3->fetch_assoc();
            $totalVentas = $fila["total_ventas"];
            } else {
            echo "No se encontraron ventas.";
            }
            
            if ((!$consulta2) || (!$sql)) {
                header("Location: ../servidor%20caido");
                exit;
            }
            ?>

                <tr class="esc_2">
                    <td>Total:</td>
                    <td colspan="6" style="text-align: right;"><?php echo "$".$totalVentas;?></td>
                </tr>

            </table>
        </div>
        <div class="caja">
            <div class="caja_1">
                <a href="../productos" class="regresar">Volver a mi tienda</a>
                <a href="../acq%20project" class="boton">Guardar mi pedido</a>
            </div>
        </div>
    </div>

    <div id=" confirm-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="modal-close">&times;</span>
            <p>¿Estás seguro de que deseas eliminar este registro?</p>
            <button id="modal-cancel" class="btn-cancel">Cancelar</button>
            <button id="modal-confirm" class="btn-confirm">Eliminar</button>
        </div>
    </div>
</body>

</html>