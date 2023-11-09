-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2023 a las 03:21:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenamientos`
--

CREATE TABLE `almacenamientos` (
  `id` int(10) NOT NULL,
  `almacenamiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacenamientos`
--

INSERT INTO `almacenamientos` (`id`, `almacenamiento`) VALUES
(7, '64'),
(8, '240'),
(9, '500'),
(10, '1000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunas`
--

CREATE TABLE `comunas` (
  `id` int(10) NOT NULL,
  `comuna` varchar(50) NOT NULL,
  `region_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comunas`
--

INSERT INTO `comunas` (`id`, `comuna`, `region_id`) VALUES
(6, 'Concepcion', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(10) NOT NULL,
  `departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`) VALUES
(4, 'Obras públicas'),
(5, 'Secretaría municipal'),
(6, 'Dirección de tránsito'),
(7, 'Juzgado de policía local');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(10) NOT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `modelo` varchar(50) NOT NULL,
  `tipo_id` int(50) NOT NULL,
  `marca_id` int(10) NOT NULL,
  `memoria_id` int(10) NOT NULL,
  `almacenamiento_id` int(10) NOT NULL,
  `tipoAlmacenamiento_id` int(10) NOT NULL,
  `funcionario_id` int(10) NOT NULL,
  `costo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `fechaIngreso`, `modelo`, `tipo_id`, `marca_id`, `memoria_id`, `almacenamiento_id`, `tipoAlmacenamiento_id`, `funcionario_id`, `costo`) VALUES
(57, '2023-11-07', 'Ideapad 14lks', 14, 12, 7, 9, 7, 7, 500000),
(58, '2023-11-07', 'Iphone 12 Mini', 16, 15, 7, 7, 10, 8, 600000),
(59, '2023-11-07', 'Hp gaming 1507', 13, 14, 7, 10, 8, 9, 700000),
(60, '2023-11-07', 'Huawei Matepad 15', 15, 13, 7, 8, 10, 10, 250000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `establecimientos`
--

CREATE TABLE `establecimientos` (
  `id` int(10) NOT NULL,
  `establecimiento` varchar(50) NOT NULL,
  `comuna_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `establecimientos`
--

INSERT INTO `establecimientos` (`id`, `establecimiento`, `comuna_id`) VALUES
(7, 'Municipalidad de Concepcion', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `establecimiento_id` int(10) NOT NULL,
  `departamento_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nombre`, `apellido`, `email`, `establecimiento_id`, `departamento_id`) VALUES
(7, 'Bruno', 'Figueroa', 'bfigueroau@ing.ucsc.cl', 7, 5),
(8, 'Patricio', 'Pizarro', 'ppizarrot@ing.ucsc.cl', 7, 7),
(9, 'Martin ', 'Barra', 'mbarra@ing.ucsc.cl', 7, 4),
(10, 'Bastian', 'Sandoval', 'bsandoval@ing.ucsc.cl', 7, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialequipos`
--

CREATE TABLE `historialequipos` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `trn_date` date NOT NULL,
  `equipo_id` int(10) NOT NULL,
  `funcionario_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `historialequipos`
--

INSERT INTO `historialequipos` (`id`, `descripcion`, `trn_date`, `equipo_id`, `funcionario_id`) VALUES
(2, 'Se agregó el equipo 9', '0000-00-00', 0, 0),
(3, 'Se agregó el equipo tipoEquipo1 al funcionario 2', '0000-00-00', 0, 0),
(4, 'Se agregó el equipo tipoEquipo1 al funcionario 2', '0000-00-00', 0, 0),
(5, 'Se agregó el equipo tipoEquipo1 al funcionario a', '0000-00-00', 0, 0),
(6, 'Se eliminó el equipo 21', '0000-00-00', 0, 0),
(7, 'Se eliminó el equipo tipoEquipo1', '0000-00-00', 0, 0),
(8, 'Se agregó el equipo tipoEquipo2 al funcionario a', '0000-00-00', 0, 0),
(9, 'Se eliminó el equipo tipoEquipo2', '0000-00-00', 0, 0),
(10, 'Se eliminó el equipo 24 - tipoEquipo1', '0000-00-00', 0, 0),
(11, 'Se agregó el equipo 27 tipoEquipo1 al funcionario ', '0000-00-00', 0, 0),
(12, 'Se agregó el equipo 28 tipoEquipo1 al funcionario ', '0000-00-00', 0, 0),
(13, 'Se agregó el equipo tipoEquipo1 al funcionario a', '0000-00-00', 0, 0),
(14, 'Se agregó el equipo tipoEquipo1 al funcionario a', '0000-00-00', 0, 0),
(15, 'Se agregó el equipo  31 tipoEquipo1 al funcionario', '0000-00-00', 0, 0),
(16, 'Se agregó el equipo   al funcionario a', '0000-00-00', 0, 0),
(17, 'Se agregó el equipo  33 al funcionario a', '0000-00-00', 0, 0),
(18, 'Se agregó el equipo  34 al funcionario a', '0000-00-00', 34, 2),
(19, 'Se eliminó el equipo 27 - tipoEquipo1', '0000-00-00', 0, 0),
(20, 'Se eliminó el equipo 25 - tipoEquipo1', '0000-00-00', 0, 0),
(21, 'Se eliminó el equipo 28 - tipoEquipo1', '0000-00-00', 0, 0),
(22, 'Se eliminó el equipo 29 - tipoEquipo1', '0000-00-00', 0, 0),
(23, 'Se eliminó el equipo 30 - tipoEquipo1', '0000-00-00', 0, 0),
(24, 'Se eliminó el equipo 31 - tipoEquipo1', '0000-00-00', 0, 0),
(25, 'Se agregó el equipo  35 al funcionario marion', '0000-00-00', 35, 4),
(26, 'Se eliminó el equipo 32 - tipoEquipo1', '0000-00-00', 0, 0),
(27, 'Se eliminó el equipo 35 - tipoEquipo1', '0000-00-00', 35, 4),
(28, 'Se agregó el equipo 36 al funcionario a', '2023-11-03', 36, 2),
(29, 'Se eliminó el equipo 33 - tipoEquipo1111', '0000-00-00', 33, 2),
(30, 'Se agregó el equipo 37 al funcionario a', '2023-11-03', 37, 2),
(31, 'Se agregó el equipo 38 al funcionario a', '2023-11-03', 38, 2),
(32, 'Se eliminó el equipo 38 - tipoEquipo2', '0000-00-00', 38, 2),
(33, 'Se agregó el equipo 39 al funcionario a', '2023-11-03', 39, 2),
(34, 'Se agregó el equipo 40 al funcionario a', '2023-11-03', 40, 2),
(35, 'Se agregó el equipo 41 al funcionario a', '2023-11-03', 41, 2),
(36, 'Se eliminó el equipo 41 - tipoEquipo2', '2023-11-03', 41, 2),
(37, 'Se agregó el equipo 42 al funcionario a', '2023-11-04', 42, 2),
(38, 'Se agregó el equipo 43 al funcionario a', '2023-11-04', 43, 2),
(39, 'Se agregó el equipo 44 al funcionario marion', '2023-11-04', 44, 4),
(40, 'Se eliminó el equipo 44 - tipoEquipo2', '2023-11-04', 44, 4),
(41, 'Se agregó el equipo 45 al funcionario martin', '2023-11-04', 45, 5),
(42, 'Se agregó el equipo 46 al funcionario martin', '2023-11-04', 46, 5),
(43, 'Se agregó el equipo 47 al funcionario martin', '2023-11-04', 47, 5),
(44, 'Se agregó el equipo 48 al funcionario martin', '2023-11-04', 48, 5),
(45, 'Se agregó el equipo 49 al funcionario martin', '2023-11-04', 49, 5),
(46, 'Se agregó el equipo 50 al funcionario martin', '2023-11-04', 50, 5),
(47, 'Se agregó el equipo 51 al funcionario martin', '2023-11-04', 51, 5),
(48, 'Se agregó el equipo 52 al funcionario martin', '2023-11-04', 52, 5),
(49, 'Se agregó el equipo 53 al funcionario martin', '2023-11-04', 53, 5),
(50, 'Se agregó el equipo 54 al funcionario martin', '2023-11-04', 54, 5),
(51, 'Se agregó el equipo 55 al funcionario martin', '2023-11-04', 55, 5),
(52, 'Se agregó el equipo 56 al funcionario martin', '2023-11-04', 56, 5),
(53, 'Se eliminó el equipo 45 - tipoEquipo222222', '2023-11-07', 45, 5),
(54, 'Se eliminó el equipo 46 - tipoEquipo222222', '2023-11-07', 46, 5),
(55, 'Se eliminó el equipo 47 - tipoEquipo222222', '2023-11-07', 47, 6),
(56, 'Se eliminó el equipo 48 - tipoEquipo222222', '2023-11-07', 48, 5),
(57, 'Se eliminó el equipo 49 - tipoEquipo222222', '2023-11-07', 49, 5),
(58, 'Se eliminó el equipo 50 - tipoEquipo222222', '2023-11-07', 50, 5),
(59, 'Se eliminó el equipo 51 - tipoEquipo222222', '2023-11-07', 51, 5),
(60, 'Se eliminó el equipo 52 - tipoEquipo222222', '2023-11-07', 52, 5),
(61, 'Se eliminó el equipo 53 - tipoEquipo222222', '2023-11-07', 53, 5),
(62, 'Se eliminó el equipo 54 - tipoEquipo222222', '2023-11-07', 54, 5),
(63, 'Se eliminó el equipo 55 - tipoEquipo222222', '2023-11-07', 55, 5),
(64, 'Se eliminó el equipo 56 - tipoEquipo222222', '2023-11-07', 56, 5),
(65, 'Se agregó el equipo 57 al funcionario Bruno', '2023-11-07', 57, 7),
(66, 'Se agregó el equipo 58 al funcionario Patricio', '2023-11-07', 58, 8),
(67, 'Se agregó el equipo 59 al funcionario Martin ', '2023-11-07', 59, 9),
(68, 'Se agregó el equipo 60 al funcionario Bastian', '2023-11-07', 60, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) NOT NULL,
  `marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `marca`) VALUES
(12, 'Lenovo'),
(13, 'Huawei'),
(14, 'HP'),
(15, 'Apple');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memorias`
--

CREATE TABLE `memorias` (
  `id` int(10) NOT NULL,
  `memoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `memorias`
--

INSERT INTO `memorias` (`id`, `memoria`) VALUES
(6, '4'),
(7, '8'),
(8, '16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` int(10) NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `region`) VALUES
(4, 'Bio-Bio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(10) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `tipo`) VALUES
(13, 'PC fijo'),
(14, 'Notebook'),
(15, 'Tablet'),
(16, 'Smartphone');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoalmacenamientos`
--

CREATE TABLE `tipoalmacenamientos` (
  `id` int(10) NOT NULL,
  `tipoAlmacenamiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoalmacenamientos`
--

INSERT INTO `tipoalmacenamientos` (`id`, `tipoAlmacenamiento`) VALUES
(7, 'SSD'),
(8, 'HDD'),
(9, 'SSD Nvme'),
(10, 'Interno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `trn_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `trn_date`) VALUES
(3, 'pato', '9cdfb439c7876e703e307864c9167a15', 'patungas@gmail.com', '2023-11-07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenamientos`
--
ALTER TABLE `almacenamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_equipos_tipo` (`tipo_id`),
  ADD KEY `memoria_id` (`memoria_id`),
  ADD KEY `almacenamiento_id` (`almacenamiento_id`),
  ADD KEY `tipoAlmacenamiento_id` (`tipoAlmacenamiento_id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Indices de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comuna_id` (`comuna_id`);

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `establecimiento_id` (`establecimiento_id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `historialequipos`
--
ALTER TABLE `historialequipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `memorias`
--
ALTER TABLE `memorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoalmacenamientos`
--
ALTER TABLE `tipoalmacenamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenamientos`
--
ALTER TABLE `almacenamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `historialequipos`
--
ALTER TABLE `historialequipos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `memorias`
--
ALTER TABLE `memorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipoalmacenamientos`
--
ALTER TABLE `tipoalmacenamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comunas`
--
ALTER TABLE `comunas`
  ADD CONSTRAINT `comunas_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`id`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`memoria_id`) REFERENCES `memorias` (`id`),
  ADD CONSTRAINT `equipos_ibfk_3` FOREIGN KEY (`tipoAlmacenamiento_id`) REFERENCES `tipoalmacenamientos` (`id`),
  ADD CONSTRAINT `equipos_ibfk_4` FOREIGN KEY (`almacenamiento_id`) REFERENCES `almacenamientos` (`id`),
  ADD CONSTRAINT `equipos_ibfk_5` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `fk_equipos_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD CONSTRAINT `establecimientos_ibfk_1` FOREIGN KEY (`comuna_id`) REFERENCES `comunas` (`id`);

--
-- Filtros para la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimientos` (`id`),
  ADD CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
