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
-- Table structure for table `m_asset_gpsc_type`
--

DROP TABLE IF EXISTS `m_asset_gpsc_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_asset_gpsc_type` (
  `asset_gpsc_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gpsc_code` varchar(14) NOT NULL COMMENT 'ref m_gpsc',
  `gpsc_desc` varchar(250) NOT NULL,
  `asset_gpsc_type_code` varchar(2) NOT NULL,
  `asset_gpsc_type_name` varchar(200) NOT NULL,
  `status` char(1) NOT NULL,
  `created_user` varchar(250) NOT NULL,
  `created_user_id` int(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` varchar(250) NOT NULL,
  `updated_user_id` int(10) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`asset_gpsc_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_asset_gpsc_type`
--

LOCK TABLES `m_asset_gpsc_type` WRITE;
/*!40000 ALTER TABLE `m_asset_gpsc_type` DISABLE KEYS */;
INSERT INTO `m_asset_gpsc_type` VALUES (1,'01043256000000','กด:กระเทียม','01','กระเทียมสับ','1','admin',0,'2017-06-26 00:00:00','admin',0,'2017-06-26 00:00:00'),(2,'01043256000000','กด:กระเทียม','02','กระเทียมหั่น','1','admin',0,'2017-06-26 00:00:00','admin',0,'2017-06-26 00:00:00'),(3,'01043256000000','กด:กระเทียม','97','กระเทียมสับละเอียด','1','Administrator',0,'2017-07-03 15:10:25','Administrator',0,'2017-07-03 15:10:25'),(6,'01043255000000','กด:คุกกี้','01','คุกกี้ ใหญ่','1','Administrator',0,'2017-07-03 16:37:28','Administrator',0,'2017-07-03 16:37:28'),(9,'01043255000000','กด:คุกกี้','02','ddd','1','Administrator',0,'2017-07-03 17:17:53','Administrator',0,'2017-07-03 17:17:53'),(10,'01043255000000','กด:คุกกี้','03','444','1','Administrator',0,'2017-07-17 11:28:15','Administrator',0,'2017-07-17 11:28:15');
/*!40000 ALTER TABLE `m_asset_gpsc_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:19
