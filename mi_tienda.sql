-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 13:42:24
-- Versión del servidor: 10.6.17-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mi_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `nickname`, `password`, `telefono`, `domicilio`) VALUES
(1, 'Carlos', 'González', 'carlosg', 'Pass12345', '123456789', 'Calle 123'),
(2, 'Ana', 'Pérez', 'anap', 'pass456', '987654321', 'Avenida 456'),
(3, 'Luis', 'Martínez', 'luism', 'pass789', '555555555', 'Boulevard 789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `cliente_id`, `url`) VALUES
(1, 'Laptop', 'Laptop de alto rendimiento', 1500.00, 1, '../Vista/img/Laptop.png'),
(2, 'Telefono', 'Smartphone de ultima generacion', 800.00, 1, '../Vista/img/Telefono.png'),
(3, 'Tablet', 'Tablet con pantalla HD', 300.00, 2, '../Vista/img/Tablet.png'),
(4, 'Auriculares', 'Auriculares inalámbricos', 100.00, 2, '../Vista/img/Auriculares.png'),
(6, 'Monitor', 'Monitor 4K', 400.00, 3, '../Vista/img/Monitor.png'),
(7, 'Teclado', 'Teclado mecánico', 80.00, NULL, '../Vista/img/Teclado.png'),
(8, 'Mouse', 'Mouse óptico', 60.00, 2, '../Vista/img/Mouse.png'),
(9, 'Impresora', 'Impresora multifuncional', 200.00, NULL, '../Vista/img/Impresora.png'),
(52, 'Parlantes', 'altavoces', 200.00, 1, '../Vista/img/Parlantes.png'),
(55, 'Camara', 'cámara fotográfica', 200.00, 1, '../Vista/img/Camara.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
