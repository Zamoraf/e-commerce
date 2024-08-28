<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Plantas</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos específicos para la página de administración */
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
    </style>
</head>
<body>
    <div class="container">
        <h2>Lista de Productos</h2>
        <div class="column">
            <a href="producto.php" class="btn btn-productos">
                <i class="bi bi-product"></i>
                <img src="img\car.png" alt="Carrito" style="width: 20px; height: auto;">
                Productos
            </a>
        </div>
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
                    echo '<img src="' . $row["Imagen"] . '" alt="" class="img-item">';
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
</body>
</html>

