<?php
$servidor = "localhost";
$usuario = "root";
$password = "";

try{
   $conexion = new PDO("mysql:host=$servidor;dbname=escuelaprimaria", $usuario, $password);
   $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Conexión realizada con exito";
}
catch(PDOException $e){
   echo "La conexion fallo: " .$e->getMessage();
}
//$conexion = null;
?>