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
-- Table structure for table `t_asset_sale`
--

DROP TABLE IF EXISTS `t_asset_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_asset_sale` (
  `sale_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'auto_increment',
  `sale_date` datetime DEFAULT NULL COMMENT 'วันที่จำหน่าย/บริจาค',
  `sale_type` char(1) NOT NULL,
  `sale_to` varchar(250) DEFAULT NULL COMMENT 'บริจาคให้',
  `status` char(1) DEFAULT NULL,
  `confirm_date` datetime DEFAULT NULL,
  `confirm_note` text,
  `created_user_id` int(10) DEFAULT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_user_id` int(10) DEFAULT NULL,
  `updated_user` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sale_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_asset_sale`
--

LOCK TABLES `t_asset_sale` WRITE;
/*!40000 ALTER TABLE `t_asset_sale` DISABLE KEYS */;
INSERT INTO `t_asset_sale` VALUES (1,'2017-07-12 18:17:29','0','ddddddddddddddddddddddddd','1','2017-07-04 00:00:00','เเเเเเเเเเเเเเเเเเเเเเเเเเเเเเเเเ',0,'Administrator','2017-07-11 15:53:09',0,'Administrator','2017-07-13 18:58:29'),(2,'2017-07-16 23:13:05','1','feeeee','1','2017-07-05 00:00:00','vvvv',0,'Administrator','2017-07-16 23:13:05',0,'Administrator','2017-07-16 23:13:26');
/*!40000 ALTER TABLE `t_asset_sale` ENABLE KEYS */;
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
