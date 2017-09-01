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
-- Table structure for table `t_asset_sale_item`
--

DROP TABLE IF EXISTS `t_asset_sale_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_asset_sale_item` (
  `sale_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sale_id` int(10) NOT NULL COMMENT 'ref t_asset_sale',
  `item_no` int(10) DEFAULT NULL,
  `asset_id` bigint(10) DEFAULT NULL COMMENT 'ref m_asset',
  `gf_id` varchar(50) NOT NULL,
  `opdc_id` varchar(40) NOT NULL,
  `asset_desc` varchar(250) NOT NULL,
  `from_org` varchar(255) NOT NULL,
  `from_org_id` int(11) NOT NULL,
  `status` char(1) DEFAULT NULL COMMENT 'สถานะ 0=ยังไม่ยืนยัน,1=ยืนยันจำหน่าย',
  `created_user_id` int(10) DEFAULT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_user_id` int(10) DEFAULT NULL,
  `updated_user` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`sale_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_asset_sale_item`
--

LOCK TABLES `t_asset_sale_item` WRITE;
/*!40000 ALTER TABLE `t_asset_sale_item` DISABLE KEYS */;
INSERT INTO `t_asset_sale_item` VALUES (17,1,1,12,'-','OPDC : 01-042332-00-0002.58','เก้าอี้ห้อ','',0,'1',0,'Administrator','2017-07-12 16:33:17',0,'Administrator','2017-07-13 18:58:29'),(18,1,2,11,'-','OPDC : 99-000010-13-1600/50','เก้าอี้ห้อ','',0,'1',0,'Administrator','2017-07-12 16:33:17',0,'Administrator','2017-07-13 18:58:29'),(19,1,3,10,'-','OPDC : 01-042332-00-0002.56','เก้าอี้ห้อ','',0,'1',0,'Administrator','2017-07-12 16:33:17',0,'Administrator','2017-07-13 18:58:29'),(20,1,4,9,'-','OPDC : 01-042332-00-0002.55','เก้าอี้ห้อ','',0,'1',0,'Administrator','2017-07-12 16:33:17',0,'Administrator','2017-07-13 18:58:29'),(21,2,1,10,'-','xxxxxx','เก้าอี้ห้อ','',0,'1',0,'Administrator','2017-07-16 23:13:05',0,'Administrator','2017-07-16 23:13:26'),(22,2,2,9,'-','xxxxxx','เก้าอี้ห้อ','',0,'1',0,'Administrator','2017-07-16 23:13:05',0,'Administrator','2017-07-16 23:13:26'),(23,2,3,11,'-','xxxxxx','เก้าอี้ห้อ','',0,'1',0,'Administrator','2017-07-16 23:13:05',0,'Administrator','2017-07-16 23:13:26'),(24,2,4,12,'-','xxxxxx','เก้าอี้ห้อ','',0,'1',0,'Administrator','2017-07-16 23:13:05',0,'Administrator','2017-07-16 23:13:26');
/*!40000 ALTER TABLE `t_asset_sale_item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:20
