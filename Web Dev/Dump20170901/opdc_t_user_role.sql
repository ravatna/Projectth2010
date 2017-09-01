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
-- Table structure for table `t_user_role`
--

DROP TABLE IF EXISTS `t_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_user_role` (
  `user_id` int(10) unsigned NOT NULL,
  `sys_name` varchar(50) NOT NULL,
  `sys_role_id` tinyint(3) unsigned NOT NULL,
  `sys_role` varchar(100) NOT NULL,
  `created_user` varchar(255) NOT NULL,
  `created_user_id` int(10) unsigned NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` varchar(255) NOT NULL,
  `updated_user_id` int(10) unsigned NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`sys_name`,`sys_role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_user_role`
--

LOCK TABLES `t_user_role` WRITE;
/*!40000 ALTER TABLE `t_user_role` DISABLE KEYS */;
INSERT INTO `t_user_role` VALUES (1,'e_asset',3,'ธุรการกอง','Administrator',0,'2017-06-26 11:50:54','Administrator',0,'2017-06-26 11:50:54'),(1,'leave_absence',1,'','กฤษณา แก้วด้วง',23,'2017-06-14 01:25:02','กฤษณา แก้วด้วง',23,'2017-06-14 01:25:02'),(2,'leave_absence',1,'','กฤษณา แก้วด้วง',23,'2017-06-14 01:24:40','กฤษณา แก้วด้วง',23,'2017-06-14 01:24:40'),(3,'e_asset',2,'พัสดุกลาง','Administrator',0,'2017-06-23 16:15:57','Administrator',0,'2017-06-23 16:15:57'),(6,'e_asset',2,'พัสดุกลาง','Administrator',0,'2017-06-26 11:50:39','Administrator',0,'2017-06-26 11:50:39'),(21,'e_asset',2,'พัสดุกลาง','Administrator',0,'2017-06-23 15:55:41','Administrator',0,'2017-06-23 15:55:41'),(23,'e_asset',1,'ผู้ดูแลระบบ','admin',0,'2017-06-12 00:00:00','admin',0,'2017-06-12 00:00:00'),(70,'leave_absence',1,'ผู้ดูแลระบบ','Administrator',0,'2017-06-14 10:54:43','Administrator',0,'2017-06-14 10:54:43'),(81,'leave_absence',1,'','กฤษณา แก้วด้วง',23,'2017-06-14 01:08:37','กฤษณา แก้วด้วง',23,'2017-06-14 01:08:37'),(110,'leave_absence',1,'','กฤษณา แก้วด้วง',23,'2017-06-14 01:09:25','กฤษณา แก้วด้วง',23,'2017-06-14 01:09:25');
/*!40000 ALTER TABLE `t_user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:17
