<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/header.css">
    
    <script>
        // Función para mostrar/ocultar el menú móvil
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector('.hamburger-icon').addEventListener('click', function() {
                const menu = document.querySelector('.menu-list');
                menu.classList.toggle('menu-active');
            });
        });
    </script>
</head>

<body>
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
</body>

</html>