<?php
session_start();
require("../conexion.php");
//include("../encabezado.php");
/*CREANDO VARIABLES Y ASIGNANDOLE VALORES DE ACUERDO AL NOMBRE DEL CAMPO EN QUE SE ESCRIBEN EN EL FORMULARIO*/
$errores = '';
if (isset($_GET["errores"])) {
   $errores = urldecode($_GET["errores"]);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../css/estilos.css">
   <title>Registro de Usuario</title>
</head>

<body>
   <div class="contenedor">
      <h1 class="titulo">ESCUELA PRIMARIA 6 DE DICIEMBRE DE 1810</h1>
      <hr class="border">
      <nav class="menu">
         <ul>
            <li><a href="../index.php">INICIO</a></li>
            <li><a href="registrarse.view.php">REGISTRARSE</a></li>
            <li><a href="login.view.php">INICIAR SESIÓN</a></li>
            <li><a href="../cerrar.php">CERRAR</a></li>
         </ul>
      </nav>
   </div>
   <div class="formulario">
      <form action="../procesar_registro.php" method="POST" class="formulario" name="login" id="login">
         <div class="campos-container">
            <div class="campo">
               <div class="icono izquierda fa fa-user"></div>
               <input type="text" name="id" placeholder="Id:">
            </div>
            <div class="campo">
               <div class="icono izquierda fa fa-user"><input type="text" name="nombre" placeholder="Nombre:">
               </div>
            </div>
            <div class="campo">
               <div class="icono izquierda fa fa-user"></div>
               <input type="text" name="tipo" placeholder="Tipo de Usuario:">
            </div>
            <div class="campo">
               <div class="icono izquierda fa fa-lock"></div>
               <input type="password" name="password" placeholder="Contraseña:">
            </div>
            <div class="campo">
               <div class="icono izquierda fa fa-lock"></div>
               <input type="password" name="password2" placeholder="Confirma la Contraseña:">
            </div>
         </div>
         <?php if (!empty($errores)) : ?>
            <div class="error-container">
               <div class="error"><?php echo $errores; ?></div>
            </div>
         <?php endif; ?>
         <br />
         <input type="submit" name="submit" value="REGISTRAR">
      </form>
      <p>¿Ya tienes una cuenta?</p>
      <a href="login.view.php">Iniciar sesión</a>
   </div>
</body>