<?php
require("../conexion.php");
$errores = "";
if(isset($_POST["submit"])){
   $id = $_POST["ID_usuario"];
   $nombre = $_POST["Nombre_usuario"];
   $tipo = $_POST["Tipo_usuario"];
   $contrasena = $_POST["Password"];
   $contrasena2 = $_POST["Confirmacion_Password"];
}
?>