<?php include_once("../../config/variablesGlobales.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/assets/css/tienda.css">
    <link rel="stylesheet" href="../../Public/assets/css/header.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
    <title>Página Web</title>
</head>

<body>
    <?php include_once("efecto_carga.php"); ?>

    <?php include_once("header.php"); ?>


    <div class="container">

        <!--------------------------- Primera sección (imágenes superior) ------------------------->
        <div class="top-section">

            <div class="grid-itemm uno">

                <div class="button-container">
                    <button onclick="window.location.href='categorias_tienda/ofertas.php'">Explorar ofertas</button>
                </div>
            </div>
            <div class="grid-itemm dos">
                <div class="button-container">
                    <button onclick="window.location.href='categorias_tienda/ofertas.php'">Explorar ofertas</button>
                </div>
            </div>
            <div class="grid-itemm tre">
                <div class="button-container">
                    <button onclick="window.location.href='categorias_tienda/ofertas.php'">Explorar ofertas</button>
                </div>
            </div>
            <div class="grid-itemm cua">
                <div class="button-container">
                    <button onclick="window.location.href='categorias_tienda/ofertas.php'">Explorar ofertas</button>
                </div>
            </div>
            <div class="grid-itemm sin">
                <div class="button-container">
                    <button onclick="window.location.href='categorias_tienda/ofertas.php'">Explorar ofertas</button>
                </div>
            </div>
        </div>


        <!-- -----------------------Segunda sección (círculos) ---------------------------------->

        <div class="circle-section">

            <div class="circle">
                <a href="categorias_tienda/pc.php"><img src="../../public/imagenes/LOGO_PC.png" alt=""></a>
            </div>
            <div class="circle">
                <a href="categorias_tienda/play.php"><img src="../../public/imagenes/LOGO_PS.png" alt=""></a>
            </div>
            <div class="circle">
                <a href="categorias_tienda/xbox.php"><img src="../../public/imagenes/LOGO_XBOX.png" alt=""></a>
            </div>
            <div class="circle">
                <a href="categorias_tienda/switch.php"><img src="../../public/imagenes/LOGO_SWITCH.png" alt=""></a>
            </div>
        </div>


        <!----------------------------tercera sección (cajón)----------------------- -->

        <div class="carousel-container">
            <div class="carousel">
                <div class="slide active">
                    <img id="" src="https://assets.nintendo.com/image/upload/ar_16:9,c_lpad,w_1240/b_white/f_auto/q_auto/ncom/software/switch/70050000030669/0cc4c2382ba7c7d6a9f0471e9b8ab155ff754cc97735c32289133c8b83141eb5" alt="Producto 1">
                </div>

                <div class="slide">
                    <img id="" src="https://assets.nintendo.com/image/upload/q_auto/f_auto/c_fill,w_1200/ncom/en_US/articles/2022/new-details-revealed-for-pokemon-scarlet-and-pokemon-violet-including-tera-raid-battles/1920x1080_pspv_080322_wn" alt="Producto 2">
                </div>

                <div class="slide">
                    <img id="" src="https://i.ytimg.com/vi/6cs-A1rNvEE/maxresdefault.jpg" alt="Producto 3">
                </div>

                <div class="slide">
                    <img id="" src="https://www.muycomputer.com/wp-content/uploads/2024/04/the-last-of-us-part-ii-posibles-requisitos-PC.jpg" alt="Producto 4">
                </div>

                <div class="slide">
                    <img id="" src="https://media.contentapi.ea.com/content/dam/battlefield/battlefield-2042/images/2021/04/k-1920x1080-featured-image.jpg.adapt.crop16x9.1023w.jpg" alt="Producto 5">
                </div>
            </div>

            <button class="prev" onclick="prevSlide()">&#10094;</button>
            <button class="next" onclick="nextSlide()">&#10095;</button>
            <div class="dots">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
                <span class="dot" onclick="currentSlide(5)"></span>
            </div>
        </div>


        <script src="<?php echo URL; ?>public/assets/js/carrusel_tienda.js"></script>

        <!-- ----------------------------cuarta sección-------------------------------------->

        <?php
        // Consulta para obtener 4 productos aleatorios de la tabla 'oferta' dentro de la base de datos 'charruagames'
        $sql = "SELECT * FROM Pibetech.oferta ORDER BY RAND() LIMIT 4";
        $result = $conn->query($sql);

        // Verificamos si se encontraron productos
        if ($result->num_rows > 0) {
            // Inicializamos un array para almacenar los productos
            $productos = [];

            // Iteramos sobre cada producto aleatorio y lo almacenamos en el array
            while ($row = $result->fetch_assoc()) {
                $productos[] = [
                    "imagen" => $row["imagen"],
                    "nombre" => $row["nombre"],
                    "desarrollador" => $row["desarrollador"]
                ];
            }
        } else {
            echo "No se encontraron productos.";
        }
        $conn->close();
        ?>

        <div class="rectangles-section" id="productos">
            <!-- Primera tarjeta con datos del primer producto aleatorio -->
            <a href="../Views/categorias_tienda/Ofertas.php">
                <div class="rectangle">
                    <img src="<?php echo $productos[0]['imagen']; ?>" alt="<?php echo $productos[0]['nombre']; ?>">
                    <h2><?php echo $productos[0]['nombre']; ?></h2>
                </div>
            </a>

            <!-- Segunda tarjeta con datos del segundo producto aleatorio -->
            <a href="../Views/categorias_tienda/Ofertas.php">
                <div class="rectangle">
                    <img src="<?php echo $productos[1]['imagen']; ?>" alt="<?php echo $productos[1]['nombre']; ?>">
                    <h2><?php echo $productos[1]['nombre']; ?></h2>
                </div>
            </a>

            <!-- Tercera tarjeta con datos del tercer producto aleatorio -->
            <a href="../Views/categorias_tienda/Ofertas.php">
                <div class="rectangle">
                    <img src="<?php echo $productos[2]['imagen']; ?>" alt="<?php echo $productos[2]['nombre']; ?>">
                    <h2><?php echo $productos[2]['nombre']; ?></h2>
                </div>
            </a>

            <!-- Cuarta tarjeta con datos del cuarto producto aleatorio -->
            <a href="../Views/categorias_tienda/Ofertas.php">
                <div class="rectangle">
                    <img src="<?php echo $productos[3]['imagen']; ?>" alt="<?php echo $productos[3]['nombre']; ?>">
                    <h2><?php echo $productos[3]['nombre']; ?></h2>
                </div>
            </a>
        </div>

        <script src="../../public/assets/js/cuarta_seccion.js"></script>



        <!-- ----------------------------quinta sección-------------------------------------->
        <h2 class="zona_perifericos">zona de Perifericos</h2>
        <div class="grid-section">
            <div class="small-grid">
                <div class="grid-item" onclick="showCarousel(1)">
                    <a href="../Views/categorias_tienda/perifericos.php">
                        <img src="https://i0.wp.com/www.aslanstoreuy.com/wp-content/uploads/2021/10/Teclado-Gamer-Razer-BlackWidow-V3-Aslan-1.png?fit=900%2C900&ssl=1" alt="">

                    </a>
                </div>

                <div class="grid-item" onclick="showCarousel(2)">
                    <a href="../Views/categorias_tienda/perifericos.php">
                        <img src="https://media.steelseriescdn.com/thumbs/catalog/items/64875/75d2eca8b2654e27a599b546160a2460.png.500x400_q100_crop-fit_optimize.png" alt="">
                    </a>
                </div>

                <div class="grid-item" onclick="showCarousel(3)">
                    <a href="../Views/categorias_tienda/perifericos.php">
                        <img src="https://i0.wp.com/www.aslanstoreuy.com/wp-content/uploads/2020/08/HyperX-Cloud-Alpha-%E2%80%93-Gaming-min.png?fit=900%2C900&ssl=1" alt="">
                    </a>
                </div>
                <div class="grid-item" onclick="showCarousel(4)">
                    <a href="../Views/categorias_tienda/perifericos.php">
                        <img src="https://resource.logitech.com/w_800,c_lpad,ar_1:1,q_auto,f_auto,dpr_1.0/d_transparent.gif/content/dam/logitech/en/products/mice/mx-master-3s/gallery/mx-master-3s-mouse-top-view-graphite.png?v=1" alt="">
                    </a>
                </div>
            </div>
        </div>

        <script src="../../public/assets/js/tienda.js"></script>

    </div>

    <section class="busqueda">
        <p class="ttle_search">Encuentra lo que buscas</p>
        <div class="seccion-busqueda">
            <div class="filtros">
                <div class="filtro-precio">
                    <h3>Precio</h3>
                    <label>Desde:</label>
                    <input type="number" placeholder="Mínimo" min="0">
                    <label>Hasta:</label>
                    <input type="number" placeholder="Máximo" min="0">
                </div>

                <div class="filtro-categoria">
                    <h3>Categoría</h3>
                    <label><input type="checkbox" name="categoria" value="claves"> Claves</label>
                    <label><input type="checkbox" name="categoria" value="perifericos"> Periféricos</label>
                    <label><input type="checkbox" name="categoria" value="consolas"> Consolas</label>
                </div>

                <div class="filtro-genero">
                    <h3>Géneros</h3>
                    <label><input type="checkbox" name="genero" value="accion"> Acción</label>
                    <label><input type="checkbox" name="genero" value="terror"> Terror</label>
                    <label><input type="checkbox" name="genero" value="estrategia"> Estrategia</label>
                    <label><input type="checkbox" name="genero" value="fantasia"> Fantasía</label>
                    <label><input type="checkbox" name="genero" value="mundo-abierto"> Mundo Abierto</label>
                    <label><input type="checkbox" name="genero" value="fps"> FPS</label>
                    <label><input type="checkbox" name="genero" value="simulacion"> Simulación</label>
                </div>
            </div>

            <div class="contenido-busqueda">
                <div class="buscador-wrapper">
                    <input type="text" class="buscador" placeholder="Buscar...">
                    <button class="icono-busqueda"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

                <div class="galeria">

                </div>
                <div class="pagination"></div>
            </div>
        </div>

    </section>

    <!-- ----------------------------pie de pagina-------------------------------------->

    <?php include_once("Footer.php"); ?>
    <script src="../../Public/assets/js/carga.js"></script>

</body>

</html>