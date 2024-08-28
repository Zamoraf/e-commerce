<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $conn = new mysqli("localhost","root","","tier");

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Recuperar datos del formulario
    $correo = $_POST['correo'];
    $contraseña = $_POST['contrasena'];

    // Consulta SQL para verificar credenciales
    $sql = "SELECT id, nombre, rol FROM usuarios WHERE correo = '$correo' AND contrasena = '$contraseña'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Usuario autenticado correctamente
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['rol'] = $row['rol'];

        // Redireccionar según el rol
        if ($_SESSION['rol'] == 1) {
            header("Location: admin.php");
        } elseif ($_SESSION['rol'] == 2) {
            header("Location: usuario.php");
        }
    } else {
        // Usuario no encontrado o credenciales incorrectas
        echo "Correo electrónico o contraseña incorrectos.";
    }

    // Cerrar conexión
    $conn->close();
}
?>
