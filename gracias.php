<?php
session_start(); // Asegúrate de que la sesión está iniciada

$productos = isset($_SESSION['productos']) ? $_SESSION['productos'] : [];
$precioTotal = isset($_SESSION['precio_total']) ? $_SESSION['precio_total'] : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por tu compra</title>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Roboto', sans-serif;
            color: #333333;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            margin-top: 50px;
            font-size: 36px;
            color: #333333;
        }

        p {
            font-size: 18px;
            margin-bottom: 50px;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            background-color: #3498db;
            color: #ffffff;
            font-size: 16px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #2980b9;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            text-align: left;
        }

        .productos-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .productos-table th, .productos-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .productos-table th {
            background-color: #f2f2f2;
        }

        .total {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Gracias por tu compra</h1>
    <p>Hemos recibido tu pedido y lo estamos procesando. ¡Gracias por tu preferencia!</p>

    <div class="container">
        <h2>Detalles del Pedido</h2>
        <table class="productos-table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><img src="<?= $producto['Imagen']; ?>" alt="Imagen del Producto" style="max-width: 50px;"></td>
                        <td><?= $producto['Nombre_planta']; ?></td>
                        <td><?= $producto['Precio']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="total"><strong>Total:</strong> <?= $precioTotal; ?></p>
    </div>

    <a href="carrito.php" class="button">Regresar al carrito</a>
</body>
</html>
