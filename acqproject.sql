-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2023 a las 21:40:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acqproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(20) NOT NULL,
  `codigo` int(10) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precio` int(50) DEFAULT NULL,
  `cantidad` int(50) DEFAULT NULL,
  `fecha` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `codigo`, `id_usuario`, `producto`, `precio`, `cantidad`, `fecha`) VALUES
(7, 6, 1, 'Cerveza', 200, 4, '00:00:00'),
(8, 9, 1, 'Pesas', 1400, 7, '00:00:00'),
(11, 7, 2, 'Carne', 2100, 7, '00:00:00'),
(12, 10, 2, 'Comestibles', 50, 5, '00:00:00'),
(13, 9, 3, 'Pesas', 800, 4, '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) NOT NULL,
  `codigo` int(10) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tabla` varchar(100) NOT NULL,
  `nomproducto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `preciocompra` varchar(50) DEFAULT NULL,
  `cantidadentrada` varchar(50) DEFAULT NULL,
  `descripcionproducto` varchar(200) DEFAULT NULL,
  `fecha` time DEFAULT NULL,
  `movimiento` varchar(100) DEFAULT NULL,
  `cantidadsalidad` int(50) DEFAULT NULL,
  `precioventa` int(50) DEFAULT NULL,
  `total` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `codigo`, `id_usuario`, `id_tabla`, `nomproducto`, `preciocompra`, `cantidadentrada`, `descripcionproducto`, `fecha`, `movimiento`, `cantidadsalidad`, `precioventa`, `total`) VALUES
(34, 11, 3, '', 'mantequilla', '50', '1', '', '23:16:28', '', 0, 0, 0),
(35, 12, 3, '', 'ajo', '50', '1', '', '23:16:34', '', 0, 0, 0),
(36, 13, 3, '', 'cilantro', '50', '1', '', '23:17:04', '', 0, 0, 0),
(37, 14, 3, '', 'Cereza', '50', '1', '', '23:18:36', '', 0, 0, 0),
(38, 10, 3, '', 'Comestibles', '200', '1', '', '23:18:45', '', 0, 0, 0),
(39, 15, 3, '', 'frutas', '50', '1', 'No', '06:56:27', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tienda`
--

CREATE TABLE `tienda` (
  `codigo` int(10) NOT NULL,
  `producto` varchar(50) DEFAULT NULL,
  `precio` int(50) DEFAULT NULL,
  `precio_tienda` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tienda`
--

INSERT INTO `tienda` (`codigo`, `producto`, `precio`, `precio_tienda`) VALUES
(6, 'Cerveza', 200, '50'),
(7, 'Carne', 150, '300'),
(8, 'Muebles', 200, '250'),
(9, 'Pesas', 200, '200'),
(10, 'Comestibles', 200, '10'),
(11, 'mantequilla', 50, ''),
(12, 'ajo', 50, ''),
(13, 'cilantro', 50, NULL),
(14, 'Cereza', 50, NULL),
(15, 'frutas', 50, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `direccion` varchar(50) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `nombres` varchar(90) NOT NULL,
  `apellidos` varchar(90) NOT NULL,
  `usuario_nombre` varchar(200) NOT NULL,
  `usuario_password` varchar(90) NOT NULL,
  `usuario_email` varchar(200) NOT NULL,
  `celular` varchar(11) NOT NULL,
  `fecha` year(4) DEFAULT NULL,
  `cuenta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`direccion`, `usuario_id`, `nombres`, `apellidos`, `usuario_nombre`, `usuario_password`, `usuario_email`, `celular`, `fecha`, `cuenta`) VALUES
('', 1, '', '', 'g', 'F#88pp1', 'g@gmail.com', '', '2023', 'basic'),
('', 2, '', '', 'j', '#33ppfa', 'j@gmail.com', '', '2022', 'premuim'),
('calle 48Q avenida infinita', 3, '', '', 'a', '~hhj134', 'a@gmail.com', '', '2020', 'standard'),
('Avenida calle 48Q #2A', 4, '', '', 'h', '%ggt54', 'h@gmail.com', '', '2021', 'premuim'),
('calle 48Q avenida infinita', 5, '', '', 'k', ' #f5gg6h', 'k@gmail.com', '', '2013', 'standard'),
('calle 48Q avenida infinita', 6, '', '', 'k', ' #f5gg6h', 'k@gmail.com', '', '2020', 'standard');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo` (`codigo`),
  ADD KEY `usuario_id` (`id_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `codigo` (`codigo`),
  ADD KEY `nomproducto` (`nomproducto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tabla` (`id_tabla`);

--
-- Indices de la tabla `tienda`
--
ALTER TABLE `tienda`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `tienda`
--
ALTER TABLE `tienda`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`codigo`) REFERENCES `tienda` (`codigo`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`codigo`) REFERENCES `tienda` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
