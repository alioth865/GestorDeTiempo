-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-12-2014 a las 18:54:10
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

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`idcategoria`, `nombrecategoria`) VALUES
(1, 'Pesca'),
(2, 'Jardineria'),
(3, 'Educacion'),
(4, 'Baile'),
(5, 'Albañileria');

--
-- Volcado de datos para la tabla `Demanda`
--

INSERT INTO `Demanda` (`iddemanda`, `email`, `idofertasintercambio`, `idoferta`) VALUES
(1, 'alioth865@yahoo.com', NULL, 2),
(2, 'alioth865@yahoo.com', '1', 3),
(3, 'joshua93.futbol@hotmail.com', '2', 3),
(4, 'alioth865@yahoo.com', '3', 3),
(8, 'alioth865@yahoo.com', NULL, 3);

--
-- Volcado de datos para la tabla `DemandaSatisfecha`
--

INSERT INTO `DemandaSatisfecha` (`valoracion`, `descripcionvaloracion`, `fecha`, `email`, `idoferta`, `iddemandasatisfecha`) VALUES
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 1),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 2),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 3);

--
-- Volcado de datos para la tabla `Oferta`
--

INSERT INTO `Oferta` (`idoferta`, `idcategoria`, `email`, `nombreoferta`, `horarioinicio`, `horariofin`, `descripcionoferta`, `valoracion`) VALUES
(1, 1, 'alioth865@yahoo.com', 'Pesco Contigo', '19:42:40', '19:42:40', 'Acompaño a pescar, soy un tio muy divertido', 0),
(2, 2, 'joshua93.futbol@hotmail.com', 'Limpio Jardin', '08:30:00', '10:00:00', 'Limpio tu jardin soy todo un profesional', 0),
(3, 3, 'rvolobriga@gmail.com', 'Repaso Matematicas', '16:00:00', '22:00:00', 'Repaso integrales y derivadas', 10),
(6, 4, 'alioth865@yahoo.com', 'Limpio Coche', '18:00:00', '19:00:00', '0', 0),
(7, 4, 'alioth865@yahoo.com', 'Limpio Coche', '18:00:00', '19:00:00', '0', 0),
(8, 4, 'alioth865@yahoo.com', 'Limpio Coche', '18:00:00', '19:00:00', '0', 0);

--
-- Volcado de datos para la tabla `TipoUsuario`
--

INSERT INTO `TipoUsuario` (`codtipusu`, `nombre`) VALUES
(1, 'administrador'),
(2, 'usuario');

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`email`, `nombre`, `telefono`, `horasdemandadas`, `horasofertadas`, `valoracion`, `codtipusu`, `contraseña`) VALUES
('alioth865@yahoo.com', 'JUAN PITO', 699699699, '48:00:00', '00:00:00', 0, 1, 'aliothsin865'),
('joshua93.futbol@hotmail.com', 'Joshua Rodriguez', 963586936, '06:00:00', '00:00:00', 5, 2, 'joshua93.futbol'),
('rvolobriga@gmail.com', 'Iago Fernandez', 699333457, '06:00:00', '54:00:00', 10, 2, 'rvolobriga');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
