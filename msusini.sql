-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-meganesusini.alwaysdata.net
-- Generation Time: Oct 21, 2021 at 02:44 PM
-- Server version: 10.5.11-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meganesusini_soirees`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comptes`
--

CREATE TABLE `Comptes` (
  `email` varchar(90) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL,
  `role` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comptes`
--

INSERT INTO `Comptes` (`email`, `nom`, `prenom`, `tel`, `mdp`, `role`) VALUES
('susini.megane04@gmail.com', 'Susini', 'Megane', '0652046383', 'azerty', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE `Reservation` (
  `idReservation` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `tel` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `idRole` int(1) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`idRole`, `libelle`) VALUES
(1, 'Utilisateur'),
(2, 'Gestionnaire'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `Soiree`
--

CREATE TABLE `Soiree` (
  `idSoiree` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `NbPlaceRestante` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Soiree`
--

INSERT INTO `Soiree` (`idSoiree`, `date`, `NbPlaceRestante`) VALUES
(0, '2021-11-10', 300),
(1, '2021-10-21', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comptes`
--
ALTER TABLE `Comptes`
  ADD PRIMARY KEY (`email`),
  ADD KEY `FK_Comptes_Roles` (`role`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`idReservation`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `Soiree`
--
ALTER TABLE `Soiree`
  ADD PRIMARY KEY (`idSoiree`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comptes`
--
ALTER TABLE `Comptes`
  ADD CONSTRAINT `FK_Comptes_Roles` FOREIGN KEY (`role`) REFERENCES `Roles` (`idRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
