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
-- Table structure for table `t_leave_approve`
--

DROP TABLE IF EXISTS `t_leave_approve`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_leave_approve` (
  `leave_approve_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `leave_data_id` int(10) unsigned NOT NULL COMMENT 'ref(t_leave_data)',
  `leave_type_id` tinyint(4) NOT NULL,
  `approve_type` char(1) NOT NULL DEFAULT '0',
  `budget_year` char(4) NOT NULL,
  `leave_name` varchar(100) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `employee_name` varchar(100) NOT NULL,
  `form_type` tinyint(4) NOT NULL,
  `form_name` varchar(100) DEFAULT NULL,
  `leave_from_date` datetime NOT NULL,
  `leave_from_timetype` char(1) NOT NULL,
  `leave_to_date` datetime NOT NULL,
  `leave_to_timetype` char(1) NOT NULL,
  `leave_days` decimal(4,1) NOT NULL,
  `approve_id` tinyint(3) unsigned NOT NULL,
  `approve_name` varchar(100) NOT NULL,
  `approve_date` datetime DEFAULT NULL,
  `approve_status` char(1) NOT NULL COMMENT '0=รออนุมัติ,1=อนุมัติ,2=ไม่อนุมัติ',
  `reason` varchar(200) DEFAULT NULL,
  `approve_final` char(1) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`leave_approve_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_leave_approve`
--

LOCK TABLES `t_leave_approve` WRITE;
/*!40000 ALTER TABLE `t_leave_approve` DISABLE KEYS */;
INSERT INTO `t_leave_approve` VALUES (1,1,1,'0','2560','ลาป่วย',23,'กฤษณา แก้วด้วง',1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2017-06-08 00:00:00','1','2017-06-15 23:59:59','2',5.0,6,'กนกอร จิระนภารัตน์','2017-06-12 05:47:53','1','','1','2017-06-12 04:03:22'),(11,10,1,'0','2560','ลาป่วย',6,'กนกอร จิระนภารัตน์',1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2017-06-01 00:00:00','1','2017-06-01 12:00:00','1',0.5,0,'',NULL,'0',NULL,NULL,'2017-06-12 17:07:01'),(12,11,4,'0','2560','ขอลาพักผ่อน',6,'กนกอร จิระนภารัตน์',2,'ลาพักผ่อน','2017-06-01 00:00:00','1','2017-06-01 12:00:00','1',0.5,17,'กฤตภัค  คิดดี',NULL,'0',NULL,NULL,'2017-06-12 17:09:03'),(13,21,13,'0','2560','ลากิจส่วนตัวเพื่อเลี้ยงดูบุตร',70,'จันทรา บุญมาก',11,'ลากรณีพิเศษ','2017-06-29 00:00:00','1','2017-06-30 23:59:59','2',2.0,2,'กนกพร ศรีวิทยา',NULL,'0',NULL,NULL,'2017-06-14 14:14:20'),(14,22,15,'0','2560','ลาไปฟื้นฟูสมรรถภาพด้านอาชีพ',70,'จันทรา บุญมาก',11,'ลากรณีพิเศษ','2017-06-23 00:00:00','1','2017-06-24 23:59:59','2',2.0,2,'กนกพร ศรีวิทยา',NULL,'0',NULL,NULL,'2017-06-14 14:15:13'),(15,23,9,'0','2560','กกก',70,'จันทรา บุญมาก',7,'ลาไปศึกษา ฝึกอบรม ดูงาน ประชุม หรือปฏิบัติการวิจัยใน/ต่างประเทศ','2017-06-21 00:00:00','1','2017-06-23 23:59:59','2',3.0,2,'กนกพร ศรีวิทยา',NULL,'0',NULL,NULL,'2017-06-14 14:16:48');
/*!40000 ALTER TABLE `t_leave_approve` ENABLE KEYS */;
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
