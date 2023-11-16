<?php
session_start();
//Comprobando si existe una sesión iniciada, si existe se redirige al index.php
if (isset($_SESSION["id"])) {
   header("../Location:index.php");
}
/*CREANDO VARIABLES Y ASIGNANDOLE VALORES DE ACUERDO AL NOMBRE DEL CAMPO EN QUE SE ESCRIBEN EN EL FORMULARIO*/
//require("conexion.php");
require 'conexion.php';
$errores = '';

if (isset($_POST["submit"])) {
   $id = $_POST["id"];
   $nombre = filter_var(strtolower($_POST["nombre"]), FILTER_SANITIZE_STRING);
   $tipo = filter_var(strtolower($_POST["tipo"]), FILTER_SANITIZE_STRING);
   $contrasena = $_POST["password"];
   $contrasena2 = $_POST["password2"];

   if (!empty($id)) {
      $id = trim($id); //quita todos los espacios de una cadena de texto, excepto los espacios individuales entre palabras
      $id = htmlspecialchars($id);  //convierte o escapa caracteres en código HTML evitando la inyección de código
      $id = stripslashes($id);  //Quita las barras "\" de un string con comillas escapadas
      $id = filter_var($id, FILTER_SANITIZE_STRING);  //filtra y valida que la variable sea del tipo señalado aceptando solo los que sean del tipo
   } else {
      $errores .= 'Ingresa un identificador numerico' . '<br>';
   }
   if (!empty($nombre)) {
      $nombre = trim($nombre);
      $nombre = htmlspecialchars($nombre);
      $nombre = stripslashes($nombre);
      $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
   } else {
      $errores .= 'Ingresa el nombre de usuario' . '<br>';
   }
   if (!empty($tipo)) {
      $tipo = trim($tipo);
      $tipo = htmlspecialchars($tipo);
      $tipo = stripslashes($tipo);
      $tipo = filter_var($tipo, FILTER_SANITIZE_STRING);
   } else {
      $errores .= 'Indica el tipo de usuario (E o P)' . '<br>';
   }
   if (!empty($contrasena)) {
      $contrasena = trim($contrasena);
      $contrasena = htmlspecialchars($contrasena);
      $contrasena = stripslashes($contrasena);
      //$contrasena = filter_var($contrasena, FILTER_SANITIZE_STRING);
   } else {
      $errores .= 'Ingresa una contraseña valida' . '<br>';
   }
   if (!empty($contrasena2)) {
      $contrasena2 = trim($contrasena2);
      $contrasena2 = htmlspecialchars($contrasena2);
      $contrasena2 = stripslashes($contrasena2);
      //$contrasena2 = filter_var($contrasena2, FILTER_SANITIZE_STRING);
   } else {
      $errores .= 'Confirma tu contraseña' . '<br>';
   }
   if ($contrasena != $contrasena2) {
      $errores .= 'Las contraseñas no coinciden <br>';
   } else if (!preg_match('/^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$/', $contrasena)) {
      $errores .= 'Por favor cumple con las restricciones de la contraseña <br/>';
      $errores .= 'La contraseña debe tener un mínimo 8 caracteres, al menos un número, una mayúscula, una minúscula y un carácter especial <br>';
   } else {
      //$contrasena = hash('sha512', $contrasena);
      $contrasena = hash('sha512', $contrasena);
      $stm = $conexion->prepare("SELECT ID_usuario from usuarios WHERE ID_usuario = ?");
      $stm->bindParam(1, $id);
      $stm->execute();
      $idDB = $stm->fetchColumn();
      if ($idDB != null) {
         $errores .= "El id ya existe, intente con otro numero";
      } else {
         $insertStm = $conexion->prepare("INSERT INTO usuarios(ID_usuario, Nombre_usuario, Tipo_usuario, Password)VALUES(?,?,?,?)");
         $insertStm->bindParam(1, $id);
         $insertStm->bindParam(2, $nombre);
         $insertStm->bindParam(3, $tipo);
         $insertStm->bindParam(4, $contrasena);
         $insertStm->execute();
         // Almacenamos los datos adicionales en la sesión
         $_SESSION['id'] = $id;
         echo 'El registro del usuario: ' . $nombre . ' se ejecutó con exito';
         //Se cierra la conexión
         $conexion = null;
      }
   }
   if (!empty($errores)) {
      // Redirige a la página registrarse.php con los errores
      //$_SESSION['errores'] = $errores;
      header('Location:view/registrarse.view.php?errores=' . urlencode($errores));
      exit;
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=, initial-scale=1.0">
   <title>Document</title>
   <!-- Función para redirigir a otra página despues de un tiempo -->
   <script>
   function despuesDeTiempo() {
      setTimeout(function() {
            window.location.href = 'view/registrarse.view.php';
         }, 5000); // 5000 milisegundos (5 segundos)
      }
      // Llamar a la función cuando la página se cargue
      window.onload=despuesDeTiempo;
   </script>
</head>
<body>
   <h1>REGISTRO CONFIRMADO</H1>
</body>

</html>