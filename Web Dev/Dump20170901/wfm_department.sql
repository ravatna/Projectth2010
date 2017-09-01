CREATE DATABASE  IF NOT EXISTS `wfm` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wfm`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: wfm
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
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department` (
  `dept_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dept_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`dept_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department`
--

LOCK TABLES `department` WRITE;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` VALUES ('10000','ฝ่ายทรัพยากรมนุษย์'),('11100','แผนกบุคคล'),('11110','หน่วยว่าจ้าง'),('11120','หน่วยค่าจ้าง'),('11130','หน่วยงานกฎหมายและประสานงานราชการ'),('11140','หน่วยงานประชาสัมพันธ์'),('11200','แผนกฝึกอบรม'),('11210','หน่วยฝึกอบรม'),('13000','ส่วนธุรการ'),('13100','แผนกธุรการ'),('13133','ทีมซ่อมบำรุง'),('13200','แผนกโครงสร้าง&งานระบบ'),('13210','หน่วยโยธา'),('13220','หน่วยซ่อมบำรุงเครื่องปรับอากาศ'),('20000','ฝ่ายพาณิชย์'),('21000','ส่วนสารสนเทศ'),('21100','แผนกโปรแกรมและวิเคราะห์ระบบ'),('21200','แผนกโอเปอร์เรเตอร์'),('21210','หน่วยโอเปอร์เรเตอร์'),('21300','แผนกบริหารระบบ'),('21310','หน่วยบริหารระบบ'),('22000','ส่วนจัดซื้อ'),('22100','แผนกจัดซื้อในประเทศ'),('22110','หน่วยจัดซื้อในประเทศ'),('22200','แผนกจัดซื้อต่างประเทศ'),('22210','หน่วยจัดซื้อต่างประเทศ'),('23000','ส่วนการเงิน'),('23100','แผนกการเงิน'),('24000','ส่วนบัญชี'),('24100','แผนกบัญชีทั่วไป');
/*!40000 ALTER TABLE `department` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:10
