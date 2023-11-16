<?php
session_start();
if (isset($_SESSION['id'])) {
   header('Location: index.php');
}
require 'conexion.php';
$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id = filter_var(strtolower($_POST['id']), FILTER_SANITIZE_STRING);
   $password = $_POST['password'];
   $password = hash('sha512', $password);
   $stm = $conexion->prepare('SELECT * FROM usuarios WHERE ID_usuario = :id AND Password = :pass');
   $stm->execute(array(':id' => $id, ':pass' => $password));
   $resultado = $stm->fetch();

   if ($resultado !== false) {
      $_SESSION['id'] = $id;
      $_SESSION['nombre'] = $resultado['Nombre_usuario'];
      $_SESSION['tipo'] = $resultado['Tipo_usuario'];
      //header('Location: prueba.php');
   }
   if ($_SESSION['tipo'] == 'E' || $_SESSION['tipo'] == 'e') {
      header('Location: view/paginaEstudiante.view.php');
   } else {
      header('Location: view/paginaProfesor.view.php');
   }
} else {
   $errores .= 'Datos incorrectos';
}
require 'view/login.view.php';
?>