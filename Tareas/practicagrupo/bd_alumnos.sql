-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2025 at 01:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_alumnos`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `fotografia` varchar(200) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `CU` varchar(7) NOT NULL,
  `sexo` char(1) NOT NULL,
  `codigocarrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `fotografia`, `nombre`, `apellido`, `CU`, `sexo`, `codigocarrera`) VALUES
(29, '68febed75108d.png', 'Qui labore error sit', 'Labore et reiciendis', 'Dolor b', 'M', 3),
(30, '68febed7530ce.png', 'Deserunt assumenda u', 'Illo harum quisquam ', 'Nisi ea', 'M', 2),
(31, '68febed7540fd.png', 'Placeat consequuntu', 'Sint ex deserunt vol', 'Dolorem', 'F', 2),
(32, '68febed7553ff.png', 'Qui quo doloremque o', 'Exercitation animi ', 'Eveniet', 'F', 2),
(33, '68febf0b9f671.png', 'Placeat corrupti e', 'Et iste dolor archit', 'Nisi es', 'M', 3),
(34, '68febf0ba45a8.png', 'Quia vel ipsa tempo', 'Voluptatem cum elig', 'Officii', 'F', 2),
(35, '68febf2f20af2.png', 'Distinctio Nam maxi', 'Nostrum quidem dolor', 'Excepte', 'M', 2),
(36, '68febf2f2172d.png', 'Fugiat quia ut in su', 'A dolor voluptatem e', 'Omnis s', 'F', 3);

-- --------------------------------------------------------

--
-- Table structure for table `carrera`
--

CREATE TABLE `carrera` (
  `codigo` int(11) NOT NULL,
  `carrera` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrera`
--

INSERT INTO `carrera` (`codigo`, `carrera`) VALUES
(2, 'Ing. sistemas'),
(3, 'Ing. Ciencias de la Computacion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `carrera`
--
ALTER TABLE `carrera`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
