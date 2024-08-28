<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantas</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        /* Estilos específicos para la página de inicio */
        body {
            background-color: #f9f9f9;
            font-family: 'Roboto', sans-serif;
            color: #333333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333333;
        }

        .btn-productos {
            display: inline-block;
            margin-bottom: 20px;
            color: #ffffff;
            background-color: #3498db;
            border: none;
            border-radius: 5px;
            padding: 12px 24px;
            font-size: 1rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-productos:hover {
            background-color: #2980b9;
        }

        .productos {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .card {
            width: 300px;
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .content {
            padding: 20px;
        }

        .title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .desc {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .img-item {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .action {
            display: block;
            width: 100%;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            background-color: #1abc9c;
            color: #ffffff;
            font-size: 1rem;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action:hover {
            background-color: #16a085;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #3498db;
            color: #ffffff;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #3498db;
        }

        .center {
            text-align: center;
        }

        nav {
            text-align: right;
            padding: 20px;
        }
    </style>
</head>
<body>

    <nav>
        <a href="login.php" class="btn btn-primary">Iniciar sesión</a>
    </nav>
    
    <div class="container">

        <h2>¡Vive en armonía con lo natural!</h2>

        <div class="productos">
            <?php
            // Conexión a la base de datos (reemplaza los valores con los tuyos)
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "tier";

            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            // Consulta para seleccionar los datos de la tabla
            $sql = "SELECT Id_planta, Nombre_planta, Precio, Imagen FROM plantas";
            $result = $conn->query($sql);

            // Imprime los datos dentro de la estructura HTML
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<div class="content">';
                    echo '<span class="title">' . $row["Nombre_planta"] . '</span>';
                    echo '<p class="desc">$' . $row["Precio"] . '</p>';
                    echo '<img src="' . $row["Imagen"] . '" alt="" class="img-item" style="width: 100px; height: 100px;">';
                    echo '<button class="action" onclick="agregarAlCarrito(' . $row["Id_planta"] . ', \'' . $row["Nombre_planta"] . '\', ' . $row["Precio"] . ', \'' . $row["Imagen"] . '\')">Agregar al Carrito</button>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "0 resultados";
            }

            // Cierra la conexión
            $conn->close();
            ?>
        </div>
    </div>

    <div class="center">
    <br>
    <a href="login.php" class="button"><button>Regresar</button></a>
    </div>

    <script>
        function agregarAlCarrito(Id_planta, Nombre_planta, Precio, Imagen) {
            // Objeto para almacenar la información del producto
            var producto = {
                Id_planta: Id_planta,
                Nombre_planta: Nombre_planta,
                Precio: Precio,
                Imagen: Imagen
            };

            // Convertir el objeto a formato JSON y almacenarlo en localStorage
            var carrito = localStorage.getItem('carrito');
            if (!carrito) {
                // Si no hay ningún artículo en el carrito, crear un nuevo carrito
                carrito = [];
            } else {
                // Si ya hay artículos en el carrito, convertir el JSON a objeto
                carrito = JSON.parse(carrito);
            }
            // Agregar el nuevo producto al carrito
            carrito.push(producto);
            // Guardar el carrito actualizado en localStorage
            localStorage.setItem('carrito', JSON.stringify(carrito));
            // Mostrar un mensaje de éxito
            alert('¡Producto agregado al carrito!');
        }
    </script>

</body>
</html>
