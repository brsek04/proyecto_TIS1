-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 09:52 PM
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
-- Database: `mm`
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
(5, 'almacenamiento2');

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
(4, 'talcahuano', 2),
(5, 'chillan', 3);

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
(2, 'obras'),
(3, 'alcaldia');

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id` int(10) NOT NULL,
  `fechaIngreso` date NOT NULL,
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
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id`, `fechaIngreso`, `modelo`, `tipo_id`, `marca_id`, `memoria_id`, `almacenamiento_id`, `tipoAlmacenamiento_id`, `funcionario_id`, `costo`) VALUES
(45, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(46, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(47, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(48, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(49, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(50, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(51, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(52, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(53, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(54, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(55, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0),
(56, '0000-00-00', '', 10, 10, 4, 5, 5, 5, 0);

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
(5, 'hospital regional de ñuble', 5),
(6, 'hospital higueras', 4);

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
(5, 'martin', 'barra', 'ogsokor@gmail.com', 5, 2);

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
(52, 'Se agregó el equipo 56 al funcionario martin', '2023-11-04', 56, 5);

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
(10, 'marca2');

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
(4, 'memoria1'),
(5, 'memoria2');

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
(2, 'biobiodd'),
(3, 'ñuble');

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
(10, 'tipoEquipo222222');

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
(5, 'tipoA2');

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
(1, '1', 'c4ca4238a0b923820dcc509a6f75849b', '1@gmail.com', '2023-10-30'),
(2, '2', 'c81e728d9d4c2f636f067f89cc14862c', '2@gmail.com', '2023-11-04');

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
  ADD KEY `funcionario_id` (`funcionario_id`);

--
-- Indexes for table `establecimientos`
--
ALTER TABLE `establecimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comuna_id` (`comuna_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comunas`
--
ALTER TABLE `comunas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `establecimientos`
--
ALTER TABLE `establecimientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `historialequipos`
--
ALTER TABLE `historialequipos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `memorias`
--
ALTER TABLE `memorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tipoalmacenamientos`
--
ALTER TABLE `tipoalmacenamientos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
