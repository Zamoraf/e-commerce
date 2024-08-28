<?php
include("conexion.php");

$Id_planta = $_POST['id'];

$sql = "SELECT * FROM plantas WHERE Id_planta=?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "i", $Id_planta);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Aquí construimos el formulario de modificación
    echo "<br>";
    echo "<form id='formModificar' method='POST'>";
    echo "<label>Id planta</label>";
    echo "<input type='text' name='Id_planta' value='" . $row['Id_planta'] . "'><br>";
    echo "<label>Nombre planta</label>";
    echo "<input type='text' name='Nombre_planta' value='" . $row['Nombre_planta'] . "'><br>";
    echo "<label>Descripcion</label>";
    echo "<input type='text' name='Descripcion' value='" . $row['Descripcion'] . "'><br>";
    echo "<label>Precio</label>";
    echo "<input type='text' name='Precio' value='" . $row['Precio'] . "'><br>";
    echo "<label>Tipo</label>";
    echo "<input type='text' name='Tipo' value='" . $row['Tipo'] . "'><br>";
    echo "<label>Imagen</label>";
    echo "<input type='text' name='Imagen' value='" . $row['Imagen'] . "'><br>";
    echo "<button id='btnGuardarModificacion'>Guardar</button>";
    echo "</form>";
} else {
    echo "No se encontró el registro a modificar.";
}

mysqli_close($conexion);
?>
