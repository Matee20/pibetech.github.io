<?php include_once("../../config/variablesGlobales.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/Restablecimiento.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
    <title>Recover Password</title>
</head>

<body>
    <?php include_once("efecto_carga.php"); ?>
    <section class="auth-container">
        <div class="form-container">
            <form action="">
                <h1>Recuperacion de contraseña</h1>
                <div class="inputBox">
                    <input type="email" id="recoverEmail" required>
                    <label for="recoverEmail">Coloca tu correo</label>
                </div>
                <button type="submit">Recover Password</button>
                <div class="login">
                    <p>Recuerdas tu contraseña? <a href="<?php echo URL; ?>src/Views/Loogin.php">Logeate aqui</a></p>
                </div>

            </form>
            <a href="<?php echo URL; ?>src/Views/Principal.php"><button type="submit">volver</button></a>

        </div>
    </section>
    <script src="../../Public/assets/js/carga.js"></script>
</body>

</html>