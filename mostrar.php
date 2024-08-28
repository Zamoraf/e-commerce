<?php

include("conexion.php");

// Consulta SQL para obtener los registros
$sql = "SELECT * FROM plantas";

// Ejecutar la consulta y obtener los resultados
$resultado = mysqli_query($conexion, $sql);

// Estilo para la tabla
echo "<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
</style>";

// Preparar la tabla HTML
echo "<table>";
echo "<tr><th>ID PLANTA</th><th>NOMBRE PLANTA</th><th>DESCRIPCIÓN</th><th>PRECIO</th><th>TIPO</th><th>IMAGEN</th></tr>";

// Mostrar cada registro en una fila de la tabla
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila['Id_planta'] . "</td>";
    echo "<td>" . $fila['Nombre_planta'] . "</td>";
    echo "<td>" . $fila['Descripcion'] . "</td>";
    echo "<td>" . $fila['Precio'] . "</td>";
    echo "<td>" . $fila['Tipo'] . "</td>";
    echo "<td>" . $fila['Imagen'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conexion);

?>
