<?php
session_start();
require '../conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../css/estilos.css">
   <title>Registro de Calificciones</title>
</head>

<body>
   <div class="contenedor">
      <h1 class="titulo">ESCUELA PRIMARIA 6 DE DICIEMBRE DE 1810</h1>
      <hr class="border">
      <nav class="menu">
         <ul>
            <li><a href="#">INICIO</a></li>
            <li><a href="registroCalificacion.view.php">REGISTRAR CALIFICACIÓN</a></li>
            <li><a href="../consultaProfesor.php">CONSULTAR</a></li>
            <li><a href="../cerrar.php">CERRAR SESIÓN</a></li>
         </ul>
      </nav>
   </div>

   <h2>REGISTRO DE CALIFICACIONES</h2>

   <div class="mensaje">
      <?php
      echo isset($_SESSION['nombre']) ? "Bienvenido " . ucfirst($_SESSION['nombre']) . " ingresaste como ¡PROFESOR!" : "Bienvenido, profesor"; ?>
   </div>

   </div>
   <div class="formulario">
      <form action="../registrarCalificacion.php" method="POST" class="formulario">
         <div class="campos-container">
            <div class="campo">
               <label for="id">ID del Estudiante:</label>
               <input type="text" name="id" placeholder="Id Estudiante:">
            </div>

            <div class="campo">
               <label for="nombre">Nombre:</label>
               <input type="text" name="nombre" placeholder="Nombre:">
            </div>

            <div class="campo">
               <label for="programacion">Programación: </label>
               <input type="text" name="programacion" placeholder="Calificación:">
            </div>

            <div class="campo">
               <label for="matematicas">Matematicas:</label>
               <input type="text" name="matematicas" placeholder="Calificación:">
            </div>
            <div class="campo">
               <label for="algoritmos">Algoritmos:</label>
               <input type="text" name="algoritmos" placeholder="Calificación:">
            </div>
            <div class="campo">
               <label for="logica">Lógica:</label>
               <input type="text" name="logica" placeholder="Calificación:">
            </div>
            <div class="campo">
               <label for="so">S. O.</label>
               <input type="text" name="so" placeholder="Calificación:">
            </div>
            <div class="campo">
               <label for="bd">B. D.</label>
               <input type="text" name="bd" placeholder="Calificación:">
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

</html>