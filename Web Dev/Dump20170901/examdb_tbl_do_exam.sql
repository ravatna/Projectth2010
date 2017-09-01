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
-- Table structure for table `tbl_do_exam`
--

DROP TABLE IF EXISTS `tbl_do_exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_do_exam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned DEFAULT NULL,
  `exam_id` int(10) unsigned DEFAULT NULL,
  `score` int(10) unsigned DEFAULT NULL,
  `do_time` int(10) unsigned DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `exam_key` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_do_exam`
--

LOCK TABLES `tbl_do_exam` WRITE;
/*!40000 ALTER TABLE `tbl_do_exam` DISABLE KEYS */;
INSERT INTO `tbl_do_exam` VALUES (1,33,2,0,1,'2017-08-23 05:03:20','2017-08-23 05:03:20',NULL),(2,33,2,0,2,'2017-08-28 05:53:57','2017-08-28 05:53:57',NULL),(3,33,2,0,3,'2017-08-28 06:08:44','2017-08-28 06:08:44',NULL),(4,33,2,0,4,'2017-08-28 06:19:51','2017-08-28 06:19:51',NULL);
/*!40000 ALTER TABLE `tbl_do_exam` ENABLE KEYS */;
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
