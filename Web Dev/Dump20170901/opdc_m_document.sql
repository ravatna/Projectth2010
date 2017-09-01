CREATE DATABASE  IF NOT EXISTS `opdc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `opdc`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: opdc
-- ------------------------------------------------------
-- Server version	5.7.17-log

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
-- Table structure for table `m_document`
--

DROP TABLE IF EXISTS `m_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_document` (
  `doc_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doc_registno` varchar(50) DEFAULT NULL,
  `doc_centralno` varchar(50) DEFAULT NULL,
  `doc_bookno` varchar(50) NOT NULL,
  `doc_date` datetime DEFAULT NULL,
  `doc_rec_date` datetime NOT NULL,
  `doc_year` char(4) NOT NULL,
  `doc_speed_code` char(3) NOT NULL,
  `doc_speed` varchar(50) NOT NULL,
  `doc_secret_code` char(3) NOT NULL,
  `doc_secret` varchar(50) NOT NULL,
  `org_from_id` int(10) unsigned NOT NULL,
  `org_from` varchar(255) NOT NULL,
  `org_to_id` varchar(255) NOT NULL,
  `org_to` text NOT NULL,
  `doc_to` varchar(255) NOT NULL,
  `doc_subject` varchar(255) NOT NULL,
  `doc_refer` varchar(255) DEFAULT NULL,
  `doc_attachment` varchar(255) DEFAULT NULL,
  `doc_note` text,
  `doc_category` tinyint(3) unsigned DEFAULT NULL,
  `doc_for_type` tinyint(3) unsigned DEFAULT NULL,
  `get_type` varchar(10) NOT NULL,
  `doc_expire_date` date DEFAULT NULL,
  `doc_due_date` date DEFAULT NULL,
  `doc_contact_name` varchar(255) DEFAULT NULL,
  `doc_contact_tel` varchar(255) DEFAULT NULL,
  `doc_contact_email` varchar(255) DEFAULT NULL,
  `doc_synopsis` varchar(255) DEFAULT NULL,
  `doc_keywords` text,
  `doc_status` char(1) NOT NULL DEFAULT '1',
  `created_user` varchar(255) NOT NULL,
  `created_user_id` int(10) unsigned NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` varchar(255) NOT NULL,
  `updated_user_id` int(10) unsigned NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_document`
--

LOCK TABLES `m_document` WRITE;
/*!40000 ALTER TABLE `m_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_document` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:21
