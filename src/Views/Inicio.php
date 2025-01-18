<?php include_once("../../config/variablesGlobales.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/869dc8f5ef.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/registro.css">
  <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
  <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/movil.css">
  <title>Login</title>
</head>

<body>
  <?php include_once("efecto_carga.php"); ?>

  <div class="container">
    <div class="image-container contenedor_2">
      <!-- Imagen agregada por CSS -->
    </div>

    <div class="form-container">
      <a href="Principal.php">
        <button class="back-button" type="button">
          <i class="fas fa-home"></i>
        </button>
      </a>
      <form action="<?php echo URL; ?>config/login.php" method="POST">
        <h1>Inicia Sesión</h1>
        <div class="social-container">
          <a href="#" class="social">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" class="social">
            <i class="fab fa-google" id="red"></i>
          </a>
          <a href="#" class="social">
            <i class="fab fa-linkedin-in"></i>
          </a>
        </div>
        <span>Usa tu correo para iniciar sesión</span>
        <input type="email" name="email" placeholder="Correo Electrónico" required />
        <input type="password" name="password" placeholder="Contraseña" required />
        <button id="lila" type="submit">Iniciar Sesión</button>
      </form>
    </div>
  </div>

  <script src="<?php echo URL; ?>public/assets/js/inicio.js"></script>
  <script src="../../Public/assets/js/carga.js"></script>
</body>

</html>