<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal</title>
</head>
<body>
    <div id="smart-button-container">
        <div style="text-align: center;">
            <div id="paypal-button-container"></div>
        </div>
    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=AZ1m_ZmyreEvDnQEPVHSeYepszd5thTFZJO5517MTVBImc-1oGfcleWWg41MQWFNMEaYMeRmTDIPFtPH&currency=MXN" data-sdk-integration-source="button-factory"></script>
    <script>
        function initPayPalButton() {
            paypal.Buttons({
                style: {
                    shape: 'rect',
                    color: 'gold',
                    layout: 'vertical',
                    label: 'pay',
                },

                createOrder: function(data, actions) {
                    // Aquí puedes calcular el valor total dinámicamente
                    var valorTotal = calcularValorTotal(); // Supongamos que tienes una función llamada calcularValorTotal() que devuelve el valor total

                    return actions.order.create({
                        purchase_units: [{
                            "description": "LA DESCRIPCION DE TU PRODUCTO",
                            "amount": {
                                "currency_code": "MXN",
                                "value": valorTotal
                            }
                        }]
                    }).then(function(orderID) {
                        enviarValorTotal(valorTotal); // Envía el valor total a tu API
                        return orderID;
                    });
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                        actions.redirect('LA URL DE TU PAGINA DE GRACIAS');
                    });
                },

                onError: function(err) {
                    console.log(err);
                }
            }).render('#paypal-button-container');
        }
        initPayPalButton();

        function calcularValorTotal() {
            // Aquí puedes calcular el valor total según los productos seleccionados, precios, etc.
            var valorTotal = 0;
            // Ejemplo: sumar los precios de todos los productos
            // Supongamos que tienes una lista de productos con precios en un array llamado productos
            var productos = [10, 20, 30]; // Ejemplo de precios de productos
            for (var i = 0; i < productos.length; i++) {
                valorTotal += productos[i];
            }
            return valorTotal;
        }

        function enviarValorTotal(valorTotal) {
            // Aquí envías el valor total a tu API como se muestra en el código anterior
            // ...
        }
    </script>
</body>
</html>
