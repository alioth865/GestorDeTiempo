-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-12-2014 a las 18:53:48
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.4.4-14+deb7u4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bancodetiempo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE IF NOT EXISTS `Categoria` (
  `idcategoria` int(10) NOT NULL AUTO_INCREMENT,
  `nombrecategoria` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Demanda`
--

CREATE TABLE IF NOT EXISTS `Demanda` (
  `iddemanda` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idofertasintercambio` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `idoferta` int(10) NOT NULL,
  PRIMARY KEY (`iddemanda`),
  KEY `email` (`email`),
  KEY `idoferta` (`idoferta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DemandaSatisfecha`
--

CREATE TABLE IF NOT EXISTS `DemandaSatisfecha` (
  `valoracion` int(2) DEFAULT '0',
  `descripcionvaloracion` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idoferta` int(10) NOT NULL,
  `iddemandasatisfecha` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`iddemandasatisfecha`),
  KEY `email` (`email`),
  KEY `idoferta` (`idoferta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Notificacion`
--

CREATE TABLE IF NOT EXISTS `Notificacion` (
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idnotificacion` int(10) NOT NULL AUTO_INCREMENT,
  `iddemanda` int(10) NOT NULL,
  `respuesta` tinyint(1) NOT NULL,
  PRIMARY KEY (`idnotificacion`),
  KEY `iddemanda` (`iddemanda`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Oferta`
--

CREATE TABLE IF NOT EXISTS `Oferta` (
  `idoferta` int(10) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(10) NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreoferta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `horarioinicio` time NOT NULL,
  `horariofin` time NOT NULL,
  `descripcionoferta` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `valoracion` int(2) DEFAULT '0',
  PRIMARY KEY (`idoferta`),
  KEY `email` (`email`),
  KEY `idcategoria` (`idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoUsuario`
--

CREATE TABLE IF NOT EXISTS `TipoUsuario` (
  `codtipusu` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codtipusu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `horasdemandadas` time NOT NULL,
  `horasofertadas` time NOT NULL,
  `valoracion` int(2) DEFAULT '0',
  `codtipusu` int(10) NOT NULL,
  `contraseña` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`email`),
  KEY `codtipusu` (`codtipusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Demanda`
--
ALTER TABLE `Demanda`
  ADD CONSTRAINT `Demanda_ibfk_1` FOREIGN KEY (`email`) REFERENCES `Usuario` (`email`),
  ADD CONSTRAINT `Demanda_ibfk_2` FOREIGN KEY (`idoferta`) REFERENCES `Oferta` (`idoferta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `DemandaSatisfecha`
--
ALTER TABLE `DemandaSatisfecha`
  ADD CONSTRAINT `DemandaSatisfecha_ibfk_1` FOREIGN KEY (`email`) REFERENCES `Usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `DemandaSatisfecha_ibfk_2` FOREIGN KEY (`idoferta`) REFERENCES `Oferta` (`idoferta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Notificacion`
--
ALTER TABLE `Notificacion`
  ADD CONSTRAINT `Notificacion_ibfk_2` FOREIGN KEY (`iddemanda`) REFERENCES `Demanda` (`iddemanda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Notificacion_ibfk_1` FOREIGN KEY (`email`) REFERENCES `Usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Oferta`
--
ALTER TABLE `Oferta`
  ADD CONSTRAINT `Oferta_ibfk_1` FOREIGN KEY (`idcategoria`) REFERENCES `Categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Oferta_ibfk_2` FOREIGN KEY (`email`) REFERENCES `Usuario` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `Usuario_ibfk_1` FOREIGN KEY (`codtipusu`) REFERENCES `TipoUsuario` (`codtipusu`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
