<?php
// Definición de URL solo si no está definida
if (!defined('URL')) {
    define('URL', 'http://localhost/PibeTech/');
}

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PibeTech";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
