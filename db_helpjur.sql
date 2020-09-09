-- MySQL dump 10.14  Distrib 5.5.56-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_helpjur
-- ------------------------------------------------------
-- Server version	5.5.56-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie` varchar(100) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Avis et Consultation'),(2,'Contrat'),(4,'aaaaa');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conge`
--

DROP TABLE IF EXISTS `conge`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conge` (
  `idConge` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `editable` varchar(6) NOT NULL DEFAULT 'false ',
  `color` varchar(25) NOT NULL,
  `backgroundColor` varchar(25) NOT NULL,
  `textColor` varchar(25) NOT NULL DEFAULT 'white',
  PRIMARY KEY (`idConge`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conge`
--

LOCK TABLES `conge` WRITE;
/*!40000 ALTER TABLE `conge` DISABLE KEYS */;
INSERT INTO `conge` VALUES (1,'Congé : RAKOTONIRINA Miora','2020-07-31','2020-08-03','false ','rgb(255, 187, 51)','rgb(255, 187, 51)','white'),(2,'Congé : ','2020-07-29','2020-07-30','false ','rgb(51, 181, 229)','rgb(51, 181, 229)','white'),(3,'Congé : ','2020-07-29','2020-07-30','false ','rgb(51, 181, 229)','rgb(51, 181, 229)','white');
/*!40000 ALTER TABLE `conge` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demande`
--

DROP TABLE IF EXISTS `demande`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demande` (
  `idDemande` int(11) NOT NULL AUTO_INCREMENT,
  `dateDemande` datetime NOT NULL,
  `objet` text NOT NULL,
  `contenu` longtext NOT NULL,
  `fichier` varchar(250) DEFAULT NULL,
  `envoyeur` int(11) NOT NULL,
  `statutDemande` varchar(6) DEFAULT 'Envoyé',
  PRIMARY KEY (`idDemande`),
  KEY `fk_demande_utilisateur` (`envoyeur`),
  CONSTRAINT `fk_demande_utilisateur` FOREIGN KEY (`envoyeur`) REFERENCES `utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demande`
--

LOCK TABLES `demande` WRITE;
/*!40000 ALTER TABLE `demande` DISABLE KEYS */;
INSERT INTO `demande` VALUES (21,'2020-06-22 11:38:17','Demande d\'avis','<p>Bonjour,</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Demande d&#39;avis.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cordialement</p>\r\n','',7,'Reçu'),(22,'2020-06-22 14:20:47','Demande de correction','<p>Bonjour,</p>\r\n\r\n<p>jhggjhj bgdfgdfgdf</p>\r\n','',7,'Reçu'),(23,'2020-06-22 14:21:00','Demande d\'avis','<p>x&lt;wcw&lt;cw&lt;c</p>\r\n','',7,'Reçu'),(24,'2020-06-24 09:14:55','Test mail','<p>Bonjour,</p>\r\n\r\n<p>Ceci est un test.</p>\r\n\r\n<p>cordialement.</p>\r\n','',7,'Abando'),(25,'2020-06-24 09:17:12','Test mail 2','<p>eza</p>\r\n','',7,'Reçu'),(26,'2020-06-24 09:34:01','Test mail 3','<p>bonjour,</p>\r\n\r\n<p>ceci est encore un test.</p>\r\n','',7,'Abando'),(27,'2020-06-24 09:36:25','Test mail 4','<p>&amp;&amp;&amp;&amp;&amp;&amp;&amp;&amp;&amp;&amp;&amp;</p>\r\n','',7,'Abando'),(28,'2020-06-24 10:38:24','Test mail 5','<p>aeeza&nbsp;</p>\r\n\r\n<p>eazea</p>\r\n','',7,'Reçu'),(29,'2020-07-13 16:17:23','TEST mail Cedrick ','<p>ezaezaeza</p>\r\n','',7,'Reçu'),(30,'2020-07-14 11:29:34','Test mail 6','<p>eaeae</p>\r\n','',7,'Reçu'),(31,'2020-07-14 11:31:26','Test mail 7','<p>eazea</p>\r\n','',7,'Abando'),(32,'2020-07-14 11:33:51','Test mail 8, abandon demandeur','<p>eaeaeazazz</p>\r\n','',7,'Abando'),(33,'2020-07-16 15:01:09','Test : Demande','<p>Bonjour,</p>\r\n\r\n<p>Ceci est un test</p>\r\n\r\n<p>Cordialement,</p>\r\n','',7,'Reçu'),(34,'2020-07-16 15:01:47','Test 1 : Demande','<p>Bonjour,</p>\r\n\r\n<p>Ceci est un test.</p>\r\n\r\n<p>Cordialement</p>\r\n','',7,'Reçu'),(35,'2020-07-16 15:02:22','Test 2 : Demande','<p>Bonjour,</p>\r\n\r\n<p>Ceci est un test.</p>\r\n\r\n<p>Cordialement</p>\r\n','',7,'Reçu'),(36,'2020-07-16 15:02:43','Test 3 : Demande','<p>Bonjour,</p>\r\n\r\n<p>Ceci est un test.</p>\r\n\r\n<p>Cordialement</p>\r\n','',7,'Reçu'),(37,'2020-07-29 11:59:31','Test 3 : Demande','<p>Bonjour,</p>\r\n\r\n<p>Ceci est u test</p>\r\n\r\n<p>Cordialement.</p>\r\n','',7,'Reçu'),(38,'2020-07-29 11:59:59','Test 4 : Demande','<p>Bonjour,</p>\r\n\r\n<p>Ceci est un test.</p>\r\n\r\n<p>Cordialement</p>\r\n','',7,'Reçu'),(39,'2020-08-12 09:51:43','carte','<p>Bonjour!!!</p>\r\n','',7,'Reçu'),(40,'2020-08-17 12:02:21','Demande avis sur chèque','<p>Avis ch&egrave;que svp</p>\r\n','',7,'Reçu'),(41,'2020-08-24 16:27:55','Demande test','<p>Demande d&#39;avis svp</p>\r\n','',7,'Abando'),(42,'2020-09-01 14:59:55','test ggggggggggggg','<p>dddddddddddddddddddddd</p>\r\n\r\n<p>yhhhh</p>\r\n','',7,'Reçu'),(43,'2020-09-01 15:33:38','aaaaaaaaaaaaaa','<p>aaaaaaaaaaaaaa</p>\r\n','',7,'Reçu'),(44,'2020-09-01 16:16:59','eeeeeeeeeeeeee','<p>qqqqqqqqqqqq</p>\r\n','',7,'Reçu');
/*!40000 ALTER TABLE `demande` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ferie`
--

DROP TABLE IF EXISTS `ferie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ferie` (
  `idFerie` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `editable` varchar(6) NOT NULL DEFAULT 'false',
  `color` varchar(25) NOT NULL DEFAULT 'rgb(255, 59, 94)',
  `backgroundColor` varchar(25) NOT NULL DEFAULT 'rgb(255, 59, 94)',
  `textColor` varchar(25) NOT NULL DEFAULT 'white',
  PRIMARY KEY (`idFerie`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ferie`
--

LOCK TABLES `ferie` WRITE;
/*!40000 ALTER TABLE `ferie` DISABLE KEYS */;
INSERT INTO `ferie` VALUES (1,'Nouvel an','2018-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(2,'Journée internationale de la femme','2018-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(3,'Commémoration 1947','2018-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(4,'Fête du Travail','2018-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(5,'Fête de l\'independance','2018-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(6,'Assomption de la Sainte Vierge','2018-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(7,'Toussaint','2018-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(8,'Noël','2018-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(9,'Pâque','2018-04-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(10,'Lundi de Pâque','2018-04-02','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(11,'Ascension','2018-05-10','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(12,'Pentecôte','2018-05-20','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(13,'Lundi de Pentecôte','2018-05-21','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(14,'Nouvel an','2019-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(15,'Journée internationale de la femme','2019-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(16,'Commémoration 1947','2019-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(17,'Fête du Travail','2019-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(18,'Fête de l\'independance','2019-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(19,'Assomption de la Sainte Vierge','2019-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(20,'Toussaint','2019-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(21,'Noël','2019-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(22,'Pâque','2019-04-21','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(23,'Lundi de Pâque','2019-04-22','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(24,'Ascension','2019-05-30','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(25,'Pentecôte','2019-06-09','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(26,'Lundi de Pentecôte','2019-06-10','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(27,'Nouvel an','2020-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(28,'Journée internationale de la femme','2020-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(29,'Commémoration 1947','2020-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(30,'Fête du Travail','2020-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(31,'Fête de l\'independance','2020-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(32,'Assomption de la Sainte Vierge','2020-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(33,'Toussaint','2020-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(34,'Noël','2020-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(35,'Pâque','2020-04-12','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(36,'Lundi de Pâque','2020-04-13','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(37,'Ascension','2020-05-21','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(38,'Pentecôte','2020-05-31','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(39,'Lundi de Pentecôte','2020-06-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(40,'Nouvel an','2021-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(41,'Journée internationale de la femme','2021-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(42,'Commémoration 1947','2021-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(43,'Fête du Travail','2021-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(44,'Fête de l\'independance','2021-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(45,'Assomption de la Sainte Vierge','2021-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(46,'Toussaint','2021-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(47,'Noël','2021-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(48,'Pâque','2021-04-04','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(49,'Lundi de Pâque','2021-04-05','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(50,'Ascension','2021-05-13','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(51,'Pentecôte','2021-05-23','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(52,'Lundi de Pentecôte','2021-05-24','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(53,'Nouvel an','2022-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(54,'Journée internationale de la femme','2022-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(55,'Commémoration 1947','2022-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(56,'Fête du Travail','2022-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(57,'Fête de l\'independance','2022-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(58,'Assomption de la Sainte Vierge','2022-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(59,'Toussaint','2022-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(60,'Noël','2022-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(61,'Pâque','2022-04-17','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(62,'Lundi de Pâque','2022-04-18','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(63,'Ascension','2022-05-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(64,'Pentecôte','2022-06-05','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(65,'Lundi de Pentecôte','2022-06-06','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(66,'Nouvel an','2023-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(67,'Journée internationale de la femme','2023-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(68,'Commémoration 1947','2023-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(69,'Fête du Travail','2023-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(70,'Fête de l\'independance','2023-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(71,'Assomption de la Sainte Vierge','2023-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(72,'Toussaint','2023-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(73,'Noël','2023-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(74,'Pâque','2023-04-09','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(75,'Lundi de Pâque','2023-04-10','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(76,'Ascension','2023-05-18','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(77,'Pentecôte','2023-05-28','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(78,'Lundi de Pentecôte','2023-05-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(79,'Nouvel an','2024-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(80,'Journée internationale de la femme','2024-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(81,'Commémoration 1947','2024-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(82,'Fête du Travail','2024-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(83,'Fête de l\'independance','2024-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(84,'Assomption de la Sainte Vierge','2024-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(85,'Toussaint','2024-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(86,'Noël','2024-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(87,'Pâque','2024-03-31','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(88,'Lundi de Pâque','2024-04-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(89,'Ascension','2024-05-09','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(90,'Pentecôte','2024-05-19','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(91,'Lundi de Pentecôte','2024-05-20','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(92,'Nouvel an','2025-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(93,'Journée internationale de la femme','2025-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(94,'Commémoration 1947','2025-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(95,'Fête du Travail','2025-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(96,'Fête de l\'independance','2025-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(97,'Assomption de la Sainte Vierge','2025-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(98,'Toussaint','2025-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(99,'Noël','2025-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(100,'Pâque','2025-04-20','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(101,'Lundi de Pâque','2025-04-21','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(102,'Ascension','2025-05-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(103,'Pentecôte','2025-06-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(104,'Lundi de Pentecôte','2025-06-09','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(105,'Nouvel an','2026-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(106,'Journée internationale de la femme','2026-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(107,'Commémoration 1947','2026-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(108,'Fête du Travail','2026-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(109,'Fête de l\'independance','2026-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(110,'Assomption de la Sainte Vierge','2026-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(111,'Toussaint','2026-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(112,'Noël','2026-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(113,'Pâque','2026-04-05','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(114,'Lundi de Pâque','2026-04-06','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(115,'Ascension','2026-05-14','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(116,'Pentecôte','2026-05-24','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(117,'Lundi de Pentecôte','2026-05-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(118,'Nouvel an','2027-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(119,'Journée internationale de la femme','2027-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(120,'Commémoration 1947','2027-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(121,'Fête du Travail','2027-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(122,'Fête de l\'independance','2027-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(123,'Assomption de la Sainte Vierge','2027-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(124,'Toussaint','2027-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(125,'Noël','2027-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(126,'Pâque','2027-03-28','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(127,'Lundi de Pâque','2027-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(128,'Ascension','2027-05-06','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(129,'Pentecôte','2027-05-16','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(130,'Lundi de Pentecôte','2027-05-17','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(131,'Nouvel an','2028-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(132,'Journée internationale de la femme','2028-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(133,'Commémoration 1947','2028-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(134,'Fête du Travail','2028-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(135,'Fête de l\'independance','2028-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(136,'Assomption de la Sainte Vierge','2028-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(137,'Toussaint','2028-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(138,'Noël','2028-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(139,'Pâque','2028-04-16','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(140,'Lundi de Pâque','2028-04-17','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(141,'Ascension','2028-05-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(142,'Pentecôte','2028-06-04','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(143,'Lundi de Pentecôte','2028-06-05','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(144,'Nouvel an','2029-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(145,'Journée internationale de la femme','2029-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(146,'Commémoration 1947','2029-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(147,'Fête du Travail','2029-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(148,'Fête de l\'independance','2029-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(149,'Assomption de la Sainte Vierge','2029-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(150,'Toussaint','2029-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(151,'Noël','2029-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(152,'Pâque','2029-04-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(153,'Lundi de Pâque','2029-04-02','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(154,'Ascension','2029-05-10','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(155,'Pentecôte','2029-05-20','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(156,'Lundi de Pentecôte','2029-05-21','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(157,'Nouvel an','2030-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(158,'Journée internationale de la femme','2030-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(159,'Commémoration 1947','2030-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(160,'Fête du Travail','2030-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(161,'Fête de l\'independance','2030-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(162,'Assomption de la Sainte Vierge','2030-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(163,'Toussaint','2030-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(164,'Noël','2030-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(165,'Pâque','2030-04-21','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(166,'Lundi de Pâque','2030-04-22','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(167,'Ascension','2030-05-30','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(168,'Pentecôte','2030-06-09','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(169,'Lundi de Pentecôte','2030-06-10','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(170,'Nouvel an','2031-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(171,'Journée internationale de la femme','2031-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(172,'Commémoration 1947','2031-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(173,'Fête du Travail','2031-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(174,'Fête de l\'independance','2031-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(175,'Assomption de la Sainte Vierge','2031-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(176,'Toussaint','2031-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(177,'Noël','2031-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(178,'Pâque','2031-04-13','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(179,'Lundi de Pâque','2031-04-14','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(180,'Ascension','2031-05-22','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(181,'Pentecôte','2031-06-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(182,'Lundi de Pentecôte','2031-06-02','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(183,'Nouvel an','2032-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(184,'Journée internationale de la femme','2032-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(185,'Commémoration 1947','2032-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(186,'Fête du Travail','2032-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(187,'Fête de l\'independance','2032-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(188,'Assomption de la Sainte Vierge','2032-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(189,'Toussaint','2032-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(190,'Noël','2032-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(191,'Pâque','2032-03-28','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(192,'Lundi de Pâque','2032-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(193,'Ascension','2032-05-06','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(194,'Pentecôte','2032-05-16','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(195,'Lundi de Pentecôte','2032-05-17','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(196,'Nouvel an','2033-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(197,'Journée internationale de la femme','2033-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(198,'Commémoration 1947','2033-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(199,'Fête du Travail','2033-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(200,'Fête de l\'independance','2033-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(201,'Assomption de la Sainte Vierge','2033-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(202,'Toussaint','2033-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(203,'Noël','2033-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(204,'Pâque','2033-04-17','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(205,'Lundi de Pâque','2033-04-18','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(206,'Ascension','2033-05-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(207,'Pentecôte','2033-06-05','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(208,'Lundi de Pentecôte','2033-06-06','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(209,'Nouvel an','2034-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(210,'Journée internationale de la femme','2034-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(211,'Commémoration 1947','2034-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(212,'Fête du Travail','2034-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(213,'Fête de l\'independance','2034-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(214,'Assomption de la Sainte Vierge','2034-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(215,'Toussaint','2034-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(216,'Noël','2034-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(217,'Pâque','2034-04-09','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(218,'Lundi de Pâque','2034-04-10','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(219,'Ascension','2034-05-18','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(220,'Pentecôte','2034-05-28','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(221,'Lundi de Pentecôte','2034-05-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(222,'Nouvel an','2035-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(223,'Journée internationale de la femme','2035-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(224,'Commémoration 1947','2035-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(225,'Fête du Travail','2035-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(226,'Fête de l\'independance','2035-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(227,'Assomption de la Sainte Vierge','2035-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(228,'Toussaint','2035-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(229,'Noël','2035-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(230,'Pâque','2035-03-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(231,'Lundi de Pâque','2035-03-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(232,'Ascension','2035-05-03','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(233,'Pentecôte','2035-05-13','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(234,'Lundi de Pentecôte','2035-05-14','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(235,'Nouvel an','2036-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(236,'Journée internationale de la femme','2036-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(237,'Commémoration 1947','2036-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(238,'Fête du Travail','2036-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(239,'Fête de l\'independance','2036-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(240,'Assomption de la Sainte Vierge','2036-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(241,'Toussaint','2036-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(242,'Noël','2036-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(243,'Pâque','2036-04-13','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(244,'Lundi de Pâque','2036-04-14','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(245,'Ascension','2036-05-22','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(246,'Pentecôte','2036-06-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(247,'Lundi de Pentecôte','2036-06-02','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(248,'Nouvel an','2037-01-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(249,'Journée internationale de la femme','2037-03-08','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(250,'Commémoration 1947','2037-03-29','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(251,'Fête du Travail','2037-05-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(252,'Fête de l\'independance','2037-06-26','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(253,'Assomption de la Sainte Vierge','2037-08-15','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(254,'Toussaint','2037-11-01','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(255,'Noël','2037-12-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(256,'Pâque','2037-04-05','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(257,'Lundi de Pâque','2037-04-06','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(258,'Ascension','2037-05-14','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(259,'Pentecôte','2037-05-24','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white'),(260,'Lundi de Pentecôte','2037-05-25','false','rgb(255, 59, 94)','rgb(255, 59, 94)','white');
/*!40000 ALTER TABLE `ferie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ldap`
--

DROP TABLE IF EXISTS `ldap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ldap` (
  `ldap` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ldap`
--

LOCK TABLES `ldap` WRITE;
/*!40000 ALTER TABLE `ldap` DISABLE KEYS */;
INSERT INTO `ldap` VALUES (1);
/*!40000 ALTER TABLE `ldap` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lieu` (
  `idLieu` int(11) NOT NULL AUTO_INCREMENT,
  `codeAgence` int(5) unsigned zerofill NOT NULL,
  `agences` varchar(150) NOT NULL,
  PRIMARY KEY (`idLieu`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lieu`
--

LOCK TABLES `lieu` WRITE;
/*!40000 ALTER TABLE `lieu` DISABLE KEYS */;
INSERT INTO `lieu` VALUES (1,00001,'BNI ANALAKELY'),(2,00002,'BNI ANTSAHAVOLA'),(3,00003,'BNI ANDRAVOAHANGY'),(4,00004,'BNI ANTSAKAVIRO'),(5,00005,'BNI 67 HA'),(6,00006,'BNI GALAXY ANDRAHARO'),(7,00007,'BNI ZENITH ANKORONDRANO'),(8,00008,'BNI TANJOMBATO'),(9,00009,'BNI IMERINAFOVOANY'),(10,00010,'BNI BEHORIRIKA'),(11,00011,'BNI AMPASAMPITO'),(12,00012,'BNI ANALAMAHITSY'),(13,00013,'BNI AMBATONDRAZAKA'),(14,00014,'BNI ANTALAHA'),(15,00015,'BNI ANTSIRABE'),(16,00016,'BNI ANTSIRANANA'),(17,00017,'BNI TOLAGNARO'),(18,00018,'BNI MAHAJANGA'),(19,00019,'BNI NOSY BE'),(20,00020,'BNI TOAMASINA'),(21,00021,'BNI ANTSOHIHY'),(22,00022,'BNI AMBANJA'),(23,00023,'BNI AMBATOLAMPY'),(24,00024,'BNI FARAFANGANA'),(25,00025,'BNI FENERIVE EST'),(26,00026,'BNI SAMBAVA'),(27,00027,'BNI MANAKARA'),(28,00028,'BNI MANANJARY'),(29,00029,'BNI MORONDAVA'),(30,00030,'BNI IHOSY'),(31,00031,'BNI ANDAPA'),(32,00032,'BNI AMBILOBE'),(33,00033,'BNI VOHEMAR'),(34,00034,'BNI TANAMBE'),(35,00035,'BNI AMBOHIMENA'),(36,00036,'BNI AMPASAMBAZAHA'),(37,00037,'BNI STREAM LINER TOAMASINA'),(38,00038,'BNI MAINTIRANO'),(39,00039,'BNI TSIROANOMANDIDY'),(40,00041,'BNI TOLIARA'),(41,00042,'BNI PORT- BERGE'),(42,00043,'BNI MORAMANGA'),(43,00044,'BNI'),(44,00045,'BNI ILAKAKA'),(45,00046,'BNI AMBALAVAO'),(46,00047,'BNI MAROANTSETRA'),(47,00048,'BNI MIARINARIVO'),(48,00049,'BNI MAHITSY'),(49,00050,'BNI AMBOSITRA'),(50,00052,'BNI FIANARANTSOA'),(51,00053,'BNI AMPARAFARAVOLA'),(52,00054,'BNI ANKARANA DIEGO II'),(53,00055,'BNI TULEAR SANFILY'),(54,00056,'BNI MAHANORO'),(55,00057,'BNI MAMPIKONY'),(56,00058,'BNI BRICKAVILLE'),(57,00059,'BNI MAROVOAY'),(58,00060,'BNI VATOMANDRY'),(59,00061,'BNI SOANIERANA-IVONGO'),(60,00062,'BNI  ANTANIMASAJA MAJUNGA 3'),(61,00063,'BNI NOSY BE LE MALL'),(62,00064,'BNI MAEVATANANA'),(63,00065,'BNI AMBANIDIA'),(64,00066,'BNI ANOSIZATO'),(65,00067,'BNI TSARALALANA'),(66,00068,'BNI AMBONDRONA'),(67,00069,'BNI MAHAMASINA'),(68,00070,'BNI ITAOSY'),(69,00071,'BNI TSIMBAZAZA'),(70,00072,'BNI AMPITATAFIKA'),(71,00073,'BNI AMBOHIMIANDRA'),(72,00074,'BNI IVANDRY'),(73,00075,'BNI 67 HA NORD'),(74,00076,'BNI AMBOHIPO'),(75,00077,'BNI ANDOHARANOFOTSY'),(76,00078,'BNI MAJUNGA TSARAMANDROSO'),(77,00079,'BNI TOAMASINA BAZARY KELY'),(78,00080,'BNI AKOOR DIGUE'),(79,00081,'BNI AMPEFILOHA'),(80,00082,'BNI ANOSIMASINA'),(81,00083,'BNI AMBODIVONA'),(82,00084,'BNI SABOTSY NAMEHANA'),(83,00085,'BNI ANOSIBE'),(84,00086,'BNI ARCADE'),(85,00087,'BNI IVATO'),(86,00088,'BNI AMBATOBE'),(87,00089,'BNI ECOLE MAHAMASINA'),(88,00090,'BNI ANTANINARENINA'),(89,00091,'BNI MAHAZO'),(90,00092,'BNI ANDREFANA/RY'),(91,00093,'BNI ANTANIMENA'),(92,00094,'BNI AMBOHIMANARINA'),(93,00095,'BNI AMBOHIBAO'),(94,00096,'BNI ZENITH PREMIUM'),(95,00097,'BNI CAE TANA'),(96,00098,'BNI CAE TAMATAVE'),(97,00099,'BNI CARTE MVOLA'),(98,00189,'BNI'),(99,90000,'BNI SIEGE'),(100,90001,'BNI_DGE_ZENITH'),(101,90002,'BNI_DMI_ZENITH'),(102,90003,'BNI_DMC_SIEGE'),(103,90004,'BNI_DAOI_ZENITH'),(104,90005,'BNI_CAE_TOAMASINA'),(105,90340,'BNI SIEGE SPOTY'),(106,91000,'BNI_CAE_ZENITH'),(107,95000,'BNI KRED'),(108,99999,'SITE CENTRAL');
/*!40000 ALTER TABLE `lieu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pj_traitement`
--

DROP TABLE IF EXISTS `pj_traitement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pj_traitement` (
  `idPj` int(11) NOT NULL AUTO_INCREMENT,
  `pj` varchar(250) NOT NULL,
  `idTicket` int(11) NOT NULL,
  PRIMARY KEY (`idPj`),
  KEY `fk_Pj_Ticket` (`idTicket`),
  CONSTRAINT `fk_Pj_Ticket` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pj_traitement`
--

LOCK TABLES `pj_traitement` WRITE;
/*!40000 ALTER TABLE `pj_traitement` DISABLE KEYS */;
/*!40000 ALTER TABLE `pj_traitement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profil` (
  `idProfil` int(11) NOT NULL AUTO_INCREMENT,
  `profile` varchar(20) NOT NULL,
  PRIMARY KEY (`idProfil`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (1,'Directeur Juridique'),(2,'Senior'),(3,'Junior'),(4,'Demandeur'),(5,'Administrateur'),(6,'Observateur');
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tache`
--

DROP TABLE IF EXISTS `tache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tache` (
  `idTache` int(11) NOT NULL AUTO_INCREMENT,
  `tache` varchar(100) NOT NULL,
  `delai` int(11) NOT NULL,
  `cotation` varchar(40) NOT NULL COMMENT 'Bas, Moyen, Difficile, Complexe, Assistance externe',
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idTache`),
  KEY `fk_tache_categorie` (`idCategorie`),
  CONSTRAINT `fk_tache_categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tache`
--

LOCK TABLES `tache` WRITE;
/*!40000 ALTER TABLE `tache` DISABLE KEYS */;
INSERT INTO `tache` VALUES (1,'Analyse',1,'Bas',1),(2,'Consultation texte',2,'Bas',1),(3,'Demande d\'information complexe',1,'Bas',1),(4,'Demande d\'information simple',1,'Bas',1),(5,'intervention div.',5,'Bas',1),(6,'Avis technique',2,'Bas',2),(7,'Élaboration rédaction spécifique',20,'Bas',2),(8,'Élaboration rédaction standard ',5,'Bas',2),(9,'Refonte',15,'Bas',2),(10,'Révision',2,'Bas',2),(11,'aaaaa ccccccccc',4,'Difficile',4);
/*!40000 ALTER TABLE `tache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `idDemande` int(11) DEFAULT NULL,
  `idTache` int(11) DEFAULT NULL,
  `saisisseur` int(11) DEFAULT NULL,
  `valideRemarque` int(11) DEFAULT NULL COMMENT 'Celui qui valide après la révision',
  `valideur` int(11) DEFAULT NULL,
  `demandeur` int(11) DEFAULT NULL,
  `statutTicket` varchar(20) DEFAULT NULL,
  `numTicket` varchar(55) NOT NULL,
  `motif` text,
  `traitement` longtext,
  `revision` text COMMENT 'Remarque du directeur ou senior',
  `dateReception` datetime DEFAULT NULL COMMENT 'Date de réception de la demande par les Juristes ',
  `dateEncours` datetime DEFAULT NULL,
  `dateAvantValidation` datetime DEFAULT NULL,
  `dateRevise` datetime DEFAULT NULL,
  `dateTermine` datetime DEFAULT NULL,
  `dateRefus` datetime DEFAULT NULL,
  `dateAbandon` datetime DEFAULT NULL,
  `dateFaq` datetime DEFAULT NULL,
  PRIMARY KEY (`idTicket`),
  KEY `fk_ticket_utilisateur` (`saisisseur`),
  KEY `fk_ticket_tache` (`idTache`),
  KEY `fk_ticket_demande` (`idDemande`),
  KEY `fk_ticket_utilisateur2` (`demandeur`),
  KEY `fk_ticket_utilisateur3` (`valideur`),
  KEY `fk_ticket_utilisateur4` (`valideRemarque`),
  CONSTRAINT `fk_ticket_demande` FOREIGN KEY (`idDemande`) REFERENCES `demande` (`idDemande`),
  CONSTRAINT `fk_ticket_tache` FOREIGN KEY (`idTache`) REFERENCES `tache` (`idTache`),
  CONSTRAINT `fk_ticket_utilisateur1` FOREIGN KEY (`saisisseur`) REFERENCES `utilisateur` (`idUtilisateur`),
  CONSTRAINT `fk_ticket_utilisateur2` FOREIGN KEY (`demandeur`) REFERENCES `utilisateur` (`idUtilisateur`),
  CONSTRAINT `fk_ticket_utilisateur3` FOREIGN KEY (`valideur`) REFERENCES `utilisateur` (`idUtilisateur`),
  CONSTRAINT `fk_ticket_utilisateur4` FOREIGN KEY (`valideRemarque`) REFERENCES `utilisateur` (`idUtilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (42,21,2,9,9,4,7,'Terminé','TIK-JUR-00000000001',NULL,'<p>Reponse JUR</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>En consultant le texte, sfsdfsdf</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>DJUR</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>sdfsdf sdfsdfsd sdffsdf</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><s>sdfsdfsdf</s></p>\r\n\r\n<p>&nbsp;</p>\r\n','qdqsd qsdqsdq qsdqsdq qsdqsdq','2020-06-22 11:40:06','2020-06-22 11:43:07','2020-06-22 11:43:34','2020-06-22 11:45:16','2020-06-22 14:14:15',NULL,NULL,NULL),(43,23,NULL,5,NULL,NULL,7,'Faq','TIK-JUR-00000000002',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-06-22 14:22:40'),(44,22,9,6,NULL,5,7,'Révisé','TIK-JUR-00000000003',NULL,'<p>Trait&eacute;</p>\r\n','Test remarque 1','2020-06-22 14:23:15','2020-06-22 14:23:55','2020-06-22 14:41:49','2020-07-24 12:31:45',NULL,NULL,NULL,NULL),(45,24,6,5,NULL,NULL,7,'Abandonné','TIK-JUR-00000000004','eazeaze',NULL,NULL,'2020-06-24 09:15:16',NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:21:46',NULL),(46,25,NULL,5,NULL,NULL,7,'Refusé','TIK-JUR-00000000005','dsqdsqdqsdq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-06-24 09:18:15',NULL,NULL),(47,26,2,4,NULL,NULL,7,'Abandonné','TIK-JUR-00000000006','dsqd qdqs dqsd',NULL,NULL,'2020-06-24 09:34:24',NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:22:13',NULL),(48,27,1,4,NULL,NULL,7,'Abandonné','TIK-JUR-00000000007','sd qsd qsdqsd qsds dsqd','<p>dqsdq de</p>\r\n',NULL,'2020-06-24 10:29:31','2020-07-14 11:23:47',NULL,NULL,NULL,NULL,'2020-07-14 11:24:02',NULL),(49,27,2,5,NULL,NULL,7,'Abandonné','TIK-JUR-00000000008','AAAAAAAAAAAAAAAAAAAAAAAAAA',NULL,NULL,'2020-06-24 10:30:46',NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:21:35',NULL),(50,28,7,5,NULL,NULL,7,'Abandonné','TIK-JUR-00000000009','aeaeazeza',NULL,NULL,'2020-06-24 10:38:44',NULL,NULL,NULL,NULL,NULL,'2020-07-14 10:59:13',NULL),(51,29,3,5,5,NULL,7,'Terminé','TIK-JUR-00000000010',NULL,'<p>Meti</p>\r\n',NULL,'2020-07-13 16:17:45','2020-07-13 16:20:39','2020-07-13 16:22:27',NULL,'2020-07-13 16:22:42',NULL,NULL,NULL),(52,27,NULL,NULL,NULL,NULL,5,'Abandonné','TIK-JUR-00000000011','test mandefa mail abandon',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:02:21',NULL),(53,27,NULL,NULL,NULL,NULL,5,'Abandonné','TIK-JUR-00000000012','ezaeaea ezae',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:03:56',NULL),(54,27,NULL,NULL,NULL,NULL,5,'Abandonné','TIK-JUR-00000000013','zaeae',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:04:08',NULL),(55,27,NULL,NULL,NULL,NULL,5,'Abandonné','TIK-JUR-00000000014','ezaeza',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:04:19',NULL),(56,27,NULL,NULL,NULL,NULL,5,'Abandonné','TIK-JUR-00000000015','aaa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:04:31',NULL),(57,26,NULL,NULL,NULL,NULL,5,'Abandonné','TIK-JUR-00000000016','sqfsqf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:07:20',NULL),(58,30,NULL,NULL,NULL,NULL,7,'Abandonné','TIK-JUR-00000000017','ezaea',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:29:39',NULL),(59,30,1,4,4,NULL,7,'Terminé','TIK-JUR-00000000018',NULL,'<p>ea ea daq edaeda</p>\r\n',NULL,'2020-07-14 11:30:28','2020-07-14 11:30:35',NULL,NULL,'2020-07-14 11:30:39',NULL,NULL,NULL),(60,31,2,5,NULL,NULL,7,'Abandonné','TIK-JUR-00000000019','eaea','<p>eaea</p>\r\n',NULL,'2020-07-14 11:31:43','2020-07-14 11:31:48',NULL,NULL,NULL,NULL,'2020-07-14 11:31:55',NULL),(61,32,NULL,NULL,NULL,NULL,7,'Abandonné','TIK-JUR-00000000020','sdqdsqdq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-14 11:39:24',NULL),(62,32,NULL,5,5,NULL,7,'Terminé','TIK-JUR-00000000021','Metiiiiii','<p>valid&eacute; test</p>\r\n',NULL,'2020-07-13 15:30:00','2020-07-24 12:29:58','2020-07-24 12:30:55',NULL,'2020-07-29 11:27:42',NULL,'2020-07-14 11:42:35',NULL),(63,33,NULL,5,NULL,NULL,7,'Faq','TIK-JUR-00000000022',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-24 12:32:34'),(65,35,NULL,5,NULL,NULL,7,'Faq','TIK-JUR-00000000023',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-29 11:40:03'),(66,34,4,5,5,NULL,7,'Terminé','TIK-JUR-00000000024',NULL,'<p>Test traitement</p>\r\n',NULL,'2020-07-29 11:40:27','2020-07-29 11:40:35','2020-07-29 11:41:12',NULL,'2020-07-29 11:41:37',NULL,NULL,NULL),(67,38,5,9,4,NULL,7,'Terminé','TIK-JUR-00000000025',NULL,'',NULL,'2020-08-04 13:49:45','2020-08-04 13:51:02','2020-08-04 13:52:13',NULL,'2020-08-21 12:00:44',NULL,NULL,NULL),(68,37,8,9,NULL,NULL,7,'Encours','TIK-JUR-00000000026',NULL,'<p>bvjhvhgjhg</p>\r\n',NULL,'2020-08-04 14:00:54','2020-09-01 15:35:31',NULL,NULL,NULL,NULL,NULL,NULL),(69,39,8,9,4,NULL,7,'Terminé','TIK-JUR-00000000027',NULL,'<p>Ok pour ce test</p>\r\n',NULL,'2020-08-12 09:58:08','2020-08-12 09:58:36','2020-08-12 10:06:44',NULL,'2020-08-12 10:08:30',NULL,NULL,NULL),(70,40,1,9,NULL,4,7,'Révisé','TIK-JUR-00000000028',NULL,'<p>Test definitif</p>\r\n','Avereno jerena','2020-08-21 11:53:26','2020-08-21 11:53:37','2020-08-21 11:56:23','2020-08-21 12:00:36',NULL,NULL,NULL,NULL),(71,39,7,9,5,NULL,7,'Terminé','TIK-JUR-00000000029',NULL,'<p>J&#39;ai trait&eacute; le contrat</p>\r\n',NULL,'2020-08-21 12:03:54','2020-08-21 12:04:04','2020-08-21 12:04:14',NULL,'2020-08-21 12:04:50',NULL,NULL,NULL),(72,41,1,9,NULL,NULL,7,'Abandonné','TIK-JUR-00000000030','fgfdshfdj',NULL,NULL,'2020-09-01 14:48:11',NULL,NULL,NULL,NULL,NULL,'2020-09-01 14:49:09',NULL),(73,42,1,5,NULL,NULL,7,'Encours','TIK-JUR-00000000031',NULL,'<p>jfgjfgsthhf</p>\r\n',NULL,'2020-09-01 15:01:15','2020-09-01 15:35:17',NULL,NULL,NULL,NULL,NULL,NULL),(74,43,2,9,NULL,NULL,7,'Encours','TIK-JUR-00000000032',NULL,NULL,NULL,'2020-09-01 15:57:10','2020-09-01 15:57:42',NULL,NULL,NULL,NULL,NULL,NULL),(75,44,11,NULL,NULL,NULL,7,'Reçu','TIK-JUR-00000000033',NULL,NULL,NULL,'2020-09-01 16:17:57',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `matricule` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `agence` int(11) DEFAULT NULL,
  `direction` varchar(150) NOT NULL,
  `unite` varchar(200) NOT NULL,
  `poste` varchar(250) NOT NULL,
  `statutCompte` varchar(10) NOT NULL,
  `profil` int(11) NOT NULL,
  PRIMARY KEY (`idUtilisateur`),
  KEY `fk_utilsateur_profil` (`profil`),
  KEY `fk_utilsateur_lieu` (`agence`),
  CONSTRAINT `fk_utilsateur_lieu` FOREIGN KEY (`agence`) REFERENCES `lieu` (`idLieu`),
  CONSTRAINT `fk_utilsateur_profil` FOREIGN KEY (`profil`) REFERENCES `profil` (`idProfil`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'RAVOAHANGINIAINA','Cedrick Henintsoa',7165,'cedrick.Ravohanginiaina@bni.mg',99,'DRJC-PRO','Projet','Stagiaire','Activé',5),(2,'RAZAFINDRAKOTO','Chantal Hantanirina',4336,'hantanirina.razafindrakoto@bni.mg',99,'DRJC-PRO','Projet','Responsable Gestion de Projets (PRO)','Activé',5),(3,'RAZAFINDRANAIVO','Andry Harifetra',4629,'fetra.razafindranaivo@bni.mg',99,'DRJC-PRO','Projet','Chargé Business Intelligence et Data Miner','Activé',5),(4,'RALAIVAO','Valérie',5009,'Valerie.RALAIVAO@bni.mg',99,'DRJC-JCSF','Juridique','Directeur Juridique','Activé',1),(5,'RAKOTONIRINA','Miora',4152,'Miora.Rakotonirina@bni.mg',99,'DRJC-JCSF','Juridique','Juriste Senior','Activé',2),(6,'RAKOTONARIVO','Hery Michel',4694,'Michel.RAKOTONARIVO@bni.mg',99,'DRJC-JCSF','Juridique','Juriste Senior','Activé',3),(7,'Demandeur1','Demandeur11',1111,'Miora.Rakotonirina@bni.mg',5,'Demande','Demande','Demande','Activé',4),(8,'RAKOTO','SAONA',4338,'miora.rakotonirina@bni.mg',2,'DMPP','DMPP','Chargé Clientèle','Activé',6),(9,'RABEARY','Hantanirina',4865,'Hantanirina.RABEARY@bni.mg',99,'DJUR','JUR','Juriste Junior','Activé',3),(10,'ddddfgdfgfd','Demandeur1fdgdfg',0,'jkhklk@xx.mg',99,'poidgfdfg','^lmkml','fhgfhgfh','Activé',6),(11,'jhlkjlkj','qsd',1212,'hantanirina.razafindrakoto@bni.mg',1,'Demande','Demande','Demande','Activé',3),(12,'Rakoto','Be',2222,'miora.rakotonirina@bni.mg',99,'DMPP','DMPP','Resp','Activé',6),(13,'RAJAONARIVELO','Manalintsoa',4691,'Ialy.Rajaonarivelo@bni.mg',99,'DRJC-PRO','Projet','Chargée de Business Intelligence et Data Miner','Activé',5),(14,'famille','BNI',3,'famille.bni@bni.mg',99,'DRJC','juridique','juriste','Activé',3),(15,'testqsqd','test',1114,'test@test.me',1,'aa','aaaa','aaaa','Activé',1);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-08 15:06:46
