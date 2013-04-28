-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2013 a las 05:47:48
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cookies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `path` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `path`) VALUES
(1, 'Administracion', 'administrador'),
(2, 'Ventas', 'vendedor'),
(3, 'Produccion', 'produccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articuloventa`
--

CREATE TABLE IF NOT EXISTS `articuloventa` (
  `folio` int(11) NOT NULL,
  `idLote` int(11) NOT NULL,
  `Estado` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`folio`,`idLote`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articuloventa`
--

INSERT INTO `articuloventa` (`folio`, `idLote`, `Estado`) VALUES
(1, 2, 'Cancelado'),
(1, 4, NULL),
(1, 13, NULL),
(1, 14, NULL),
(2, 1, 'Cancelado'),
(2, 3, 'Cancelado'),
(2, 12, 'Cancelado'),
(2, 15, 'Cancelado'),
(3, 5, NULL),
(4, 16, NULL),
(5, 6, NULL),
(6, 6, NULL),
(7, 7, NULL),
(8, 22, NULL),
(9, 9, NULL),
(10, 10, NULL),
(11, 11, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE IF NOT EXISTS `carrito` (
  `folio` int(11) NOT NULL,
  `idLote` int(11) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  PRIMARY KEY (`folio`,`idLote`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `RFC` varchar(13) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Telefono` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`RFC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`RFC`, `Nombre`, `Telefono`, `Email`, `Direccion`, `Estado`) VALUES
('AECJ880326XXX', 'La vaca Feliz', '55-67-89-86', 'laVca@hotmail.com', 'Ote 450 Moctezuma Retorno 6', 'Eliminado'),
('BECJ880326XXX', 'Almacenes Cremas', '33-44-55-66', 'v@gmail.com', 'Calz. Guadalupe No. 345 ', 'Eliminado'),
('CECJ880326XXX', 'Oxxo', '55-34-56-78', 'oxxo@oxxo.com', 'av.fray cervando ote 349 ', NULL),
('HECJ880326XXX', 'Wallmart', '45-67-89-89', 'walmart4ever@hotmail.com', 'ote 34 num56 col. robledo 45', NULL),
('KXXJ880326XXX', 'Soriana', '56-78-90-80', 'soriana_polanco@hotmail.com', 'Ote 56 Num.68 Col.Sur', NULL),
('RECJ880326XXX', 'Cremeria El Triunfo', '12-23-45-67', 'erer@ho.com', 'Av. Asadas No. 666 Colonia Calientitos', NULL),
('VECJ880326XXX', 'Wendy Canceco', '55-67-89-78', 'w@hotmail.com', 'Av rosas #450 Col Romirez.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `CURP` varchar(18) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Area` int(11) DEFAULT NULL,
  `Contrasena` varchar(20) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`CURP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`CURP`, `Nombre`, `Area`, `Contrasena`, `Direccion`) VALUES
('AORY950622MMCRYS08', 'Probando', 3, '12', 'DirecciÃ³n #5 '),
('CAAE930106MDFBLS01', 'Cabrera Alvarez Estefany Viridiana', 2, 'chik', 'Calle bonita #5'),
('COMC920420HDFNYH08', 'Christian Armando Consuelo Mayen', 2, 'contrasena', 'Av De las Flores, Mz 9 Lt 21, Col: Juan Gonzales Romero'),
('OIBR780920HDFRNNO9', 'Rene OrtÃ­z', 2, '123456', 'Gustavo A. Madero, DF'),
('PEAJ910921HDFRLN08', 'Juan Carlos Perez Alvarez', 1, 'juan', 'NO BORRAR ESTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `destinatario` varchar(18) NOT NULL DEFAULT '',
  `msg` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`destinatario`,`msg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `numlote` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `Fecha_Elab` date NOT NULL,
  `Fecha_Cad` date NOT NULL,
  `Estado` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`numlote`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`numlote`, `idProducto`, `Fecha_Elab`, `Fecha_Cad`, `Estado`) VALUES
(1, 1, '2013-04-08', '2013-10-18', NULL),
(2, 2, '2013-04-10', '2013-04-30', NULL),
(3, 2, '2013-04-04', '2013-04-26', NULL),
(4, 3, '2013-04-24', '2013-08-24', NULL),
(5, 4, '2013-04-24', '2013-09-17', NULL),
(6, 5, '2013-04-24', '2013-09-18', NULL),
(7, 6, '2013-04-24', '2013-12-09', NULL),
(8, 7, '2013-04-24', '2013-10-25', NULL),
(9, 8, '2013-04-24', '2013-09-11', NULL),
(10, 9, '2013-04-24', '2013-11-18', NULL),
(11, 10, '2013-04-24', '2013-10-04', NULL),
(12, 11, '2013-04-24', '2013-10-12', NULL),
(13, 3, '2013-04-25', '2013-09-19', NULL),
(14, 4, '2013-04-25', '2013-10-18', NULL),
(15, 5, '2013-04-25', '2013-09-25', NULL),
(16, 6, '2013-04-25', '2013-10-16', NULL),
(17, 7, '2013-04-25', '2013-05-17', NULL),
(18, 8, '2013-04-25', '2013-08-23', NULL),
(19, 9, '2013-04-25', '2013-09-22', NULL),
(20, 10, '2013-04-25', '2013-05-09', NULL),
(21, 11, '2013-04-25', '2013-05-17', NULL),
(22, 1, '2013-04-25', '2013-09-13', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima`
--

CREATE TABLE IF NOT EXISTS `materiaprima` (
  `idMateriaPrima` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) DEFAULT NULL,
  `Unidad` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idMateriaPrima`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `materiaprima`
--

INSERT INTO `materiaprima` (`idMateriaPrima`, `Nombre`, `Unidad`) VALUES
(1, 'leche', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remitente` varchar(18) DEFAULT NULL,
  `mensaje` varchar(10000) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Receta` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `Nombre`, `Precio`, `Receta`) VALUES
(1, 'Chispas de chocolate gigantes', 12, 1),
(2, 'Galletas de avena con coco', 9, NULL),
(3, 'Galletas de mermelada', 10, NULL),
(4, 'Galletas de mantequilla', 13, NULL),
(5, 'Galletas arcoíris', 14, NULL),
(6, 'Galletas chokis', 15, NULL),
(8, 'Galletas tartinas', 12, NULL),
(9, 'Galletas de manzana con canela', 13, NULL),
(10, 'Galletas de avena', 7, NULL),
(11, 'Galletas de vainilla', 8, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE IF NOT EXISTS `receta` (
  `idProducto` int(11) NOT NULL,
  `idMateriaPrima` int(11) NOT NULL,
  `Cantidad` float DEFAULT NULL,
  PRIMARY KEY (`idProducto`,`idMateriaPrima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`idProducto`, `idMateriaPrima`, `Cantidad`) VALUES
(2, 1, 2),
(8, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `Folio` int(11) NOT NULL AUTO_INCREMENT,
  `RFC` varchar(13) NOT NULL,
  `Fecha` date NOT NULL,
  `Fentrega` date NOT NULL,
  `Estado` varchar(20) NOT NULL,
  PRIMARY KEY (`Folio`),
  KEY `RFC` (`RFC`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`Folio`, `RFC`, `Fecha`, `Fentrega`, `Estado`) VALUES
(1, 'BECJ880326XXX', '2013-04-23', '2013-04-28', 'Cancelada'),
(2, 'RECJ880326XXX', '2013-04-23', '2013-05-03', 'Cancelada'),
(3, 'VECJ880326XXX', '2013-04-24', '2013-05-08', 'En Espera'),
(4, 'VECJ880326XXX', '2013-04-24', '2013-05-13', 'En Espera'),
(5, 'HECJ880326XXX', '2013-04-24', '2013-05-18', 'En Espera'),
(6, 'AECJ880326XXX', '2013-04-24', '2013-05-23', 'En Espera'),
(7, 'HECJ880326XXX', '2013-04-24', '2013-05-28', 'En Espera'),
(8, 'BECJ880326XXX', '2013-04-24', '2013-06-02', 'En Espera'),
(9, 'BECJ880326XXX', '2013-04-24', '2013-06-07', 'En Espera'),
(10, 'BECJ880326XXX', '2013-04-24', '2013-06-12', 'En Espera'),
(11, 'HECJ880326XXX', '2013-04-24', '2013-06-17', 'En Espera');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
