<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PibeTech";

try {
    // Conectar a la base de datos
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar las ofertas excluyendo las primeras 3 del carrusel
    $sql = "SELECT imagen FROM oferta LIMIT 5 OFFSET 3"; // Saltar las primeras 3 ofertas y obtener las siguientes 5
    $stmt = $conn->prepare($sql);
    $stmt->execute();

   
    $ofertas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Generar el HTML para las ofertas en los grid-items
    $i = 1; // Para numerar los grid-items dinámicamente
    foreach ($ofertas as $oferta): ?>
        <div class="grid-item grid-item-<?php echo $i; ?>">
            <div class="button-container">
                <a href="#">
                    <img src="<?php echo htmlspecialchars($oferta['imagen']); ?>" alt="Imagen del producto"></a>
                <button>Explorar ofertas</button>
            </div>
        </div>
    <?php 
    $i++;
    endforeach;

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
