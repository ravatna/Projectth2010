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
-- Table structure for table `tbl_teacher`
--

DROP TABLE IF EXISTS `tbl_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_teacher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) DEFAULT NULL,
  `uname` varchar(45) CHARACTER SET latin1 NOT NULL,
  `pword` varchar(45) CHARACTER SET latin1 NOT NULL,
  `gen_exam` char(1) CHARACTER SET latin1 NOT NULL,
  `can_access` char(1) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='เก็บข้อมูลครูผู้สอน';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_teacher`
--

LOCK TABLES `tbl_teacher` WRITE;
/*!40000 ALTER TABLE `tbl_teacher` DISABLE KEYS */;
INSERT INTO `tbl_teacher` VALUES (4,'Chula','Chula','827ccb0eea8a706c4c34a16891f84e7b','1','1'),(5,'นรา  แก้วหล่อ','nara','4115070b43ea941b6bfab929957a3ff8','1','1'),(6,'titaporn','titaporn','d540a516025d9a95404d98988e63033f','1','1'),(7,'somkiat6','somkiat6','25d55ad283aa400af464c76d713c07ad','1','1'),(8,'prakaithip sonsrakoo','prakaithip sonsrakoo','81dc9bdb52d04dc20036dbd8313ed055','1','1'),(9,'kumpol  polyiam','kumpol','827ccb0eea8a706c4c34a16891f84e7b','1','1'),(10,'tanapon','tanapon','d2350a54d774001d6078e326b4488878','1','1'),(11,'tukta','tukta','4034f76d4851596dd2af76b7d4f9eeaf','1','1'),(12,'Chularat','Chularat','827ccb0eea8a706c4c34a16891f84e7b','1','1'),(13,'BussakornP','BussakornP','6fce68c51c14cac7e9b6231abcf93987','1','1'),(14,'สุปรียา แสงสุมาศ','supreeya','0c5bb8b83b713f8a62cc32f31bb6c073','1','1'),(15,'นายอภินันท์   บุตรศาสตร์','apinan','18a8101aad6f17b96bc34efda902ec7e','1','1'),(16,'Rongbo','Rongbo','dfe97a656423d3ff52ba91d513c1d0e2','1','1'),(17,'NanapatBut','NanapatBut','ad3d9c110e2258d5b606cda9d8ceeb32','1','1'),(19,'mahidol','mahidol','e10adc3949ba59abbe56e057f20f883e','1','1'),(21,'Sila jucknarong','Sila jucknarong','81dc9bdb52d04dc20036dbd8313ed055','1','1'),(23,'sawat','sawat','81dc9bdb52d04dc20036dbd8313ed055','1','1'),(24,'kumpol polyiam','krukumpol','1236d40162d80b30628e537d1803908d','1','1'),(25,'เรวัฒน์','rewat','81dc9bdb52d04dc20036dbd8313ed055','1','1');
/*!40000 ALTER TABLE `tbl_teacher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:11
