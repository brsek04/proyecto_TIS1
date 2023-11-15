-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 14:31:49
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
-- Base de datos: `inventrack_bd`
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
(60, '2023-11-07', 'Huawei Matepad 15', 15, 13, 7, 8, 10, 10, 250000),
(61, '2023-11-24', 'Ipad 14', 15, 15, 7, 9, 10, 12, 1000000);

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
(10, 'Bastian', 'Sandoval', 'bsandoval@ing.ucsc.cl', 7, 6),
(12, 'Wyroska', 'Covid', 'sr.bastii@gmail.com', 7, 4);

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
(5, 'admin', '9cdfb439c7876e703e307864c9167a15', 'admin@gmail.com', '2023-11-09');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `historialequipos`
--
ALTER TABLE `historialequipos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
