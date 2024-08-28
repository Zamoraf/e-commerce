<?php
    // Incluye el archivo de conexión a la base de datos
    include("conexion.php");

    // Recopila los datos del formulario enviado por el método POST
    $Id_planta = $_POST['Id_planta']; // ID del producto
    $Nombre_planta = $_POST['Nombre_planta']; // Nombre del producto
    $Descripcion = $_POST['Descripcion']; // Descricion del producto
    $Precio = $_POST['Precio']; // Precio del producto
    $Tipo = $_POST['Tipo']; // Tipo del producto
    $Imagen = $_POST['Imagen']; // URL de la imagen del producto (posiblemente)

    // Construye la consulta SQL para insertar los datos en la base de datos
    // Nota: Hay un error aquí, '$Imagen' debería ser $_POST['Imagen'] en lugar de la cadena 'Imagen'
    $sql = "INSERT INTO plantas (Id_planta, Nombre_planta,  Descripcion, Precio, Tipo, Imagen) 
            VALUES ('$Id_planta', '$Nombre_planta', '$Descripcion', '$Precio', '$Tipo', '$Imagen')";

    // Ejecuta la consulta SQL y muestra el resultado (true o false)
    echo mysqli_query($conexion, $sql);
?>
