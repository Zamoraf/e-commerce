<?php
include("conexion.php");

$Id_planta = $_POST['Id_eliminar'];

$sql = "DELETE FROM plantas WHERE Id_planta='$Id_planta'";

if (mysqli_query($conexion, $sql)) {
    echo 1; // Éxito
} else {
    echo 0; // Error
}

mysqli_close($conexion);
?>
