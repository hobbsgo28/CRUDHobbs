-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2026 at 08:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud2025hobbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `accessKey` int(8) NOT NULL DEFAULT 1 COMMENT '1 = normal user\r\n2 = Admin',
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `emailAddress` text NOT NULL,
  `userPassword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `accessKey`, `firstName`, `lastName`, `emailAddress`, `userPassword`) VALUES
(1, 2, 'Bob', 'Smith', 'bobsm@email.com', '$2y$10$6DLg0DaekOrRF0xRBfNspu.PIWZQTAMe9iHhmItYvTS0Scyae/5lC'),
(15, 1, 'Mary', 'Doe', 'doe@email.com', '$2y$10$g6c8HeDAtuPXrQInECNxteo5UF1PoCrGcn14ysJpLUUqLsKq.AR0K'),
(16, 1, 'John', 'Doe', 'john@email.com', '$2y$10$8N4s6fmi3c3tZ6R2wNz.ceAsFkhFcLwhcbAs5MW97lw47juYrYq7u'),
(17, 2, 'Matt', 'Jone', 'jones@email.com', '$2y$10$8ce48lyUx3S4T.weLCwUzem/JrO4.X2aBQ2POokowDOJ1kOAUJDpi'),
(18, 1, 'Jane', 'Smith', 'smith@email.com', '$2y$10$3xvJWA7DI9uA5vTCIDQksuYjbRj03Qb9Al4wkNpkmxeeddQA0omlG'),
(20, 2, 'Sara', 'Jones', 'sara@email.com', '$2y$10$23/dxFXNxECfAMwZVPn1..nOBRyoDNcut4jkmHp/Pw/PtlOCICEtS');

--
-- Indexes for dumped tables
--

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
