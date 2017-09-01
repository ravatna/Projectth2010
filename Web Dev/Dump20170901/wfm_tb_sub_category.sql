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
-- Table structure for table `tb_sub_category`
--

DROP TABLE IF EXISTS `tb_sub_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_sub_category` (
  `sub_category_id` varchar(3) NOT NULL COMMENT 'เลขหมวดย่อย',
  `sub_category_name` varchar(200) NOT NULL COMMENT 'ชื่อหมวดย่อย',
  `category_id` varchar(3) NOT NULL COMMENT 'เลขหมวดหลัก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_sub_category`
--

LOCK TABLES `tb_sub_category` WRITE;
/*!40000 ALTER TABLE `tb_sub_category` DISABLE KEYS */;
INSERT INTO `tb_sub_category` VALUES ('000','คอมพิวเตอร์ ความรู้ทั่วไป ','000'),('010','บรรณานุกรม แคตตาล็อก ','000'),('020','บรรณารักษศาสตร์และสารนิเทศศาสตร์ ','000'),('030','หนังสือรวบรวมความรู้ทั่วไป สารานุกรม','000'),('040','ยังไม่กำหนดใช้','000'),('050','สิ่งพิมพ์ต่อเนื่อง วารสาร และดรรชนี','000'),('060','องค์การต่างๆ พิพิธภัณฑวิทยา','000'),('070','วารสารศาสตร์ การพิมพ์','000'),('080','ชุมนุมนิพนธ์','000'),('090','ต้นฉบับตัวเขียน หนังสือหายาก ','000'),('100','ปรัชญา','100'),('110','อภิปรัชญา','100'),('120','ญาณวิทยา ความเป็นเหตุผล ความเป็นมนุษย์','100'),('130','จิตวิทยานามธรรม','100'),('140','แนวความคิดปรัชญาเฉพาะกลุ่ม','100'),('150','จิตวิทยา','100'),('160','ตรรกศาสตร์ ตรรกวิทยา','100'),('170','จริยศาสตร์ ศีลธรรม','100'),('180','ปรัชญาสมัยโบราณ สมัยกลาง ตะวันออก','100'),('190','ปรัชญาตะวันตกสมัยใหม่','100'),('201','a','100');
/*!40000 ALTER TABLE `tb_sub_category` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:08
