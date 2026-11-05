<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="../js/script_encargados.js" defer></script>
    <title>Encargado</title>
    <link rel="stylesheet" href="../css/estilos_encargados.css">
</head>

<body>
    <div class="contenedor">
        <div class="head">
            <div class="logo">
                <a href="../acq%20project">ACQ Project</a>
            </div>
        </div>
        <div class="cuadro_2">
            <div>
                <form class="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div>
                        <label>ENTRADA</label>
                    </div>
                    <div class="form_cuadro_1">
                        <nav>
                            <label>PRODUCTO</label>
                            <input type="text" required name="pro">
                        </nav>
                        <nav>
                            <label>CANTIDAD</label>
                            <input type="number" name="cant" min="1" value="1">
                        </nav>
                        <nav>
                            <label>PRECIO</label>
                            <input type="number" name="pre" min="50" value="50" step="50">
                        </nav>
                        <nav>
                            <label>DESCRIPCION</label>
                            <select name="fal" min="1">
                                <option>Si</option>
                                <option>No</option>
                            </select>
                        </nav>
                        <div>
                            <input type="submit" value="Agregar" name="entrada" class="agregar">
                        </div>
                    </div>
                </form>
                <table>
                    <tr class="esc_1">
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Descripcion</th>
                        <th><a href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>"><img src="../img/papelera.png" class="img_icon"></a></th>
                    </tr>

                    <?php 
                    
                    require '../conexion.php';
                    session_start();
                    $id_usuario = $_SESSION['id_usuario'];

                        if (isset($_POST['pro'])) {
                        
                            if (isset($_POST['pro'])){
    
                                $productos = $_POST['pro'];
                                if (preg_match('/^[0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $productos)) {
                                    //echo '<script>alert("Esta opción no se puede hacer");</script>';
                                    $productos = null;
                                }else{
                                    if (preg_match('/^[A-Za-z0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $productos)){
                                        $productos = $_POST['pro'];  
                                    }else{
                                        $productos = null;
                                    }
                                }
    
                                $precio = $_POST['pre'];
                                $cantidad = $_POST['cant'];
                                $hora=date("H:i:s");
                                
                                $consulta_existencia = "SELECT * FROM producto WHERE nomproducto = '$productos' AND id_usuario = '$id_usuario'";
                                $resultado_existencia = $mysqli->query($consulta_existencia);
    
                                $consulta_existencia1= "SELECT * FROM tienda WHERE producto = '$productos'";
                                $resultado_existencia1 = $mysqli->query($consulta_existencia1);
    
                                if ($resultado_existencia->num_rows > 0){
                                    if ($resultado_existencia->num_rows == 1){
                                                        
                                    }else{
                                        $fila = mysqli_fetch_assoc($resultado_existencia1);
                                        $codigo = $fila['codigo'];
    
                                        $sql1 = "INSERT INTO producto (id, codigo, id_usuario, id_tabla, nomproducto, preciocompra, cantidadentrada, descripcionproducto, fecha, movimiento, cantidadsalidad, precioventa, total) VALUES (NULL, '$codigo', '$id_usuario', '', '$productos', '$precio', '$cantidad', '$descripcion', '$hora', '', '', '', '');";
                                        $resultado1 = $mysqli->query($sql1);
                                    }
                                                    
                                } else if (preg_match ('/^[A-Za-z0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $resultado_existencia == $resultado_existencia1)){
    
                                    if ($resultado_existencia1->num_rows > 0){
                                                        
                                        $fila = mysqli_fetch_assoc($resultado_existencia1);
                                        $codigo = $fila['codigo'];
    
                                        $resultado3 = "UPDATE tienda SET precio='$precio' WHERE producto='$productos'";
                                        $result4 = $mysqli->query($resultado3);
                                    }else{
                                        $sql2 = "SELECT MAX(codigo) AS highest_code FROM tienda";
                                        $result3 = $mysqli->query($sql2);
                                                        
                                        if ($result3->num_rows > 0) {
                                            $row3 = $result3->fetch_assoc();
                                            $highestCode = $row3['highest_code'];
                                            $highestCode++;
                                        }
    
                                        $codigo = $highestCode;
                                        $resultado2 = "INSERT INTO tienda (codigo, producto, precio) VALUES ('$codigo', '$productos', '$precio')";
                                        $result3 = $mysqli->query($resultado2);
                                    }
    
                                    $descripcion = $_POST['fal'];  
                                                    
                                    $sql1 = "INSERT INTO producto (id, codigo, id_usuario, id_tabla, nomproducto, preciocompra, cantidadentrada, descripcionproducto, fecha, movimiento, cantidadsalidad, precioventa, total) VALUES (NULL, '$codigo', '$id_usuario', '', '$productos', '$precio', '$cantidad', '$descripcion', '$hora', '', 0, 0, 0);";
                                    $resultado1 = $mysqli->query($sql1);
                                }
                            }
                            header('Location: ../Encargados');
                            exit;
                        }
                        
                        ?>
    
                        <?php
                        $sql = "SELECT * FROM producto WHERE id_usuario = '$id_usuario' ORDER BY nomproducto ASC";
                        $resultado = $mysqli->query($sql);
    
                        while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr class="esc_2">
                            <td><?php echo $row['nomproducto']; ?></td>
                            <td><?php echo $row['cantidadentrada']; ?></td>
                            <td>$<?php echo $row['preciocompra']; ?></td>
                            <td><?php echo $row['descripcionproducto']; ?></td>
                            <td><input type="checkbox" name="" id=""></td>
                        </tr>
                        <?php }
                        
                        $sql3 = "SELECT preciocompra FROM producto WHERE id_usuario ='$id_usuario'";
                        $resultado3 = $mysqli->query($sql3);
                        $totalVentas = 0;
                                
                        while ($row1 = $resultado3->fetch_assoc()) {
                            $totalVentas += $row1['preciocompra'];
                        }
                        
                        if (isset($_POST['pro'])){
                            if ((!$sql) || (!$consulta_existencia) || (!$consulta_existencia1) || (!$sql1) || (!$resultado3) || (!$sql2) || (!$resultado2) || (!$sql3)) {
                                header("Location: ../servidor%20caido");
                                exit;
                            }
                        }
    
                    ?>

                    <tr class="esc_2">
                        <td>Total:</td>
                        <td colspan="7" style="text-align: right;"><?php echo "$".$totalVentas;?></td>
                    </tr>
                </table>
            </div>

            <div>
            <form class="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div>
                    <label>SALIDAD</label>
                </div>
                <div class="form_cuadro_1">
                    <nav>
                        <label>PRODUCTO</label>
                        <input type="text" required name="pro">
                    </nav>
                    <nav>
                        <label>CANTIDAD</label>
                        <input type="number" name="cant" min="1" value="1">
                    </nav>
                    <nav>
                        <label>PRECIO</label>
                        <input type="number" name="pre" min="50" value="50" step="50">
                    </nav>
                    <nav>
                        <label>DESCRIPCION</label>
                        <select name="fal" min="1">
                            <option>Si</option>
                            <option>No</option>
                        </select>
                    </nav>
                    <div>
                        <input type="submit" value="Agregar" name="salida" class="agregar">
                    </div>
                </div>
            </form>

            <table>
                <tr class="esc_1">
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th><a href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>"><img src="../img/papelera.png" class="img_icon"></a></th>
                </tr>

                <?php 
    
                        if (isset($_POST['pro'])) {
                        
                            if (isset($_POST['pro'])){
    
                                $productos = $_POST['pro'];
                                if (preg_match('/^[0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $productos)) {
                                    //echo '<script>alert("Esta opción no se puede hacer");</script>';
                                    $productos = null;
                                }else{
                                    if (preg_match('/^[A-Za-z0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $productos)){
                                        $productos = $_POST['pro'];  
                                    }else{
                                        $productos = null;
                                    }
                                }
    
                                $precio = $_POST['pre'];
                                $cantidad = $_POST['cant'];
                                $hora=date("H:i:s");
                                
                                $consulta_existencia = "SELECT * FROM producto WHERE nomproducto = '$productos' AND id_usuario = '$id_usuario'";
                                $resultado_existencia = $mysqli->query($consulta_existencia);
    
                                $consulta_existencia1= "SELECT * FROM tienda WHERE producto = '$productos'";
                                $resultado_existencia1 = $mysqli->query($consulta_existencia1);
    
                                if ($resultado_existencia->num_rows > 0){
                                    if ($resultado_existencia->num_rows == 1){
                                                        
                                    }else{
                                        $fila = mysqli_fetch_assoc($resultado_existencia1);
                                        $codigo = $fila['codigo'];
    
                                        $sql1 = "INSERT INTO producto (id, codigo, id_usuario, id_tabla, nomproducto, preciocompra, cantidadentrada, descripcionproducto, fecha, movimiento, cantidadsalidad, precioventa, total) VALUES (NULL, '$codigo', '$id_usuario', '', '$productos', '$precio', '$cantidad', '$descripcion', '$hora', '', '', '', '');";
                                        $resultado1 = $mysqli->query($sql1);
                                    }
                                                    
                                } else if (preg_match ('/^[A-Za-z0-9!@#$%^&*()_+\-=\[\]{};:\'",.<>?`~\s]+$/', $resultado_existencia == $resultado_existencia1)){
    
                                    if ($resultado_existencia1->num_rows > 0){
                                                        
                                        $fila = mysqli_fetch_assoc($resultado_existencia1);
                                        $codigo = $fila['codigo'];
    
                                        $resultado3 = "UPDATE tienda SET precio='$precio' WHERE producto='$productos'";
                                        $result4 = $mysqli->query($resultado3);
                                    }else{
                                        $sql2 = "SELECT MAX(codigo) AS highest_code FROM tienda";
                                        $result3 = $mysqli->query($sql2);
                                                        
                                        if ($result3->num_rows > 0) {
                                            $row3 = $result3->fetch_assoc();
                                            $highestCode = $row3['highest_code'];
                                            $highestCode++;
                                        }
    
                                        $codigo = $highestCode;
                                        $resultado2 = "INSERT INTO tienda (codigo, producto, precio) VALUES ('$codigo', '$productos', '$precio')";
                                        $result3 = $mysqli->query($resultado2);
                                    }
    
                                    $descripcion = $_POST['fal'];  
                                                    
                                    $sql1 = "INSERT INTO producto (id, codigo, id_usuario, id_tabla, nomproducto, preciocompra, cantidadentrada, descripcionproducto, fecha, movimiento, cantidadsalidad, precioventa, total) VALUES (NULL, '$codigo', '$id_usuario', '', '$productos', '$precio', '$cantidad', '$descripcion', '$hora', '', 0, 0, 0);";
                                    $resultado1 = $mysqli->query($sql1);
                                }
                            }
                            header('Location: ../Encargados');
                            exit;
                        }
                        
                        ?>
    
                        <?php
                        $sql = "SELECT * FROM producto WHERE id_usuario = '$id_usuario' ORDER BY nomproducto ASC";
                        $resultado = $mysqli->query($sql);
    
                        while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                        <tr class="esc_2">
                            <td><?php echo $row['nomproducto']; ?></td>
                            <td><?php echo $row['cantidadentrada']; ?></td>
                            <td>$<?php echo $row['preciocompra']; ?></td>
                            <td><?php echo $row['descripcionproducto']; ?></td>
                            <td><input type="checkbox" name="" id=""></td>
                        </tr>
                        <?php }
                        
                        $sql3 = "SELECT preciocompra FROM producto WHERE id_usuario ='$id_usuario'";
                        $resultado3 = $mysqli->query($sql3);
                        $totalVentas = 0;
                                
                        while ($row1 = $resultado3->fetch_assoc()) {
                            $totalVentas += $row1['preciocompra'];
                        }
                        
                        if (isset($_POST['pro'])){
                            if ((!$sql) || (!$consulta_existencia) || (!$consulta_existencia1) || (!$sql1) || (!$resultado3) || (!$sql2) || (!$resultado2) || (!$sql3)) {
                                header("Location: ../servidor%20caido");
                                exit;
                            }
                        }
        
                ?>

                <tr class="esc_2">
                    <td>Total:</td>
                    <td colspan="7" style="text-align: right;"><?php echo "$".$totalVentas;?></td>
                </tr>
            </table>
            </div>
        </div>

        <div class="cuadro_3">
            <div class="nueva_tabla">
                <a href="#">hacer una nueva tabla</a>
            </div>

            <div class="guardar">
                <a href="../acq%20project">Guardar</a>
            </div>
        </div>
    </div>

    <div id="confirm-modal" class="modal">
        <div class="modal-content">
            <span class="close" id="modal-close">&times;</span>
            <p>¿Estás seguro de que deseas eliminar este registro?</p>
            <button id="modal-cancel" class="btn-cancel">Cancelar</button>
            <button id="modal-confirm" class="btn-confirm">Eliminar</button>
        </div>
    </div>
</body>

</html>