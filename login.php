<?php
// Obtener los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Conectar a la base de datos en Amazon RDS
$servername = "baaxel.cd5jziv9bd4j.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "Ornelas123.";
$dbname = "baaxel";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultar la base de datos para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Las credenciales son válidas, iniciar sesión y redirigir al usuario a la página principal
    session_start();
    $_SESSION['email'] = $email;
    header("Location: index.html");
    exit();
} else {
    // Las credenciales son inválidas, mostrar un mensaje de error o redirigir al usuario a la página de inicio de sesión nuevamente
    echo "Credenciales inválidas";
}

$conn->close();
?>
