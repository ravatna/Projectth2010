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
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `uname` varchar(45) NOT NULL,
  `pword` varchar(45) NOT NULL,
  `std_code` varchar(15) DEFAULT NULL,
  `class_level` varchar(45) DEFAULT NULL,
  `status` char(1) NOT NULL,
  `room` varchar(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student`
--

LOCK TABLES `tbl_student` WRITE;
/*!40000 ALTER TABLE `tbl_student` DISABLE KEYS */;
INSERT INTO `tbl_student` VALUES (3,'Rewat BB','000128','e10adc3949ba59abbe56e057f20f883e','000128','ป.3','1','1'),(6,'som','01','25d55ad283aa400af464c76d713c07ad','01','ป.3','1','1'),(7,'?????  ??????????','0001','3edf87bce4f5dd21020011731a82d7da','0001','ป.6','1','0'),(8,'narong','0002','4d51971de783e9523b9adcb346bd420a','0002','ป.6','1','0'),(9,'tanaporn','1','81dc9bdb52d04dc20036dbd8313ed055','1','ป.3','1','3'),(10,'somkiat','somkiat','25d55ad283aa400af464c76d713c07ad','somkiat','ป.3','1','1'),(11,'na','0003','827ccb0eea8a706c4c34a16891f84e7b','0003','ป.6','1','0'),(12,'bow','001','827ccb0eea8a706c4c34a16891f84e7b','001','ป.6','1','4'),(13,'na1','0006','827ccb0eea8a706c4c34a16891f84e7b','0006','ป.1','1','0'),(14,'Somsri','1000','a9b7ba70783b617e9998dc4dd82eb3c5','1000','ป.1','1','0'),(15,'phakphum','pp2501','d122199a86d7a43a83d6cfe1944d7a72','pp2501','ป.1','1','2'),(16,'boonyaporn ','boonyaporn','827ccb0eea8a706c4c34a16891f84e7b','boonyaporn','ป.3','1','3'),(17,'Saman','1001','b8c37e33defde51cf91e1e03e51657da','1001','ป.6','1','1'),(18,'phakphum1','phakphum1','827ccb0eea8a706c4c34a16891f84e7b','phakphum1','ป.1','1','2'),(19,'aaa','0064','47bce5c74f589f4867dbd57e9ca9f808','0064','ป.6','1','4'),(20,'somkiat2','1234','81dc9bdb52d04dc20036dbd8313ed055','1234','ป.1','1','3'),(21,'somkiat5','somkiat5','81dc9bdb52d04dc20036dbd8313ed055','somkiat5','ป.6','1','4'),(22,'nipa','nipa','827ccb0eea8a706c4c34a16891f84e7b','nipa','ป.1','1','2'),(23,'somkiat3','somkiat3','81dc9bdb52d04dc20036dbd8313ed055','somkiat3','ป.6','1','4'),(24,'kkkk','kkkk','fa7f08233358e9b466effa1328168527','kkkk','ป.3','1','1'),(25,'aa bb','1122','3cda4c88d8562290c9d6dfd2c4a86b0c','1122','ป.1','1','0'),(26,'sonram','00001','827ccb0eea8a706c4c34a16891f84e7b','00001','ป.4','1','0'),(27,'k1','k1','827ccb0eea8a706c4c34a16891f84e7b','k1','ป.3','1','1'),(28,'aaa','123456789','202cb962ac59075b964b07152d234b70','123456789','ป.3','1','1'),(29,'aaa bbb','111111111','202cb962ac59075b964b07152d234b70','111111111','ป.3','1','0'),(30,'sommy','1003','aa68c75c4a77c87f97fb686b2f068676','1003','ป.1','1','1'),(31,'tt tt','tt','81dc9bdb52d04dc20036dbd8313ed055','tt','ป.4','1','1'),(32,'test','?????','81dc9bdb52d04dc20036dbd8313ed055','?????','ป.1','1','0'),(33,'ทดสอบ','ทดสอบ','81dc9bdb52d04dc20036dbd8313ed055','ทดสอบ','ป.1','1','0');
/*!40000 ALTER TABLE `tbl_student` ENABLE KEYS */;
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
