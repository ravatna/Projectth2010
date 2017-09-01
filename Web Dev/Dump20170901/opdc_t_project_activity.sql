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
-- Table structure for table `t_project_activity`
--

DROP TABLE IF EXISTS `t_project_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_project_activity` (
  `act_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proj_id` int(10) unsigned NOT NULL,
  `act_name` varchar(255) NOT NULL,
  `act_timeline` char(1) NOT NULL,
  `act_paidstep` char(1) NOT NULL,
  `act_start_date` date DEFAULT NULL,
  `act_end_date` date DEFAULT NULL,
  `act_paid` decimal(15,0) unsigned NOT NULL,
  `act_remain` decimal(15,0) unsigned NOT NULL,
  `act_status` char(1) NOT NULL,
  `act_status_date` datetime NOT NULL,
  `act_output` text NOT NULL,
  `act_file` text NOT NULL,
  `act_pay_amount` decimal(15,0) DEFAULT NULL COMMENT 'จำนวนเงิน',
  `act_pay_prepaid` decimal(15,0) DEFAULT NULL COMMENT 'ค่าจ้างล่วงหน้า',
  `act_pay_insurance` decimal(15,0) DEFAULT NULL COMMENT 'เงินประกัน',
  `act_pay_balance` decimal(15,0) DEFAULT NULL COMMENT 'เงินคงเหลือ',
  `act_pay_date_send` datetime DEFAULT NULL COMMENT 'วันที่ส่งงาน',
  `act_pay_date_widen` datetime DEFAULT NULL COMMENT 'วันที่ส่งเบิกงาน ',
  `act_sta_pending` text COMMENT 'กำลังดำเนินการ',
  `act_sta_delayed` text COMMENT 'สาเหตุความล่าช้า',
  `act_sta_date_exp` datetime DEFAULT NULL COMMENT 'คาดว่าจะเสร็จวันที่',
  `act_sta_finish` text COMMENT 'ดำเนินการเสร็จแล้ว',
  `act_sta_date_finish` datetime DEFAULT NULL COMMENT 'เสร็จเมื่อวันที่',
  `created_user` varchar(255) NOT NULL,
  `created_user_id` int(10) unsigned NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` varchar(255) NOT NULL,
  `updated_user_id` int(10) unsigned NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_project_activity`
--

LOCK TABLES `t_project_activity` WRITE;
/*!40000 ALTER TABLE `t_project_activity` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_project_activity` ENABLE KEYS */;
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
