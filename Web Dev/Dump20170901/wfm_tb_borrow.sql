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
-- Table structure for table `tb_borrow`
--

DROP TABLE IF EXISTS `tb_borrow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_borrow` (
  `br_id` int(11) NOT NULL AUTO_INCREMENT,
  `identification` varchar(13) NOT NULL COMMENT 'รหัสผู้ขอยืม',
  `br_date` datetime NOT NULL COMMENT 'วันที่ขอยืม',
  `rec_date` datetime DEFAULT NULL COMMENT 'รับหนังสือแล้ว',
  `rec_status` tinyblob COMMENT 'เช็ครับหนังสือ',
  `rec_realdate` datetime DEFAULT NULL COMMENT 'วันรับหนังสือจริง',
  `ret_date` datetime DEFAULT NULL,
  `ret_realdate` datetime DEFAULT NULL,
  `ret_status` varchar(2) DEFAULT NULL,
  `doc_date` datetime NOT NULL,
  `br_status` tinyint(4) NOT NULL,
  `br_no` varchar(10) NOT NULL,
  `remark` varchar(255) NOT NULL COMMENT 'เหตุผลในการยืมหนังสือ',
  `u_tel` varchar(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_borrow` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`br_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_borrow`
--

LOCK TABLES `tb_borrow` WRITE;
/*!40000 ALTER TABLE `tb_borrow` DISABLE KEYS */;
INSERT INTO `tb_borrow` VALUES (51,'111111111111','0000-00-00 00:00:00','2017-02-07 16:45:32',NULL,'2017-02-07 16:45:32','2017-02-08 00:00:00',NULL,NULL,'2017-02-07 00:00:00',3,'LIS-000051','ส','000000000',1,1),(52,'111111111111','0000-00-00 00:00:00','2017-02-07 16:47:55',NULL,'2017-02-07 16:47:55','2017-02-08 00:00:00',NULL,NULL,'2017-02-07 00:00:00',3,'LIS-000051','ส','000000000',1,1);
/*!40000 ALTER TABLE `tb_borrow` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:09
