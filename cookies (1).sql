-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-05-2013 a las 22:11:18
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `path`) VALUES
(1, 'Administración', 'administrador'),
(2, 'Producción', 'prod');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogoproductos`
--

CREATE TABLE IF NOT EXISTS `catalogoproductos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProducto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `catalogoproductos`
--

INSERT INTO `catalogoproductos` (`idProducto`, `nombreProducto`) VALUES
(1, 'Chispas de Chocolate Gigantes'),
(2, 'Galletas de Avena con Coco'),
(3, 'Galletas de Mermelada'),
(4, 'Galletas de Mantequilla'),
(5, 'Galletas Arcoiris'),
(6, 'Galletas Chokis'),
(7, 'Galletas Tartinas'),
(8, 'Galletas de Manzana con Canela'),
(9, 'Galletas de Avena'),
(10, 'Galletas de Vainilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `CURP` varchar(18) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Area` int(11) DEFAULT NULL,
  `Contrasena` varchar(20) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`CURP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`CURP`, `Nombre`, `Area`, `Contrasena`, `Direccion`) VALUES
('PEAJ910921HDFRLN08', 'Juan Carlos', 1, 'juan', 'direccion no 24'),
('RULM910705HDFDPG08', 'Miguel Rueda', 2, 'miguelrueda', 'rio de janeiro #88');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaproduccion`
--

CREATE TABLE IF NOT EXISTS `lineaproduccion` (
  `numproduccion` int(11) NOT NULL AUTO_INCREMENT,
  `nolinea` enum('1','2','3') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `encargadoLinea` varchar(18) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estado` enum('pendiente','produccion','terminado') CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nolote` int(11) NOT NULL,
  PRIMARY KEY (`numproduccion`),
  KEY `nolote` (`nolote`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Volcar la base de datos para la tabla `lineaproduccion`
--

INSERT INTO `lineaproduccion` (`numproduccion`, `nolinea`, `encargadoLinea`, `estado`, `nolote`) VALUES
(1, '1', 'RULM910705HDFDPG08', 'terminado', 1),
(2, '2', 'RULM910705HDFDPG08', 'terminado', 2),
(3, '3', 'RULM910705HDFDPG08', 'pendiente', 3),
(4, '2', 'RULM910705HDFDPG08', 'pendiente', 9),
(53, '3', 'RULM910705HDFDPG08', 'pendiente', 62);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `noLote` int(11) NOT NULL AUTO_INCREMENT,
  `productoAsociado` varchar(50) NOT NULL,
  `cantidadProducto` int(11) NOT NULL,
  `fechaElaboracion` date NOT NULL,
  `fechaCaducidad` date NOT NULL,
  PRIMARY KEY (`noLote`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Volcar la base de datos para la tabla `lote`
--

INSERT INTO `lote` (`noLote`, `productoAsociado`, `cantidadProducto`, `fechaElaboracion`, `fechaCaducidad`) VALUES
(1, '3', 3000, '2014-04-01', '2013-08-22'),
(2, '2', 2000, '2013-04-02', '2014-04-02'),
(3, '3', 4000, '2013-04-03', '2014-04-03'),
(9, '4', 3000, '2013-04-04', '2014-04-04'),
(10, '6', 3000, '2013-04-17', '2013-07-31'),
(62, '2', 2000, '2013-05-15', '2013-08-27');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `producto`
--


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
-- Volcar la base de datos para la tabla `receta`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `lineaproduccion`
--
ALTER TABLE `lineaproduccion`
  ADD CONSTRAINT `lineaproduccion_ibfk_1` FOREIGN KEY (`nolote`) REFERENCES `lote` (`noLote`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `receta`
--
ALTER TABLE `receta`
  ADD CONSTRAINT `receta_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE CASCADE ON UPDATE CASCADE;
