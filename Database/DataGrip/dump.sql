-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB

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
-- Table structure for table `Distributee_Access`
--

DROP TABLE IF EXISTS `Distributee_Access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Distributee_Access` (
  `document_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Distributee_Access_User_id_fk` (`user_id`),
  KEY `Distributee_Access_Document_id_fk` (`document_id`),
  CONSTRAINT `Distributee_Access_Document_id_fk` FOREIGN KEY (`document_id`) REFERENCES `Document` (`id`),
  CONSTRAINT `Distributee_Access_User_id_fk` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Distributee_Access`
--

/*!40000 ALTER TABLE `Distributee_Access` DISABLE KEYS */;
/*!40000 ALTER TABLE `Distributee_Access` ENABLE KEYS */;

--
-- Table structure for table `Document`
--

DROP TABLE IF EXISTS `Document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `initialDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `activationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `document_status_id` int(11) NOT NULL,
  `additionalDetails` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`,`author_id`),
  KEY `fk_Document_User1_idx` (`author_id`),
  KEY `Document_Document_Status_id_fk` (`document_status_id`),
  CONSTRAINT `Document_Document_Status_id_fk` FOREIGN KEY (`document_status_id`) REFERENCES `Document_Status` (`id`),
  CONSTRAINT `fk_Document_User1` FOREIGN KEY (`Author_id`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains information for the user''s documents.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Document`
--

/*!40000 ALTER TABLE `Document` DISABLE KEYS */;
/*!40000 ALTER TABLE `Document` ENABLE KEYS */;

--
-- Table structure for table `Document_Status`
--

DROP TABLE IF EXISTS `Document_Status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Document_Status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Status identifier for Docs';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Document_Status`
--

/*!40000 ALTER TABLE `Document_Status` DISABLE KEYS */;
INSERT INTO `Document_Status` (`id`, `status`) VALUES (1,'Active'),(2,'Draft'),(3,'Archived'),(4,'Trashed');
/*!40000 ALTER TABLE `Document_Status` ENABLE KEYS */;

--
-- Table structure for table `Revision`
--

DROP TABLE IF EXISTS `Revision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Revision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `revision_uploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filePath` varchar(45) NOT NULL,
  `revision_status_id` int(11) NOT NULL,
  `additionalDetails` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`,`document_id`),
  UNIQUE KEY `filePath_UNIQUE` (`filePath`),
  KEY `fk_Revision_Document1_idx` (`document_id`),
  KEY `Revision_Revision_Status_id_fk` (`revision_status_id`),
  CONSTRAINT `Revision_Revision_Status_id_fk` FOREIGN KEY (`revision_status_id`) REFERENCES `Revision_Status` (`id`),
  CONSTRAINT `fk_Revision_Document1` FOREIGN KEY (`Document_id`) REFERENCES `Document` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Revision`
--

/*!40000 ALTER TABLE `Revision` DISABLE KEYS */;
/*!40000 ALTER TABLE `Revision` ENABLE KEYS */;

--
-- Table structure for table `Revision_Status`
--

DROP TABLE IF EXISTS `Revision_Status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Revision_Status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Revision_Status`
--

/*!40000 ALTER TABLE `Revision_Status` DISABLE KEYS */;
INSERT INTO `Revision_Status` (`id`, `status`) VALUES (1,'Active'),(2,'Draft'),(3,'Archived'),(4,'Trashed');
/*!40000 ALTER TABLE `Revision_Status` ENABLE KEYS */;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forename` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password_hash` varchar(45) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_role_id` int(11) NOT NULL,
  `user_status_id` int(11) NOT NULL,
  `additionalDetails` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `User_User_Role_id_fk` (`user_role_id`),
  KEY `User_User_Status_id_fk` (`user_status_id`),
  CONSTRAINT `User_User_Role_id_fk` FOREIGN KEY (`user_role_id`) REFERENCES `User_Role` (`id`),
  CONSTRAINT `User_User_Status_id_fk` FOREIGN KEY (`user_status_id`) REFERENCES `User_Status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

/*!40000 ALTER TABLE `User` DISABLE KEYS */;
/*!40000 ALTER TABLE `User` ENABLE KEYS */;

--
-- Table structure for table `User_Role`
--

DROP TABLE IF EXISTS `User_Role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_Role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_Role`
--

/*!40000 ALTER TABLE `User_Role` DISABLE KEYS */;
INSERT INTO `User_Role` (`id`, `status`) VALUES (1,'Author'),(2,'Distributor');
/*!40000 ALTER TABLE `User_Role` ENABLE KEYS */;

--
-- Table structure for table `User_Status`
--

DROP TABLE IF EXISTS `User_Status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User_Status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User_Status`
--

/*!40000 ALTER TABLE `User_Status` DISABLE KEYS */;
INSERT INTO `User_Status` (`id`, `status`) VALUES (1,'Active'),(2,'Archived');
/*!40000 ALTER TABLE `User_Status` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-30 19:57:21
