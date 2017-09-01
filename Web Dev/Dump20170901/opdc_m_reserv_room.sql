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
-- Table structure for table `m_reserv_room`
--

DROP TABLE IF EXISTS `m_reserv_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_reserv_room` (
  `id_reserv_room` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `booking` varchar(100) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `subject_meeting` varchar(300) NOT NULL,
  `category_meeting` int(10) NOT NULL,
  `president_meeting` varchar(200) NOT NULL,
  `meeting_number` varchar(50) NOT NULL,
  `note_meeting` varchar(300) NOT NULL,
  `device_meeting` text NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `place_use` int(10) NOT NULL,
  `created_user_id` int(10) NOT NULL,
  `reason_del_room` varchar(200) NOT NULL,
  `status` char(1) DEFAULT '1' COMMENT '1',
  `every_day` char(1) DEFAULT NULL,
  `created_user` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user_id` int(10) NOT NULL,
  `updated_user` varchar(250) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id_reserv_room`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_reserv_room`
--

LOCK TABLES `m_reserv_room` WRITE;
/*!40000 ALTER TABLE `m_reserv_room` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_reserv_room` ENABLE KEYS */;
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
