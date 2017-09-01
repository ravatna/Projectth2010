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
-- Table structure for table `t_leave_day`
--

DROP TABLE IF EXISTS `t_leave_day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_leave_day` (
  `user_id` int(10) unsigned NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `budget_year` char(4) NOT NULL,
  `limit_day` decimal(4,1) NOT NULL DEFAULT '0.0',
  `prev_remain` decimal(4,1) NOT NULL DEFAULT '0.0',
  `prev_year` decimal(4,1) NOT NULL DEFAULT '0.0',
  `used_day` decimal(4,1) NOT NULL DEFAULT '0.0',
  `approved_day` decimal(4,1) NOT NULL DEFAULT '0.0',
  PRIMARY KEY (`user_id`,`leave_type_id`,`budget_year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_leave_day`
--

LOCK TABLES `t_leave_day` WRITE;
/*!40000 ALTER TABLE `t_leave_day` DISABLE KEYS */;
INSERT INTO `t_leave_day` VALUES (70,1,'2560',0.0,0.0,0.0,0.0,0.0),(70,1,'2561',0.0,0.0,0.0,0.0,0.0),(70,3,'2560',90.0,0.0,0.0,0.0,0.0),(70,4,'2560',10.0,30.0,20.0,0.0,0.0),(70,5,'2560',10.0,0.0,0.0,0.0,0.0),(70,6,'2560',0.0,0.0,0.0,0.0,0.0),(70,7,'2560',0.0,0.0,0.0,0.0,0.0),(70,9,'2560',365.0,0.0,0.0,0.0,0.0),(70,13,'2560',150.0,0.0,0.0,0.0,0.0),(70,15,'2560',365.0,0.0,0.0,0.0,0.0);
/*!40000 ALTER TABLE `t_leave_day` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:21
