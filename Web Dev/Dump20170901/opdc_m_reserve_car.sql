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
-- Table structure for table `m_reserve_car`
--

DROP TABLE IF EXISTS `m_reserve_car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_reserve_car` (
  `rsvcar_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_type_id_go` int(10) DEFAULT NULL,
  `car_type_name_go` varchar(250) DEFAULT NULL,
  `car_id_go` int(10) DEFAULT NULL,
  `car_name_go` varchar(250) DEFAULT NULL,
  `chauffeur_id_go` int(10) DEFAULT NULL,
  `chauffeur_name_go` varchar(250) DEFAULT NULL,
  `car_type_id_back` int(10) DEFAULT NULL,
  `car_type_name_back` varchar(250) DEFAULT NULL,
  `car_id_back` int(10) DEFAULT NULL,
  `car_name_back` varchar(250) DEFAULT NULL,
  `chauffeur_id_back` int(10) DEFAULT NULL,
  `chauffeur_name_back` varchar(250) DEFAULT NULL,
  `rsvcar_user_name` varchar(250) NOT NULL COMMENT 'ผู้ขอ',
  `rsvcar_user_pos` varchar(250) NOT NULL COMMENT 'ตำแหน่ง',
  `rsvcar_user_dep` varchar(250) NOT NULL,
  `rsvcar_user_tel` varchar(250) NOT NULL,
  `rsvcar_where` varchar(250) NOT NULL COMMENT 'ไปที่',
  `province_id` int(10) NOT NULL COMMENT 'จังหวัด',
  `rsvcar_purpose` varchar(250) NOT NULL COMMENT 'วัตถุประสงค์',
  `rsvcar_passenger` tinyint(4) NOT NULL COMMENT 'จำนวนคน',
  `rsvcar_date_start` date NOT NULL COMMENT 'วันที่',
  `rsvcar_date_end` date NOT NULL COMMENT 'ถึงวันที่',
  `rsvcar_send_time` time NOT NULL COMMENT 'เวลาไปส่ง',
  `rsvcar_receive_time` time NOT NULL COMMENT 'เวลาไปรับ',
  `rsvcar_applicant` varchar(250) NOT NULL COMMENT 'ผู้ขออนุญาต',
  `rsvcar_continuance` char(10) NOT NULL COMMENT 'ใช้งานต่อเนื่อง',
  `rsvcar_exway` varchar(50) NOT NULL COMMENT 'ใช้ทางด่วน',
  `rsvcar_usewith` varchar(250) NOT NULL COMMENT 'ใช้งานร่วมกับ',
  `rsvcar_user_use` varchar(250) DEFAULT NULL,
  `rsvcar_where2` varchar(250) DEFAULT NULL,
  `rsvcar_where3` varchar(250) DEFAULT NULL,
  `rsvcar_where4` varchar(250) DEFAULT NULL,
  `rsvcar_where5` varchar(250) DEFAULT NULL,
  `rsvcar_send_time2` time DEFAULT NULL,
  `rsvcar_send_time3` time DEFAULT NULL,
  `rsvcar_send_time4` time DEFAULT NULL,
  `rsvcar_send_time5` time DEFAULT NULL,
  `rsvcar_receive_time2` time DEFAULT NULL,
  `rsvcar_receive_time3` time DEFAULT NULL,
  `rsvcar_receive_time4` time DEFAULT NULL,
  `rsvcar_receive_time5` time DEFAULT NULL,
  `rsvcar_purpose2` varchar(250) DEFAULT NULL,
  `rsvcar_purpose3` varchar(250) DEFAULT NULL,
  `rsvcar_purpose4` varchar(250) DEFAULT NULL,
  `rsvcar_purpose5` varchar(250) DEFAULT NULL,
  `rsvcar_approve1` varchar(250) NOT NULL COMMENT 'ผู้อำนวยการสำนักหรือผู้แทน',
  `rsvcar_approve2` varchar(250) NOT NULL COMMENT 'ผู้อำนวยการสำนักงานเลขาธิการ',
  `mile_car_go` varchar(100) DEFAULT NULL,
  `mile_car_back` varchar(100) DEFAULT NULL,
  `oil_car` varchar(100) DEFAULT NULL,
  `status` char(10) NOT NULL,
  `created_user_id` int(10) NOT NULL,
  `created_user` varchar(250) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user_id` int(10) NOT NULL,
  `updated_user` varchar(250) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`rsvcar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_reserve_car`
--

LOCK TABLES `m_reserve_car` WRITE;
/*!40000 ALTER TABLE `m_reserve_car` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_reserve_car` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:14
