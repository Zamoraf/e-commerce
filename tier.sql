-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2024 a las 21:07:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tier`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_planta` int(11) NOT NULL,
  `nombre_planta` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_planta`, `nombre_planta`, `precio`, `imagen`, `precio_total`, `fecha`) VALUES
(2, 1, 'Girasol', 80.00, 'https://cdn.homedepot.com.mx/productos/335365/335365-d.jpg', 758.00, '2024-05-28 02:30:25'),
(3, 2, 'Rosa roja', 678.00, 'https://th.bing.com/th/id/OPHS.DoiIlldyhP2XsQ474C474?w=160&h=187&rs=1&o=5&dpr=1.3&pid=21.1', 758.00, '2024-05-28 02:30:25'),
(4, 3, 'Romero', 56.00, 'https://th.bing.com/th/id/OIP.JvK-Pi1IpGeb8BfESxAOSwHaHa?w=172&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', 56.00, '2024-05-28 02:31:38'),
(6, 1, 'Girasol', 80.00, 'https://cdn.homedepot.com.mx/productos/335365/335365-d.jpg', 216.00, '2024-05-28 02:34:56'),
(8, 3, 'Romero', 56.00, 'https://th.bing.com/th/id/OIP.JvK-Pi1IpGeb8BfESxAOSwHaHa?w=172&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', 216.00, '2024-05-28 02:35:09'),
(9, 1, 'Girasol', 80.00, 'https://cdn.homedepot.com.mx/productos/335365/335365-d.jpg', 216.00, '2024-05-28 02:35:09'),
(16, 1, 'Girasol', 80.00, 'https://cdn.homedepot.com.mx/productos/335365/335365-d.jpg', 240.00, '2024-05-28 02:42:28'),
(20, 3, 'Romero', 56.00, 'https://th.bing.com/th/id/OIP.JvK-Pi1IpGeb8BfESxAOSwHaHa?w=172&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', 112.00, '2024-05-28 02:43:17'),
(23, 2, 'Rosa roja', 678.00, 'https://th.bing.com/th/id/OPHS.DoiIlldyhP2XsQ474C474?w=160&h=187&rs=1&o=5&dpr=1.3&pid=21.1', 814.00, '2024-05-28 02:53:20'),
(24, 1, 'Girasol', 80.00, 'https://cdn.homedepot.com.mx/productos/335365/335365-d.jpg', 814.00, '2024-05-28 02:53:20'),
(25, 4, 'Ruda', 64.00, 'https://th.bing.com/th/id/OIP.443oSu7HbSS5pbOK1qQeeQAAAA?w=142&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', 64.00, '2024-05-28 02:54:47'),
(29, 2, 'Rosa roja', 678.00, 'https://th.bing.com/th/id/OPHS.DoiIlldyhP2XsQ474C474?w=160&h=187&rs=1&o=5&dpr=1.3&pid=21.1', 678.00, '2024-05-28 03:07:15'),
(31, 3, 'Romero', 56.00, 'https://th.bing.com/th/id/OIP.JvK-Pi1IpGeb8BfESxAOSwHaHa?w=172&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', 814.00, '2024-05-28 03:09:44'),
(32, 1, 'Girasol', 80.00, 'https://cdn.homedepot.com.mx/productos/335365/335365-d.jpg', 814.00, '2024-05-28 03:09:44'),
(33, 2, 'Rosa roja', 678.00, 'https://th.bing.com/th/id/OPHS.DoiIlldyhP2XsQ474C474?w=160&h=187&rs=1&o=5&dpr=1.3&pid=21.1', 678.00, '2024-05-28 03:12:53'),
(34, 2, 'Rosa roja', 678.00, 'https://th.bing.com/th/id/OPHS.DoiIlldyhP2XsQ474C474?w=160&h=187&rs=1&o=5&dpr=1.3&pid=21.1', 814.00, '2024-05-28 03:15:18'),
(35, 1, 'Girasol', 80.00, 'https://cdn.homedepot.com.mx/productos/335365/335365-d.jpg', 814.00, '2024-05-28 03:15:18'),
(36, 3, 'Romero', 56.00, 'https://th.bing.com/th/id/OIP.JvK-Pi1IpGeb8BfESxAOSwHaHa?w=172&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', 814.00, '2024-05-28 03:15:18'),
(37, 6, 'Eucalipto', 69.00, 'https://th.bing.com/th/id/OIP.COQnuvPUY2qgn3Qg37XXcwHaHa?rs=1&pid=ImgDetMain', 149.00, '2024-05-28 13:18:49'),
(38, 7, 'Menta', 80.00, 'https://image.freepik.com/foto-gratis/menta-verde-fresca-maceta-fondo-madera-lamentable-blanco_35641-1226.jpg', 149.00, '2024-05-28 13:18:49'),
(39, 6, 'Eucalipto', 69.00, 'https://th.bing.com/th/id/OIP.COQnuvPUY2qgn3Qg37XXcwHaHa?rs=1&pid=ImgDetMain', 149.00, '2024-06-01 03:59:19'),
(40, 7, 'Menta', 80.00, 'https://image.freepik.com/foto-gratis/menta-verde-fresca-maceta-fondo-madera-lamentable-blanco_35641-1226.jpg', 149.00, '2024-06-01 03:59:19'),
(41, 2, 'Rosa roja', 678.00, 'https://th.bing.com/th/id/OPHS.DoiIlldyhP2XsQ474C474?w=160&h=187&rs=1&o=5&dpr=1.3&pid=21.1', 827.00, '2024-06-01 04:06:03'),
(42, 7, 'Menta', 80.00, 'https://image.freepik.com/foto-gratis/menta-verde-fresca-maceta-fondo-madera-lamentable-blanco_35641-1226.jpg', 827.00, '2024-06-01 04:06:03'),
(43, 6, 'Eucalipto', 69.00, 'https://th.bing.com/th/id/OIP.COQnuvPUY2qgn3Qg37XXcwHaHa?rs=1&pid=ImgDetMain', 827.00, '2024-06-01 04:06:03'),
(44, 2, 'Rosa roja', 678.00, 'https://th.bing.com/th/id/OPHS.DoiIlldyhP2XsQ474C474?w=160&h=187&rs=1&o=5&dpr=1.3&pid=21.1', 827.00, '2024-06-01 04:11:26'),
(45, 7, 'Menta', 80.00, 'https://image.freepik.com/foto-gratis/menta-verde-fresca-maceta-fondo-madera-lamentable-blanco_35641-1226.jpg', 827.00, '2024-06-01 04:11:26'),
(46, 6, 'Eucalipto', 69.00, 'https://th.bing.com/th/id/OIP.COQnuvPUY2qgn3Qg37XXcwHaHa?rs=1&pid=ImgDetMain', 827.00, '2024-06-01 04:11:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantas`
--

CREATE TABLE `plantas` (
  `Id_planta` int(255) UNSIGNED NOT NULL,
  `Nombre_planta` text NOT NULL,
  `Descripcion` text NOT NULL,
  `Precio` int(255) NOT NULL,
  `Tipo` text NOT NULL,
  `Imagen` varchar(456) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plantas`
--

INSERT INTO `plantas` (`Id_planta`, `Nombre_planta`, `Descripcion`, `Precio`, `Tipo`, `Imagen`) VALUES
(1, 'Girasol', 'Planta amarilla', 80, 'Sol', 'https://cdn.homedepot.com.mx/productos/335365/335365-d.jpg'),
(2, 'Rosa roja', 'Sol', 678, 'Sombra', 'https://th.bing.com/th/id/OPHS.DoiIlldyhP2XsQ474C474?w=160&h=187&rs=1&o=5&dpr=1.3&pid=21.1'),
(3, 'Romero', 'verde oscuro', 56, 'Sol y sombra', 'https://th.bing.com/th/id/OIP.JvK-Pi1IpGeb8BfESxAOSwHaHa?w=172&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7'),
(4, 'Ruda', 'verde claro', 82, 'Sol', 'https://th.bing.com/th/id/OIP.T8e8en9s-7eIU6zLB0pyUQHaIk?rs=1&pid=ImgDetMain'),
(5, 'Manzanilla', 'Planta amarilla con blanco', 32, 'Sol y Sombra', 'https://www.guiaverde.com/files/plant/ARO_036.jpg'),
(6, 'Eucalipto', 'Planta aromatica', 69, 'Sol y Sombra', 'https://th.bing.com/th/id/OIP.COQnuvPUY2qgn3Qg37XXcwHaHa?rs=1&pid=ImgDetMain'),
(7, 'Menta', 'Planta aromatica y de cocina', 80, 'Sol y Sombra', 'https://image.freepik.com/foto-gratis/menta-verde-fresca-maceta-fondo-madera-lamentable-blanco_35641-1226.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) UNSIGNED NOT NULL,
  `nombre` text NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`, `rol`) VALUES
(1, 'Armando', '12345@gmail.com', '12345', '1'),
(2, 'Fany', 'fanyzamor@gmail.com', 'agua', '2'),
(3, 'Hilario', 'armandix@gmail.com', 'verde', '2'),
(4, 'Juan', 'Juan23@gmail.com', '20012003', '2'),
(5, 'Sol', 'sol@gmail.com', '12345', '2'),
(6, 'Fernanda ', 'feryllescash17@outlook.com', 'ferskp2s', '2'),
(7, 'Daniel ', 'dino24@gmail.com', '1234', '2'),
(8, 'Daniel Yllescas Rivera', 'Dani78@gmail.com', '20012003', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Id_venta` int(11) UNSIGNED NOT NULL,
  `Fecha` datetime NOT NULL,
  `id` int(11) UNSIGNED NOT NULL,
  `Id_planta` int(11) UNSIGNED NOT NULL,
  `Total` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Id_venta`, `Fecha`, `id`, `Id_planta`, `Total`) VALUES
(1, '2024-05-05 00:00:00', 1, 1, '80');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD PRIMARY KEY (`Id_planta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id_venta`),
  ADD KEY `plantas_id_planta` (`Id_planta`),
  ADD KEY `usuarios_id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id_venta` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `plantas_id_planta` FOREIGN KEY (`Id_planta`) REFERENCES `plantas` (`Id_planta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
