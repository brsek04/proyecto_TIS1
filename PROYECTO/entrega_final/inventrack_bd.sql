-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 02:10 PM
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
(1, '2023-11-05', 'ideapad-lks', 14, 13, 7, 8, 9, 19, 2, '2023-12-05', 500000),
(2, '2023-01-11', 'Iphone X', 16, 15, 7, 8, 10, 19, 3, '2023-12-12', 300000),
(3, '2023-10-14', 'Tab M10', 15, 12, 7, 8, 8, 22, 2, '2024-01-05', 700000),
(4, '2023-08-27', 'All in one', 13, 14, 8, 9, 7, 26, 2, '2024-01-24', 2000000),
(5, '2023-10-10', 'ThinkPad', 14, 12, 7, 8, 8, 27, 2, '2023-12-08', 1200000),
(6, '2023-09-09', 'iMac27´´', 13, 15, 8, 9, 9, 22, 3, '2024-01-03', 1300000),
(7, '2023-05-05', 'All in one 27\'', 13, 14, 7, 9, 9, 22, 2, '2024-03-03', 1500000);

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
(19, 'martin', 'barra', 'mbarra@ing.ucsc.cl', 7, 4),
(22, 'no asignado', 'no asignado', 'noasignado@gsdfsd.com', 7, 4),
(26, 'bruno', 'figueroa', 'bf33070@gmail.com', 7, 6),
(27, 'patricio', 'pizarro', 'ppizarro@ing.ucsc.cl', 7, 5),
(28, 'bastian', 'sandoval', 'bsandoval@ing.ucsc.cl', 7, 5);

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
(1, 'Se agregó el equipo 1 al funcionario no asignado', '2023-12-01', 1, 22),
(2, 'Se modificó el equipo # 1 - Notebook', '2023-12-01', 1, 0),
(3, 'Se agregó el equipo 2 al funcionario no asignado', '2023-12-01', 2, 22),
(4, 'Se agregó el equipo 3 al funcionario no asignado', '2023-12-01', 3, 22),
(5, 'Se agregó el equipo 4 al funcionario no asignado', '2023-12-01', 4, 22),
(6, 'Se agregó el equipo 5 al funcionario no asignado', '2023-12-01', 5, 22),
(7, 'Se agregó el equipo 6 al funcionario no asignado', '2023-12-01', 6, 22),
(8, 'Se agregó el equipo 4 al funcionario bruno', '2023-12-01', 4, 26),
(9, 'Se agregó el equipo 5 al funcionario patricio', '2023-12-01', 5, 27),
(10, 'Se agregó el equipo 1 al funcionario martin', '2023-12-01', 1, 19),
(11, 'Se agregó el equipo 2 al funcionario martin', '2023-12-01', 2, 19),
(12, 'Se agregó el equipo 7 al funcionario no asignado', '2023-12-01', 7, 22);

-- --------------------------------------------------------

--
-- Table structure for table `mantenciones`
--

CREATE TABLE `mantenciones` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `equipo_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mantenciones`
--

INSERT INTO `mantenciones` (`id`, `title`, `start_date`, `end_date`, `equipo_id`) VALUES
(6, '#1 - Notebook', '2023-12-05', '0000-00-00', 1),
(7, '#2 - Smartphone', '2023-12-12', '2023-12-12', 2),
(8, '#3 - Tablet', '2024-01-05', '2024-01-05', 3),
(9, '#4 - PC fijo', '2024-01-24', '2024-01-24', 4),
(10, '#5 - Notebook', '2023-12-08', '2023-12-08', 5),
(11, '#6 - PC fijo', '2024-01-03', '2024-01-03', 6),
(12, '#7 - PC fijo', '2024-03-03', '2024-03-03', 7);

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
(1, '2023-12-01', 15, 26, 'Requiero de un tablet puesto que nececito hacer tareas de administración en más de una zona, y como es portable me facilitaría llevarlo a cada lado, gracias de antemano ', 'Enviado');

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
  `contrasena` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `trn_date` date NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `contrasena`, `email`, `trn_date`, `rol`) VALUES
(1, '1', '1', '1@gmail.com', '2023-11-30', 'admin'),
(2, '2', '2', '2@gmail.com', '2023-11-30', 'funcionario'),
(10, 'martin', 'martin', 'mbarra@ing.ucsc.cl', '0000-00-00', 'funcionario'),
(11, 'bruno', 'bruno', 'bf33070@gmail.com', '0000-00-00', 'funcionario'),
(12, 'patricio', 'patricio123', 'ppizarro@ing.ucsc.cl', '0000-00-00', 'funcionario'),
(13, 'bastian', 'bastian123', 'bsandoval@ing.ucsc.cl', '0000-00-00', 'funcionario');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipo_id` (`equipo_id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `historialequipos`
--
ALTER TABLE `historialequipos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mantenciones`
--
ALTER TABLE `mantenciones`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
