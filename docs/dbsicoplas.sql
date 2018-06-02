-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2018 at 11:10 PM
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
  `nombre_e` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `nombre_gerente` varchar(45) NOT NULL,
  `creado` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `bombre` varchar(45) NOT NULL,
  `descripcion` longtext NOT NULL,
  `ico_url` varchar(300) NOT NULL,
  `creado` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `apellido paterno` varchar(45) NOT NULL,
  `apellido materno` varchar(45) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `rol` int(11) NOT NULL,
  `creado` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `password`, `apellido paterno`, `apellido materno`, `direccion`, `telefono`, `rol`, `creado`) VALUES
(2, 'Alfonso', 'alfonsov1709@gmail.com', '698ec06124cfa838bb96e6ebd095941deb314e63345c89a1b1d5f107ff6e86211b8dce17755f6e8e5edee8c7deb452617fea447c711d3e8f778d0aa1b7b01749', 'Vargas', 'Alquicira', 'Richard o Robin No. 35', '5545860466', 2, '2018-06-02 21:09:08.512856'),
(3, 'Adminstrador', 'admin164@gmail.com', '698ec06124cfa838bb96e6ebd095941deb314e63345c89a1b1d5f107ff6e86211b8dce17755f6e8e5edee8c7deb452617fea447c711d3e8f778d0aa1b7b01749', '', '', '', '', 1, '2018-06-02 21:10:03.377598');

-- --------------------------------------------------------

--
-- Table structure for table `vector`
--

CREATE TABLE `vector` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `creado` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_servicio`
--
ALTER TABLE `form_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vector`
--
ALTER TABLE `vector`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
