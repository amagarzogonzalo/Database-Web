-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2021 a las 18:22:09
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gam3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `Categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Categoria`) VALUES
('Accion'),
('Arcade'),
('Carreras'),
('Deporte'),
('Estrategia'),
('Simulación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Nombre` varchar(30) NOT NULL,
  `Contraseña` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Nombre`, `Contraseña`) VALUES
('Alex', '1'),
('Ivan', 'ivan'),
('Pepe', 'ivan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevo`
--

CREATE TABLE `nuevo` (
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nuevo`
--

INSERT INTO `nuevo` (`Estado`) VALUES
(0),
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `ID` int(5) NOT NULL,
  `Cliente` varchar(30) NOT NULL,
  `Videojuego` varchar(200) NOT NULL,
  `Codigo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ID`, `Cliente`, `Videojuego`, `Codigo`) VALUES
(6887, 'Farm Simulator,Kart Simulator', 'Ivan', 8202),
(12345, 'Alex', '20', 1244),
(60794, 'Gran Turismo 21', 'Ivan', 9645),
(92468, 'F1,Far Cry 98', 'Ivan', 1667),
(93038, 'F1,Far Cry 98', 'Ivan', 4157),
(93225, 'Gran Turismo 21', 'Ivan', 3381);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `Tipo` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`Tipo`) VALUES
('PC'),
('PS'),
('XBOX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `Nombre` varchar(20) NOT NULL,
  `Categoria` varchar(20) DEFAULT NULL,
  `Plataforma` varchar(4) NOT NULL,
  `Precio` int(3) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Nuevo` int(1) NOT NULL DEFAULT 1,
  `Existencias` int(3) NOT NULL,
  `Identificador` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`Nombre`, `Categoria`, `Plataforma`, `Precio`, `Descripcion`, `Nuevo`, `Existencias`, `Identificador`) VALUES
('COD', 'Accion', 'PC', 500, 'Juego de acción y guerra.', 1, 90, 5253),
('F1', 'Carreras', 'XBOX', 10, 'El mejor juego de coches.', 1, 30, 945),
('Far Cry 98', 'Simulación', 'PS', 80, 'Buena simulación.', 1, 30, 4540),
('Farm Simulator', 'Simulación', 'PC', 195, 'Gran simulador de granja.', 1, 200, 9992),
('FIFA', 'Deporte', 'XBOX', 50, 'Videojuego de futbol.', 1, 100, 222),
('Gran Turismo 21', 'Carreras', 'PS', 15, 'Gran juego de carreras.', 1, 35, 2567),
('Kart Simulator', 'Simulación', 'PC', 60, 'Simulador de coches.', 1, 75, 192),
('Mario Bros', 'Arcade', 'XBOX', 100, 'Un juego clásico.', 1, 200, 6743),
('NBA2k', 'Deporte', 'PC', 45, 'Juego actualizado de baloncesto.', 1, 70, 4825),
('Plants vs zombies', 'Estrategia', 'XBOX', 65, 'Destruye a los zombies!', 1, 55, 8643),
('Resident Evil', 'Accion', 'PC', 25, 'Acción y terror.', 1, 35, 9899),
('Tetris Plus', 'Estrategia', 'PS', 55, 'Juego histórico actualizado.', 1, 10, 7521);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Nombre`);

--
-- Indices de la tabla `nuevo`
--
ALTER TABLE `nuevo`
  ADD PRIMARY KEY (`Estado`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`Tipo`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`Nombre`),
  ADD KEY `Cat_FK` (`Categoria`),
  ADD KEY `Plat_FK` (`Plataforma`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD CONSTRAINT `Cat_FK` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`Categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Plat_FK` FOREIGN KEY (`Plataforma`) REFERENCES `plataformas` (`Tipo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
