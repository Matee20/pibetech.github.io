<?php
session_start();

include_once("../../config/variablesGlobales.php");

$mensaje = ""; // Variable para mostrar mensajes

if (isset($_GET['id']) && isset($_GET['categoria'])) {
    $id = intval($_GET['id']);
    $categoria = $_GET['categoria'];

    $tabla = '';
    switch ($categoria) {
        case 'pc':
            $tabla = 'productos_pc';
            break;
        case 'ps4':
            $tabla = 'productos_ps4';
            break;
        case 'switch':
            $tabla = 'productos_switch';
            break;
        case 'xbox':
            $tabla = 'productos_xbox';
            break;
        case 'perifericos':
            $tabla = 'perifericos';
            break;
        case 'oferta':
            $tabla = 'oferta';
            break;
        default:
            echo "<p>Categoría no válida.</p>";
            exit();
    }

    $sql = "SELECT * FROM $tabla WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $producto = $result->fetch_assoc();
    } else {
        echo "<p>Producto no encontrado.</p>";
        exit();
    }
} else {
    echo "<p>ID o categoría de producto no especificado.</p>";
    exit();
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

function agregarAlCarrito($producto, $categoria)
{
    $productoExistente = false;

    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id'] == $producto['id'] && $item['categoria'] == $categoria) {
            $item['cantidad'] += 1;
            $productoExistente = true;
            break;
        }
    }

    if (!$productoExistente) {
        $producto['cantidad'] = 1;
        $producto['categoria'] = $categoria;
        $_SESSION['carrito'][] = $producto;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['agregar_carrito'])) {
    agregarAlCarrito($producto, $categoria);
    $mensaje = "Producto agregado al carrito"; // Mensaje de confirmación
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/assets/css/compra.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
    <script>
        function mostrarMensaje(mensaje) {
            if (mensaje) {
                alert(mensaje); // Muestra un popup
            }
        }
    </script>
</head>

<body onload="mostrarMensaje('<?php echo $mensaje; ?>')">
    <?php include_once("efecto_carga.php"); ?>
    <?php include_once("header.php"); ?>

    <div class="product-page">
        <div class="product-gallery">
            <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" class="main-image">
        </div>

        <div class="product-info">
            <h1><?php echo htmlspecialchars($producto['nombre']); ?></h1>
            <p class="price">$<?php echo number_format($producto['precio'], 2); ?></p>
            <form action="" method="post">
                <button class="comprar_boton" type="submit" name="agregar_carrito">Agregar al carrito</button>
            </form>
            <!-- <a href="tienda.php" class="volver-tienda">Volver a la tienda</a>-->
        </div>
    </div>

    <?php include_once("footer.php"); ?>
    <script src="../../Public/assets/js/carga.js"></script>
</body>

</html>