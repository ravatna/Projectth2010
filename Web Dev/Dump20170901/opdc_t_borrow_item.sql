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
-- Table structure for table `t_borrow_item`
--

DROP TABLE IF EXISTS `t_borrow_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_borrow_item` (
  `borrow_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `item_no` bigint(20) NOT NULL COMMENT 'ลำดับสิ่งที่ยิม',
  `id_device_type` int(10) NOT NULL,
  `id_device_infor` int(10) NOT NULL,
  `item_name_type` varchar(250) NOT NULL,
  `item_name_infor` varchar(250) NOT NULL,
  `radio_place` char(1) DEFAULT NULL,
  `borrow_place_in` varchar(250) DEFAULT NULL,
  `borrow_place_out` varchar(250) NOT NULL,
  `borrow_user_id` int(10) NOT NULL,
  `borrow_user_name` varchar(250) NOT NULL,
  `borrow_date_start` datetime NOT NULL,
  `borrow_date_end` datetime NOT NULL,
  `borrow_user_pick` int(10) DEFAULT NULL COMMENT 'ผู้หยิบ',
  `user_login_pick` varchar(50) NOT NULL,
  `date_pick` datetime DEFAULT NULL COMMENT 'วันที่หยิบ',
  `returns_user` int(10) DEFAULT NULL COMMENT 'ผู้นำมาคืน',
  `user_login_returns` varchar(50) NOT NULL,
  `date_returns` datetime DEFAULT NULL COMMENT 'วันที่นำมาคืน',
  `id_reserv_room` int(10) DEFAULT NULL COMMENT 'ไอดีห้องประชุม',
  `item_brand` varchar(250) NOT NULL COMMENT 'ยี่ห้อ',
  `item_model` varchar(250) NOT NULL COMMENT 'รุ่น',
  `item_sn` varchar(250) NOT NULL COMMENT 's/n',
  `item_note` varchar(300) DEFAULT NULL COMMENT 'หมายเหตุ',
  `borrow_reason_del` text,
  `status` char(1) NOT NULL,
  `created_user_id` int(10) NOT NULL,
  `created_user` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user_id` int(10) NOT NULL,
  `updated_user` varchar(250) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`borrow_id`,`item_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_borrow_item`
--

LOCK TABLES `t_borrow_item` WRITE;
/*!40000 ALTER TABLE `t_borrow_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_borrow_item` ENABLE KEYS */;
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
