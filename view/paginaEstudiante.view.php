<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../css/estilos.css">
   <title>Página de Estudiante</title>
   <style>
.mensaje{font-size: 25px; text-align: center;}
   </style>
</head>
<body>
<div class="contenedor">
      <h1 class="titulo">ESCUELA PRIMARIA 6 DE DICIEMBRE DE 1810</h1>
      <hr class="border">
      <nav class="menu">
         <ul>
            <li><a href="../index.php">INICIO</a></li>
            <li><a href="../consultaEstudiante.php">CONSULTAR CALIFICACIÓN</a></li>
            <li><a href="../cerrar.php">CERRAR SESIÓN</a></li>
         </ul>
      </nav>
   <h1>PAGINA ESTUDIANTE</h1>
   <div class="mensaje">
   <?php
   echo isset($_SESSION['nombre']) ? "Bienvenido ".ucfirst($_SESSION['nombre']) ." ingresaste como ¡ESTUDIANTE!" : "Bienvenido, estudiante"; ?>
   </div>
</body>
</html>