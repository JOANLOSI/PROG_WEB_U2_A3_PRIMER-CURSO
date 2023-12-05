<?php
session_start();
require 'conexion.php';
//Comprobando si existe una sesión iniciada, si existe se redirige al index.php
if (isset($_SESSION["id"])) {
   if (isset($_POST["submit"])) {
      $id = $_POST["id"];
      $nombre = filter_var(strtolower($_POST["nombre"]), FILTER_SANITIZE_STRING);
      $programacion = $_POST["programacion"];
      $matematicas = $_POST["matematicas"];
      $algoritmos = $_POST["algoritmos"];
      $logica = $_POST["logica"];
      $so = $_POST["so"];
      $bd = $_POST["bd"];

      // Consulta SQL para insertar datos en la tabla calificaciones
      $stm = $conexion->prepare("INSERT INTO calificaciones (matricula, programacion, matematicas, algoritmos, logica, SO, BD) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stm->bindParam(1, $id);
      $stm->bindParam(2, $programacion);
      $stm->bindParam(3, $matematicas);
      $stm->bindParam(4, $algoritmos);
      $stm->bindParam(5, $logica);
      $stm->bindParam(6, $so);
      $stm->bindParam(7, $bd);

      if($stm->execute()){
      echo 'El registro de las calificaciones de: ' . $nombre . ' se ejecutó con exito';
   }else {
   //echo "Error: " . $stm . "<br>" ;
   
   echo 'Error al ejecutar la consulta';
}
//Se cierra la conexión
$conexion = null;
   }else{header("Location:consultaProfesor.php");}
}
?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <h3> PROBANDO LOS DATOS DEL FORMULARIO</h3>
   <ul>
      <li>ID del estudiante: </li>
     
   </ul>
</body>
</html>-->