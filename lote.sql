-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-04-2013 a las 00:45:22
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
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE IF NOT EXISTS `lote` (
  `noLote` int(11) NOT NULL AUTO_INCREMENT,
  `productoAsociado` varchar(50) NOT NULL,
  `lineaProduccion` enum('1','2','3') NOT NULL,
  `fechaElaboracion` date NOT NULL,
  `fechaCaducidad` date NOT NULL,
  PRIMARY KEY (`noLote`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `lote`
--

INSERT INTO `lote` (`noLote`, `productoAsociado`, `lineaProduccion`, `fechaElaboracion`, `fechaCaducidad`) VALUES
(1, 'Emperador Chocolate', '1', '2013-01-01', '2014-01-01'),
(2, 'Emperador Nuez', '2', '2013-02-01', '2014-02-01'),
(3, 'Galletas de Avena', '3', '2013-03-01', '2014-03-01'),
(9, 'Oreo', '1', '2013-01-03', '2014-01-03'),
(11, 'Emperador Vainilla', '2', '2013-02-01', '2014-02-01');
