-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 11, 2020 at 12:27 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libreria`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) NOT NULL,
  `IdLibro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`id`, `IdCliente`, `IdLibro`, `cantidad`, `activo`) VALUES
(1, 1, 1, 1, 1),
(2, 9, 1, 2, 0),
(3, 9, 2, 3, 1),
(16, 9, 1, 2, 0),
(15, 9, 3, 10, 0),
(14, 9, 2, 5, 0),
(17, 9, 1, 2, 0),
(18, 9, 1, 5, 0),
(19, 9, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `RFC` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `RFC`, `activo`) VALUES
(1, 'Arturo González', 'Av. Juaréz 234', 'ARG785869TR5', 1),
(2, 'Laura Ríos', 'Av. Guadalupe 456', 'LRA785869TR6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
CREATE TABLE IF NOT EXISTS `detalleventa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdVenta` int(11) NOT NULL,
  `IdLibro` int(11) NOT NULL,
  `cantidad` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `editorial`
--

DROP TABLE IF EXISTS `editorial`;
CREATE TABLE IF NOT EXISTS `editorial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `RFC` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT 'No Especificado',
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `editorial`
--

INSERT INTO `editorial` (`id`, `nombre`, `direccion`, `telefono`, `RFC`, `activo`) VALUES
(1, 'Porrua', 'Juárez 1045 Guadalajara', '33-33-33-33-33', 'POR7845694WR', 0),
(2, 'McGrawHill', 'Lázaro Cárdenas 1234', '33-31-31-3133', 'MCG458996', 1),
(3, 'AlfaOmega', 'Vallarta 234', '33-78-89-96-96', 'ALO7845663', 1),
(4, 'Praxis', 'Hidalgo 789', '3336365669', 'PRA7845696', 1),
(5, 'Manual Moderno', 'Lopéz Mateos 345', '331232336', 'MMO78458969', 1);

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

DROP TABLE IF EXISTS `libros`;
CREATE TABLE IF NOT EXISTS `libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdEditorial` int(11) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id`, `IdEditorial`, `titulo`, `descripcion`, `precio`) VALUES
(1, 2, 'Aura', 'Carlos Fuentes', '120'),
(2, 1, 'El Silencio en la noche', 'Varios Autores', '250'),
(3, 2, 'Cuentos', 'Varios', '200');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `privilegios` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `nombreUsuario`, `usuario`, `password`, `privilegios`) VALUES
(1, 'Víctor Ramírez', 'victor', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(2, 'Usuario de la Aplicación', 'usuario', '12345', 'admin'),
(3, 'VICTOR HUGO RAMIREZ SALAZAR', 'tpihugo@gmail.com', '12345', 'General'),
(4, 'Hugo Hugo', 'hugo@hugo.com', '12345', 'General'),
(5, 'uno uno', 'uno@uno.com', '$2y$10$k81pPN1dq9euUdOUmH3MeuR4oQnttmBOBujx1Zp7x8KhSIO/ixm42', 'General'),
(6, 'Dos Dos Apellido', 'dos@dos.com', '$2y$10$0kw1swbpCCTSORgldvYn9.oRtrtplJMfdyzuay6VQDhm2Oy75bheW', 'General'),
(7, 'Tres Nombre Tres Apellido', 'tres@tres.com', '$2y$10$T7TRfkiI/t8RM48QNf3RuukqJuDoQJe56OO0CAthcKQg2nVgV5vT6', 'General'),
(8, 'Cinco Nombre Cinco Apellido', 'cinco@cinco.com', '$2y$10$ZOImfoHVnh2bgI3nBdOxV.uwb1b9HcKEE2XYcbaI.nnkdzGnNZbz6', 'General'),
(9, 'Seis Seis', 'seis@seis.com', '$2y$10$BEV2blsg6NGY0noycsdWP.UhLB2dsxt9k0/LaXTxhJ2m4Whm9brA2', 'General');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdCliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `subtotal` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vs_libros`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vs_libros`;
CREATE TABLE IF NOT EXISTS `vs_libros` (
`id` int(11)
,`titulo` varchar(200)
,`descripcion` text
,`precio` decimal(10,0)
,`nombre` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vs_libros2`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vs_libros2`;
CREATE TABLE IF NOT EXISTS `vs_libros2` (
`id` int(11)
,`titulo` varchar(200)
,`nombre` varchar(100)
,`descripcion` text
,`precio` decimal(10,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vs_pago`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `vs_pago`;
CREATE TABLE IF NOT EXISTS `vs_pago` (
`IdCarrito` int(11)
,`IdCliente` int(11)
,`IdLibro` int(11)
,`titulo` varchar(200)
,`nombre` varchar(100)
,`descripcion` text
,`precio` decimal(10,0)
,`cantidad` int(11)
,`activo` tinyint(4)
);

-- --------------------------------------------------------

--
-- Structure for view `vs_libros`
--
DROP TABLE IF EXISTS `vs_libros`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vs_libros`  AS  select `libros`.`id` AS `id`,`libros`.`titulo` AS `titulo`,`libros`.`descripcion` AS `descripcion`,`libros`.`precio` AS `precio`,`editorial`.`nombre` AS `nombre` from (`libros` join `editorial`) where (`libros`.`IdEditorial` = `editorial`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `vs_libros2`
--
DROP TABLE IF EXISTS `vs_libros2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vs_libros2`  AS  select `libros`.`id` AS `id`,`libros`.`titulo` AS `titulo`,`editorial`.`nombre` AS `nombre`,`libros`.`descripcion` AS `descripcion`,`libros`.`precio` AS `precio` from (`libros` join `editorial`) where (`libros`.`IdEditorial` = `editorial`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `vs_pago`
--
DROP TABLE IF EXISTS `vs_pago`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vs_pago`  AS  select `c`.`id` AS `IdCarrito`,`c`.`IdCliente` AS `IdCliente`,`c`.`IdLibro` AS `IdLibro`,`v`.`titulo` AS `titulo`,`v`.`nombre` AS `nombre`,`v`.`descripcion` AS `descripcion`,`v`.`precio` AS `precio`,`c`.`cantidad` AS `cantidad`,`c`.`activo` AS `activo` from (`carrito` `c` join `vs_libros2` `v`) where (`c`.`IdLibro` = `v`.`id`) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
