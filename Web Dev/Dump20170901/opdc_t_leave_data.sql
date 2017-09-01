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
-- Table structure for table `t_leave_data`
--

DROP TABLE IF EXISTS `t_leave_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_leave_data` (
  `leave_data_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'auto_increment',
  `leave_type_id` tinyint(3) DEFAULT NULL COMMENT 'ประเภทการลา',
  `form_type` tinyint(3) unsigned NOT NULL,
  `form_name` varchar(100) NOT NULL,
  `budget_year` char(4) DEFAULT NULL COMMENT 'ปีงบประมาณ',
  `leave_name` varchar(100) DEFAULT NULL COMMENT 'เรื่อง',
  `write_place` varchar(100) DEFAULT NULL COMMENT 'เขียนที่',
  `write_date` datetime DEFAULT NULL COMMENT 'วันที่เขียน',
  `send_to` varchar(100) DEFAULT NULL COMMENT 'เรียน',
  `leave_reason` varchar(100) DEFAULT NULL COMMENT 'เนื่องจาก',
  `leave_from_date` datetime DEFAULT NULL COMMENT 'ตั้งแต่วันที่',
  `leave_from_timetype` char(1) NOT NULL,
  `leave_to_date` datetime DEFAULT NULL COMMENT 'ถึงวันที่',
  `leave_to_timetype` char(1) NOT NULL,
  `leave_years` decimal(4,1) DEFAULT NULL COMMENT 'กำหนดปี',
  `leave_months` decimal(4,1) DEFAULT NULL COMMENT 'กำหนดเดือน',
  `leave_days` decimal(4,1) DEFAULT NULL COMMENT 'กำหนด(วัน)',
  `contact_address` varchar(300) DEFAULT NULL COMMENT 'สถานที่ติดต่อ',
  `abroad_for` varchar(100) DEFAULT NULL COMMENT 'เพื่อไป(ต่างประเทศ)(ดูงาน)',
  `abroad_country` varchar(100) DEFAULT NULL COMMENT 'ณ ประเทศ(ต่างประเทศ)(ดูงาน)',
  `abroad_ref` int(11) DEFAULT NULL,
  `ordinate_ever` char(1) DEFAULT NULL COMMENT 'เคย/ไม่เคยอุปสมบท(0,1)(อุปสมบท)',
  `ordinate_temple` varchar(100) DEFAULT NULL COMMENT 'อุปสมบท ณ วัด(อุปสมบท)',
  `ordinate_temple_place` varchar(100) DEFAULT NULL COMMENT 'ตั้งอยู่ ณ(อุปสมบท)',
  `ordinate_date` datetime DEFAULT NULL COMMENT 'กำหนดวันที่(อุปสมบท)',
  `ordinate_live_temple` varchar(100) DEFAULT NULL COMMENT 'จำพรรษา ณ วัด(อุปสมบท)',
  `ordinate_live_place` varchar(100) DEFAULT NULL COMMENT 'ตั้งอยู่ ณ (อุปสมบท)',
  `hujj_ever` char(1) DEFAULT NULL COMMENT 'เคย/ไม่เคยประกอบพิธีฮัจย์(พิธีฮัจย์)',
  `conscription_from` varchar(100) DEFAULT NULL COMMENT 'ได้รับหมายเรียกของ(ทหาร)',
  `conscription_place` varchar(100) DEFAULT NULL COMMENT 'ที่(ทหาร)',
  `conscription_date` datetime DEFAULT NULL COMMENT 'ลงวันที่(ทหาร)',
  `conscription_for` varchar(100) DEFAULT NULL COMMENT 'ให้เข้ารับการ(ทหาร)',
  `conscription_to_place` varchar(100) DEFAULT NULL COMMENT 'ณ ที่(ทหาร)',
  `training_fund_from` varchar(100) DEFAULT NULL COMMENT 'ด้วยทุน(ดูงาน)',
  `spouse_name` varchar(100) DEFAULT NULL COMMENT 'ชื่อ(คู่สมรส)',
  `spouse_position` varchar(100) DEFAULT NULL COMMENT 'ตำแหน่ง(คู่สมรส)',
  `spouse_department` varchar(100) DEFAULT NULL COMMENT 'สังกัด(คู่สมรส)',
  `spouse_country` varchar(100) DEFAULT NULL COMMENT 'ปฏิบัติงาน ณ ประเทศ(คู่สมรส)',
  `spouse_from_date` datetime NOT NULL,
  `spouse_to_date` datetime NOT NULL,
  `spouse_years` decimal(4,1) DEFAULT NULL COMMENT 'มีกำหนด(ปี)(คู่สมรส)',
  `spouse_months` decimal(4,1) DEFAULT NULL COMMENT 'มีกำหนด(เดือน)(คู่สมรส)',
  `spouse_days` decimal(4,1) DEFAULT NULL COMMENT 'มีกำหนด(วัน)(คู่สมรส)',
  `outside_place` varchar(200) DEFAULT NULL COMMENT 'สถานที่(นอกสำนักงาน)',
  `practice_type` char(1) DEFAULT NULL COMMENT 'ไม่มาปฏิบัติราชการ type(0,1,2)(รับรองปฏิบัติราชการ)',
  `practice_reason` varchar(100) DEFAULT NULL COMMENT 'ไม่มาปฏิบัติราชการเพราะ(รับรองปฏิบัติราชการ)',
  `user_id` int(10) unsigned DEFAULT NULL COMMENT 'รหัสพนักงาน',
  `leave_status` char(1) DEFAULT NULL COMMENT 'สถานะ 1 บันทึก ,2 ส่งอนุมัติ,0 ยกเลิก',
  `approve_status` varchar(50) DEFAULT NULL COMMENT 'สถานะอนุมัติ',
  `created_user` varchar(50) DEFAULT NULL COMMENT 'ผู้บันทึก',
  `created_user_id` tinyint(3) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL COMMENT 'วันที่บันทึก',
  `updated_user` varchar(50) DEFAULT NULL COMMENT 'ผู้แก้ไข',
  `updated_user_id` tinyint(3) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL COMMENT 'วันที่แก้ไข',
  PRIMARY KEY (`leave_data_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_leave_data`
--

LOCK TABLES `t_leave_data` WRITE;
/*!40000 ALTER TABLE `t_leave_data` DISABLE KEYS */;
INSERT INTO `t_leave_data` VALUES (1,1,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาป่วย','สำนักงาน ก.พ.ร.','2017-06-12 04:03:22','นักพัฒนาระบบราชการ',NULL,'2017-06-08 00:00:00','1','2017-06-15 23:59:59','2',NULL,NULL,5.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,23,'7','0','กฤษณา แก้วด้วง',23,'2017-06-12 04:03:22','กฤษณา แก้วด้วง',23,'2017-06-12 10:00:02'),(2,2,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลากิจส่วนตัว','สำนักงาน ก.พ.ร.','2017-06-12 14:35:00','เจ้าพนักงานธุรการ','ddd','2017-06-01 00:00:00','1','2017-06-08 23:59:59','2',NULL,NULL,8.0,'erer6666',NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,6,'0','0','กนกอร จิระนภารัตน์',6,'2017-06-12 04:45:07','กนกอร จิระนภารัตน์',6,'2017-06-12 14:56:57'),(5,3,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาคลอดบุตร','สำนักงาน ก.พ.ร.','2017-06-12 05:10:34','นักพัฒนาระบบราชการ','หหกหก','2017-06-01 00:00:00','1','2017-06-15 23:59:59','2',NULL,NULL,15.0,'หกหห',NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,6,'0','0','กนกอร จิระนภารัตน์',6,'2017-06-12 05:10:34','กนกอร จิระนภารัตน์',6,'2017-06-12 15:07:14'),(6,1,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาป่วย','สำนักงาน ก.พ.ร.','2017-06-12 05:35:15','ผู้เชี่ยวชาญเฉพาะด้านการพัฒนาระบบราชการ','444','2017-06-02 00:00:00','1','2017-06-09 23:59:59','2',NULL,NULL,6.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,6,'0','0','กนกอร จิระนภารัตน์',6,'2017-06-12 05:35:15','กนกอร จิระนภารัตน์',6,'2017-06-12 11:59:42'),(7,1,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาป่วย','สำนักงาน ก.พ.ร.','2017-06-12 05:42:01','นักจัดการงานทั่วไป',NULL,'2017-06-01 00:00:00','1','2017-06-08 23:59:59','2',NULL,NULL,6.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,6,'0','0','กนกอร จิระนภารัตน์',6,'2017-06-12 05:42:01','กนกอร จิระนภารัตน์',6,'2017-06-12 15:07:19'),(8,1,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาป่วย','สำนักงาน ก.พ.ร.','2017-06-12 14:53:08','นักพัฒนาระบบราชการ','5555555555','2056-06-07 00:00:00','1','2017-09-30 23:59:59','2',NULL,NULL,1.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,6,'0','0','กนกอร จิระนภารัตน์',6,'2017-06-12 14:07:11','กนกอร จิระนภารัตน์',6,'2017-06-12 15:07:07'),(10,1,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาป่วย','สำนักงาน ก.พ.ร.','2017-06-12 17:07:01',NULL,'dddd','2017-06-01 00:00:00','1','2017-06-01 12:00:00','1',NULL,NULL,0.5,'ddd',NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,6,'2','0','กนกอร จิระนภารัตน์',6,'2017-06-12 17:07:01','กนกอร จิระนภารัตน์',6,'2017-06-12 17:07:01'),(11,4,2,'ลาพักผ่อน','2560','ขอลาพักผ่อน','สำนักงาน ก.พ.ร.','2017-06-12 17:09:03',NULL,NULL,'2017-06-01 00:00:00','1','2017-06-01 12:00:00','1',NULL,NULL,0.5,'eee',NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,6,'2','0','กนกอร จิระนภารัตน์',6,'2017-06-12 17:07:25','กนกอร จิระนภารัตน์',6,'2017-06-12 17:09:03'),(12,11,9,'ไปปฏิบัติราชการนอกสำนักงาน ก.พ.ร.','2560','การไปปฏิบัติราชการนอกสำนักงาน ก.พ.ร.','สำนักงาน ก.พ.ร.','2017-06-12 17:08:20',NULL,NULL,'2017-06-15 00:00:00','1','2017-06-15 12:00:00','1',NULL,NULL,0.5,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,6,'1',NULL,'กนกอร จิระนภารัตน์',6,'2017-06-12 17:08:20','กนกอร จิระนภารัตน์',6,'2017-06-12 17:08:20'),(13,1,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาป่วย','สำนักงาน ก.พ.ร.','2017-06-14 01:28:51','นักพัฒนาระบบราชการ',NULL,'2017-06-01 00:00:00','1','2017-06-01 12:00:00','1',NULL,NULL,0.5,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,23,'1',NULL,'กฤษณา แก้วด้วง',23,'2017-06-14 01:28:51','กฤษณา แก้วด้วง',23,'2017-06-14 01:28:51'),(14,4,2,'ลาพักผ่อน','2560','ขอลาพักผ่อน','สำนักงาน ก.พ.ร.','2017-06-14 01:29:50',NULL,NULL,'2017-06-01 00:00:00','1','2017-06-01 12:00:00','1',NULL,NULL,0.5,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,23,'1',NULL,'กฤษณา แก้วด้วง',23,'2017-06-14 01:29:50','กฤษณา แก้วด้วง',23,'2017-06-14 01:29:50'),(15,2,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลากิจส่วนตัว','สำนักงาน ก.พ.ร.','2017-06-14 13:58:06',NULL,'ก','2017-06-01 00:00:00','1','2017-06-02 23:59:59','2',NULL,NULL,2.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'1',NULL,'จันทรา บุญมาก',70,'2017-06-14 13:58:06','จันทรา บุญมาก',70,'2017-06-14 13:58:06'),(16,3,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาคลอดบุตร','สำนักงาน ก.พ.ร.','2017-06-14 14:01:46',NULL,'หหห','2017-06-01 00:00:00','1','2017-06-02 23:59:59','2',NULL,NULL,2.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'1',NULL,'จันทรา บุญมาก',70,'2017-06-14 14:01:46','จันทรา บุญมาก',70,'2017-06-14 14:01:46'),(17,3,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาคลอดบุตร','สำนักงาน ก.พ.ร.','2017-06-14 14:07:18',NULL,'ก','2017-06-08 00:00:00','1','2017-06-09 23:59:59','2',NULL,NULL,2.0,'กกก',NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'1',NULL,'จันทรา บุญมาก',70,'2017-06-14 14:07:18','จันทรา บุญมาก',70,'2017-06-14 14:07:18'),(18,6,4,'ลาอุปสมบท','2560','ขอลาอุปสมบท','สำนักงาน ก.พ.ร.','2017-06-14 14:12:33',NULL,NULL,'2017-06-14 00:00:00','1','2017-06-16 23:59:59','2',NULL,NULL,3.0,NULL,NULL,NULL,NULL,'0','ก','ก','0000-00-00 00:00:00','ก','ก','0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'1',NULL,'จันทรา บุญมาก',70,'2017-06-14 14:12:33','จันทรา บุญมาก',70,'2017-06-14 14:12:33'),(19,4,2,'ลาพักผ่อน','2560','ขอลาพักผ่อน','สำนักงาน ก.พ.ร.','2017-06-14 14:12:57',NULL,NULL,'2017-06-01 00:00:00','1','2017-06-02 23:59:59','2',NULL,NULL,2.0,'ก',NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'1',NULL,'จันทรา บุญมาก',70,'2017-06-14 14:12:57','จันทรา บุญมาก',70,'2017-06-14 14:12:57'),(20,3,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาคลอดบุตร','สำนักงาน ก.พ.ร.','2017-06-14 14:13:34',NULL,'ก','2017-06-16 00:00:00','1','2017-06-29 23:59:59','2',NULL,NULL,14.0,'ก',NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'1',NULL,'จันทรา บุญมาก',70,'2017-06-14 14:13:34','จันทรา บุญมาก',70,'2017-06-14 14:13:34'),(21,13,11,'ลากรณีพิเศษ','2560','ลากิจส่วนตัวเพื่อเลี้ยงดูบุตร','สำนักงาน ก.พ.ร.','2017-06-14 14:14:20','นักพัฒนาระบบราชการ','กก','2017-06-29 00:00:00','1','2017-06-30 23:59:59','2',NULL,NULL,2.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'2','0','จันทรา บุญมาก',70,'2017-06-14 14:14:20','จันทรา บุญมาก',70,'2017-06-14 14:14:20'),(22,15,11,'ลากรณีพิเศษ','2560','ลาไปฟื้นฟูสมรรถภาพด้านอาชีพ','สำนักงาน ก.พ.ร.','2017-06-14 14:15:13','นักพัฒนาระบบราชการ','กก','2017-06-23 00:00:00','1','2017-06-24 23:59:59','2',NULL,NULL,2.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'2','0','จันทรา บุญมาก',70,'2017-06-14 14:15:13','จันทรา บุญมาก',70,'2017-06-14 14:15:13'),(23,9,7,'ลาไปศึกษา ฝึกอบรม ดูงาน ประชุม หรือปฏิบัติการวิจัยใน/ต่างประเทศ','2560','กกก','สำนักงาน ก.พ.ร.','2017-06-14 14:16:48','นักพัฒนาระบบราชการ',NULL,'2017-06-21 00:00:00','1','2017-06-23 23:59:59','2',NULL,NULL,3.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'2','0','จันทรา บุญมาก',70,'2017-06-14 14:15:45','จันทรา บุญมาก',70,'2017-06-14 14:16:48'),(24,7,5,'ลาไปประกอบพิธีฮัจย์ ณ เมืองเมกกะ ประเทศซาอุดีอาระเบีย','2560','ขอลาไปประกอบพิธีฮัจย์','สำนักงาน ก.พ.ร.','2017-06-14 14:33:48',NULL,NULL,'2017-06-01 00:00:00','1','2017-06-09 23:59:59','2',NULL,NULL,9.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'1',NULL,'จันทรา บุญมาก',70,'2017-06-14 14:33:48','จันทรา บุญมาก',70,'2017-06-14 14:33:48'),(25,1,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาป่วย','สำนักงาน ก.พ.ร.','2017-06-14 16:00:11',NULL,NULL,'2017-06-17 00:00:00','1','2017-01-21 23:59:59','2',NULL,NULL,1.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'1',NULL,'จันทรา บุญมาก',70,'2017-06-14 16:00:11','จันทรา บุญมาก',70,'2017-06-14 16:00:11'),(26,1,1,'ลาป่วย ลากิจส่วนตัว ลาคลอดบุตร','2560','ลาป่วย','สำนักงาน ก.พ.ร.','2017-06-14 16:12:00',NULL,NULL,'2018-06-08 00:00:00','1','0457-07-28 23:59:59','2',NULL,NULL,1.0,NULL,NULL,NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,'0',NULL,NULL,'0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,70,'1',NULL,'จันทรา บุญมาก',70,'2017-06-14 16:12:00','จันทรา บุญมาก',70,'2017-06-14 16:12:00');
/*!40000 ALTER TABLE `t_leave_data` ENABLE KEYS */;
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
