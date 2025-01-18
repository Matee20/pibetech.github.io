<?php
$servername = "localhost";
$database = "PibeTech";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Recoger los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    try {
        // Insertar datos en la base de datos
        $stmt = $conn->prepare("INSERT INTO cliente (nombre, telefono, email, mensaje) VALUES (:name, :phone, :email, :message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        $stmt->execute();

        // Enviar correo electrónico
        $to = "redmateoperez15@gmail.com";  
        $subject = "Nuevo mensaje de contacto";
        $body = "Nombre: $name\nTeléfono: $phone\nEmail: $email\n\nMensaje:\n$message";
        $headers = "From: no-reply@tudominio.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        if (mail($to, $subject, $body, $headers)) {
            echo "<script>
                    alert('Mensaje enviado correctamente. Gracias por contactarnos.');
                    window.location.href = '../src/Views/principal.php'; 
                  </script>";
        } else {
            echo "<script>
                    alert('Error al enviar el correo. Por favor, intenta nuevamente.');
                    window.location.href = '../src/Views/contacto.php';  // Vuelve a mostrar el formulario
                  </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$conn = null; // Cerrar la conexión
