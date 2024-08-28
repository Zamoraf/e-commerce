<?php

class Database {
    private $hostname = "localhost";
    private $database = "tier";
    private $username = "root";
    private $password = "";
    private $charset = "utf8";

    function conectar() {
        try {
            $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . "; charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;
        } catch(PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
}

// Incluye la clase Database
require_once('Database');

// Crea una instancia de la clase Database
$db = new Database();
$con = $db->conectar();

// Inicia la sesión
session_start();

// Verifica si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene el ID de usuario desde la sesión
    if (isset($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
    } else {
        // Maneja el caso en que el ID de usuario no esté disponible
        echo "Error: ID de usuario no disponible.";
        exit();
    }

    // Verifica si se recibieron los detalles de la compra
    $detalles = json_decode(file_get_contents('php://input'), true);
    if (!$detalles) {
        echo "Error: No se recibieron los detalles de la transacción correctamente.";
        exit();
    }

    // Obtiene los productos y la fecha de la transacción
    $productos = $detalles['purchase_units'][0]['items'];
    $fecha = date('Y-m-d H:i:s');
    $total = 0;

    // Inserta cada producto en la tabla de ventas
    foreach ($productos as $producto) {
        $id_planta = $producto['sku']; // Suponiendo que el SKU de PayPal es el ID de la planta
        $cantidad = $producto['quantity'];
        $precio_unitario = $producto['unit_amount']['value']; // Precio unitario por producto
        $total += $precio_unitario * $cantidad;

        // Inserta la venta en la base de datos
        $sql = $con->prepare("INSERT INTO ventas (Fecha, id, Id_planta, Total) VALUES (?, ?, ?, ?)");
        $sql->execute([$fecha, $id_usuario, $id_planta, $precio_unitario * $cantidad]);
    }

    // Limpia el carrito después de la compra
    unset($_SESSION['carrito']['productos']);

    echo "Venta registrada correctamente.";
}

?>