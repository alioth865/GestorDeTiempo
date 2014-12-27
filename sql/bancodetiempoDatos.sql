-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-12-2014 a las 06:28:25
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.4.4-14+deb7u4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Base de datos: `bancodetiempo`
--

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`idcategoria`, `nombrecategoria`) VALUES
(2, 'Canto autor'),
(3, 'Educacion'),
(5, 'Albañileria'),
(8, 'Cathostia'),
(9, 'SuperHostia'),
(11, 'Memes'),
(15, 'Albita y Alberto');

-- Volcado de datos para la tabla `TipoUsuario`
--

INSERT INTO `TipoUsuario` (`codtipusu`, `nombre`) VALUES
(1, 'administrador'),
(2, 'usuario');

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`email`, `nombre`, `telefono`, `horasdemandadas`, `horasofertadas`, `valoracion`, `codtipusu`, `contraseña`) VALUES
('alioth865@yahoo.com', 'JUAN PITO', 699699699, '71:00:00', '00:00:00', 0, 1, '10470c3b4b1fed12c3baac014be15fac67c6e815'),
('joshua@uvigo.es', 'Joshua El Papi Rico', 956896324, '00:00:00', '03:00:00', 0, 1, '10470c3b4b1fed12c3baac014be15fac67c6e815'),
('pepi@gmail.es', 'Pepe', 999999999, '00:00:00', '02:00:00', 0, 2, '10470c3b4b1fed12c3baac014be15fac67c6e815'),
('rvolobriga@gmail.com', 'Iago Fernandez', 699333457, '06:00:00', '222:00:00', 10, 2, '10470c3b4b1fed12c3baac014be15fac67c6e815');

--
-- Volcado de datos para la tabla `Oferta`
--

INSERT INTO `Oferta` (`idoferta`, `idcategoria`, `email`, `nombreoferta`, `horarioinicio`, `horariofin`, `descripcionoferta`, `valoracion`) VALUES
(3, 3, 'rvolobriga@gmail.com', 'Repaso Matematicas', '16:00:00', '22:00:00', 'Repaso integrales y derivadas', 10),
(9, 5, 'alioth865@yahoo.com', 'Limpieza Hogar', '00:00:00', '00:00:00', 'Limpio Muy bien', 0),
(10, 5, 'alioth865@yahoo.com', 'Limpieza Casa', '00:00:00', '00:00:00', 'Limpio Muy bien', 0),
(11, 5, 'alioth865@yahoo.com', 'Limpieza', '00:00:00', '00:00:00', 'Limpio muy bien', 0),
(12, 8, 'joshua@uvigo.es', 'Limpio Lamparas', '00:00:00', '01:00:00', 'Soy el mejor limpialampara', 0),
(13, 9, 'joshua@uvigo.es', 'Nado contigo', '03:00:00', '05:00:00', 'Nado muy bien', 0),
(14, 2, 'pepi@gmail.es', 'Limpieza Discotecas', '00:00:00', '01:00:00', 'Limpio Muy bien', 0),
(15, 8, 'alioth865@yahoo.com', 'Programo', '16:00:30', '17:00:30', 'Soy', 0);

--

--
-- Volcado de datos para la tabla `Demanda`
--

INSERT INTO `Demanda` (`iddemanda`, `email`, `idofertasintercambio`, `idoferta`) VALUES
(10, 'joshua@uvigo.es', '13|14', 9),
(11, 'pepi@gmail.es', '14', 10),
(12, 'rvolobriga@gmail.com', NULL, 11),
(13, 'alioth865@yahoo.com', '9|10|11|15', 11),
(16, 'alioth865@yahoo.com', '11|15', 12),
(17, 'alioth865@yahoo.com', '11|15', 12),
(18, 'alioth865@yahoo.com', '11|15', 12),
(19, 'alioth865@yahoo.com', '11|15', 12),
(20, 'alioth865@yahoo.com', '11|15', 12),
(21, 'alioth865@yahoo.com', '11|15', 12),
(22, 'alioth865@yahoo.com', '', 11),
(23, 'alioth865@yahoo.com', '11|15', 12),
(24, 'alioth865@yahoo.com', '11|15', 12),
(25, 'alioth865@yahoo.com', '11|15', 13),
(26, 'alioth865@yahoo.com', '10|11', 13);

--
-- Volcado de datos para la tabla `DemandaSatisfecha`
--

INSERT INTO `DemandaSatisfecha` (`valoracion`, `descripcionvaloracion`, `fecha`, `email`, `idoferta`, `iddemandasatisfecha`) VALUES
(0, '', '2014-12-25', 'pepi@gmail.es', 9, 23),
(0, NULL, '2014-12-25', 'pepi@gmail.es', 10, 24),
(0, 'NULL', '0000-00-00', 'pepi@gmail.es', 11, 25),
(0, 'NULL', '0000-00-00', 'joshua@uvigo.es', 10, 26),
(10, 'El tio repasa muy bien ', '0000-00-00', 'alioth865@yahoo.com', 3, 27),
(0, 'NULL', '0000-00-00', 'joshua@uvigo.es', 9, 28),
(0, 'NULL', '0000-00-00', 'alioth865@yahoo.com', 14, 29),
(0, 'NULL', '0000-00-00', 'joshua@uvigo.es', 9, 30),
(0, 'NULL', '0000-00-00', 'alioth865@yahoo.com', 13, 31),
(0, 'NULL', '0000-00-00', 'alioth865@yahoo.com', 14, 32),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 33),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 34),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 35),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 36),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 37),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 38),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 39),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 40),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 41),
(8, 'muy buena', '2014-07-12', 'alioth865@yahoo.com', 3, 42),
(0, 'NULL', '0000-00-00', 'alioth865@yahoo.com', 12, 43);

--
-- Volcado de datos para la tabla `Notificacion`
--

INSERT INTO `Notificacion` (`email`, `idnotificacion`, `idoferta`, `respuesta`) VALUES
('joshua@uvigo.es', 2, 3, 1),
('joshua@uvigo.es', 7, 3, 1),
('joshua@uvigo.es', 9, 14, 1),
('joshua@uvigo.es', 14, 9, 0),
('joshua@uvigo.es', 15, 9, 1),
('alioth865@yahoo.com', 16, 13, 1),
('alioth865@yahoo.com', 17, 14, 1),
('rvolobriga@gmail.com', 18, 11, 0),
('pepi@gmail.es', 19, 10, 0),
('alioth865@yahoo.com', 20, 12, 1);




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
