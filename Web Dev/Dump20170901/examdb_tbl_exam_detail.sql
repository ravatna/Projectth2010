CREATE DATABASE  IF NOT EXISTS `examdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `examdb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: examdb
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
-- Table structure for table `tbl_exam_detail`
--

DROP TABLE IF EXISTS `tbl_exam_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_exam_detail` (
  `exam_id` int(10) unsigned NOT NULL,
  `question` text,
  `q_picture` varchar(255) DEFAULT NULL,
  `choise_1` varchar(255) DEFAULT NULL,
  `choise_2` varchar(255) DEFAULT NULL,
  `choise_3` varchar(255) DEFAULT NULL,
  `choise_4` varchar(255) DEFAULT NULL,
  `choise_5` varchar(255) DEFAULT NULL,
  `answer_choise` varchar(255) DEFAULT NULL,
  `answer_description` text,
  `created_date` datetime NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `choise_pic1` varchar(100) DEFAULT NULL,
  `choise_pic2` varchar(100) DEFAULT NULL,
  `choise_pic3` varchar(100) DEFAULT NULL,
  `choise_pic4` varchar(100) DEFAULT NULL,
  `choise_pic5` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_exam_detail`
--

LOCK TABLES `tbl_exam_detail` WRITE;
/*!40000 ALTER TABLE `tbl_exam_detail` DISABLE KEYS */;
INSERT INTO `tbl_exam_detail` VALUES (2,'x','270817225214.jpg','s','a','aa','','','1','','2017-08-23 09:31:08',1,'1270817225214.jpg',NULL,'270817224419.jpg','4270817225214.jpg',NULL),(2,'wwwww','','8nv','no','yes','','','3','','2017-08-28 06:07:58',2,'1270817230758.jpg','2270817230758.jpg','3270817230758.png','',''),(2,'look vdo','270817231922.mp4','a','b','c','','','2','','2017-08-28 06:19:22',3,'','','','','');
/*!40000 ALTER TABLE `tbl_exam_detail` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:10
