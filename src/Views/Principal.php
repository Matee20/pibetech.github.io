<?php include_once("../../config/variablesGlobales.php"); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto final</title>
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/Styles_principal.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/movil.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/header.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>
    <main class="MAIN">

        <?php include_once("efecto_carga.php"); ?>


        <!-----------------------------ENCABEZADO------------------------------------------>

        <?php include_once("header.php"); ?>

        <!-----------------------------SECCION_1------------------------------------------->



        <section class="seccion1">
            <div class="sec1-video">
                <a href="https://store.steampowered.com/app/1790600/DRAGON_BALL_Sparking_ZERO/" target="_blank">
                    <iframe class="frame"
                        src="https://www.youtube.com/embed/j9mTwNMJydM?autoplay=1&mute=1&loop=1&playlist=j9mTwNMJydM"
                        frameborder="0"
                        allow="autoplay; encrypted-media"
                        allowfullscreen>
                    </iframe>
                </a>
            </div>
        </section>


        <!-----------------------------SECCION_2--------------------------------------------->

        <?php
        // Consulta para obtener 6 productos aleatorios de la tabla 'producto'
        $productos = [];
        if ($conn) {
            $sql = "SELECT imagen, nombre, precio FROM producto ORDER BY RAND() LIMIT 6";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $productos[] = $row;
                }
            }
        } else {
            echo "<p>Error: No se pudo conectar a la base de datos.</p>";
        }
        ?>

        <section class="seccion2">
            <h3 class="H3">Recomendados</h3>
            <div class="contenedor-juegitos">
                <?php foreach ($productos as $producto): ?>
                    <div class="juegitos">
                        <!-- Redirige a tienda.php pasando el nombre del producto como parámetro -->
                        <a href="tienda.php?producto=<?php echo urlencode($producto['nombre']); ?>">
                            <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>"
                                data-aos="flip-left"
                                data-aos-easing="ease-out-cubic"
                                data-aos-duration="800">
                            <h2><?php echo $producto['nombre']; ?></h2>
                            <p><?php echo '$' . $producto['precio']; ?></p>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>


        <!-----------------------------SECCION_2.5-------------------------------------------->

        <section class="seccion-2-5">
            <div class="div-seccion2-5">

                <div class="imagenes_juegos fade" id="producto-1">
                    <a href="https://www.ea.com/es-es/games/apex-legends" id="link-producto-1">

                        <img src="https://cdn1.epicgames.com/spt-assets/5dcd88f4e2094a698ebffa43438edc33/apex-legends-1sdtd.jpg" alt="Imagen del producto" id="imagen-producto-1"
                            data-aos="flip-left"
                            data-aos-easing="ease-out-cubic"
                            data-aos-duration="2500">

                        <h2 id="nombre-producto-1">Apex legends</h2>
                        <p id="desarrollador-producto-1">Desarrollador:
                            Respawn Entertainment, Panic Button, Respawn
                        </p>
                    </a>
                </div>

                <div class="imagenes_juegos fade" id="producto-2">
                    <a href="https://store.epicgames.com/es-ES/p/fortnite" id="link-producto-2">
                        <img src="https://cdn1.epicgames.com/offer/fn/Blade_2560x1440_2560x1440-95718a8046a942675a0bc4d27560e2bb" alt="Imagen del producto" id="imagen-producto-2" data-aos="flip-left"
                            data-aos-easing="ease-out-cubic"
                            data-aos-duration="2500">

                        <h2 id="nombre-producto-2">Fortnite</h2>
                        <p id="desarrollador-producto-2">Desarrollador:
                            Epic Games, People Can Fly
                        </p>
                    </a>
                </div>

                <div class="imagenes_juegos fade" id="producto-3">
                    <a href="https://www.counter-strike.net/cs2" id="link-producto-3">
                        <img src="https://cdn.akamai.steamstatic.com/apps/csgo/images/csgo_react/social/cs2.jpg" alt="Imagen del producto" id="imagen-producto-3" data-aos="flip-left"
                            data-aos-easing="ease-out-cubic"
                            data-aos-duration="2500">

                        <h2 id="nombre-producto-3">CSGO 2</h2>
                        <p id="desarrollador-producto-3">Desarrollador:
                            Valve Corporation, Hidden Path Entertainment
                        </p>
                    </a>
                </div>
            </div>

        </section>


        <!-----------------------------SECCION_3--------------------------------------------->

        <?php
        // Consulta para obtener 5 periféricos aleatorios
        $perifericos = [];
        if ($conn) {
            $query = "SELECT id, imagen, precio FROM perifericos ORDER BY RAND() LIMIT 5";
            $result = $conn->query($query);
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $perifericos[] = $row;
                }
            }
        } else {
            echo "<p>Error: No se pudo conectar a la base de datos.</p>";
        }
        ?>

        <section class="seccion3">
            <h1 class="perifericos">Periféricos recomendados</h1>
            <div class="contenedor">
                <?php foreach ($perifericos as $index => $periferico): ?>
                    <div class="cajas <?php echo $index === 0 ? 'caja_grande' : 'cajas_chicas'; ?>"
                        data-id="<?php echo $periferico['id']; ?>"
                        onclick="redirigirAPeriferico(<?php echo $periferico['id']; ?>)">
                        <img class="imagen-replace" src="<?php echo $periferico['imagen']; ?>" alt="Imagen de periférico" data-aos="flip-right"
                            data-aos-duration="2500">
                        <p><?php echo '$' . number_format($periferico['precio'], 2); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <script src="<?php echo URL; ?>Public/assets/js/javascript_principal.js"></script>
        <script>
            function redirigirAPeriferico(id) {
                window.location.href = "categorias_tienda/perifericos.php";
            }
        </script>


        <!-----------------------------PIE DE PAGINA (FOOTER)--------------------------------------------->

        <?php include_once("Footer.php"); ?>

    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="../../Public/assets/js/carga.js"></script>
</body>

</html>

<?php if ($conn) $conn->close(); // Cerramos la conexión al final 
?>