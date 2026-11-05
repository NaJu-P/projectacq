<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="img/logo.png">
    <script src="js/script_2.js" defer></script>
    <title>Encargado</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="head">
        <div class="logo">
            <a href="../">ACQ Project</a>
        </div>
    </div>
    <div class="mensaje">
        <div class="mensaje_1">
            <h2>Bienvenido a su control de inventarios.</h2>
        </div>
    </div>
    <div class="cuadro_1">
        <form class="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="titulo">
                <label class="pro"><b>PRODUCTO</b></label><br><br>
                <input type="text" required name="pro">
            </div>
            <div class="cantidad">
                <label class="cant"><b>CANTIDAD</b></label><br><br>
                <input type="number" name="cant" min="1" value="1">
            </div>
            <div class="precio">
                <label class="pre"><b>PRECIO</b></label><br><br>
                <input type="number" name="pre" min="50" value="50" step="50">
            </div>
            <div class="falta">
                <label class="fal"><b>DESCRIPCION</b></label><br><br>
                <select class="seleccion" name="fal" min="1">
                    <option>Si</option>
                    <option>No</option>
                </select>
            </div>
            <div class="campo">
                <br><br><input type="submit" value="Agregar" class="cam">
            </div>
        </form>
    </div>
    <div class="cuadro_2">
        <table>
            <tr class="esc_1">
                <th>ID</th>
                <th>Codigo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th colspan="2">Herramientas</th>
            </tr>

            <tr class="esc_2">
                <td>identificador</td>
                <td>Codigo del producto</td>
                <td>Un ejemplo de un producto aqui</td>
                <td>una cantidad indeterminada</td>
                <td>Un precio indeterminado</td>
                <td>la descripcion si llego el producto o no</td>
                <td colspan="2">Editar y eliminar</td>
            </tr>

            <tr class="esc_2">
                <td>identificador</td>
                <td>5</td>
                <td>Cereza</td>
                <td>$10.000</td>
                <td>12</td>
                <td>si</td>
                <td colspan="2"><a href="../Registro"><img src="img/boligrafo.png"
                            style="width: 25px; heigth: 25px;"></a><a href="../Registro"><img src="img/papelera.png"
                            style="width: 25px; heigth: 25px;"></a></td>
            </tr>

            <?php 
        require 'conexion.php';

        if (isset($_POST['pro'])) {
            header('Location: ../Registro');
            exit;
        }
        ?>

            <tr class="esc_2">
                <td>Total:</td>
                <td colspan="8" style="text-align: right;">$0</td>
            </tr>
        </table>
    </div>

    <div class="guardar">
        <a href="../Registro">Registrarme aqui</a>
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