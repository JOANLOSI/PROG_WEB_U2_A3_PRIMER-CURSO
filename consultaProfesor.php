<?php
session_start();
require 'conexion.php';
if (!isset($_SESSION['id'])) {
   // Si no hay sesión iniciada o el usuario no es un estudiante, redirige a la página de inicio.
   header('Location: index.php');
   exit();
}
// Consultar calificaciones de los estudiantes
//$id = $_SESSION['id'];
//$stm = $conexion->prepare('SELECT * FROM calificaciones');
$stm = $conexion->prepare('SELECT c.matricula, u.Nombre_usuario, c.programacion, c.matematicas, c.algoritmos, c.logica, c.SO, c.BD FROM calificaciones c JOIN usuarios u ON c.matricula = u.ID_usuario');
$stm->execute();
$calificaciones = $stm->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/estilos.css">
   <title>Consulta califiaciones Profesor</title>
   <style>
      body{
         padding-left: 20px;
      }
      table{
         margin-top: 20px;
      }
      th, td {
         border: 1px solid #0611F5;
         padding: 8px;
         text-align: center;
      }
      h3 {
         margin-bottom: 40px;
      }
      .menu{
  margin-bottom: 20px;
}
      </style>
</head>

<body>
   <div class="contenedor">
      <h1 class="titulo">ESCUELA PRIMARIA 6 DE DICIEMBRE DE 1810</h1>
      <hr class="border">
      <nav class="menu">
         <ul>
         <li><a href="#">INICIO</a></li>
            <li><a href="view/registroCalificacion.view.php">REGISTRAR CALIFICACIÓN</a></li>
            <li><a href="consultaProfesor.php">CONSULTAR</a></li>
            <li><a href="cerrar.php">CERRAR SESIÓN</a></li>
         </ul>
      </nav>
      <div class="tabla">
      <?php
      echo isset($_SESSION['nombre']) ? '<h3>' . "Bienvenido profesor " . ucfirst($_SESSION['nombre']) . " las calificaciones de los estudiantes son las siguientes:" : "Bienvenido, profesor";'</h3>' ?>
      </div>
      <!-- Mostrar las calificaciones en una tabla -->
      <?php if ($calificaciones) : ?>
         <center>
            <h2>Calificaciones de los estudiantes</h2>

            <table border="25">
               <tr>
                  <th>Matricula</th>
                  <th>Nombre</th>
                  <th>Programación</th>
                  <th>Matemáticas</th>
                  <th>Algoritmos</th>
                  <th>Lógica</th>
                  <th>SO</th>
                  <th>BD</th>
               </tr>
               <?php foreach ($calificaciones as $estudiante) : ?>
                  <tr>
                  <td><?php echo $estudiante['matricula']; ?></td>
                  <td><?php echo $estudiante['Nombre_usuario']; ?></td>
                  <td><?php echo $estudiante['programacion']; ?></td>
                  <td><?php echo $estudiante['matematicas']; ?></td>
                  <td><?php echo $estudiante['algoritmos']; ?></td>
                  <td><?php echo $estudiante['logica']; ?></td>
                  <td><?php echo $estudiante['SO']; ?></td>
                  <td><?php echo $estudiante['BD']; ?></td>
                  </tr>
               <?php endforeach; ?>
            </table>
         </center>
      <?php else : ?>
         <p>No hay calificaciones registradas.</p>
      <?php endif ?>
</body>

</html>