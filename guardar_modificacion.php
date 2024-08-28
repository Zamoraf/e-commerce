<?php
include("conexion.php");

// Recibimos los datos del formulario de modificación
$Id_planta = $_POST['Id_planta'];
$Nombre_planta = $_POST['Nombre_planta'];
$Descripcion = $_POST['Descripcion'];
$Precio = $_POST['Precio'];
$Tipo = $_POST['Tipo'];
$Imagen = $_POST['Imagen'];

// Consulta SQL para actualizar el registro
$sql = "UPDATE plantas SET Nombre_planta=?, Descripcion=?, Precio=?, Tipo=?, Imagen=? WHERE Id_planta=?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "ssdssi", $Nombre_planta, $Descripcion, $Precio, $Tipo, $Imagen, $Id_planta);

// Ejecutamos la consulta
if (mysqli_stmt_execute($stmt)) {
    echo 1; // Éxito
} else {
    echo 0; // Error
}

// Cerramos la conexión
mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
