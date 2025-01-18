<?php include_once("../../config/variablesGlobales.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/movil.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/header.css">
    <link rel="stylesheet" href="<?php echo URL; ?>public/assets/css/locales.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

</head>

<body>

    <?php include_once("efecto_carga.php"); ?>
    <?php include_once("header.php"); ?>


    <section class="contenedor_principal">
        <div class="contenedor_grande">
            <div class="conteiner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3277.659368218543!2d-55.76485812409063!3d-34.76417256599017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x959ff5d6bc193cfb%3A0xeee9a7c3de10f06c!2sSDLGP%20Escuela%20T%C3%A9cnica%20Atl%C3%A1ntida%20UTU!5e0!3m2!1ses-419!2suy!4v1729057507473!5m2!1ses-419!2suy" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </section>
    <script src="../../Public/assets/js/carga.js"></script>

</body>