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
-- Table structure for table `m_leave_setting`
--

DROP TABLE IF EXISTS `m_leave_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_leave_setting` (
  `budget_year` char(4) NOT NULL COMMENT 'ปีงบประมาณ',
  `sick_limit_day` decimal(4,1) unsigned NOT NULL,
  `personal_limit_day` decimal(4,1) unsigned NOT NULL,
  `maternity_limit_day` decimal(4,1) unsigned NOT NULL,
  `vacation_limit_day` decimal(4,1) unsigned NOT NULL,
  `vacation_under10` decimal(4,1) unsigned NOT NULL,
  `vacation_over10` decimal(4,1) unsigned NOT NULL,
  `abroad_limit_day` decimal(4,1) unsigned NOT NULL,
  `ordinate_limit_day` decimal(4,1) unsigned NOT NULL,
  `hajj_limit_day` decimal(4,1) unsigned NOT NULL,
  `conscription_limit_day` decimal(4,1) unsigned NOT NULL,
  `training_limit_day` decimal(4,1) unsigned NOT NULL,
  `spouse_limit_day` decimal(4,1) unsigned NOT NULL,
  `outside_limit_day` decimal(4,1) unsigned NOT NULL,
  `practice_limit_day` decimal(4,1) unsigned NOT NULL,
  `parenting_limit_day` decimal(4,1) unsigned NOT NULL COMMENT 'ลากิจส่วนตัวเพื่อเลี้ยงดูบุตร',
  `helpparenting_limit_day` decimal(4,1) unsigned NOT NULL COMMENT 'ลาไปช่วยเหลือภริยาที่คลอดบุตร',
  `rehabilitation_limit_day` decimal(4,1) unsigned NOT NULL COMMENT 'ลาไปฟื้นฟูสมรรถภาพด้านอาชีพ',
  `status` char(1) DEFAULT NULL,
  `approved_id` int(10) unsigned NOT NULL,
  `approved_name` varchar(250) DEFAULT NULL,
  `approved_position` varchar(250) DEFAULT NULL,
  `approved_org` varchar(250) DEFAULT NULL,
  `created_user` varchar(50) DEFAULT NULL,
  `created_user_id` tinyint(3) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_user` varchar(50) DEFAULT NULL,
  `updated_user_id` tinyint(3) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`budget_year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_leave_setting`
--

LOCK TABLES `m_leave_setting` WRITE;
/*!40000 ALTER TABLE `m_leave_setting` DISABLE KEYS */;
INSERT INTO `m_leave_setting` VALUES ('2558',0.0,1.0,1.0,1.0,1.0,1.0,1.0,1.0,1.0,1.0,1.0,1.0,0.0,1.0,0.0,0.0,0.0,'0',10,'กมลา พิมพ์นวลศรี',NULL,NULL,'จันทรา บุญมาก',70,'2017-06-14 12:11:09','จันทรา บุญมาก',70,'2017-06-14 13:50:58'),('2559',0.0,0.0,90.0,10.0,20.0,30.0,0.0,0.0,0.0,0.0,0.0,4.0,0.0,4.0,150.0,15.0,365.0,'0',33,'กานดา วรมงคลชัย','นักพัฒนาระบบราชการ',NULL,NULL,NULL,NULL,'จันทรา บุญมาก',70,'2017-06-14 13:50:58'),('2560',0.0,0.0,90.0,10.0,20.0,30.0,10.0,0.0,0.0,0.0,365.0,4.0,10.0,4.0,150.0,15.0,365.0,'1',70,'จันทรา บุญมาก','นักวิชาการคอมพิวเตอร์',NULL,NULL,NULL,NULL,'จันทรา บุญมาก',70,'2017-06-14 13:50:58'),('2564',1.0,11.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,0.0,'0',5,'กนกวรรณ ฤกษ์อุดม','เจ้าพนักงานธุรการ',NULL,'จันทรา บุญมาก',70,'2017-06-14 12:14:57','จันทรา บุญมาก',70,'2017-06-14 13:50:58');
/*!40000 ALTER TABLE `m_leave_setting` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:15
