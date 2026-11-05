<?php
/* En este ejemplo lo primero que se hace es validar que se halla llegado
 * a esta p�gina luego de hacer un intento de login, ya que de lo contrario 
 * se podr�a tratar de un intento de forzar el acceso a la aplicaci�n, esto
 * puede lograrse de varias maneras, la que aqu� se usa es validar si el 
 * arreglo $_POST y m�s espec�ficamente el �ndice 'usuario' ya fue inicializado
 * si un usuario intentara llegar a esta p�gina inyectando c�digo por la URL
 * ser�a rechazado ya que la informaci�n llegar�a al arreglo $_REQUEST o al
 * arreglo $_GET
 */
 
 
 
 
 
 
 
 
 
 
if (!isset($_POST['usuario'])) {
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>Unidad 4 - Ejemplo 4 Error de ingreso </title>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>

<body>
    <?php
    /* Si la variable $_POST['usuario'] no est� inicializada se muestra un
     * aviso al usuario de que no ha hecho login correctamente, es decir, que 
     * no lleg� a esta p�gina habiendo hecho login, y que ser� redireccionado
     * a la p�gina de login
     */
    echo "No se ha hecho login correctamente, ser&aacute; redireccionado a "
    . "la p&aacute;gina de login <br />";
    echo "Si no es redireccionado de clic <a href = '../'>aqui</a>";
    /* la funci�n header() permite el reenv�o de los encabezados de una
     * p�gina o recurso web, lo que hace que pueda ser recargadao como en este 
     * usando una cadena que refresca el navegador, pero permite esperar un 
     * determinado n�mero de segundos durante los cuales se puede mostrar el 
     * mensaje que est� arriba.
     */
    header("Refresh: 5; URL=../");
} else {
    ?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Unidad 4 - Ejemplo 4 Valida Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    </head>

    <body>
        <p>
            <?php
            /* Si por el contrario el usuario llega a esta p�gina luego de hacer
             * un intento de login, se validan los datos que puso en el
             * formulario si son iguales que lo contenido en las variables
             * $usuario y $contrasena se da acceso, si no se da un mensaje que 
             * indica que los datos no coinciden con los almacenados y se 
             * devuelve al usuario a la p�gina de login. Cuando se estudie
             * el tema de bases de datos en los siguientes niveles del curso
             * se podr� utilizar esta base para comparar los datos del formulario
             * con los contenidos en la base de datos, y asi mismo 
             * al usar sesiones se puede hacer que la pr�xima vez que el usuario
             * intente ingresar a la aplicaci�n no tenga que volver a poner
             * los datos de login, esto siempre y cuando se tengan las
             * garant�as de seguridad necesarias
             */
			 
			 
$servername = "localhost";
$database = "acqproject";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    header("Location: ../servidor%20caido");
    exit;
}
 
// echo "Connected successfully conexion excelente ";








 $consulta = mysqli_query ($conn, "SELECT * FROM usuarios ");


// Ciclo que sera en encargado de mostrar los registros de la BD
 while($fila=mysqli_fetch_array ($consulta)){
      if($fila["usuario_nombre"] == $_POST['usuario']){
	// echo " usuario :     "; 
     // printf ( $fila["usuario_nombre"]) ; impprimo usuario
  
    			 
           
			 
			$usuario = $fila["usuario_nombre"];
            $contrasena = $fila["usuario_password"];
           }
    //else   {
    //  echo "0 results";
	   //retorne al men� a introducir el dato del texto aimprimir en qr code por eso sale que no puede ejecutar creaci�n de qrcode
//	}
//} este es el corche del While lo dejo abajo para que me imprima todos los qrcode delos alumnos
  }			
			
			
			
			
			 //$usuario = "Juan";
            //$contrasena = "Pablo";
			
            if (($_POST['usuario'] != $usuario) or
                    ($_POST['contraseña'] != $contrasena)) {
                echo "El usuario o la contrase&ntilde;a son incorrectos "
                . "ser&aacute; redireccionado a la p&aacute;gina de login<br />";
                echo "Si no es redireccionado de clic "
                . "<a href = '../'>aqui</a>";
                header("Refresh: 5; URL=../");
            } else {
			  // header("Location: ../../FindJob1/indexFindJob.php");
               // echo "<h1>Bienvenid@ FINDJOB</h1>";
               // echo "Su usuario y contrase&ntilde;a son correctos <br />";
				 header("Location: ../acq%20project");

                 session_start();
                 $_SESSION['usuario'] = $usuario;
                 
                if (isset($_POST['recordarme'])) {
                    if ($_POST['recordarme'] == TRUE) {
                        echo "Usted quiere que se recuerden su datos";
                    }
                }
            }
        }
 //}// ingreso corchea del while para validar el login
        ?>




            <!----------------------------------------------------------------------
            </p>
            <p><a href="../../FindJob1/indexFindJob.php">EMPRESA FINDJOB </a></p>
            <p><a href="../../FindJob1/indexFindJob.php"><img src="../../FindJob1/logo 2 finbjod.jpeg" alt="FINDJOD" width="384" height="189" border="0" longdesc="LOGO DE FINDJOB"></a></p> 
            <p>&nbsp;</p>
            <p>&nbsp;</p> -->
    </body>

    </html>