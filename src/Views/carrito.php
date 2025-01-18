<?php
session_start();
$carrito = $_SESSION['carrito'] ?? []; // Cargar el carrito de la sesión, o un array vacío si no hay nada

// Eliminar producto si se envía el formulario de eliminación
if (isset($_POST['eliminar_id']) && isset($_POST['eliminar_categoria'])) {
    $id = $_POST['eliminar_id'];
    $categoria = $_POST['eliminar_categoria'];

    // Filtrar el carrito para quitar el producto con el id y categoría especificados
    $_SESSION['carrito'] = array_filter($carrito, function ($producto) use ($id, $categoria) {
        return !($producto['id'] == $id && $producto['categoria'] == $categoria);
    });

    // Actualizar el carrito después de la eliminación
    $carrito = $_SESSION['carrito'];
}
?>
<?php include_once("../../config/variablesGlobales.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="../../Public/assets/css/carrito.css">
    <link rel="stylesheet" href="<?php echo URL; ?>Public/assets/css/carga.css">
</head>

<body>
    <?php include_once("efecto_carga.php"); ?>
    <?php include_once("header.php"); ?>

    <main class="carrito">
        <section class="productos">
            <h2>Productos en tu carrito</h2>
            <?php if (empty($carrito)) : ?>
                <p>Tu carrito está vacío.</p>
            <?php else : ?>
                <?php foreach ($carrito as $producto) : ?>
                    <div class="producto">
                        <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" alt="<?php echo htmlspecialchars($producto['nombre']); ?>" class="producto-imagen">
                        <div class="producto-detalles">
                            <h3><?php echo htmlspecialchars($producto['nombre']); ?></h3>
                            <p>Precio: $<?php echo number_format($producto['precio'], 2); ?></p>
                            <p>Cantidad: <?php echo $producto['cantidad']; ?></p>

                            <!-- Formulario para eliminar el producto -->
                            <form action="" method="post" style="display:inline;">
                                <input type="hidden" name="eliminar_id" value="<?php echo $producto['id']; ?>">
                                <input type="hidden" name="eliminar_categoria" value="<?php echo $producto['categoria']; ?>">
                                <button type="submit" class="eliminar-boton">Eliminar</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

        <aside class="resumen">
            <h2>Resumen de la compra</h2>
            <?php
            // Calcular el subtotal
            $subtotal = array_reduce($carrito, function ($total, $producto) {
                return $total + $producto['precio'] * $producto['cantidad'];
            }, 0);

            // El total ahora es solo el subtotal
            $total = $subtotal;
            ?>
            <p class="subtotal">Subtotal: <span id="subtotal">$<?php echo number_format($subtotal, 2); ?></span></p>
            <p class="total">Total: <span id="total">$<?php echo number_format($total, 2); ?></span></p>
            <a href="formulario_de_cuenta.php">
                <button class="checkout" id="checkout-button" <?php echo empty($carrito) ? 'disabled' : ''; ?>>Proceder al pago</button>
            </a>
        </aside>
    </main>

    <footer>
        <p>&copy; 2024 Mateo Pérez. Todos los derechos reservados.</p>
    </footer>
    <script src="../../Public/assets/js/carga.js"></script>
</body>

</html>