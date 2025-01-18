<?php include_once("../../config/variablesGlobales.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/header.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/nosotros.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
</head>

<body>
    <?php include_once("efecto_carga.php"); ?>
    <!-- Header -->
    <?php include_once("header.php"); ?>

    <!-- Main Section -->
    <main>

        <!-- Sección Empresa -->
        <section class="empresa-section">
            <div class="empresa-container">

                <div class="empresa-text">
                    <h2>Quiénes Somos</h2>
                    <p>Quiénes Somos
                        En PibeTech, somos una empresa apasionada por la tecnología y el mundo del videojuego.
                        Nos dedicamos a ofrecer una amplia gama de productos informáticos, de gaming y servicios relacionados con la industria del entretenimiento digital.
                        Nuestra misión principal es brindar a cada uno de nuestros clientes una experiencia de compra única, en la cual se sientan respaldados y satisfechos con la calidad de nuestros productos y atención personalizada.
                        Nos esforzamos en seleccionar cuidadosamente los productos de mayor calidad y mantenernos al tanto de las últimas tendencias tecnológicas para ofrecer siempre lo mejor a nuestros clientes.
                        Además, contamos con un equipo especializado en servicios de mantenimiento de software y soporte técnico, asegurando que quienes confían en nosotros reciban soluciones efectivas y rápidas para sus necesidades tecnológicas.
                        Creemos firmemente en la importancia de la innovación y el compromiso con nuestros clientes, quienes son la razón de nuestro esfuerzo constante.</p>
                    <a href="#" class="button">Leer Más</a>
                </div>

            </div>
        </section>

        <!-- Sección Servicios -->
        <section class="services-section">
            <h2>Nuestros Servicios</h2>
            <div class="services-grid">
                <div class="service-box">
                    <h3>Servicio 1</h3>
                    <p>Servicio de soporte técnico</p>
                </div>
                <div class="service-box">
                    <h3>Servicio 2</h3>
                    <p>Servicio de limpieza de hardware</p>
                </div>
                <div class="service-box">
                    <h3>Servicio 3</h3>
                    <p>Servicio de limpieza de software</p>
                </div>
                <div class="service-box">
                    <h3>Servicio 4</h3>
                    <p>Servicio de distribución de paquetes</p>
                </div>
            </div>
        </section>

        <!-- Sección Proyectos -->
        <section class="proyectos-section">
            <h2>Nuestros Proyectos</h2>
            <div class="timeline">
                <div class="timeline-entry">
                    <h3>Proyecto 1</h3>
                    <p>Sitio oficial PibeTech</p>
                </div>
                <div class="timeline-entry">
                    <h3>Proyecto 2</h3>
                    <p>Tienda de videojuegos</p>
                </div>
            </div>
        </section>

        <!-- Sección Equipo -->
        <section class="equipo-section">
            <h2>Fundador</h2>
            <div class="equipo-grid">

                <div class="equipo-member">
                    <a href="https://www.instagram.com/matee._20/">
                        <img src="<?php echo URL; ?>Public/imagenes/Fundador.jpg" alt="Mateo Pérez">
                    </a>
                    <h3>Mateo Pérez</h3>
                    <p>Polivalente de la empresa y sus proyectos</p>
                </div>

            </div>
        </section>

        <!-- Footer -->

        <?php include_once("Footer.php"); ?>
        <script src="../../Public/assets/js/carga.js"></script>

    </main>
</body>

</html>