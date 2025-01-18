<?php
session_start();

$servername = "localhost";
$database = "PibeTech";
$username = "root";  // Actualiza si es necesario
$password = "";  // Actualiza si es necesario

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database;charset=utf8mb4", $username, $password);
    // Configurar el modo de error de PDO para que lance excepciones
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT id, nombre, password FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['nombre'];
                $_SESSION['loggedin'] = true; // Agregar esta línea

                // Mostrar mensaje de éxito y redirigir a la página principal
                echo "<script>
                        alert('Inicio de sesión exitoso');
                        window.location.href = '../src/views/Principal.php';
                      </script>";
                exit();
            } else {
                echo "<script>
                        alert('Contraseña incorrecta.');
                        window.location.href = '../src/views/registro.php';
                      </script>";
                exit();
            }
        } else {
            echo "<script>
                    alert('No se encontró una cuenta con ese email.');
                    window.location.href = '../src/views/registro.php';
                  </script>";
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null; // Cerrar la conexión
