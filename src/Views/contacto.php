<?php include_once("../../config/variablesGlobales.php"); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Filtrar y validar los datos del formulario
    $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, "phone", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_STRING);
    $to = "mateoperez3232@gmail.com";  // El destinatario

    // Asunto y cuerpo del mensaje
    $subject = "Nuevo mensaje de contacto";
    $body = "Nombre: $name\nTeléfono: $phone\nCorreo electrónico: $email\nMensaje:\n$message";

    // Cabeceras para el correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>
                alert('El mensaje ha sido enviado correctamente.');
                window.location.href = 'principal.php'; 
              </script>";
    } else {
        echo "<script>alert('Hubo un problema al enviar el mensaje, intente nuevamente.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="<?php echo URL; ?>public/assets/css/contacto.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/movil.css">

</head>

<body>

    <?php include_once("efecto_carga.php"); ?>
    <div class="contact-container">
        <div class="contact-form">
            <h2>Contáctanos</h2>

            <form id="contactForm" action="<?php echo URL; ?>src/views/contacto.php" method="POST" onsubmit="return validateForm()">
                <div class="input-group">
                    <label for="name"><i class="fas fa-user"></i> Nombre*</label>
                    <input type="text" name="name" id="name" placeholder="Tu nombre" required>
                </div>
                <div class="input-group phone-group">
                    <label for="phone"><i class="fas fa-phone"></i> Número de Teléfono*</label>
                    <input type="tel" name="phone" id="phone" placeholder="Tu número de teléfono" required>
                </div>
                <div class="input-group">
                    <label for="email"><i class="fas fa-envelope"></i> Correo Electrónico*</label>
                    <input type="email" name="email" id="email" placeholder="Tu correo electrónico" required>
                </div>
                <div class="input-group">
                    <label for="message"><i class="fas fa-comment-dots"></i> Mensaje</label>
                    <textarea name="message" id="message" placeholder="Escribe tu mensaje" required></textarea>
                </div>
                <button type="submit">Enviar</button>
            </form>

            <button id="backButton" class="back-button">
                <i class="fas fa-home"></i>
            </button>
        </div>

        <div class="contact-info">
            <div class="info">
                <iframe src="https://www.google.com/maps/embed?..."></iframe>
                <p><i class="fas fa-map-marker-alt"></i> 15200 Atlántida, Departamento de Canelones.</p>
                <p><i class="fas fa-envelope"></i> mateoperez3232@gmail.com</p>
                <p><i class="fas fa-phone"></i> +598-784-913</p>
            </div>
            <div class="social-icons">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-x"></i></a>
                <a href="https://www.instagram.com/matee._20/"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>

    <script src="<?php echo URL; ?>public/assets/js/contacto.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        document.getElementById("backButton").addEventListener("click", function() {
            window.location.href = "<?php echo URL; ?>src/views/principal.php";
        });
    </script>
    <script src="../../Public/assets/js/carga.js"></script>
</body>

</html>