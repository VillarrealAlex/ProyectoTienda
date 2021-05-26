-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2021 at 02:51 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiendapro`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio` float NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `consecionado` tinyint(1) DEFAULT NULL,
  `motivo` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apat` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `amat` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `rol` enum('Cliente','Administrador','Supervisor','Contador','Encargado') COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `activo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apat`, `amat`, `email`, `imagen`, `rol`, `password`, `activo`) VALUES
(1, 'Rosario', 'Valazquez', 'Lopez', 'cliente1@gmail.com', NULL, 'Cliente', '$2y$10$XFGzO9wgFWoEuoWDHWUH7eU7OI..FzBfk5nCfsQIY8OKeGaujsula', NULL),
(2, 'Raul', 'Perez', 'Mota', 'cliente2@gmail.com', NULL, 'Cliente', '$2y$10$YoemOi9jDqUtgrIr5vcwZuHht2CTXFoX67v7Qvi3LPs1RGhA305cO', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `fk_producto_categoria_idx` (`categoria_idcategoria`),
  ADD KEY `fk_producto_usuario1_idx` (`usuario_idusuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producto_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
