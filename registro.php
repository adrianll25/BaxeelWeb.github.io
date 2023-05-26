<?php

// Obtener los datos del formulario
$nombre = $_POST['exampleInputNombre'];
$apellidos = $_POST['exampleInputApellido'];
$email = $_POST['exampleInputEmail1'];
$contrasena = $_POST['exampleInputPassword1'];


// Conectar a la base de datos (reemplaza los valores con los de tu configuración)
$servername = "baaxel.cd5jziv9bd4j.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "Ornelas123.";
$dbname = "baaxel";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}

// Insertar los datos en la tabla "usuario"
$sql = "INSERT INTO usuario (nombre, apellido, correo, contraseña) VALUES ('$nombre', '$apellidos', '$email ', '$contrasena')";
if ($conn->query($sql) === TRUE) {
    echo 'Registro exitoso';
} else {
    echo 'Error al registrar: ' . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>


