-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2021 a las 18:25:02
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compravende`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `username` varchar(12) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ciudad` varchar(20) NOT NULL,
  `pais` varchar(12) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `username`, `nombre`, `password`, `direccion`, `telefono`, `email`, `ciudad`, `pais`, `zip`) VALUES
(1, 'Ericoa', 'Juan Perez', '1234', 'Calle 123', '12345678', 'femwiof@f2i3.com', '', '', 0),
(2, 'Pedriko', 'Pedro Perez', '54321', 'Calle 123', '12345678', 'femwiof@f2i3.com', '', '', 0),
(3, 'Mariona', 'Maria Perez', '12323', 'Calle 123', '12345678', 'fieifi@fwe.es', '', '', 0),
(4, 'PJuan', 'Juan Perez', 'Gwe123', 'Calle 123', '12345678', 'ghiot@oef.es', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `cliente_id`, `fecha_compra`, `valor`, `descripcion`) VALUES
(1, 1, '2021-11-30', '20.50', 'Esto es uina descripcion de una compra'),
(2, 2, '2021-11-30', '10.50', 'Esto es uina descripcion de una compra'),
(3, 3, '2021-12-01', '28.50', 'Esto es uina descripcion de una compra'),
(4, 4, '2021-11-30', '480.50', 'Esto es uina descripcion de una compra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `compra_id`, `producto_id`, `cantidad`, `valor`) VALUES
(1, 1, 1, 5, '20.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto_1` varchar(100) NOT NULL,
  `foto_2` varchar(100) NOT NULL,
  `foto_3` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `visitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `cliente_id`, `nombre`, `valor`, `data`, `foto_1`, `foto_2`, `foto_3`, `descripcion`, `categoria`, `visitas`) VALUES
(1, 1, 'Pizza', '10.00', '2021-12-13 23:00:00', '', '', '', '', '', 23),
(2, 2, 'Pizza', '10.00', '2021-12-13 23:00:00', '', '', '', '', '', 0),
(3, 3, 'Pizza', '10.00', '2021-12-13 23:00:00', '', '', '', '', '', 0),
(4, 4, 'Pizza', '10.00', '2021-12-13 23:00:00', '', '', '', '', '', 0),
(6, 1, 'Tele', '123.00', '2021-12-13 23:00:00', '', '', '', '', '', 0),
(7, 1, 'fewfw', '200.00', '2021-12-14 14:39:08', '', '', '', 'regregew', 'Electrodomestico', 0),
(8, 1, 'fewfw', '200.00', '2021-12-14 14:39:22', '', '', '', 'regregew', 'Electrodomestico', 1),
(9, 1, 'Tele', '200.00', '2021-12-14 14:39:51', '', '', '', 'regregew', 'Electrodomestico', 0),
(16, 1, 'Prueba', '123.00', '2021-12-14 17:18:05', 'tele_-1639502285.jfif', 'tele_-1639502285.jfif_2', 'tele_-1639502285.jfif_3', 'prueba12', 'Menaje', 0),
(17, 1, 'Prueba', '123.00', '2021-12-14 17:20:16', 'tele_-1639502416.jfif', 'tele_-1639502416.jfif_2', 'tele_-1639502416.jfif_3', 'prueba12', 'Menaje', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_id_FK` (`compra_id`),
  ADD KEY `producto_id_FK` (`producto_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `compra_id_FK` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_id_FK` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
