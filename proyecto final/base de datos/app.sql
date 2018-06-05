-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-06-2018 a las 01:42:38
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `Id` int(11) NOT NULL,
  `Identificacion` int(11) NOT NULL,
  `Nombres` text COLLATE latin1_spanish_ci NOT NULL,
  `Apellidos` text COLLATE latin1_spanish_ci NOT NULL,
  `AreaDelConocimiento` text COLLATE latin1_spanish_ci NOT NULL,
  `Institucion` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`Id`, `Identificacion`, `Nombres`, `Apellidos`, `AreaDelConocimiento`, `Institucion`) VALUES
(6, 1, 'ss', 'aa', 'ww', 'cc'),
(7, 7, 'g', 'h', 'k', 'l'),
(8, 33, 'jose', 'vertel', 'mavli', 'unicor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante-juego`
--

CREATE TABLE `estudiante-juego` (
  `Id` int(11) NOT NULL,
  `Idestudiante` int(11) NOT NULL,
  `Idjuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `Id` int(11) NOT NULL,
  `Identificacion` int(11) NOT NULL,
  `Nombres` text COLLATE latin1_spanish_ci NOT NULL,
  `Apellidos` text COLLATE latin1_spanish_ci NOT NULL,
  `Grado` text COLLATE latin1_spanish_ci NOT NULL,
  `Iddocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`Id`, `Identificacion`, `Nombres`, `Apellidos`, `Grado`, `Iddocente`) VALUES
(1, 1, 'e', 'w', 'g', 7),
(2, 2, 'e', 'w', 'g', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `Id` int(11) NOT NULL,
  `Nombre` text COLLATE latin1_spanish_ci NOT NULL,
  `URL` text COLLATE latin1_spanish_ci NOT NULL,
  `Iddocente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`Id`, `Nombre`, `URL`, `Iddocente`) VALUES
(1, 'JUEGO1', 'http://localhost/proyecto%20final/juego/index.php', 7),
(3, 'jj', 'hd', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `Id` int(11) NOT NULL,
  `Registro` text COLLATE latin1_spanish_ci NOT NULL,
  `Idjuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `estudiante-juego`
--
ALTER TABLE `estudiante-juego`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Idestudiante` (`Idestudiante`,`Idjuego`),
  ADD KEY `Idjuego` (`Idjuego`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Iddocente` (`Iddocente`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Iddocente` (`Iddocente`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Idjuego` (`Idjuego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estudiante-juego`
--
ALTER TABLE `estudiante-juego`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiante-juego`
--
ALTER TABLE `estudiante-juego`
  ADD CONSTRAINT `estudiante-juego_ibfk_1` FOREIGN KEY (`Idjuego`) REFERENCES `juego` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiante-juego_ibfk_2` FOREIGN KEY (`Idestudiante`) REFERENCES `estudiantes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`Iddocente`) REFERENCES `docentes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`Iddocente`) REFERENCES `docentes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`Idjuego`) REFERENCES `juego` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
