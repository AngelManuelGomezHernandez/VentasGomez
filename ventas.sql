-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 19:26:28
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id` int(4) NOT NULL,
  `id_pedido` int(4) NOT NULL,
  `id_producto` int(4) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `id_pedido` int(4) NOT NULL,
  `id_cliente` int(4) NOT NULL,
  `precio` int(10) NOT NULL,
  `precio_total` int(12) NOT NULL,
  `iva` int(6) NOT NULL,
  `cantidad` int(4) NOT NULL,
  `fechaEnvio` datetime NOT NULL,
  `fechaEntrega` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_pedidos`
--

INSERT INTO `tbl_pedidos` (`id_pedido`, `id_cliente`, `precio`, `precio_total`, `iva`, `cantidad`, `fechaEnvio`, `fechaEntrega`) VALUES
(1, 1, 136, 147, 11, 3, '2023-11-17 01:27:52', '2023-11-18 01:27:52'),
(2, 1, 136, 147, 11, 3, '2023-11-17 01:39:32', '2023-11-18 01:39:32'),
(3, 1, 136, 147, 11, 3, '2023-11-17 01:41:41', '2023-11-18 01:41:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id_p` int(4) NOT NULL,
  `nom_pro` varchar(100) NOT NULL,
  `id_dep` int(4) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `precio` int(10) NOT NULL,
  `precio_total` float(12,2) NOT NULL,
  `iva` float(10,2) NOT NULL,
  `lote` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id_p`, `nom_pro`, `id_dep`, `proveedor`, `precio`, `precio_total`, `iva`, `lote`) VALUES
(1, 'Sabritas Fuego', 2, 'Sabritas', 15, 17.00, 2.00, 6),
(3, 'Sabritas Limon', 1, 'Sabritas', 14, 17.00, 2.00, 5),
(4, 'Galletas chockie', 4, 'Gamesa', 36, 38.88, 2.88, 253),
(5, 'Arroz Blanco', 1, 'Arroz \"El Insano\"', 22, 23.76, 1.76, 41);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDP` (`id_producto`),
  ADD KEY `IDPe` (`id_pedido`);

--
-- Indices de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`id_p`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_pedidos`
--
ALTER TABLE `tbl_pedidos`
  MODIFY `id_pedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id_p` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `IDP` FOREIGN KEY (`id_producto`) REFERENCES `tbl_productos` (`id_p`) ON DELETE CASCADE,
  ADD CONSTRAINT `IDPe` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedidos` (`id_pedido`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
