<?php
session_start();
require 'conexion.php';
if (!isset($_SESSION['id'])) {
   // Si no hay sesión iniciada o el usuario no es un estudiante, redirige a la página de inicio.
   header('Location: index.php');
}
// Consultar calificaciones del estudiante
$id = $_SESSION['id'];
$stm = $conexion->prepare('SELECT * FROM calificaciones WHERE matricula = :id');
$stm->execute(array(':id' => $id));
$calificaciones = $stm->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/estilos.css">
   <title>Página de Estudiante</title>
   <!--<style>
      .mensaje {
         font-size: 25px;
         text-align: center;
      }
   </style>-->
</head>

<body>
   <div class="contenedor">
      <h1 class="titulo">ESCUELA PRIMARIA 6 DE DICIEMBRE DE 1810</h1>
      <hr class="border">
      <nav class="menu">
         <ul>
            <li><a href="#">INICIO</a></li>
            <li><a href="consultaEstudiante.php">CONSULTAR CALIFICACIÓN</a></li>
            <li><a href="cerrar.php">CERRAR SESIÓN</a></li>
         </ul>
      </nav>
      <div class="mensaje">
      <?php
      
      echo isset($_SESSION['nombre']) ? "Bienvenido estudiante " . ucfirst($_SESSION['nombre']) . " tus calificaciones son las siguientes:" : "Bienvenido, estudiante"; ?>
      </div>

      <!-- Mostrar las calificaciones en una tabla -->
      <?php if ($calificaciones) : ?>
         <center>
            <h2>Calificaciones</h2>
         </center>
         <center>
            <table border="15">
               <tr>
                  <th>Materia</th>
                  <th>Calificación</th>
               </tr>
               <?php foreach ($calificaciones as $materia => $calificacion) : ?>
                  <tr>
                     <td><?php echo ucfirst($materia); ?></td>
                     <td><?php echo $calificacion; ?></td>
                  </tr>
               <?php endforeach; ?>
            </table>
         </center>
      <?php else : ?>
         <p>No tiene calificaciones registradas el estudiante.</p>
      <?php endif ?>
</body>

</html>