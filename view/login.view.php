<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
   <div class="contenedor">
      <h1 class="titulo">ESCUELA PRIMARIA 6 DE DICIEMBRE DE 1810</h1>
      <hr class="border">
      <nav class="menu">
         <ul>
            <li><a href="../index.php">INICIO</a></li>
            <li><a href="registrarse.view.php">REGISTRARSE</a></li>
            <li><a href="login.view.php">INICIAR SESIÓN</a></li>
            <li><a href="../cerrar.php">CERRAR</a></li>
         </ul>
      </nav>
   </div>
   <h1 class="login">PAGINA DE LOGIN</h1>
   <div class="formulario">
   <?php if (!empty($_GET["errores"])) : ?>
      <div class="error-container">
      <div class="error"><?php echo urldecode($_GET["errores"]); ?></div>
      </div>
      <?php endif; ?>
      <form action="../login.php" method="POST" class="formulario" name="login" id="login">
         <div class="campos-container">
            <div class="campo">
               <div class="icono izquierda fa fa-user"></div>
               <input type="text" name="id" placeholder="Id:">
            </div>
            <div class="campo">
               <div class="icono izquierda fa fa-lock"></div>
               <input type="password" name="password" placeholder="Contraseña:">
            </div>
         </div>
         <?php if (!empty($errores)) : ?>
            <div class="error-container">
               <div class="error"><?php echo htmlspecialchars($errores); ?></div>
            </div>
         <?php endif; ?>
         <br />
         <input type="submit" name="submit" value="INGRESAR">
      </form>
      <p>¿No tienes una cuenta?</p>
      <a href="registrarse.view.php">Registrate</a>
</body>
</html>