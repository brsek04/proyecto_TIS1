-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 12:26 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventrack_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `almacenamientos`
--

CREATE TABLE `almacenamientos` (
  `id` int(10) NOT NULL,
  `almacenamiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `almacenamientos`
--

INSERT INTO `almacenamientos` (`id`, `almacenamiento`) VALUES
(7, '64'),
(8, '240'),
(9, '500'),
(10, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `comunas`
--

CREATE TABLE `comunas` (
  `id` int(10) NOT NULL,
  `comuna` varchar(50) NOT NULL,
  `region_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comunas`
--

INSERT INTO `comunas` (`id`, `comuna`, `region_id`) VALUES
(6, 'Concepcion', 4);

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(10) NOT NULL,
  `departamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`) VALUES
(4, 'Obras públicas'),
(5, 'Secretaría municipal'),
(6, 'Dirección de tránsito'),
(7, 'Juzgado de policía local');

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
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
  `formaIngreso_id` int(10) NOT NULL,
  `fechaMantencion` date DEFAULT NULL,
  `costo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id`, `fechaIngreso`, `modelo`, `tipo_id`, `marca_id`, `memoria_id`, `almacenamiento_id`, `tipoAlmacenamiento_id`, `funcionario_id`, `formaIngreso_id`, `fechaMantencion`, `costo`) VALUES
(2, '0004-12-04', 'wffew', 14, 13, 7, 10, 8, 19, 2, '0000-00-00', 3413312),
(3, '0002-02-02', 'sdafas', 16, 15, 7, 8, 8, 7, 3, '0000-00-00', 33333),
(4, '1111-01-01', 'fsadfsadf', 13, 12, 8, 10, 7, 12, 2, '0003-03-03', 24535),
(5, '2023-11-20', '', 15, 14, 8, 8, 8, 19, 3, '0000-00-00', 0),
(6, '2023-01-01', 'sdfgsdgsdf', 14, 13, 7, 8, 9, 7, 2, '2022-02-02', 500000),
(7, '0000-00-00', '', 14, 14, 7, 7, 7, 22, 2, '0000-00-00', 0),
(8, '1111-01-01', 'asdfa', 14, 13, 7, 7, 10, 19, 2, '2023-11-30', 300000),
(9, '0001-01-01', 'asdfasf', 15, 14, 8, 7, 9, 19, 3, '2023-11-30', 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `establecimientos`
--

CREATE TABLE `establecimientos` (
  `id` int(10) NOT NULL,
  `establecimiento` varchar(50) NOT NULL,
  `comuna_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `establecimientos`
--

INSERT INTO `establecimientos` (`id`, `establecimiento`, `comuna_id`) VALUES
(7, 'Municipalidad de Concepcion', 6);

-- --------------------------------------------------------

--
-- Table structure for table `formaingresos`
--

CREATE TABLE `formaingresos` (
  `id` int(10) NOT NULL,
  `formaIngreso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formaingresos`
--

INSERT INTO `formaingresos` (`id`, `formaIngreso`) VALUES
(2, 'arriendos'),
(3, 'regalo');

-- --------------------------------------------------------

--
-- Table structure for table `funcionarios`
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
-- Dumping data for table `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nombre`, `apellido`, `email`, `establecimiento_id`, `departamento_id`) VALUES
(7, 'Bruno', 'Figueroa', 'bfigueroau@ing.ucsc.cl', 7, 5),
(8, 'Patricio', 'Pizarro', 'ppizarrot@ing.ucsc.cl', 7, 7),
(10, 'Bastian', 'Sandoval', 'bsandoval@ing.ucsc.cl', 7, 6),
(12, 'Wyroska', 'Covid', 'sr.bastii@gmail.com', 7, 4),
(15, 'a', 'a', 'a@a.a', 7, 4),
(19, 'martin', 'barra', 'mbarra@ing.ucsc.cl', 7, 4),
(22, 'no asignado', 'no asignado', 'noasignado@gsdfsd.com', 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `historialequipos`
--

CREATE TABLE `historialequipos` (
  `id` int(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `trn_date` date NOT NULL,
  `equipo_id` int(10) NOT NULL,
  `funcionario_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historialequipos`
--

INSERT INTO `historialequipos` (`id`, `descripcion`, `trn_date`, `equipo_id`, `funcionario_id`) VALUES
(70, 'Se eliminó el equipo 59 - PC fijo', '2023-11-14', 59, 9),
(71, 'Se le eliminó el equipo # 60 - Tablet', '2023-11-14', 60, 10),
(72, 'Se le eliminó el equipo # 57 - Notebook', '2023-11-14', 57, 7),
(73, 'Se agregó el equipo 62 al funcionario Martin ', '2023-11-14', 62, 9),
(74, 'Se eliminó el equipo # 62 - PC fijo', '2023-11-14', 62, 9),
(75, 'Se agregó el equipo 63 al funcionario Bruno', '2023-11-14', 63, 7),
(76, 'Se eliminó el equipo # 63 - PC fijo', '2023-11-14', 63, 7),
(77, 'Se agregó el equipo 64 al funcionario Bruno', '2023-11-14', 64, 7),
(78, 'Se agregó el equipo 65 al funcionario bayron', '2023-11-14', 65, 14),
(79, 'Se eliminó el equipo # 65 - PC fijo', '2023-11-14', 65, 14),
(80, 'Se agregó el equipo 66 al funcionario Bruno', '2023-11-15', 66, 7),
(81, 'Se agregó el equipo 67 al funcionario Bruno', '2023-11-15', 67, 7),
(82, 'Se agregó el equipo 68 al funcionario Bruno', '2023-11-15', 68, 7),
(83, 'Se agregó el equipo 69 al funcionario a', '2023-11-16', 69, 15),
(84, 'Se agregó el equipo 70 al funcionario martin', '2023-11-16', 70, 19),
(85, 'Se agregó el equipo 71 al funcionario Bruno', '2023-11-17', 71, 7),
(86, 'Se agregó el equipo 72 al funcionario Bruno', '2023-11-17', 72, 7),
(87, 'Se eliminó el equipo # 67 - PC fijo', '2023-11-18', 67, 7),
(88, 'Se agregó el equipo 73 al funcionario martin', '2023-11-20', 73, 19),
(89, 'Se agregó el equipo 74 al funcionario martin', '2023-11-20', 74, 19),
(90, 'Se agregó el equipo 76 al funcionario Patricio', '2023-11-20', 76, 8),
(91, 'Se eliminó el equipo # 76 - Tablet', '2023-11-20', 76, 8),
(92, 'Se eliminó el equipo # 64 - PC fijo', '2023-11-22', 64, 7),
(93, 'Se agregó el equipo 77 al funcionario Patricio', '2023-11-22', 77, 8),
(94, 'Se agregó el equipo 78 al funcionario Patricio', '2023-11-22', 78, 8),
(95, 'Se agregó el equipo 79 al funcionario Patricio', '2023-11-22', 79, 8),
(96, 'Se agregó el equipo 80 al funcionario Patricio', '2023-11-22', 80, 8),
(97, 'Se agregó el equipo 81 al funcionario Patricio', '2023-11-22', 81, 8),
(98, 'Se agregó el equipo 82 al funcionario Patricio', '2023-11-22', 82, 8),
(99, 'Se agregó el equipo 83 al funcionario Patricio', '2023-11-22', 83, 8),
(100, 'Se agregó el equipo 84 al funcionario Patricio', '2023-11-22', 84, 8),
(101, 'Se agregó el equipo 85 al funcionario Patricio', '2023-11-22', 85, 8),
(102, 'Se agregó el equipo 86 al funcionario Patricio', '2023-11-22', 86, 8),
(103, 'Se agregó el equipo 87 al funcionario Patricio', '2023-11-22', 87, 8),
(104, 'Se agregó el equipo 88 al funcionario Patricio', '2023-11-22', 88, 8),
(105, 'Se agregó el equipo 89 al funcionario martin', '2023-11-22', 89, 19),
(106, 'Se agregó el equipo 90 al funcionario martin', '2023-11-22', 90, 19),
(107, 'Se agregó el equipo 91 al funcionario martin', '2023-11-22', 91, 19),
(108, 'Se agregó el equipo 92 al funcionario Bruno', '2023-11-22', 92, 7),
(109, 'Se agregó el equipo 93 al funcionario Bruno', '2023-11-22', 93, 7),
(110, 'Se agregó el equipo 1 al funcionario martin', '2023-11-23', 1, 19),
(111, 'Se eliminó el equipo # 1 - Notebook', '2023-11-23', 1, 19),
(112, 'Se agregó el equipo 2 al funcionario martin', '2023-11-23', 2, 19),
(113, 'Se agregó el equipo 3 al funcionario Bruno', '2023-11-23', 3, 7),
(114, 'Se agregó el equipo 4 al funcionario Wyroska', '2023-11-23', 4, 12),
(115, 'Se agregó el equipo 5 al funcionario martin', '2023-11-23', 5, 19),
(116, 'Se agregó el equipo 6 al funcionario Bruno', '2023-11-23', 6, 7),
(117, 'Se agregó el equipo 7 al funcionario no asignado', '2023-11-23', 7, 22),
(118, 'Se agregó el equipo 8 al funcionario martin', '2023-11-28', 8, 19),
(119, 'Se agregó el equipo 9 al funcionario martin', '2023-11-28', 9, 19);

-- --------------------------------------------------------

--
-- Table structure for table `mantenciones`
--

CREATE TABLE `mantenciones` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mantenciones`
--

INSERT INTO `mantenciones` (`id`, `title`, `start_date`, `end_date`) VALUES
(2, '9 - Tablet', '2023-11-30', '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) NOT NULL,
  `marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id`, `marca`) VALUES
(12, 'Lenovo'),
(13, 'Huawei'),
(14, 'HP'),
(15, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `memorias`
--

CREATE TABLE `memorias` (
  `id` int(10) NOT NULL,
  `memoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `memorias`
--

INSERT INTO `memorias` (`id`, `memoria`) VALUES
(6, '4'),
(7, '8'),
(8, '16');

-- --------------------------------------------------------

--
-- Table structure for table `regiones`
--

CREATE TABLE `regiones` (
  `id` int(10) NOT NULL,
  `region` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regiones`
--

INSERT INTO `regiones` (`id`, `region`) VALUES
(4, 'Bio-Bio');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) NOT NULL,
  `fecha` date DEFAULT NULL,
  `tipo_id` int(11) NOT NULL,
  `funcionario_id` int(10) NOT NULL,
  `comentario` varchar(600) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `fecha`, `tipo_id`, `funcionario_id`, `comentario`, `estado`) VALUES
(1, NULL, 15, 8, 'quiero una tablet', 'asignado'),
(2, NULL, 15, 8, 'quiero una tablet', 'rechazado'),
(3, NULL, 15, 8, 'quiero una tablet', 'rechazado'),
(4, NULL, 14, 10, 'dfasdf', 'rechazado'),
(5, NULL, 14, 8, 'asdfasdfas', 'asignado'),
(6, NULL, 13, 19, '', 'rechazado'),
(7, NULL, 13, 19, '', 'asignado'),
(8, NULL, 16, 19, '', 'enviado'),
(9, NULL, 15, 7, '', 'rechazado'),
(10, NULL, 16, 7, '', 'asignado'),
(11, NULL, 15, 7, '', 'enviado'),
(13, '2023-11-28', 14, 19, 'asdf', 'asignado');

-- --------------------------------------------------------

--
-- Table structure for table `tipo`
--

CREATE TABLE `tipo` (
  `id` int(10) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo`
--

INSERT INTO `tipo` (`id`, `tipo`) VALUES
(13, 'PC fijo'),
(14, 'Notebook'),
(15, 'Tablet'),
(16, 'Smartphone');

-- --------------------------------------------------------

--
-- Table structure for table `tipoalmacenamientos`
--

CREATE TABLE `tipoalmacenamientos` (
  `id` int(10) NOT NULL,
  `tipoAlmacenamiento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipoalmacenamientos`
--

INSERT INTO `tipoalmacenamientos` (`id`, `tipoAlmacenamiento`) VALUES
(7, 'SSD'),
(8, 'HDD'),
(9, 'SSD Nvme'),
(10, 'Interno');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `trn_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `trn_date`) VALUES
(5, 'admin', '9cdfb439c7876e703e307864c9167a15', 'admin@gmail.com', '2023-11-09'),
(6, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1@a', '2023-11-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `almacenamientos`
--
ALTER TABLE `almacenamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comunas`
--
ALTER TABLE `comunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_equipos_tipo` (`tipo_id`),
  ADD KEY `memoria_id` (`memoria_id`),
  ADD KEY `almacenamiento_id` (`almacenamiento_id`),
  ADD KEY `tipoAlmacenamiento_id` (`tipoAlmacenamiento_id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `funcionario_id` (`funcionario_id`),
  ADD KEY `formaIngreso_id` (`formaIngreso_id`);

--
-- Indexes for table `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comuna_id` (`comuna_id`);

--
-- Indexes for table `formaingresos`
--
ALTER TABLE `formaingresos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `establecimiento_id` (`establecimiento_id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indexes for table `historialequipos`
--
ALTER TABLE `historialequipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mantenciones`
--
ALTER TABLE `mantenciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memorias`
--
ALTER TABLE `memorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipoalmacenamientos`
--
ALTER TABLE `tipoalmacenamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `almacenamientos`
--
ALTER TABLE `almacenamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `formaingresos`
--
ALTER TABLE `formaingresos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `historialequipos`
--
ALTER TABLE `historialequipos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `mantenciones`
--
ALTER TABLE `mantenciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `memorias`
--
ALTER TABLE `memorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tipoalmacenamientos`
--
ALTER TABLE `tipoalmacenamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comunas`
--
ALTER TABLE `comunas`
  ADD CONSTRAINT `comunas_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regiones` (`id`);

--
-- Constraints for table `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`memoria_id`) REFERENCES `memorias` (`id`),
  ADD CONSTRAINT `equipos_ibfk_3` FOREIGN KEY (`tipoAlmacenamiento_id`) REFERENCES `tipoalmacenamientos` (`id`),
  ADD CONSTRAINT `equipos_ibfk_4` FOREIGN KEY (`almacenamiento_id`) REFERENCES `almacenamientos` (`id`),
  ADD CONSTRAINT `equipos_ibfk_5` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `equipos_ibfk_6` FOREIGN KEY (`formaIngreso_id`) REFERENCES `formaingresos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equipos_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD CONSTRAINT `establecimientos_ibfk_1` FOREIGN KEY (`comuna_id`) REFERENCES `comunas` (`id`);

--
-- Constraints for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionarios_ibfk_1` FOREIGN KEY (`establecimiento_id`) REFERENCES `establecimientos` (`id`),
  ADD CONSTRAINT `funcionarios_ibfk_2` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
