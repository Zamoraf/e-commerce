<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "tier");

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Definir el rol predeterminado
$rol = 2;

// Consulta SQL para insertar datos en la tabla de usuarios
$sql = "INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES ('$nombre', '$correo', '$contrasena', '$rol')";

if ($conn->query($sql) === TRUE) {
    // Registro exitoso
    echo "<script>alert('Registro exitoso'); window.location.href = 'login.php';</script>";
} else {
    // Error al registrar usuario
    echo "Error al registrar usuario: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
