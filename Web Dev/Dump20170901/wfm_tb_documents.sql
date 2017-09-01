CREATE DATABASE  IF NOT EXISTS `wfm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wfm`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: wfm
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
-- Table structure for table `tb_documents`
--

DROP TABLE IF EXISTS `tb_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_documents` (
  `doc_id` int(10) NOT NULL AUTO_INCREMENT,
  `doc_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prd_order` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mat_no` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plant` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_accept` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `short_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_period` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_status` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=38920 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_documents`
--

LOCK TABLES `tb_documents` WRITE;
/*!40000 ALTER TABLE `tb_documents` DISABLE KEYS */;
INSERT INTO `tb_documents` VALUES (1,'A001','30104345','40021759','1000','2013-01-07','2012-12-28','PURE CARE BY BSC MAKE UP EYESHADOW#P0','10',''),(2,'A002','30104343','40021757','1000','2013-01-07','2012-12-28','PURE CARE BY BSC MAKE UP EYESHADOW#N1','3',''),(3,'A003','30104350','40013216','1000','2013-01-07','2012-12-28','ELISEES BUTTERFLY FINISH POWDER SPF25#C2','3',''),(4,'A004','30104346','40021760','1000','2013-01-07','2012-12-28','PURE CARE BY BSC MAKE UP EYESHADOW#P3','3','');
/*!40000 ALTER TABLE `tb_documents` ENABLE KEYS */;
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
