<?php
// Configuración de la conexión a la base de datos
$host = 'localhost';
$db = 'PibeTech';
$user = 'root';
$pass = '';

try {
    // Conectar a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta para obtener hasta 5 ofertas (cambia 'foto' por el nombre correcto de la columna)
    $stmt = $pdo->prepare("SELECT imagen FROM oferta LIMIT 5");
    $stmt->execute();

    // Almacenar las imágenes en un array
    $imagenes = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $imagenes[] = htmlspecialchars($row['imagen']);
    }

    // Mostrar imágenes en el carrusel
    if (count($imagenes) > 0) {
        echo '<div class="carousel-container">';
        
        // Solo mostrar una imagen a la vez
        echo '<div class="carousel-item active">';
        echo '<img src="' . $imagenes[0] . '" alt="Producto">';
        echo '</div>';
        
        // Generar el resto de las imágenes como elementos ocultos
        for ($i = 1; $i < count($imagenes); $i++) {
            echo '<div class="carousel-item">';
            echo '<img src="' . $imagenes[$i] . '" alt="Producto">';
            echo '</div>';
        }

        echo '<button class="prev" onclick="prevSlide()">&#10094;</button>';
        echo '<button class="next" onclick="nextSlide()">&#10095;</button>';
        echo '<div class="dots">';
        
        // Generar puntos para cada imagen
        for ($i = 0; $i < count($imagenes); $i++) {
            echo '<span class="dot" onclick="currentSlide(' . ($i + 1) . ')"></span>';
        }
        
        echo '</div>';
        echo '</div>'; // Cierra el contenedor del carrusel
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
