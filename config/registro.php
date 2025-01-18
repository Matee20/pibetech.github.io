<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";  // Actualiza si es necesario
$password = "";  // Actualiza si es necesario
$dbname = "PibeTech";

try {
    // Crear conexión PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Configurar PDO para que arroje excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar la contraseña

        // Verificar si el email ya existe
        $checkEmail = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
        $checkEmail->bindParam(':email', $email);
        $checkEmail->execute();

        if ($checkEmail->rowCount() > 0) {
            echo "<script>
                    alert('Este correo electrónico ya está registrado.');
                    window.location.href = '../src/views/registro.php';
                  </script>";
            exit();
        }

        // Preparar la consulta SQL usando un prepared statement
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stmt = $conn->prepare($sql);

        // Vincular parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Ejecutar la consulta
        $stmt->execute();

        // Mostrar mensaje de éxito y redirigir a la página principal
        echo "<script>
                alert('Registro exitoso');
                window.location.href = '../src/views/Principal.php';
              </script>";
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión
$conn = null;
