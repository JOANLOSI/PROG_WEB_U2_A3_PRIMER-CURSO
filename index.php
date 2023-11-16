<?php
session_start();
if(isset($_SESSION["id"])){
header('Location: view/registrarse.view.php');
} else{
   //header('Location: login.view.php');
}
include("encabezado.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Index</title>
   <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="Escuela">
      <!-- Contenido de la sección Escuela -->
   </div>  
</body>
</html>