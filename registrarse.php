<?php
include("encabezado.php");
?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/estilos.css">
   <title>Registro de Usuario</title>
</head>
<body class="entrada">
   <div class="container">
      <h1 class="rUsuario">Registro de Usuario</h1>
   </div>
   <form class="form_registro" action="php/procesar_registro.php" method="post">
      <label for="ID_usuario">ID de Usuario:</label>
      <input type="text" name="ID_usuario" id="ID_usuario" required>

      <label for="Nombre_usuario">Nombre de Usuario:</label>
      <input type="text" name="Nombre_usuario" id="Nombre_usuario" required>

      <label for="Tipo_usuario">Tipo de Usuario:</label>
      <input type="text" name="Tipo_usuario" id="Tipo_usuario" required>

      <label for="Password">Contraseña:</label>
      <input type="password" name="Password" id="Password" required>

      <label for="Confirmacion_Password">Confirmar Contraseña:</label>
      <input type="password" name="Confirmacion_Password" id="Confirmacion_Password" required>

      <input type="submit" value="Registrarse">
   </form>
</body>

</html>