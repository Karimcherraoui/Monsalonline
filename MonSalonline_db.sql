-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 01, 2023 at 10:08 PM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MonSalonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `numero_tele` int DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horaire`
--

CREATE TABLE `horaire` (
  `id` int NOT NULL,
  `jour` varchar(25) NOT NULL,
  `Heure_douverture_matin` varchar(25) NOT NULL,
  `Heure_de_fermeture_matin` varchar(25) NOT NULL,
  `Heure_douverture_après_midi` varchar(25) NOT NULL,
  `Heure_de_fermeture_après_midi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `horaire`
--

INSERT INTO `horaire` (`id`, `jour`, `Heure_douverture_matin`, `Heure_de_fermeture_matin`, `Heure_douverture_après_midi`, `Heure_de_fermeture_après_midi`) VALUES
(1, 'lundi', '9:00', '12:00', '14:00', '20:00'),
(2, 'mardi', '9:00', '12:00', '14:00', '20:00'),
(3, 'mercredi', '9:00', '12:00', '14:00', '20:00'),
(4, 'jeudi', '9:00', '12:00', '14:00', '20:00'),
(5, 'vendredi', '9:00', '12:00', '16:00', '22:00'),
(6, 'samedi', '9:00', '12:00', '14:00', '20:00'),
(7, 'dimanche', '9:00', '12:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rdvs`
--

CREATE TABLE `rdvs` (
  `id` int NOT NULL,
  `id_client` int DEFAULT NULL,
  `dates` int DEFAULT NULL,
  `heure` varchar(25) DEFAULT NULL,
  `statut` varchar(25) DEFAULT NULL,
  `reference` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rdvs`
--
ALTER TABLE `rdvs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rdvs`
--
ALTER TABLE `rdvs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rdvs`
--
ALTER TABLE `rdvs`
  ADD CONSTRAINT `rdvs_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
