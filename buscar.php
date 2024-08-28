<?php
    // Incluye el archivo de conexión a la base de datos
    include("conexion.php");

    // Obtiene el ID del producto enviado mediante el método POST
    $Id_planta = $_POST['id'];

    // Prepara la consulta SQL para seleccionar información del producto
    $sql = "SELECT * FROM plantas WHERE Id_planta=?";
    $stmt = mysqli_prepare($conexion, $sql); // Prepara la consulta
    mysqli_stmt_bind_param($stmt, "i", $Id_planta); // Vincula el parámetro ID
    mysqli_stmt_execute($stmt); // Ejecuta la consulta
    $result = mysqli_stmt_get_result($stmt); // Obtiene el resultado de la consulta

    // Estilo para la información del producto
    echo "<style>
        .product-info {
            margin-top: 20px;
        }
        .product-detail {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
        .product-detail img {
            max-width: 200px;
            max-height: 200px;
        }
        .no-results {
            margin-top: 20px;
            color: red;
        }
    </style>";

    // Verifica si se encontraron resultados
    if (mysqli_num_rows($result) > 0) {
        // Si hay resultados, comienza la construcción del bloque de información del producto en HTML
        echo "<div class='product-info'>";
        while ($row = mysqli_fetch_assoc($result)) {
            // Muestra la información del producto en formato HTML
            echo "<h2>Información del Producto</h2>";
            echo "<div class='product-detail'>";
            echo "<p><strong>Id_planta:</strong> " . $row["Id_planta"] . "</p>";
            echo "<p><strong>Nombre_planta:</strong> " . $row["Nombre_planta"] . "</p>";
            echo "<p><strong>Descripcion:</strong> " . $row["Descripcion"] . "</p>";
            echo "<p><strong>Precio:</strong> " . $row["Precio"] . "</p>";
            echo "<p><strong>Tipo:</strong> " . $row["Tipo"] . "</p>";
            echo "<p><strong>Imagen:</strong> <img src='" . $row["Imagen"] . "' alt='Imagen del producto'></p>";
            echo "</div>";
        }
        // Cierra el bloque de información del producto
        echo "</div>";
    } else {
        // Si no se encontraron resultados, muestra un mensaje de error
        echo "<div class='no-results'>No se encontraron resultados para el ID proporcionado.</div>";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($conexion);
?>
