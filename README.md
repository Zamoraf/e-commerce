# E-Commerce de Plantas

Este es un proyecto de e-commerce dedicado a la venta de plantas. Permite a los usuarios navegar, agregar productos al carrito, y realizar pagos utilizando las APIs de PayPal y Mercado Pago. Los administradores tienen acceso a funcionalidades avanzadas para gestionar el sitio.

## Características

### Roles

- **Administrador**:
  - Editar, eliminar y agregar productos.
  - Ver ventas y perfiles de usuarios.
  - Gestionar todo el contenido del sitio.

- **Usuario**:
  - Navegar y comprar productos.
  - Agregar y eliminar productos del carrito.
  - Realizar pagos mediante PayPal y Mercado Pago.
  - Recibir un recibo de la compra.

### Tecnologías Utilizadas

- **Backend**:
  - PHP
  - MySQL

- **Frontend**:
  - HTML
  - CSS

- **APIs de Pago**:
  - PayPal
  - Mercado Pago

## Estructura del Proyecto

- **index.php**: Página principal del e-commerce donde los usuarios pueden ver los productos.
- **admin.php**: Panel de administración para gestionar productos y usuarios.
- **login.php**: Página de inicio de sesión para usuarios y administradores.
- **register.php**: Página de registro de nuevos usuarios.
- **cart.php**: Página del carrito de compras.
- **checkout.php**: Página de pago y generación de recibo.
- **config.php**: Configuración de la conexión a la base de datos y parámetros de la API.
- **styles.css**: Archivo de hojas de estilo para el diseño de la página.


## Uso

### Para Administradores

- Inicia sesión en `login.php` con credenciales de administrador.
- Accede al panel de administración en `admin.php` para gestionar productos y usuarios.

### Para Usuarios

- Navega por el catálogo de productos.
- Agrega productos al carrito y procede a la compra en `checkout.php`.
- Realiza pagos utilizando PayPal o Mercado Pago.
- Recibe un recibo de la compra.
