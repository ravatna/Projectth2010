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
-- Table structure for table `m_meeting_room`
--

DROP TABLE IF EXISTS `m_meeting_room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_meeting_room` (
  `id_meeting_room` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_meeting_room` varchar(250) NOT NULL,
  `floor_meeting_room` char(1) NOT NULL COMMENT 'ชั้น',
  `capacity_meeting_room` varchar(10) NOT NULL COMMENT 'ความจุห้อง',
  `device_meeting_room` text NOT NULL,
  `created_user` int(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` int(10) NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id_meeting_room`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_meeting_room`
--

LOCK TABLES `m_meeting_room` WRITE;
/*!40000 ALTER TABLE `m_meeting_room` DISABLE KEYS */;
INSERT INTO `m_meeting_room` VALUES (1,'ห้องประชุม201','2','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(2,'ห้องประชุมกองกฏหมายฯ','2','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(3,'ห้องประชุมกองบริหารการเปลี่ยน','2','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(4,'ห้องประชุมกองติดตามฯ','3','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(5,'ห้องประชุมกองพัฒนาระบบราชการ','3','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(6,'ห้องประชุมกองภูมิภาค','3','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(7,'ห้องประชุม ก.พ.ร.เต็มเวลา','4','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(8,'ห้องประชุมข้างห้องผู้ช่วยเลขาธิการ','4','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(9,'ห้องประชุมฝ่ายบริหารชั้น 4','4','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(10,'ห้องประชุมเลขาธิการ ก.พ.ร.','4','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(11,'ห้องประชุมสำนักงานเลขาธิการ','4','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(12,'ห้องประชุม 501 - 502','5','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(13,'ห้องประชุม  ก.พ.ร.','5','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(14,'ห้องประชุมฝ่ายบริหารชั้น 5','5','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(15,'ห้องรับรอง 1','5','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(16,'ห้องรับรอง 2','5','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(17,'ห้องประชุมศูนย์ราชการ 1','6','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(18,'ห้องประชุมศูนย์ราชการ 2','6','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(19,'ห้องประชุมศูนย์ราชการ 3','6','20','',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `m_meeting_room` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:22
