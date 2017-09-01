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
-- Table structure for table `m_asset_type`
--

DROP TABLE IF EXISTS `m_asset_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_asset_type` (
  `asset_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_type_name` varchar(250) NOT NULL,
  `asset_type_detail` text,
  `asset_type_code` varchar(8) NOT NULL COMMENT 'หมวดสินทรัพย์ class',
  `status` char(1) NOT NULL,
  `created_user` varchar(250) NOT NULL,
  `created_user_id` int(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` varchar(250) NOT NULL,
  `updated_user_id` int(10) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`asset_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_asset_type`
--

LOCK TABLES `m_asset_type` WRITE;
/*!40000 ALTER TABLE `m_asset_type` DISABLE KEYS */;
INSERT INTO `m_asset_type` VALUES (1,'สิ่งก่อสร้าง','ใช้คอนกรีตเสริมเหล็กหรือโครงเล็กเป็นส่วนประกอบหลัก อย่างต่ำ 15 ปี อย่างสูง 25 ปี\nใช้ไม้หรือวัสดุอื่น ๆ เป็นส่วนประกอบหลัก อย่างต่ำ 5 ปี อย่างสูง 15 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(2,'ครุภัณฑ์สำนักงาน','อย่างต่ำ 3 ปี อย่างสูง 12 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(3,'ครุภัณฑ์ยานพาหนะและขนส่ง','อย่างต่ำ 5 ปี อย่างสูง 30 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(4,'ครุภัณฑ์ไฟฟ้าและวิทยุ','อย่างต่ำ 5 ปี อย่างสูง 10 ปี\n(ยกเว้นเครื่องกำเนิดไฟฟ้าให้มีอายุการใช้งาน 15 - 20 ปี)','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(5,'ครุภัณฑ์โฆษณาและเผยแพร่','อย่างต่ำ 5 ปี อย่างสูง 10 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(6,'ครุภัณฑ์การเกษตร','เครื่องมือและอุปกรณ์ อย่างต่ำ 2 ปี อย่างสูง 5 ปี\nเครื่องจักรกล อย่างต่ำ 3 ปี อย่างสูง 10 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(7,'ครุภัณฑ์โรงงาน ','เครื่องมือและอุปกรณ์ อย่างต่ำ 2 ปี อย่างสูง 5 ปี\nเครื่องจักรกล อย่างต่ำ 3 ปี อย่างสูง 10 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(8,'ครุภัณฑ์สำรวจ','อย่างต่ำ 5 ปี อย่างสูง 10 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(9,'ครุภัณฑ์การแพทย์และวิทยาศาสตร์','อย่างต่ำ 5 ปี อย่างสูง 15 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(10,'ครุภัณฑ์คอมพิวเตอร์','อย่างต่ำ 3 ปี อย่างสูง 5 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(11,'ครุภัณฑ์ดนตรี/นาฏศิลป์','อย่างต่ำ 2 ปี อย่างสูง 5 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(12,'ครุภัณฑ์การศึกษา','อย่างต่ำ 2 ปี อย่างสูง 5 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(13,'ครุภัณฑ์งานบ้านงานครัว','อย่างต่ำ 2 ปี อย่างสูง 5 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(14,'ครุภัณฑ์กีฬา/กายภาพ','อย่างต่ำ 2 ปี อย่างสูง 5 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(15,'ครุภัณฑ์อาวุธ','อย่างต่ำ 5 ปี อย่างสูง 10 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(16,'ครุภัณฑ์สนาม','อย่างต่ำ 2 ปี อย่างสูง 5 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(17,'อาคารถาวร','อย่างต่ำ 15 ปี อย่างสูง 40 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(18,'อาคารชั่วคราว/ โรงเรือน','อย่างต่ำ 8 ปี อย่างสูง 15 ปี','','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(19,'ครุภัณฑ์ก่อสร้าง','เครื่องมือและอุปกรณ์ อย่างต่ำ 2 ปี อย่างสูง 5 ปี\nเครื่องจักรกล อย่างต่ำ 3 ปี อย่างสูง 10 ปี','','1','ADMIN',0,'2017-06-22 00:00:00','ADMIN',0,'2017-06-22 00:00:00'),(20,'สินทรัพย์โครงสร้างพื้นฐาน','ถนนคอนกรีต อย่างต่ำ 10 ปี อย่างสูง 20 ปี\nถนนลาดยาง อย่างต่ำ 3 ปี อย่างสูง 10 ปี\nสะพานคอนกรีตเสริมเหล็ก อย่างต่ำ 20 ปี อย่างสูง 50 ปี\nเขื่อนดิน อย่างต่ำ 20 ปี อย่างสูง 50 ปี\nเขื่อนปูน อย่างต่ำ 50 ปี อย่างสูง 80 ปี\nอ่างเก็บน้ำ อย่างต่ำ 30 ปี อย่างสูง 80 ปี','','1','ADMIN',0,'2017-06-22 00:00:00','ADMIN',0,'2017-06-22 00:00:00'),(21,'ครุภัณฑ์อื่น','อย่างต่ำ 2 ปี อย่างสูง 15 ปี','','1','ADMIN',0,'2017-06-22 00:00:00','ADMIN',0,'2017-06-22 00:00:00'),(22,'สินทรัพย์ไม่มีตัวตน','อย่างต่ำ 2 ปี อย่างสูง 20 ปี','','1','ADMIN',0,'2017-06-22 00:00:00','ADMIN',0,'2017-06-22 00:00:00');
/*!40000 ALTER TABLE `m_asset_type` ENABLE KEYS */;
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
