-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2024 at 06:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `phoneno` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`phoneno`, `email`, `password`) VALUES
('0000000000', 'diveshkarwasra1@gmail.com', '$2y$10$1Fbj3Vma1OiqBoER8bSuHuuGRwmVy3IYTFHgPGhil/C0tP0VDibkG'),
('0000100000', 'guniya@gmail.com', '$2y$10$szPRfdlsIc/9oqBa6cpRnOafr7b9Yrfc2UJzmt0.NQzeIiRbQ/fd6'),
('0909090909', 'aanchal@gmail.com', '$2y$10$xl8NBgba.tLoG3dKN.pIq.kILwagOBQRnvOeMWoR1aDgh8FUXgBAq'),
('2222222222', 'shantilal@gmail.com', '$2y$10$PqTgOOfGH2ZMipKVSPcRDOqJIXApkd2XMg0Ir1D8zTTUnn0B8BFxW'),
('5555555555', 'admin@123', '12345678'),
('7777777777', 'dixitchouhhan@gmail.com', '$2y$10$x8E.6MU3zKSM77fjav1c7eC1vjn3XvOKSm1Gea0RcvrMWeCmsUeqG'),
('8140882454', 'pareshsutharr@gmail.com', '$2y$10$4xNLirfxKgYSuFssTPLps.5ihoF1iSD0icJ.e.ofYaot/03NgwqvW');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`phoneno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
