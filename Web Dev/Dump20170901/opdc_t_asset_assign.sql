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
-- Table structure for table `t_asset_assign`
--

DROP TABLE IF EXISTS `t_asset_assign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_asset_assign` (
  `assign_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'auto_increment',
  `assign_date` datetime DEFAULT NULL COMMENT 'วันที่แต่งตั้ง',
  `budget_year` char(4) DEFAULT NULL COMMENT 'ปีงบประมาณ',
  `assign_type` char(1) DEFAULT NULL COMMENT '0=คณะกรรมการตรวจสอบ, 1=คณะกรรมการตรวจสอบรายงาน/ข้อเท็จจริง',
  `status` char(1) DEFAULT NULL,
  `created_user_id` int(10) DEFAULT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_user_id` int(10) DEFAULT NULL,
  `updated_user` varchar(50) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`assign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_asset_assign`
--

LOCK TABLES `t_asset_assign` WRITE;
/*!40000 ALTER TABLE `t_asset_assign` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_asset_assign` ENABLE KEYS */;
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
