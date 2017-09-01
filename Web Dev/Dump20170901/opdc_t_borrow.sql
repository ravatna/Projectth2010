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
-- Table structure for table `t_borrow`
--

DROP TABLE IF EXISTS `t_borrow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_borrow` (
  `borrow_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'รหัสรันนิ่งการยืม',
  `borrow_date_start` datetime NOT NULL COMMENT 'วันที่ยืม',
  `borrow_date_end` datetime NOT NULL COMMENT 'วันกำหนดคืน',
  `borrow_date_return` datetime NOT NULL COMMENT 'วันที่คืน',
  `borrow_user` varchar(250) NOT NULL COMMENT 'ผู้ยืม',
  `borrow_depart` varchar(250) NOT NULL COMMENT 'หน่วยงานผู้ยืม',
  `borrow_user_tel` varchar(250) NOT NULL COMMENT 'เบอร์ติดต่อ',
  `created_user` int(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` int(10) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`borrow_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_borrow`
--

LOCK TABLES `t_borrow` WRITE;
/*!40000 ALTER TABLE `t_borrow` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_borrow` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:21
