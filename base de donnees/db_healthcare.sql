-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 23 août 2021 à 13:42
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_healthcare`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` bigint(10) NOT NULL,
  `adminFirstName` varchar(30) NOT NULL,
  `adminLastName` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `adminId` int(3) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `adminFirstName`, `adminLastName`, `mail`, `adminId`, `password`, `image`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 0, 'admin', '');

-- --------------------------------------------------------

--
-- Structure de la table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appId` int(3) NOT NULL AUTO_INCREMENT,
  `patientIc` bigint(12) NOT NULL,
  `scheduleId` int(10) NOT NULL,
  `appSymptom` varchar(100) NOT NULL,
  `appComment` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'process',
  `lien` varchar(50) NOT NULL,
  PRIMARY KEY (`appId`),
  UNIQUE KEY `scheduleId_2` (`scheduleId`),
  KEY `patientIc` (`patientIc`),
  KEY `scheduleId` (`scheduleId`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `appointment`
--

INSERT INTO `appointment` (`appId`, `patientIc`, `scheduleId`, `appSymptom`, `appComment`, `status`, `lien`) VALUES
(86, 920517105553, 40, 'Pening Kepala', 'Bila doktor free?', 'done', 'https://meet.google.com/nwo-hsgh-gpx');

-- --------------------------------------------------------

--
-- Structure de la table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `icDoctor` bigint(12) NOT NULL AUTO_INCREMENT,
  `password` varchar(20) NOT NULL,
  `doctorId` int(3) NOT NULL,
  `doctorFirstName` varchar(50) NOT NULL,
  `doctorLastName` varchar(50) NOT NULL,
  `doctorAddress` varchar(100) NOT NULL,
  `doctorPhone` varchar(15) NOT NULL,
  `doctorEmail` varchar(20) NOT NULL,
  `doctorDOB` date NOT NULL,
  `autorisation` int(2) NOT NULL DEFAULT '1',
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`icDoctor`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB AUTO_INCREMENT=123456792 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `doctor`
--

INSERT INTO `doctor` (`icDoctor`, `password`, `doctorId`, `doctorFirstName`, `doctorLastName`, `doctorAddress`, `doctorPhone`, `doctorEmail`, `doctorDOB`, `autorisation`, `link`) VALUES
(1, '1234', 67, 'aa', 'bb', 'fann', '646436332', 'cc@dd.colm', '2020-11-06', 0, 'https://meet.google.com/rrz-edpu-sbr'),
(123456789, '123', 123, 'Doctor', 'Sehgal', 'kuala lumpur', '0173567758', 'dsehgal@gmail.com', '1990-04-10', 1, 'https://meet.google.com/nwo-hsgh-gpx'),
(123456791, '123', 1234, 'PAPP', 'JASJAS', 'SN', '7722663', 'JXNJD@JAS', '2020-11-06', 1, 'nkzdnzdnzd');

-- --------------------------------------------------------

--
-- Structure de la table `doctorschedule`
--

DROP TABLE IF EXISTS `doctorschedule`;
CREATE TABLE IF NOT EXISTS `doctorschedule` (
  `scheduleId` int(11) NOT NULL AUTO_INCREMENT,
  `scheduleDate` date NOT NULL,
  `scheduleDay` varchar(15) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `bookAvail` varchar(10) NOT NULL,
  PRIMARY KEY (`scheduleId`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `doctorschedule`
--

INSERT INTO `doctorschedule` (`scheduleId`, `scheduleDate`, `scheduleDay`, `startTime`, `endTime`, `bookAvail`) VALUES
(40, '2015-12-13', 'Sunday', '09:00:00', '10:00:00', 'notavail'),
(41, '2015-12-13', 'Sunday', '10:00:00', '11:00:00', 'available'),
(42, '2015-12-13', 'Sunday', '11:00:00', '12:00:00', 'available'),
(43, '2015-12-14', 'Monday', '11:00:00', '12:00:00', 'available'),
(44, '2015-12-13', 'Sunday', '01:00:00', '02:00:00', 'available'),
(45, '2020-11-06', 'Friday', '16:00:00', '20:00:00', 'available');

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `icPatient` bigint(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `patientFirstName` varchar(20) NOT NULL,
  `patientLastName` varchar(20) NOT NULL,
  `patientMaritialStatus` varchar(10) NOT NULL,
  `patientDOB` date NOT NULL,
  `patientGender` varchar(10) NOT NULL,
  `patientAddress` varchar(100) NOT NULL,
  `patientPhone` varchar(15) NOT NULL,
  `patientEmail` varchar(100) NOT NULL,
  `autorisation` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`icPatient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`icPatient`, `password`, `patientFirstName`, `patientLastName`, `patientMaritialStatus`, `patientDOB`, `patientGender`, `patientAddress`, `patientPhone`, `patientEmail`, `autorisation`) VALUES
(3, '34', 'q', 'a', '', '1995-05-11', 'male', '', '', 'aq@gmail.com', 1),
(123, '123', 'Pape Ousseynou', 'Diop', '', '1986-06-09', 'male', '', '', 'papeousseynoudiop@esp.sn', 1),
(920517105553, '123', 'Mohd', 'Mazlan', 'single', '1992-05-17', 'male', 'NO 153 BLOK MURNI\r\nKOLEJ CANSELOR UNIVERSITI PUTRA MALAYSIA', '173567758', 'lan.psis@gmail.com', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`patientIc`) REFERENCES `patient` (`icPatient`),
  ADD CONSTRAINT `appointment_ibfk_5` FOREIGN KEY (`scheduleId`) REFERENCES `doctorschedule` (`scheduleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
