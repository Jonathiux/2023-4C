-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2023 a las 00:08:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `cliente_id`, `libro_id`, `cantidad`, `activo`) VALUES
(1, 1, 1, 1, 1),
(2, 9, 1, 2, 0),
(3, 9, 2, 3, 1),
(16, 9, 1, 2, 0),
(15, 9, 3, 10, 0),
(14, 9, 2, 5, 0),
(17, 9, 1, 2, 0),
(18, 9, 1, 5, 0),
(19, 9, 3, 1, 1),
(20, 10, 1, 1, 0),
(21, 10, 1, 2, 1),
(22, 10, 1, 1, 1),
(23, 10, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `rfc` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `rfc`, `activo`) VALUES
(1, 'Arturo González', 'Av. Juaréz 234', 'ARG785869TR5', 1),
(2, 'Laura Ríos', 'Av. Guadalupe 456', 'LRA785869TR6', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `cantidad` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE `editorial` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `rfc` varchar(15) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No Especificado',
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`id`, `nombre`, `direccion`, `telefono`, `rfc`, `activo`) VALUES
(1, 'Porrua', 'Juárez 1045 Guadalajara', '33-33-33-33-33', 'POR7845694WR', 0),
(2, 'McGrawHill_2', 'Lázaro Cárdenas 1234_2', '33-31-31-3133_2', 'MCG458996_2', 0),
(3, 'AlfaOmega_3_3', 'Vallarta 234_3', '33-78-89-96-96_3', 'ALO7845663_3_3', 1),
(4, 'Praxis', 'Hidalgo 789', '3336365669', 'PRA7845696', 1),
(5, 'Manual Moderno', 'Lopéz Mateos 345', '331232336', 'MMO78458969', 1),
(6, 'n1', 'd1', 't1', 'r1', 1),
(7, 'McGrawHill:_1', 'Lázaro Cárdenas 1234_1', '33-31-31-3133_1', 'MCG458996_1', 1),
(8, 'McGrawHill:_1_registro 8', 'Lázaro Cárdenas 1234_1', '33-31-31-3133_1_1', 'MCG458996_1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `editorial_id` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `editorial_id`, `titulo`, `descripcion`, `precio`, `activo`) VALUES
(1, 2, 'Aura', 'Carlos Fuentes', '120', 1),
(2, 1, 'El Silencio en la noche', 'Varios Autores', '250', 1),
(3, 2, 'Cuentos', 'Varios', '200', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `privilegios` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `usuario`, `password`, `privilegios`, `activo`) VALUES
(1, 'Víctor Ramírez', 'victor', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 1),
(2, 'Usuario de la Aplicación', 'usuario', '12345', 'admin', 1),
(3, 'VICTOR HUGO RAMIREZ SALAZAR', 'tpihugo@gmail.com', '12345', 'General', 1),
(4, 'Hugo Hugo', 'hugo@hugo.com', '12345', 'General', 1),
(5, 'uno uno', 'uno@uno.com', '$2y$10$k81pPN1dq9euUdOUmH3MeuR4oQnttmBOBujx1Zp7x8KhSIO/ixm42', 'General', 1),
(6, 'Dos Dos Apellido', 'dos@dos.com', '$2y$10$0kw1swbpCCTSORgldvYn9.oRtrtplJMfdyzuay6VQDhm2Oy75bheW', 'General', 1),
(7, 'Tres Nombre Tres Apellido', 'tres@tres.com', '$2y$10$T7TRfkiI/t8RM48QNf3RuukqJuDoQJe56OO0CAthcKQg2nVgV5vT6', 'General', 1),
(8, 'Cinco Nombre Cinco Apellido', 'cinco@cinco.com', '$2y$10$ZOImfoHVnh2bgI3nBdOxV.uwb1b9HcKEE2XYcbaI.nnkdzGnNZbz6', 'General', 1),
(9, 'Seis Seis', 'seis@seis.com', '$2y$10$BEV2blsg6NGY0noycsdWP.UhLB2dsxt9k0/LaXTxhJ2m4Whm9brA2', 'General', 1),
(10, 'Admin Admin', 'admin@admin.mx', '$2y$10$Zcwjvo8B1x858zHLRPRQ3uOg/s6LM1GX7rvTaS6OMoa/4r/j3KdQO', 'admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vs_libros2`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vs_libros2` (
`id` int(11)
,`editorial_id` int(11)
,`titulo` varchar(200)
,`descripcion` text
,`precio` decimal(10,0)
,`activo` tinyint(4)
,`nombre` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vs_pago`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vs_pago` (
`id` int(11)
,`libro_id` int(11)
,`titulo` varchar(200)
,`descripcion` text
,`cantidad` int(11)
,`nombre` varchar(100)
,`cliente_id` int(11)
,`activo` tinyint(4)
,`precio` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vs_libros2`
--
DROP TABLE IF EXISTS `vs_libros2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vs_libros2`  AS SELECT `libros`.`id` AS `id`, `libros`.`editorial_id` AS `editorial_id`, `libros`.`titulo` AS `titulo`, `libros`.`descripcion` AS `descripcion`, `libros`.`precio` AS `precio`, `libros`.`activo` AS `activo`, `editorial`.`nombre` AS `nombre` FROM (`libros` join `editorial`) WHERE `libros`.`editorial_id` = `editorial`.`id` ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vs_pago`
--
DROP TABLE IF EXISTS `vs_pago`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vs_pago`  AS SELECT `carrito`.`id` AS `id`, `carrito`.`libro_id` AS `libro_id`, `vs_libros2`.`titulo` AS `titulo`, `vs_libros2`.`descripcion` AS `descripcion`, `carrito`.`cantidad` AS `cantidad`, `vs_libros2`.`nombre` AS `nombre`, `carrito`.`cliente_id` AS `cliente_id`, `carrito`.`activo` AS `activo`, `vs_libros2`.`precio` AS `precio` FROM (`carrito` join `vs_libros2`) WHERE `carrito`.`libro_id` = `vs_libros2`.`id` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
