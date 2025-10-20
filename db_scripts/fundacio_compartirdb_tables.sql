-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2025 at 03:59 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fundacio_compartirdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cnf_link`
--

CREATE TABLE `cnf_link` (
  `id_link` int(10) UNSIGNED NOT NULL,
  `id_subcategoria` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `titulo_es` varchar(250) DEFAULT NULL,
  `titulo_en` varchar(250) DEFAULT NULL,
  `url_es` varchar(250) DEFAULT NULL,
  `url_en` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cnf_subcategoria`
--

CREATE TABLE `cnf_subcategoria` (
  `id_subcategoria` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo_es` varchar(100) DEFAULT NULL,
  `titulo_en` varchar(100) DEFAULT NULL,
  `subtitulo_es` varchar(255) DEFAULT NULL,
  `subtitulo_en` varchar(255) DEFAULT NULL,
  `contenido_es` blob,
  `contenido_en` blob,
  `foto` varchar(255) DEFAULT NULL,
  `posicion` int(11) DEFAULT NULL,
  `link_es` varchar(255) DEFAULT NULL,
  `link_en` varchar(255) DEFAULT NULL,
  `prioridad` int(11) DEFAULT NULL,
  `periodo` int(4) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT 'ACTIVO',
  `tiene_links` int(11) DEFAULT NULL,
  `vermas_titulo_es` varchar(100) DEFAULT NULL,
  `vermas_titulo_en` varchar(100) DEFAULT NULL,
  `vermas_foto` varchar(255) DEFAULT NULL,
  `vermas_subtitulo_es` varchar(255) DEFAULT NULL,
  `vermas_subtitulo_en` varchar(255) DEFAULT NULL,
  `vermas_contenido_es` blob,
  `vermas_contenido_en` blob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnf_link`
--
ALTER TABLE `cnf_link`
  ADD PRIMARY KEY (`id_link`,`id_subcategoria`);

--
-- Indexes for table `cnf_subcategoria`
--
ALTER TABLE `cnf_subcategoria`
  ADD PRIMARY KEY (`id_subcategoria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnf_link`
--
ALTER TABLE `cnf_link`
  MODIFY `id_link` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cnf_subcategoria`
--
ALTER TABLE `cnf_subcategoria`
  MODIFY `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
