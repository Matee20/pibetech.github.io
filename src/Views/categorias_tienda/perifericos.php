<?php
// Incluye el archivo de configuración y conexión
include_once("../../../config/variablesGlobales.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perifericos</title>
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/movil.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/categorias_tienda.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/header.css">
</head>

<body>

    <script>
        // Función para mostrar/ocultar el menú móvil
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector('.hamburger-icon').addEventListener('click', function() {
                const menu = document.querySelector('.menu-list');
                menu.classList.toggle('menu-active');
            });
        });
    </script>

    <header>
        <div class="contenedor_general">
            <nav>

                <!-- Logo -->
                <a class="logoMain-conteiner" href="<?php echo URL; ?>src/Views/Principal.php">
                    <img class="LogoMain" src="<?php echo URL; ?>Public/imagenes/LOGO.png" alt="logo">
                </a>

                <!-- Menú desplegable -->
                <ul class="menu-list">
                    <li><a href="<?php echo URL; ?>src/Views/Nosotros.php">Nosotros</a></li>
                    <li><a href="<?php echo URL; ?>src/Views/Tienda.php">Tienda</a></li>
                    <li><a href="<?php echo URL; ?>src/Views/Locales.php">Locales Físicos</a></li>
                    <li><a href="<?php echo URL; ?>src/Views/tiket.php">tiket</a></li>
                    <li><a href="<?php echo URL; ?>src/Views/contacto.php">Contacto</a></li>
                    <li><a href="<?php echo URL; ?>src/Views/carrito.php">Carrito</a></li>
                </ul>

                <!-- Botones de login y registro (alineados a la derecha) -->
                <div class="botones_de_registro">
                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>

                        <form action="<?php echo URL; ?>config/logout.php" method="post" style="display: inline;">

                            <button type="submit" class="register-button">Desconectar</button>
                        </form>

                    <?php else: ?>

                        <a href="<?php echo URL; ?>src/Views/inicio.php">
                            <button class="register-button">Login</button>
                        </a>
                        <a href="<?php echo URL; ?>src/Views/registro.php">
                            <button class="register-button">Register</button>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Ícono de menú para pantallas móviles -->
                <div class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

            </nav>
        </div>
    </header>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Buscar productos..." onkeyup="searchProducts()">
        <ul id="productList"></ul>
    </div>

    <script src="<?php echo URL; ?>Public/assets/js/buscador.js"></script>

    <?php
    // Consulta para obtener los productos
    $sql = "SELECT id, imagen, nombre, precio FROM perifericos ORDER BY RAND()";
    $result = $conn->query($sql);
    $productos = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    } else {
        echo "<p>No se encontraron productos.</p>";
    }
    ?>

    <div class="seccion2">
        <section class="cont">
            <?php foreach ($productos as $producto): ?>
                <div class="videojuego">
                    <!-- Enlace con el ID del producto y la categoría -->
                    <a href="../compra.php?id=<?php echo $producto['id']; ?>&categoria=perifericos">
                        <div class="producto">
                            <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>"
                                data-aos="fade-down">
                            <h2><?php echo htmlspecialchars($producto['nombre']); ?></h2>
                            <p>$<?php echo number_format($producto['precio'], 2); ?></p>
                            <button>Ver Producto</button>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </section>
    </div>


</body>

</html>