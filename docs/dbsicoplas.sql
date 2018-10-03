-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2018 at 05:17 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsicoplas`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombree` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `nombreg` varchar(45) NOT NULL,
  `creado` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `estado` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombree`, `direccion`, `correo`, `telefono`, `nombreg`, `creado`, `estado`) VALUES
(1, 'LOGIS Express', '', 'logis@hotmail.com', '55 123456', 'fulano', '2018-06-21 20:49:36.437983', 'Aguascalientes'),
(2, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.335865', 'Acapulco'),
(3, 'LOGIS Express ', '', '', '', '', '2018-07-01 04:07:33.351492', 'Campeche'),
(4, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.351492', 'Cancun'),
(5, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'CD. del Carmen'),
(6, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'CD Victoria'),
(7, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'Coatzacoalcos'),
(8, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'Cordoba'),
(9, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'Durango'),
(10, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'Mazatlan'),
(11, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'Pachuca '),
(12, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'Pozarica'),
(13, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'Tampico'),
(14, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'Tepic'),
(15, 'LOGIS Express', '', '', '', '', '2018-07-01 04:07:33.367116', 'Xalapa'),
(16, 'Limtech', 'cuatilan', 'lim@gmail.com', '12345', 'zutano', '2018-08-20 00:42:24.897675', 'Mexico');

-- --------------------------------------------------------

--
-- Table structure for table `form_servicio`
--

CREATE TABLE `form_servicio` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `vector` int(11) NOT NULL,
  `comentarios` varchar(300) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `nombre_img` varchar(45) NOT NULL,
  `descripcion` longtext NOT NULL,
  `ico_url` varchar(300) NOT NULL,
  `creado` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `imagen_form`
--

CREATE TABLE `imagen_form` (
  `id` int(11) NOT NULL,
  `form` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre_r` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre_r`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `apellidop` varchar(45) NOT NULL,
  `apellidom` varchar(45) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `rol` int(11) NOT NULL,
  `creado` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `password`, `apellidop`, `apellidom`, `direccion`, `telefono`, `rol`, `creado`) VALUES
(2, 'pelon', 'alfonsov1709@gmail.com', '698ec06124cfa838bb96e6ebd095941deb314e63345c89a1b1d5f107ff6e86211b8dce17755f6e8e5edee8c7deb452617fea447c711d3e8f778d0aa1b7b01749', 'Vargas', 'Alquicira', 'Richard o Robin No. 35', '5545860466', 2, '2018-10-01 02:16:05.479564'),
(3, 'Adminstrador', 'admin164@gmail.com', '698ec06124cfa838bb96e6ebd095941deb314e63345c89a1b1d5f107ff6e86211b8dce17755f6e8e5edee8c7deb452617fea447c711d3e8f778d0aa1b7b01749', 'Delgado', 'Rosas', 'Rio Moctezuma No.5', '5534804751 ', 1, '2018-06-21 20:43:31.447208');

-- --------------------------------------------------------

--
-- Table structure for table `vector`
--

CREATE TABLE `vector` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `creado` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vector`
--

INSERT INTO `vector` (`id`, `nombre`, `creado`) VALUES
(2, 'Cucaracha', '2018-09-15 01:30:40.187869'),
(3, 'Hormiga', '2018-09-15 01:30:45.720302'),
(4, 'Abeja', '2018-09-15 01:30:51.727100'),
(5, 'Escarabajos', '2018-09-15 01:31:12.142631'),
(6, 'Pescadito de Plata', '2018-09-15 01:31:30.275681'),
(7, 'Tijerilllas', '2018-09-15 01:31:52.115874'),
(8, 'Grillos', '2018-09-15 01:31:59.631838'),
(9, 'Chinches', '2018-09-15 01:32:07.960853'),
(10, 'Avispas', '2018-09-15 01:32:17.357016'),
(11, 'Ciempies', '2018-09-15 01:32:32.955061'),
(12, 'Pulga', '2018-09-15 01:32:40.190479'),
(13, 'Raton', '2018-09-15 01:32:48.089875'),
(14, 'Pulgon', '2018-09-15 01:33:00.836527'),
(15, 'Mosca', '2018-09-15 01:33:05.614268'),
(16, 'Araña', '2018-09-15 01:33:14.678557'),
(17, 'Piojos', '2018-09-15 01:33:21.847729'),
(18, 'Alacran', '2018-09-15 01:33:29.263682'),
(19, 'Paloma', '2018-09-15 01:33:36.108433');

-- --------------------------------------------------------

--
-- Table structure for table `vector_form`
--

CREATE TABLE `vector_form` (
  `id` int(11) NOT NULL,
  `form` int(11) NOT NULL,
  `vector` int(11) NOT NULL,
  `creado` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_servicio`
--
ALTER TABLE `form_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fs_usr_idx` (`id_usr`),
  ADD KEY `fs_empresa_idx` (`id_empresa`);

--
-- Indexes for table `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagen_form`
--
ALTER TABLE `imagen_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_img_form_idx` (`form`),
  ADD KEY `imagen_img_form_idx` (`id_foto`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_usr_idx` (`rol`);

--
-- Indexes for table `vector`
--
ALTER TABLE `vector`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vector_form`
--
ALTER TABLE `vector_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vf_formulario_idx` (`form`),
  ADD KEY `vf_vector_idx` (`vector`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `form_servicio`
--
ALTER TABLE `form_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagen_form`
--
ALTER TABLE `imagen_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vector`
--
ALTER TABLE `vector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vector_form`
--
ALTER TABLE `vector_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_servicio`
--
ALTER TABLE `form_servicio`
  ADD CONSTRAINT `fs_empresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fs_usr` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `imagen_form`
--
ALTER TABLE `imagen_form`
  ADD CONSTRAINT `form_img_form` FOREIGN KEY (`form`) REFERENCES `form_servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `imagen_img_form` FOREIGN KEY (`id_foto`) REFERENCES `imagen` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol_usr` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `vector_form`
--
ALTER TABLE `vector_form`
  ADD CONSTRAINT `vf_formulario` FOREIGN KEY (`form`) REFERENCES `form_servicio` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `vf_vector` FOREIGN KEY (`vector`) REFERENCES `vector` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
