<?php
session_start();

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tier";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$productos = json_decode($_GET['productos'], true);
$precioTotal = $_GET['precio'];

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO pedidos (id_planta, nombre_planta, precio, imagen, precio_total) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("isdss", $id_planta, $nombre_planta, $precio, $imagen, $precio_total);

foreach ($productos as $producto) {
    $id_planta = $producto['Id_planta'];
    $nombre_planta = $producto['Nombre_planta'];
    $precio = $producto['Precio'];
    $imagen = $producto['Imagen'];
    $precio_total = $precioTotal;
    $stmt->execute();
}

// Guardar datos en la sesión
$_SESSION['productos'] = $productos;
$_SESSION['precio_total'] = $precioTotal;

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago con PayPal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        
        h2 {
            margin-top: 0;
        }
        
        .paypal-button-container {
            text-align: center;
        }

        .action {
            display: block;
            width: fit-content;
            margin: 10px auto 0;
            padding: 8px 16px;
            background-color: #1abc9c;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action:hover {
            background-color: #16a085;
        }

        .productos-container {
            margin-top: 20px;
        }

        .producto {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .producto img {
            max-width: 50px;
            height: auto;
            margin-right: 10px;
        }

        .producto p {
            margin: 5px 0;
            flex: 1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detalles del Pedido</h2>
        <div class="productos-container">
            <?php foreach ($productos as $producto): ?>
                <div class="producto">
                    <img src="<?= $producto['Imagen']; ?>" alt="Imagen del Producto">
                    <p><strong>Nombre:</strong> <?= $producto['Nombre_planta']; ?></p>
                    <p><strong>Precio:</strong> <?= $producto['Precio']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <p><strong>Total:</strong> <?= $precioTotal; ?></p>

        <div class="paypal-button-container" id="paypal-button-container"></div>

        <button onclick="window.location.href='carrito.php'" class="action">Regresar</button>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=ASzZ6ncs5K556mtpWuZzSJtPQG78tNoyGavcRfeIA-1u4mnIsjnIuzhgYXcxESAqBfekwjFTqI4cxidu&currency=MXN"></script>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        description: "Pago de productos",
                        amount: {
                            currency_code: "MXN",
                            value: "<?= $precioTotal; ?>"
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    console.log(details);
                    // Redirigir a la página de gracias
                    window.location.href = 'gracias.php';
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>
