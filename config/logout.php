<?php
session_start();
session_destroy(); // Destruir la sesión

// Redirigir a la página principal
header("Location: ../src/Views/principal.php"); 
exit();
?>
