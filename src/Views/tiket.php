<?php include_once("../../config/variablesGlobales.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="icon"
        href="../../Public/Images/Imagenes/IMG/enjoyicon.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="../../Public/Assets/css/consulta.css">
    <link rel="stylesheet" href="../../Public/Assets/css/header.css">
    <link rel="stylesheet" href="../../Public/Assets/css/movil.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
    </style>
</head>

<body>
    <?php include_once("efecto_carga.php"); ?>
    <?php include("header.php")?>
    <section>
        <div class="consulta">
            <div class="text">
                <h1>
                    ¿En que necesitas ayuda?
                </h1>
                <p>Escribe tu nombre, dirección de correo electrónico y detalla el motivo de tu consulta en
                    “Comentarios”.
                    <br><br>
                    No dudes en proporcionar información adicional que podría ayudarnos a resolver el problema. Cuantos
                    más
                    detalles proporciones, más fácil y rápido será resolver el problema...
                </p>
            </div>
            <div class="div_form">
                <form action="../../src/models/mail.php" method="POST">
                    <div class="title">
                        <p>Envíe su ticket de consulta</p>
                    </div>
                    <div class="contenido">
                        <div class="div_Nombre">
                            <p>Nombre</p>
                            <input type="text" maxlength="30" name="name" id="name" required>
                        </div>
                        <div class="div_Correo">
                            <p>Correo Electronico de Contacto</p>
                            <input type="text" name="email" id="email" required>
                        </div>
                        <div class="div_Mensaje">
                            <p>Comentarios</p>
                            <textarea class="form-control resize-textarea" name="message" id="mensaje"
                                required></textarea>
                        </div>
                        <button type="submit">Envía tu Ticket</button>

                    </div>

                </form>
            </div>
        </div>

    </section>

    <script src="../../Public/Assets/js/ticket.js"></script>
    <script src="../../Public/Assets/js/safe_ticket.js"></script>
    <?php include('footer.php') ?>
    <script src="../../Public/assets/js/carga.js"></script>
</body>

</html>