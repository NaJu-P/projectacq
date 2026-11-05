<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="img/logo.png">
    <link rel="icon" type="image/png" href="img/logo.png">
    <title>Cerrando sesion</title>
</head>

<body>
    <h1>Cerrando Sesion...</h1>
    <?php
     
    session_start();

    $id_usuario = $_SESSION['id_usuario'];
    $usuario  =$_SESSION['usuario'];

    session_unset();
    if ((!$usuario) || (!$id_usuario)) {
        header("Location: ../servidor%20caido");
        exit;
    }else{
        header("Refresh: 3; URL=../");
    }
    
    ?>
</body>

</html>