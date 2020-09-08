-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 08, 2020 at 11:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helpjur`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `categorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `categorie`) VALUES
(1, 'Avis et Consultation'),
(2, 'Contrat');

-- --------------------------------------------------------

--
-- Table structure for table `conge`
--

CREATE TABLE `conge` (
  `idConge` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `editable` varchar(6) NOT NULL DEFAULT 'false ',
  `color` varchar(25) NOT NULL,
  `backgroundColor` varchar(25) NOT NULL,
  `textColor` varchar(25) NOT NULL DEFAULT 'white'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `idDemande` int(11) NOT NULL,
  `dateDemande` datetime NOT NULL,
  `objet` text NOT NULL,
  `contenu` longtext NOT NULL,
  `fichier` varchar(250) DEFAULT NULL,
  `envoyeur` int(11) NOT NULL,
  `statutDemande` varchar(6) DEFAULT 'Envoyé'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`idDemande`, `dateDemande`, `objet`, `contenu`, `fichier`, `envoyeur`, `statutDemande`) VALUES
(1, '2020-05-19 11:21:00', 'aaaaaaa', '<p>aaaaaaaaa</p>\r\n', NULL, 7, 'Reçu'),
(2, '2020-05-19 13:55:10', 'eeeeeeeee', '<p>eeeeeeeeeeee</p>\r\n', NULL, 7, 'Abando'),
(3, '2020-05-19 13:55:32', 'zzzzzzzzzz', '<p>zzzzzzzzzz</p>\r\n', NULL, 7, 'Reçu'),
(4, '2020-05-19 13:55:41', 'rrrrrrrrrrrrrrrr', '<p>trrrrrrrrrrrrrrrrrr</p>\r\n', NULL, 7, 'Reçu'),
(5, '2020-05-19 13:55:48', 'ttttttttttttt', '<p>ttttttttttttttttt</p>\r\n', NULL, 7, 'Reçu'),
(6, '2020-05-20 09:11:22', 'Test Test', '<p>bonjour,</p>\r\n\r\n<p>azekabj&nbsp; zealn nezna&nbsp;</p>\r\n\r\n<p>e azezaeazzzzzzzzzzzzzzzzz aezaaaaaaaaaaaaaaaaaaaaaa</p>\r\n\r\n<p>zesdq&nbsp;</p>\r\n', NULL, 7, 'Reçu'),
(7, '2020-05-20 14:30:15', 'zzzzzzzzzz', '<p>zzzzzzzzzzzzzzzz</p>\r\n', NULL, 7, 'Reçu'),
(8, '2020-05-20 14:30:21', 'eeeeeeeeee', '<p>eeeeeeeeeeeeeeee</p>\r\n', NULL, 7, 'Reçu'),
(9, '2020-05-20 14:30:28', 'gggggggggggg', '<p>ggggggggggggggggg</p>\r\n', NULL, 7, 'Reçu'),
(10, '2020-09-07 19:20:03', 'zazxaxax zxzaxza zdzadnzuadnaz zdaj dznadanodzka dioanioanc eoanciencl k ce cino', '<p>Bonjour,<br />\r\nVotre demande est prise en charge sous le num&eacute;ro : TIK-JUR-00000000009.<br />\r\nNous reviendrons vers vous dans 15 jour(s) ouvr&eacute;s. Vous pouvez la consult&eacute; dans la liste des dossiers prise en charge :</p>\r\n\r\n<ul>\r\n	<li><strong>Num&eacute;ro :</strong>TIK-JUR-00000000009</li>\r\n	<li><strong>Objet :</strong>zzzzzzzzzz</li>\r\n</ul>\r\n\r\n<p><strong>NB :</strong> Veuillez ne pas r&eacute;pondre &agrave; ce mail.<br />\r\n<br />\r\n<strong>Cordialement. </strong></p>\r\n', '', 7, 'Envoyé'),
(11, '2020-09-07 19:26:18', 'w', '<p>w</p>\r\n', '', 7, 'Envoyé'),
(12, '2020-09-07 19:51:07', '2', '<p>hg</p>\r\n', NULL, 7, 'Envoyé'),
(13, '2020-09-08 10:03:05', '4', '<p>h</p>\r\n', '', 7, 'Envoyé'),
(14, '2020-09-08 10:08:04', 'a', '<p>a</p>\r\n', 'Violet-Evergarden-1440x1280.jpg', 7, 'Envoyé');

-- --------------------------------------------------------

--
-- Table structure for table `ferie`
--

CREATE TABLE `ferie` (
  `idFerie` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `editable` varchar(6) NOT NULL DEFAULT 'false',
  `color` varchar(25) NOT NULL DEFAULT 'rgb(255, 59, 94)',
  `backgroundColor` varchar(25) NOT NULL DEFAULT 'rgb(255, 59, 94)',
  `textColor` varchar(25) NOT NULL DEFAULT 'white'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ferie`
--

INSERT INTO `ferie` (`idFerie`, `title`, `start`, `editable`, `color`, `backgroundColor`, `textColor`) VALUES
(1, 'Nouvel an', '2018-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(2, 'Journée internationale de la femme', '2018-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(3, 'Commémoration 1947', '2018-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(4, 'Fête du Travail', '2018-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(5, 'Fête de l\'independance', '2018-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(6, 'Assomption de la Sainte Vierge', '2018-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(7, 'Toussaint', '2018-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(8, 'Noël', '2018-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(9, 'Pâque', '2018-04-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(10, 'Lundi de Pâque', '2018-04-02', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(11, 'Ascension', '2018-05-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(12, 'Pentecôte', '2018-05-20', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(13, 'Lundi de Pentecôte', '2018-05-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(14, 'Nouvel an', '2019-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(15, 'Journée internationale de la femme', '2019-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(16, 'Commémoration 1947', '2019-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(17, 'Fête du Travail', '2019-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(18, 'Fête de l\'independance', '2019-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(19, 'Assomption de la Sainte Vierge', '2019-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(20, 'Toussaint', '2019-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(21, 'Noël', '2019-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(22, 'Pâque', '2019-04-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(23, 'Lundi de Pâque', '2019-04-22', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(24, 'Ascension', '2019-05-30', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(25, 'Pentecôte', '2019-06-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(26, 'Lundi de Pentecôte', '2019-06-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(27, 'Nouvel an', '2020-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(28, 'Journée internationale de la femme', '2020-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(29, 'Commémoration 1947', '2020-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(30, 'Fête du Travail', '2020-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(31, 'Fête de l\'independance', '2020-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(32, 'Assomption de la Sainte Vierge', '2020-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(33, 'Toussaint', '2020-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(34, 'Noël', '2020-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(35, 'Pâque', '2020-04-12', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(36, 'Lundi de Pâque', '2020-04-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(37, 'Ascension', '2020-05-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(38, 'Pentecôte', '2020-05-31', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(39, 'Lundi de Pentecôte', '2020-06-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(40, 'Nouvel an', '2021-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(41, 'Journée internationale de la femme', '2021-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(42, 'Commémoration 1947', '2021-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(43, 'Fête du Travail', '2021-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(44, 'Fête de l\'independance', '2021-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(45, 'Assomption de la Sainte Vierge', '2021-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(46, 'Toussaint', '2021-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(47, 'Noël', '2021-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(48, 'Pâque', '2021-04-04', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(49, 'Lundi de Pâque', '2021-04-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(50, 'Ascension', '2021-05-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(51, 'Pentecôte', '2021-05-23', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(52, 'Lundi de Pentecôte', '2021-05-24', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(53, 'Nouvel an', '2022-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(54, 'Journée internationale de la femme', '2022-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(55, 'Commémoration 1947', '2022-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(56, 'Fête du Travail', '2022-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(57, 'Fête de l\'independance', '2022-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(58, 'Assomption de la Sainte Vierge', '2022-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(59, 'Toussaint', '2022-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(60, 'Noël', '2022-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(61, 'Pâque', '2022-04-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(62, 'Lundi de Pâque', '2022-04-18', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(63, 'Ascension', '2022-05-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(64, 'Pentecôte', '2022-06-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(65, 'Lundi de Pentecôte', '2022-06-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(66, 'Nouvel an', '2023-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(67, 'Journée internationale de la femme', '2023-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(68, 'Commémoration 1947', '2023-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(69, 'Fête du Travail', '2023-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(70, 'Fête de l\'independance', '2023-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(71, 'Assomption de la Sainte Vierge', '2023-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(72, 'Toussaint', '2023-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(73, 'Noël', '2023-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(74, 'Pâque', '2023-04-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(75, 'Lundi de Pâque', '2023-04-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(76, 'Ascension', '2023-05-18', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(77, 'Pentecôte', '2023-05-28', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(78, 'Lundi de Pentecôte', '2023-05-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(79, 'Nouvel an', '2024-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(80, 'Journée internationale de la femme', '2024-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(81, 'Commémoration 1947', '2024-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(82, 'Fête du Travail', '2024-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(83, 'Fête de l\'independance', '2024-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(84, 'Assomption de la Sainte Vierge', '2024-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(85, 'Toussaint', '2024-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(86, 'Noël', '2024-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(87, 'Pâque', '2024-03-31', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(88, 'Lundi de Pâque', '2024-04-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(89, 'Ascension', '2024-05-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(90, 'Pentecôte', '2024-05-19', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(91, 'Lundi de Pentecôte', '2024-05-20', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(92, 'Nouvel an', '2025-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(93, 'Journée internationale de la femme', '2025-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(94, 'Commémoration 1947', '2025-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(95, 'Fête du Travail', '2025-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(96, 'Fête de l\'independance', '2025-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(97, 'Assomption de la Sainte Vierge', '2025-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(98, 'Toussaint', '2025-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(99, 'Noël', '2025-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(100, 'Pâque', '2025-04-20', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(101, 'Lundi de Pâque', '2025-04-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(102, 'Ascension', '2025-05-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(103, 'Pentecôte', '2025-06-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(104, 'Lundi de Pentecôte', '2025-06-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(105, 'Nouvel an', '2026-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(106, 'Journée internationale de la femme', '2026-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(107, 'Commémoration 1947', '2026-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(108, 'Fête du Travail', '2026-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(109, 'Fête de l\'independance', '2026-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(110, 'Assomption de la Sainte Vierge', '2026-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(111, 'Toussaint', '2026-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(112, 'Noël', '2026-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(113, 'Pâque', '2026-04-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(114, 'Lundi de Pâque', '2026-04-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(115, 'Ascension', '2026-05-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(116, 'Pentecôte', '2026-05-24', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(117, 'Lundi de Pentecôte', '2026-05-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(118, 'Nouvel an', '2027-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(119, 'Journée internationale de la femme', '2027-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(120, 'Commémoration 1947', '2027-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(121, 'Fête du Travail', '2027-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(122, 'Fête de l\'independance', '2027-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(123, 'Assomption de la Sainte Vierge', '2027-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(124, 'Toussaint', '2027-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(125, 'Noël', '2027-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(126, 'Pâque', '2027-03-28', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(127, 'Lundi de Pâque', '2027-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(128, 'Ascension', '2027-05-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(129, 'Pentecôte', '2027-05-16', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(130, 'Lundi de Pentecôte', '2027-05-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(131, 'Nouvel an', '2028-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(132, 'Journée internationale de la femme', '2028-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(133, 'Commémoration 1947', '2028-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(134, 'Fête du Travail', '2028-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(135, 'Fête de l\'independance', '2028-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(136, 'Assomption de la Sainte Vierge', '2028-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(137, 'Toussaint', '2028-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(138, 'Noël', '2028-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(139, 'Pâque', '2028-04-16', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(140, 'Lundi de Pâque', '2028-04-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(141, 'Ascension', '2028-05-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(142, 'Pentecôte', '2028-06-04', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(143, 'Lundi de Pentecôte', '2028-06-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(144, 'Nouvel an', '2029-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(145, 'Journée internationale de la femme', '2029-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(146, 'Commémoration 1947', '2029-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(147, 'Fête du Travail', '2029-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(148, 'Fête de l\'independance', '2029-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(149, 'Assomption de la Sainte Vierge', '2029-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(150, 'Toussaint', '2029-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(151, 'Noël', '2029-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(152, 'Pâque', '2029-04-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(153, 'Lundi de Pâque', '2029-04-02', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(154, 'Ascension', '2029-05-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(155, 'Pentecôte', '2029-05-20', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(156, 'Lundi de Pentecôte', '2029-05-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(157, 'Nouvel an', '2030-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(158, 'Journée internationale de la femme', '2030-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(159, 'Commémoration 1947', '2030-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(160, 'Fête du Travail', '2030-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(161, 'Fête de l\'independance', '2030-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(162, 'Assomption de la Sainte Vierge', '2030-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(163, 'Toussaint', '2030-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(164, 'Noël', '2030-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(165, 'Pâque', '2030-04-21', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(166, 'Lundi de Pâque', '2030-04-22', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(167, 'Ascension', '2030-05-30', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(168, 'Pentecôte', '2030-06-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(169, 'Lundi de Pentecôte', '2030-06-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(170, 'Nouvel an', '2031-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(171, 'Journée internationale de la femme', '2031-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(172, 'Commémoration 1947', '2031-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(173, 'Fête du Travail', '2031-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(174, 'Fête de l\'independance', '2031-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(175, 'Assomption de la Sainte Vierge', '2031-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(176, 'Toussaint', '2031-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(177, 'Noël', '2031-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(178, 'Pâque', '2031-04-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(179, 'Lundi de Pâque', '2031-04-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(180, 'Ascension', '2031-05-22', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(181, 'Pentecôte', '2031-06-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(182, 'Lundi de Pentecôte', '2031-06-02', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(183, 'Nouvel an', '2032-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(184, 'Journée internationale de la femme', '2032-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(185, 'Commémoration 1947', '2032-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(186, 'Fête du Travail', '2032-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(187, 'Fête de l\'independance', '2032-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(188, 'Assomption de la Sainte Vierge', '2032-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(189, 'Toussaint', '2032-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(190, 'Noël', '2032-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(191, 'Pâque', '2032-03-28', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(192, 'Lundi de Pâque', '2032-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(193, 'Ascension', '2032-05-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(194, 'Pentecôte', '2032-05-16', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(195, 'Lundi de Pentecôte', '2032-05-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(196, 'Nouvel an', '2033-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(197, 'Journée internationale de la femme', '2033-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(198, 'Commémoration 1947', '2033-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(199, 'Fête du Travail', '2033-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(200, 'Fête de l\'independance', '2033-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(201, 'Assomption de la Sainte Vierge', '2033-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(202, 'Toussaint', '2033-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(203, 'Noël', '2033-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(204, 'Pâque', '2033-04-17', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(205, 'Lundi de Pâque', '2033-04-18', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(206, 'Ascension', '2033-05-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(207, 'Pentecôte', '2033-06-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(208, 'Lundi de Pentecôte', '2033-06-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(209, 'Nouvel an', '2034-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(210, 'Journée internationale de la femme', '2034-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(211, 'Commémoration 1947', '2034-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(212, 'Fête du Travail', '2034-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(213, 'Fête de l\'independance', '2034-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(214, 'Assomption de la Sainte Vierge', '2034-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(215, 'Toussaint', '2034-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(216, 'Noël', '2034-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(217, 'Pâque', '2034-04-09', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(218, 'Lundi de Pâque', '2034-04-10', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(219, 'Ascension', '2034-05-18', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(220, 'Pentecôte', '2034-05-28', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(221, 'Lundi de Pentecôte', '2034-05-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(222, 'Nouvel an', '2035-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(223, 'Journée internationale de la femme', '2035-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(224, 'Commémoration 1947', '2035-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(225, 'Fête du Travail', '2035-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(226, 'Fête de l\'independance', '2035-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(227, 'Assomption de la Sainte Vierge', '2035-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(228, 'Toussaint', '2035-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(229, 'Noël', '2035-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(230, 'Pâque', '2035-03-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(231, 'Lundi de Pâque', '2035-03-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(232, 'Ascension', '2035-05-03', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(233, 'Pentecôte', '2035-05-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(234, 'Lundi de Pentecôte', '2035-05-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(235, 'Nouvel an', '2036-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(236, 'Journée internationale de la femme', '2036-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(237, 'Commémoration 1947', '2036-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(238, 'Fête du Travail', '2036-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(239, 'Fête de l\'independance', '2036-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(240, 'Assomption de la Sainte Vierge', '2036-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(241, 'Toussaint', '2036-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(242, 'Noël', '2036-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(243, 'Pâque', '2036-04-13', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(244, 'Lundi de Pâque', '2036-04-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(245, 'Ascension', '2036-05-22', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(246, 'Pentecôte', '2036-06-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(247, 'Lundi de Pentecôte', '2036-06-02', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(248, 'Nouvel an', '2037-01-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(249, 'Journée internationale de la femme', '2037-03-08', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(250, 'Commémoration 1947', '2037-03-29', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(251, 'Fête du Travail', '2037-05-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(252, 'Fête de l\'independance', '2037-06-26', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(253, 'Assomption de la Sainte Vierge', '2037-08-15', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(254, 'Toussaint', '2037-11-01', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(255, 'Noël', '2037-12-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(256, 'Pâque', '2037-04-05', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(257, 'Lundi de Pâque', '2037-04-06', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(258, 'Ascension', '2037-05-14', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(259, 'Pentecôte', '2037-05-24', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white'),
(260, 'Lundi de Pentecôte', '2037-05-25', 'false', 'rgb(255, 59, 94)', 'rgb(255, 59, 94)', 'white');

-- --------------------------------------------------------

--
-- Table structure for table `ldap`
--

CREATE TABLE `ldap` (
  `ldap` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ldap`
--

INSERT INTO `ldap` (`ldap`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `lieu`
--

CREATE TABLE `lieu` (
  `idLieu` int(11) NOT NULL,
  `codeAgence` int(5) UNSIGNED ZEROFILL NOT NULL,
  `agences` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `codeAgence`, `agences`) VALUES
(1, 00001, 'BNI ANALAKELY'),
(2, 00002, 'BNI ANTSAHAVOLA'),
(3, 00003, 'BNI ANDRAVOAHANGY'),
(4, 00004, 'BNI ANTSAKAVIRO'),
(5, 00005, 'BNI 67 HA'),
(6, 00006, 'BNI GALAXY ANDRAHARO'),
(7, 00007, 'BNI ZENITH ANKORONDRANO'),
(8, 00008, 'BNI TANJOMBATO'),
(9, 00009, 'BNI IMERINAFOVOANY'),
(10, 00010, 'BNI BEHORIRIKA'),
(11, 00011, 'BNI AMPASAMPITO'),
(12, 00012, 'BNI ANALAMAHITSY'),
(13, 00013, 'BNI AMBATONDRAZAKA'),
(14, 00014, 'BNI ANTALAHA'),
(15, 00015, 'BNI ANTSIRABE'),
(16, 00016, 'BNI ANTSIRANANA'),
(17, 00017, 'BNI TOLAGNARO'),
(18, 00018, 'BNI MAHAJANGA'),
(19, 00019, 'BNI NOSY BE'),
(20, 00020, 'BNI TOAMASINA'),
(21, 00021, 'BNI ANTSOHIHY'),
(22, 00022, 'BNI AMBANJA'),
(23, 00023, 'BNI AMBATOLAMPY'),
(24, 00024, 'BNI FARAFANGANA'),
(25, 00025, 'BNI FENERIVE EST'),
(26, 00026, 'BNI SAMBAVA'),
(27, 00027, 'BNI MANAKARA'),
(28, 00028, 'BNI MANANJARY'),
(29, 00029, 'BNI MORONDAVA'),
(30, 00030, 'BNI IHOSY'),
(31, 00031, 'BNI ANDAPA'),
(32, 00032, 'BNI AMBILOBE'),
(33, 00033, 'BNI VOHEMAR'),
(34, 00034, 'BNI TANAMBE'),
(35, 00035, 'BNI AMBOHIMENA'),
(36, 00036, 'BNI AMPASAMBAZAHA'),
(37, 00037, 'BNI STREAM LINER TOAMASINA'),
(38, 00038, 'BNI MAINTIRANO'),
(39, 00039, 'BNI TSIROANOMANDIDY'),
(40, 00041, 'BNI TOLIARA'),
(41, 00042, 'BNI PORT- BERGE'),
(42, 00043, 'BNI MORAMANGA'),
(43, 00044, 'BNI'),
(44, 00045, 'BNI ILAKAKA'),
(45, 00046, 'BNI AMBALAVAO'),
(46, 00047, 'BNI MAROANTSETRA'),
(47, 00048, 'BNI MIARINARIVO'),
(48, 00049, 'BNI MAHITSY'),
(49, 00050, 'BNI AMBOSITRA'),
(50, 00052, 'BNI FIANARANTSOA'),
(51, 00053, 'BNI AMPARAFARAVOLA'),
(52, 00054, 'BNI ANKARANA DIEGO II'),
(53, 00055, 'BNI TULEAR SANFILY'),
(54, 00056, 'BNI MAHANORO'),
(55, 00057, 'BNI MAMPIKONY'),
(56, 00058, 'BNI BRICKAVILLE'),
(57, 00059, 'BNI MAROVOAY'),
(58, 00060, 'BNI VATOMANDRY'),
(59, 00061, 'BNI SOANIERANA-IVONGO'),
(60, 00062, 'BNI  ANTANIMASAJA MAJUNGA 3'),
(61, 00063, 'BNI NOSY BE LE MALL'),
(62, 00064, 'BNI MAEVATANANA'),
(63, 00065, 'BNI AMBANIDIA'),
(64, 00066, 'BNI ANOSIZATO'),
(65, 00067, 'BNI TSARALALANA'),
(66, 00068, 'BNI AMBONDRONA'),
(67, 00069, 'BNI MAHAMASINA'),
(68, 00070, 'BNI ITAOSY'),
(69, 00071, 'BNI TSIMBAZAZA'),
(70, 00072, 'BNI AMPITATAFIKA'),
(71, 00073, 'BNI AMBOHIMIANDRA'),
(72, 00074, 'BNI IVANDRY'),
(73, 00075, 'BNI 67 HA NORD'),
(74, 00076, 'BNI AMBOHIPO'),
(75, 00077, 'BNI ANDOHARANOFOTSY'),
(76, 00078, 'BNI MAJUNGA TSARAMANDROSO'),
(77, 00079, 'BNI TOAMASINA BAZARY KELY'),
(78, 00080, 'BNI AKOOR DIGUE'),
(79, 00081, 'BNI AMPEFILOHA'),
(80, 00082, 'BNI ANOSIMASINA'),
(81, 00083, 'BNI AMBODIVONA'),
(82, 00084, 'BNI SABOTSY NAMEHANA'),
(83, 00085, 'BNI ANOSIBE'),
(84, 00086, 'BNI ARCADE'),
(85, 00087, 'BNI IVATO'),
(86, 00088, 'BNI AMBATOBE'),
(87, 00089, 'BNI ECOLE MAHAMASINA'),
(88, 00090, 'BNI ANTANINARENINA'),
(89, 00091, 'BNI MAHAZO'),
(90, 00092, 'BNI ANDREFANA/RY'),
(91, 00093, 'BNI ANTANIMENA'),
(92, 00094, 'BNI AMBOHIMANARINA'),
(93, 00095, 'BNI AMBOHIBAO'),
(94, 00096, 'BNI ZENITH PREMIUM'),
(95, 00097, 'BNI CAE TANA'),
(96, 00098, 'BNI CAE TAMATAVE'),
(97, 00099, 'BNI CARTE MVOLA'),
(98, 00189, 'BNI'),
(99, 90000, 'BNI SIEGE'),
(100, 90001, 'BNI_DGE_ZENITH'),
(101, 90002, 'BNI_DMI_ZENITH'),
(102, 90003, 'BNI_DMC_SIEGE'),
(103, 90004, 'BNI_DAOI_ZENITH'),
(104, 90005, 'BNI_CAE_TOAMASINA'),
(105, 90340, 'BNI SIEGE SPOTY'),
(106, 91000, 'BNI_CAE_ZENITH'),
(107, 95000, 'BNI KRED'),
(108, 99999, 'SITE CENTRAL');

-- --------------------------------------------------------

--
-- Table structure for table `pj_traitement`
--

CREATE TABLE `pj_traitement` (
  `idPj` int(11) NOT NULL,
  `pj` varchar(250) NOT NULL,
  `idTicket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `idProfil` int(11) NOT NULL,
  `profile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`idProfil`, `profile`) VALUES
(1, 'Directeur Juridique'),
(2, 'Senior'),
(3, 'Junior'),
(4, 'Demandeur'),
(5, 'Administrateur'),
(6, 'Observateur');

-- --------------------------------------------------------

--
-- Table structure for table `tache`
--

CREATE TABLE `tache` (
  `idTache` int(11) NOT NULL,
  `tache` varchar(100) NOT NULL,
  `delai` int(11) NOT NULL,
  `cotation` varchar(40) NOT NULL COMMENT 'Bas, Moyen, Difficile, Complexe, Assistance externe	',
  `idCategorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tache`
--

INSERT INTO `tache` (`idTache`, `tache`, `delai`, `cotation`, `idCategorie`) VALUES
(1, 'Analyse', 1, 'Bas', 1),
(2, 'Consultation texte', 2, 'Bas', 1),
(3, 'Demande d\'information complexe', 1, 'Bas', 1),
(4, 'Demande d\'information simple', 1, 'Bas', 1),
(5, 'intervention div.', 5, 'Bas', 1),
(6, 'Avis technique', 2, 'Bas', 2),
(7, 'Élaboration rédaction spécifique', 20, 'Bas', 2),
(8, 'Élaboration rédaction standard ', 5, 'Bas', 2),
(9, 'Refonte', 15, 'Bas', 2),
(10, 'Révision', 2, 'Bas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `idDemande` int(11) DEFAULT NULL,
  `idTache` int(11) DEFAULT NULL,
  `saisisseur` int(11) DEFAULT NULL,
  `demandeur` int(11) DEFAULT NULL,
  `valideur` int(11) DEFAULT NULL,
  `valideRemarque` int(11) DEFAULT NULL,
  `statutTicket` varchar(20) DEFAULT NULL,
  `numTicket` varchar(55) NOT NULL,
  `motif` text DEFAULT NULL,
  `traitement` longtext DEFAULT NULL,
  `revision` text DEFAULT NULL COMMENT 'Remarque du directeur ou senior',
  `dateReception` datetime DEFAULT NULL COMMENT 'Date de réception de la demande par les Juristes ',
  `dateEncours` datetime DEFAULT NULL,
  `dateAvantValidation` datetime DEFAULT NULL,
  `dateRevise` datetime DEFAULT NULL,
  `dateTermine` datetime DEFAULT NULL,
  `dateRefus` datetime DEFAULT NULL,
  `dateAbandon` datetime DEFAULT NULL,
  `dateFaq` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`idTicket`, `idDemande`, `idTache`, `saisisseur`, `demandeur`, `valideur`, `valideRemarque`, `statutTicket`, `numTicket`, `motif`, `traitement`, `revision`, `dateReception`, `dateEncours`, `dateAvantValidation`, `dateRevise`, `dateTermine`, `dateRefus`, `dateAbandon`, `dateFaq`) VALUES
(1, 1, 1, 6, 7, NULL, NULL, 'Terminé', 'TIK-JUR-00000000001', NULL, NULL, NULL, '2020-05-19 11:21:58', '2020-05-19 13:39:44', '2020-05-19 13:40:43', NULL, '2020-05-19 13:41:13', NULL, NULL, NULL),
(2, 2, NULL, NULL, 7, NULL, NULL, 'Abandonné', 'TIK-JUR-00000000002', 'aaaaaaaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 13:55:16', NULL),
(3, 5, NULL, 5, NULL, NULL, NULL, 'Faq', 'TIK-JUR-00000000003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-19 13:56:45'),
(4, 4, 2, 5, 7, NULL, NULL, 'Abandonné', 'TIK-JUR-00000000004', 'aezaea ', '<p>qqqqqqqqqqqqqqq</p>\r\n', NULL, '2020-05-19 13:57:01', '2020-05-19 13:58:26', NULL, NULL, NULL, NULL, '2020-05-19 14:00:13', NULL),
(5, 3, 6, 6, 7, NULL, NULL, 'Terminé', 'TIK-JUR-00000000005', NULL, '<p>aaaaaa</p>\r\n', NULL, '2020-05-19 13:57:13', '2020-05-19 14:48:16', '2020-05-20 08:49:21', NULL, '2020-05-20 08:57:48', NULL, NULL, NULL),
(6, 6, 2, 6, 7, NULL, NULL, 'Terminé', 'TIK-JUR-00000000006', NULL, '<p>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</p>\r\n', 'aaaaaaaaaaaaaaa', '2020-05-20 09:11:39', '2020-05-20 09:11:45', '2020-05-20 09:11:51', '2020-05-20 09:11:56', '2020-05-20 09:18:19', NULL, NULL, NULL),
(7, 9, 10, NULL, 7, NULL, NULL, 'Reçu', 'TIK-JUR-00000000007', NULL, NULL, NULL, '2020-05-18 14:30:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 8, 1, 5, 7, NULL, NULL, 'Encours', 'TIK-JUR-00000000008', NULL, NULL, NULL, '2020-05-19 14:31:17', '2020-09-08 10:29:48', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 7, 9, 5, 7, NULL, NULL, 'Encours', 'TIK-JUR-00000000009', NULL, NULL, NULL, '2020-05-19 14:31:28', '2020-09-07 18:34:44', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 14, 6, NULL, 7, NULL, NULL, 'Reçu', 'TIK-JUR-00000000010', NULL, NULL, NULL, '2020-09-08 10:55:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 14, 1, 5, 7, NULL, NULL, 'Encours', 'TIK-JUR-00000000011', NULL, NULL, NULL, '2020-09-08 10:57:11', '2020-09-08 11:00:04', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 14, NULL, 5, 7, NULL, NULL, 'Refusé', 'TIK-JUR-00000000012', '45513122221\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-08 10:59:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `matricule` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `agence` int(11) DEFAULT NULL,
  `direction` varchar(150) NOT NULL,
  `unite` varchar(200) NOT NULL,
  `poste` varchar(250) NOT NULL,
  `statutCompte` varchar(10) NOT NULL,
  `profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `matricule`, `email`, `agence`, `direction`, `unite`, `poste`, `statutCompte`, `profil`) VALUES
(1, 'RAVOAHANGINIAINA', 'Cedrick Henintsoa', 7165, 'cedrick.Ravohanginiaina@bni.mg', 99, 'DRJC-PRO', 'Projet', 'Stagiaire', 'Activé', 5),
(2, 'RAZAFINDRAKOTO', 'Chantal Hantanirina', 4336, 'hantanirina.razafindrakoto@bni.mg', 99, 'DRJC-PRO', 'Projet', 'Responsable Gestion de Projets (PRO)', 'Activé', 5),
(3, 'RAZAFINDRANAIVO', 'Andry Harifetra', 4629, 'fetra.razafindranaivo@bni.mg', 99, 'DRJC-PRO', 'Projet', 'Chargé Business Intelligence et Data Miner', 'Activé', 5),
(4, 'RANAIVO', 'Solomamy Giannie', 4845, 'Giannie.RANAIVO@bni.mg', 99, 'DRJC-JCSF', 'Juridique', 'Directeur Juridique', 'Activé', 1),
(5, 'RAKOTONIRINA', 'Miora', 4152, 'Miora.Rakotonirina@bni.mg', 99, 'DRJC-JCSF', 'Juridique', 'Juriste Senior', 'Activé', 2),
(6, 'RAKOTONARIVO', 'Hery Michel', 4694, 'Michel.RAKOTONARIVO@bni.mg', 99, 'DRJC-JCSF', 'Juridique', 'Juriste Senior', 'Activé', 2),
(7, 'Demandeur', 'Demandeur', 1111, 'demandeur@demandeur.dem', 5, 'Demande', 'Demande', 'Demande', 'Activé', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Indexes for table `conge`
--
ALTER TABLE `conge`
  ADD PRIMARY KEY (`idConge`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`idDemande`),
  ADD KEY `fk_demande_utilisateur` (`envoyeur`);

--
-- Indexes for table `ferie`
--
ALTER TABLE `ferie`
  ADD PRIMARY KEY (`idFerie`);

--
-- Indexes for table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`idLieu`);

--
-- Indexes for table `pj_traitement`
--
ALTER TABLE `pj_traitement`
  ADD PRIMARY KEY (`idPj`),
  ADD KEY `fk_Pj_Ticket` (`idTicket`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idProfil`);

--
-- Indexes for table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`idTache`),
  ADD KEY `fk_tache_categorie` (`idCategorie`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `fk_ticket_utilisateur` (`saisisseur`),
  ADD KEY `fk_ticket_tache` (`idTache`),
  ADD KEY `fk_ticket_demande` (`idDemande`),
  ADD KEY `fk_ticket_utilisateur2` (`demandeur`),
  ADD KEY `demandeur` (`demandeur`),
  ADD KEY `valideur` (`valideur`),
  ADD KEY `fk_ticket_utilisateur4` (`valideRemarque`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD KEY `fk_utilsateur_profil` (`profil`),
  ADD KEY `fk_utilsateur_lieu` (`agence`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `conge`
--
ALTER TABLE `conge`
  MODIFY `idConge` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `idDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ferie`
--
ALTER TABLE `ferie`
  MODIFY `idFerie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `idLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `pj_traitement`
--
ALTER TABLE `pj_traitement`
  MODIFY `idPj` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tache`
--
ALTER TABLE `tache`
  MODIFY `idTache` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `fk_demande_utilisateur` FOREIGN KEY (`envoyeur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `pj_traitement`
--
ALTER TABLE `pj_traitement`
  ADD CONSTRAINT `fk_Pj_Ticket` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`);

--
-- Constraints for table `tache`
--
ALTER TABLE `tache`
  ADD CONSTRAINT `fk_tache_categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_demande` FOREIGN KEY (`idDemande`) REFERENCES `demande` (`idDemande`),
  ADD CONSTRAINT `fk_ticket_tache` FOREIGN KEY (`idTache`) REFERENCES `tache` (`idTache`),
  ADD CONSTRAINT `fk_ticket_utilisateur1` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `fk_ticket_utilisateur2` FOREIGN KEY (`demandeur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `fk_ticket_utilisateur3` FOREIGN KEY (`valideur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `fk_ticket_utilisateur4` FOREIGN KEY (`valideRemarque`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilsateur_lieu` FOREIGN KEY (`agence`) REFERENCES `lieu` (`idLieu`),
  ADD CONSTRAINT `fk_utilsateur_profil` FOREIGN KEY (`profil`) REFERENCES `profil` (`idProfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
