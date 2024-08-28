<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Estilos específicos para la página del carrito */
        body {
            background-color: #f9f9f9;
            font-family: 'Roboto', sans-serif;
            color: #333333;
        }

        .column {
            text-align: center;
            margin-bottom: 20px;
        }

        .carrito {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        .producto {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .producto img {
            max-width: 100px; /* Limitar el ancho de la imagen */
            height: auto;
            margin-right: 20px; /* Añadir espacio a la derecha de la imagen */
        }

        #precioTotal {
            font-weight: bold;
        }

        .fila {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .action {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            background-color: #1abc9c;
            color: #ffffff;
            font-size: 1rem;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        .action:hover {
            background-color: #16a085;
        }
    </style>
</head>
<body>

<div class="column">
    <h2>Carrito de Compras</h2>
</div>

<div class="carrito" id="carrito">
    <!-- Aquí se mostrará el contenido del carrito -->
</div>

<p><strong>Total:</strong> <span id="precioTotal"></span></p>

<button class="action" onclick="limpiarCarrito()">Limpiar Carrito</button>

<div class="fila">
    <button class="action" onclick="realizarPagoPaypal()">Pagar con PayPal</button>
    <!-- Botón para pagar con Mercado Libre -->
    <button class="action" onclick="realizarPagoMercadoLibre()">Pagar con Mercado Libre</button>
</div>

<button onclick="window.location.href='usuario.php'" class="action">Regresar</button>

<script>
    function actualizarVistaCarrito() {
        var carrito = JSON.parse(localStorage.getItem('carrito'));
        var carritoDiv = document.getElementById('carrito');
        var precioTotalSpan = document.getElementById('precioTotal');
        var precioTotal = 0; // Variable para almacenar el precio total
        carritoDiv.innerHTML = ''; // Limpiar el contenido existente del carrito
        if (carrito && carrito.length > 0) {
            carrito.forEach(function(producto) {
                precioTotal += parseFloat(producto.Precio); // Sumar el precio del producto al total
                var productoHTML = '<div class="producto">' +
                    '<img src="' + producto.Imagen + '" alt="Imagen del Producto">' +
                    '<div>' +
                    '<p><strong>Nombre:</strong> ' + producto.Nombre_planta + '</p>' +
                    '<p><strong>Precio:</strong> ' + producto.Precio + '</p>' +
                    '</div>' +
                    '</div>';
                carritoDiv.innerHTML += productoHTML;
            });
        } else {
            carritoDiv.innerHTML = '<p>El carrito está vacío.</p>';
        }
        precioTotalSpan.textContent = precioTotal.toFixed(2); // Mostrar el precio total con dos decimales
    }

    function limpiarCarrito() {
        localStorage.removeItem('carrito');
        actualizarVistaCarrito();
    }

    // Función para enviar los datos del carrito a pago_paypal.php
    function realizarPagoPaypal() {
        var productos = JSON.parse(localStorage.getItem('carrito'));
        var precioTotal = document.getElementById('precioTotal').innerText;
        if (productos && productos.length > 0) {
            window.location.href = 'pago_paypal.php?productos=' + encodeURIComponent(JSON.stringify(productos)) + '&precio=' + encodeURIComponent(precioTotal);
        } else {
            alert('No hay productos en el carrito para realizar el pago con PayPal.');
        }
    }

    function realizarPagoMercadoLibre() {
        var precioTotal = document.getElementById('precioTotal').innerText;
        var precio = parseFloat(precioTotal);
        // Realizar acciones necesarias para el pago con Mercado Libre
        alert("Redirigiendo a Mercado Libre para pagar $" + precio.toFixed(2));
        //
    // Aquí iría la lógica de redirección a Mercado Libre
}

// Al cargar la página, actualizar la vista del carrito si hay productos en él
window.onload = function() {
    actualizarVistaCarrito();
};

</script>

<!-- Contenedor para el botón de PayPal -->
<div id="paypal-button-container"></div>

<script src="https://www.paypal.com/sdk/js?client-id=ASzZ6ncs5K556mtpWuZzSJtPQG78tNoyGavcRfeIA-1u4mnIsjnIuzhgYXcxESAqBfekwjFTqI4cxidu&currency=MXN" data-sdk-integration-source="button-factory"></script>

</body>
</html>
