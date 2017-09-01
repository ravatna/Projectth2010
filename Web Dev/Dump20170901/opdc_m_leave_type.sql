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
-- Table structure for table `m_leave_type`
--

DROP TABLE IF EXISTS `m_leave_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_leave_type` (
  `leave_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_type_name` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `created_user_id` int(11) NOT NULL,
  `created_user` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user_id` int(11) NOT NULL,
  `updated_user` varchar(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`leave_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_leave_type`
--

LOCK TABLES `m_leave_type` WRITE;
/*!40000 ALTER TABLE `m_leave_type` DISABLE KEYS */;
INSERT INTO `m_leave_type` VALUES (1,'ลาป่วย','1',0,'ADMIN','2017-05-11 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(2,'ลากิจส่วนตัว','1',0,'ADMIN','2017-05-12 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(3,'ลาคลอดบุตร','1',0,'ADMIN','2017-05-13 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(4,'ลาพักผ่อน','1',0,'ADMIN','2017-05-14 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(5,'ลาไปต่างประเทศ','1',0,'ADMIN','2017-05-15 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(6,'ลาอุปสมบท','1',0,'ADMIN','2017-05-16 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(7,'ลาไปพิธีฮัจย์','1',0,'ADMIN','2017-05-17 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(8,'เข้าตรวจเลือก/เตรียมพล','1',0,'ADMIN','2017-05-18 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(9,'ลาศึกษาต่อ','1',0,'ADMIN','2017-05-19 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(10,'ลาติดตามคู่สมรส','1',0,'ADMIN','2017-05-20 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(11,'ลาไปปฏิบัติราชการ','1',0,'ADMIN','2017-05-21 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(12,'รับรองการมาปฏิบัติราชการ','1',0,'ADMIN','2017-05-22 00:00:00',0,'ADMIN','2017-05-05 00:00:00'),(13,'ลากรณีพิเศษ','1',0,'ADMIN','2017-05-23 00:00:00',0,'ADMIN','2017-05-05 00:00:00');
/*!40000 ALTER TABLE `m_leave_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:17
