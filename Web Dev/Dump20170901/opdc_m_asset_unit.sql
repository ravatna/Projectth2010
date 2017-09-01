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
-- Table structure for table `m_asset_unit`
--

DROP TABLE IF EXISTS `m_asset_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_asset_unit` (
  `asset_unit_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_unit_name` varchar(10) NOT NULL,
  `asset_unit_desc` varchar(100) NOT NULL,
  `status` char(1) NOT NULL,
  `created_user` varchar(250) NOT NULL,
  `created_user_id` int(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` varchar(250) NOT NULL,
  `updated_user_id` int(10) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`asset_unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=279 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_asset_unit`
--

LOCK TABLES `m_asset_unit` WRITE;
/*!40000 ALTER TABLE `m_asset_unit` DISABLE KEYS */;
INSERT INTO `m_asset_unit` VALUES (1,'EA','ชิ้น','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(2,'\"','นิ้ว','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(3,'\"2','ตารางนิ้ว','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(4,'\"3','ลูกบาศ์กนิ้ว','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(5,'%O','ต่อ mile','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(6,'A','แอมแปร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(7,'A/V','ซีเมนส์ต่อเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(8,'ACR','เอเคอร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(9,'AU','หน่วยนับกิจกรรม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(10,'BAG','ถุง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(11,'BAR','bar','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(12,'BK','เล่ม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(13,'BPH','แกลลอนต่อชั่วโมง(US)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(14,'BQK','เบกเคอร์เรล/กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(15,'BT.','ขวด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(16,'C3S','ลูกบาศ์กเซนติเมตร/วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(17,'CAB','ตู้','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(18,'CAN','กระป๋อง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(19,'CAR','คัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(20,'CCM','ลูกบาศ์กเซนติเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(21,'CD','แรงเทียน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(22,'CD3','ลูกบาศ์กเดซิเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(23,'CL','เซนติลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(24,'CM','เซนติเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(25,'CM2','ตารางเซนติเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(26,'CMH','เซนติเมตร/ชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(27,'CMS','เซนติเมตร/วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(28,'CRT','กล่อง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(29,'CT','คาร์ตัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(30,'CUP','ถ้วย','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(31,'CV','หีบ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(32,'DAY','วัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(33,'DEG','องศา','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(34,'DM','เดซิเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(35,'DR','ถัง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(36,'DZ','โหล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(37,'EZ','ชิ้น','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(38,'EML','หน่วยเอมไซน์/มิลลิลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(39,'EU','หน่วยเอมไซน์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(40,'F','ฟาเรด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(41,'FIL','แฟ้ม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(42,'FOZ','ออนซ์หน่วยวัดของเหลว US','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(43,'FT','ฟุต','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(44,'FT2','ตารางฟุต','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(45,'FT3','ลูกบาศ์กฟุต','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(46,'FYR','กิกะจูล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(47,'G','กรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(48,'GA','US แกลลอน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(49,'GAU','กรัมทองคำ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(50,'GHG','กรัม/เฮกโตกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(51,'GKG','กรัม/กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(52,'GL','gram act.ingrd / liter','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(53,'GLI','กรัม/ลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(54,'GM','กรัมต่อโมล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(55,'GM2','กรัม/ตารางเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(56,'GM3','กรัมต่อลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(57,'GOH','กิกะโอห์ม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(58,'GPM','แกลลอนต่อไมล์ (US)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(59,'GRO','ตัวใหญ่','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(60,'GRP','กลุ่ม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(61,'H','ชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(62,'HA','เฮกตาร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(63,'HL','เฮกโตลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(64,'HPA','เฮกโตปาสคาล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(65,'HR.','ชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(66,'HZ','เฮิรตซ์ (หนึ่งต่อวินาที)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(67,'IB','พิโคฟาเรด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(68,'J','จูล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(69,'JKG','จูล/กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(70,'JMO','จูล/โมล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(71,'JOB','งาน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(72,'K','เคลวิน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(73,'KA','กิโลแอมแปร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(74,'KAI','Kilogram act. Ingrd.','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(75,'KBK','กิโลเบกเคอร์เรล/กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(76,'KD3','กิโลกรมต่อลูกบาศ์กเดซิเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(77,'KG','กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(78,'KGF','กิโลกรัม/ตารางเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(79,'KGK','กิโลกรัม/กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(80,'KGM','กิโลกรัม/โมล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(81,'KGS','กิโลกรัมต่อวินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(82,'KHZ','กิโลเฮิรตซ์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(83,'KIK','kg act.ingrd. /kg','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(84,'KJ','กิโลจูล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(85,'KJK','กิโลจูล/กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(86,'KJM','กิโลจูล/โมล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(87,'KM','กิโลเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(88,'KM2','ตารางกิโลเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(89,'MNH','กิโลเมตรต่อชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(90,'KMK','ลูกบาศ์กเมตร/ลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(91,'KMN','เคลวิน/นาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(92,'KMS','เคลวิน/วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(93,'KOH','กิโลโอห์ม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(94,'KPA','กิโลปาสคาล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(95,'KV','กิโลโวลต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(96,'KVA','กิโลโวลต์แอมแปร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(97,'KW','กิโลวัตต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(98,'KWH','กิโลวัตต์ชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(99,'L','ลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(100,'LB','ปอนด์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(101,'LHK','ลิตรต่อ  100 กิโลเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(102,'LMI','ลิตร/นาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(103,'LMS','ลิตร/โมลวินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(104,'LPH','ลิตรต่อชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(105,'LT','Kilotonne','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(106,'M','เมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(107,'M%','เปอร์เซ็นต์มวล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(108,'M%O','Permille mass','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(109,'M/L','โมลต่อลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(110,'M/M','โมลต่อลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(111,'M/S','เมตร/วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(112,'M2','ตารางเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(113,'M-2','1/ตารางเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(114,'M2S','ตารางเมตร/วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(115,'M3','ลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(116,'M3H','ลูกบาศ์กเมตร/ชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(117,'M3S','ลูกบาศ์กเมตร/วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(118,'MA','มิลลิแอมแปร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(119,'MAC','เครื่อง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(120,'MBA','มิลลิบาร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(121,'MBZ','มิเตอร์บาร์/วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(122,'MD','มัด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(123,'MEJ','เมกะจูล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(124,'MG','มิลลิกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(125,'MGE','มิลลิกรัม/ตารางเซนติเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(126,'MGG','มิลลิกรัม/กรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(127,'MGK','มิลลิกรัม/กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(128,'MGL','มิลลิกรัม/ลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(129,'MGO','เมกะโอห์ม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(130,'MGQ','มิลลิกรัม/ลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(131,'MGW','เมกะวัตต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(132,'MH','เมตร/ชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(133,'MHV','เมกะโวลต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(134,'MHZ','เมกะเฮิรตซ์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(135,'MI','ไมล์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(136,'MI2','ตารางไมล์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(137,'MIJ','มิลลิจูล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(138,'MIN','นาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(139,'MIS','ไมโครวินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(140,'ML','มิลลิลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(141,'MLI','Milliliter act. Ingr.','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(142,'MLK','มิลลิลิตร/ลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(143,'MM','มิลลิเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(144,'MM2','ตารางมิลลิเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(145,'MM3','ลูกบาศ์กมิลลิเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(146,'MMA','มิลลิเมตร/ปี','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(147,'MMG','มิลลิโมล/กรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(148,'MMH','มิลลิโมล/ชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(149,'MMK','มิลลิโมล/กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(150,'MMO','มิลลิโมล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(151,'MMS','มิลลิเมตร/วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(152,'MN','เมกะนิวตัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(153,'MNM','มิลลินิวตัน/เมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(154,'MOK','โมล/กิโลกรัม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(155,'MOL','โมล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(156,'MPA','เมกะปาสคาล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(157,'MPB','อัตราส่วนพันล้าน (มวล)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(158,'MPG','ไมล์ต่อแกลลอน (US)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(159,'MPL','มิลลิโมลต่อลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(160,'MPM','อัตราส่วนล้าน (มวล)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(161,'MPS','มิลลิปาสคาลวินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(162,'MPT','อัตราส่วนล้านล้าน (มวล)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(163,'MPZ','มิเตอร์ปาสคาล/วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(164,'MS','พิโควินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(165,'MS2','เมตร/วินาทีกำลังสอง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(166,'MSC','ไมโครซเมนส์ต่อเซนติเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(167,'MSE','มิลลิวินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(168,'MTE','มิลลิเทสลา','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(169,'MTH','เดือน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(170,'MV','มิลลิโวลต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(171,'MWH','เมกะวัตต์ ชั่วโมง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(172,'N','นิวตัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(173,'NA','นาโนแอมแปร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(174,'NAM','นาโนเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(175,'NG','Gram act. Ingd.','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(176,'NI','กิโลนิวตัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(177,'NM','นิวตัน/เมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(178,'NMM','นิวตัน/ตารางมิลลิเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(179,'NS','นาโนวินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(180,'OC','ออนซ์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(181,'OHM','โอห์ม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(182,'P','จุด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(183,'PA','ปาสคาล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(184,'PAA','คู่','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(185,'PAC','แพค/ห่อ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(186,'PAL','แพลเลต','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(187,'PAS','ปาสคาลวินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(188,'PC.','เมกะโวลต์แอมแปร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(189,'PGL','กิโลกรัมต่อลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(190,'PMI','หนึง/นาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(191,'PPB','อัตราส่วนพันล้าน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(192,'PPM','อัตราส่วนล้าน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(193,'PPT','อัตราส่วนล้านล้าน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(194,'PRD','งวด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(195,'PRS','คน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(196,'PT','ไพนท์,หน่วยวัดขนาดของเหลว US','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(197,'QML','กิโลโมล','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(198,'QT','ควอรท, หน่วยวัดขนาดของเหลว US','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(199,'RF','มิลลิฟาเรด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(200,'RHO','กรัม/ลูกบาศ์กเซนติเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(201,'RM','รีม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(202,'ROL','Roll','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(203,'R-U','นาโนฟาเรด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(204,'S','วินาที','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(205,'SHE','ผืน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(206,'SHP','ลำ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(207,'SHT','แผ่น','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(208,'ST','ชุด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(209,'STK','ท่อน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(210,'SYS','ระบบ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(211,'T','หลักพัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(212,'TC3','1/ลูกบาศ์กเซนติเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(213,'TES','เทสลา','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(214,'TM','ครั้ง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(215,'TM3','1/ลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(216,'TO','ตัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(217,'TOM','ตัน/ลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(218,'TON','US ตัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(219,'TUB','ท่อ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(220,'U1','แท่ง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(221,'U10','ขด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(222,'U11','โคม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(223,'U12','คิว','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(224,'U13','ปิ๊บ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(225,'U14','ซอง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(226,'U15','ดวง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(227,'U16','ดอก','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(228,'U17','แผง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(229,'U18','ตลับ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(230,'U19','เที่ยว','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(231,'U2','ตัว','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(232,'U20','นัด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(233,'U21','แท่น','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(234,'U22','บาน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(235,'U23','ใบ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(236,'U24','ภาพ/รูป','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(237,'U25','เรือน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(238,'U26','ล้อ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(239,'U27','ลัง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(240,'U28','วัง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(241,'U29','เส้น','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(242,'U3','ลูก','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(243,'U30','หลอด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(244,'U31','หลัง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(245,'U32','เม็ด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(246,'U33','ไมโครแอมแปร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(247,'U34','ไมโครฟาเรด','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(248,'U35','ไมโครเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(249,'U36','ไมโครกรัม/ลูกบาศ์กเมตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(250,'U37','ไมโครลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(251,'U38','ฟาเรนไฮต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(252,'U39','องศาเซลเซียส','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(253,'U4','กระสอบ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(254,'U40','ไมโครกรัม/ลิตร','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(255,'U41','อัน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(256,'U42','สนาม','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(257,'U5','กรง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(258,'U6','กรอบ','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(259,'U7','กระถาง','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(260,'U8','กระบอก','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(261,'U9','ก้อน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(262,'UNT','หน่วย','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(263,'V','โวลต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(264,'V%','ปริมาตรเป็นเปอร์เซ็นต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(265,'V%O','ปริมาณ Permille','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(266,'VA','มิลลิวัตต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(267,'VAL','วัสดุที่คิดมูลค่าเท่านั้น','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(268,'VAM','โวลต์แอมแปร์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(269,'VPB','อัตราส่วนพันล้าน (ปริมาตร)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(270,'VPM','อัตราส่วนล้าน (ปริมาตร)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(271,'VPT','อัตราส่วนล้านล้าน (ปริมาตร)','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(272,'W','วัตต์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(273,'WKS','สัปดาห์','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(274,'Y','ปี','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(275,'YD','หลา','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(276,'YD2','ตารางหลา','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(277,'YD3','ลูกบาศ์กหลา','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00'),(278,'คน','คน','1','ADMIN',0,'2017-03-27 00:00:00','ADMIN',0,'2017-03-27 00:00:00');
/*!40000 ALTER TABLE `m_asset_unit` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:13
