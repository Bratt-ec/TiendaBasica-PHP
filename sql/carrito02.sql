-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-05-2013 a las 18:32:55
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `carrito02`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detpedidos`
--

CREATE TABLE IF NOT EXISTS `detpedidos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pedido_id` int(5) NOT NULL,
  `producto_id` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `idpro` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `name`, `idpro`) VALUES
(21, 'alan', 1),
(22, 'batman', 2),
(23, 'battle', 3),
(24, 'gow', 4),
(25, 'halo', 5),
(26, 'un', 6),
(27, 're5', 7),
(28, 'kirby', 8),
(29, 'zelda', 9),
(30, 'core', 10),
(31, 'land', 11),
(32, 'star', 12),
(33, 'sky', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(5) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(100) DEFAULT NULL,
  `precio` decimal(9,2) DEFAULT NULL,
  `video` varchar(200) NOT NULL,
  `vig` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `idioma` varchar(50) NOT NULL,
  `edad` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `precio`, `video`, `vig`, `empresa`, `idioma`, `edad`) VALUES
(1, 'Alan Wake', 50.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/auw3_z9EyRg" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Microsoft', 'Multilenguaje', 'Mayores de 13 años'),
(2, 'Batman Arkman City', 29.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/-V1ZF5cNYCs" frameborder="0" allowfullscreen></iframe>', 'Disponible', '2k Games', 'Multilenguaje', 'Mayores de 18 años'),
(3, 'Battleflied 3', 29.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/UIUJh2mA8vg" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Electronic Arts', 'Multilenguaje', 'Mayores de 18 años'),
(4, 'Gears Of Wars 3', 40.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/kFmYbaAjrfo" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Epic Games', 'Multilenguaje', 'Mayores de 18 años'),
(5, 'Halo Reach', 55.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/5iWyoxv_V8o" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Microsoft', 'Multilenguaje', 'Mayores de 15 años'),
(6, 'Uncharted', 26.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/l4fahAdNHpM" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'NautiDogs', 'Multilenguaje', 'Mayores de 15 años'),
(7, 'Resident Evil 5', 18.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/Lxun_JOiiXo" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Capcom', 'Multilenguaje', 'Mayores de 15 años'),
(8, 'Kirby Dream Land', 26.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/3YXN_0R_8WY" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Nintendo', 'Multilenguaje', 'Todo Publico'),
(9, 'Zelda: Skyward Sword', 39.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/UOMRs6Jkgo0" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Nintendo', 'Multilenguaje', 'Todo Publico'),
(10, 'Final Fantasy Crisis Core', 18.00, '<iframe width="420" height="315" src="http://www.youtube.com/embed/DKp82VAUbh4" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Square', 'Multilenguaje', 'Todo Publico'),
(11, 'Super Mario 3D Land', 22.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/1c4xHskYHns" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Nintendo', 'Multilenguaje', 'Todo Publico'),
(12, 'StarCraft 2', 22.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/rgyL08nhtkw" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Blizzard', 'Multilenguaje', 'Mayores de 15 años'),
(13, 'Skyrim', 35.00, '<iframe width="560" height="315" src="http://www.youtube.com/embed/PjqsYzBrP-M" frameborder="0" allowfullscreen></iframe>', 'Disponible', 'Betesda', 'Multilenguaje', 'Mayores de 18 años');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
