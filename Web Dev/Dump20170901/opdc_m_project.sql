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
-- Table structure for table `m_project`
--

DROP TABLE IF EXISTS `m_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_project` (
  `proj_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proj_code` varchar(50) NOT NULL,
  `proj_fiscal_year` char(4) DEFAULT NULL COMMENT 'ปีงบ',
  `str_id` int(10) DEFAULT NULL COMMENT 'ยุทธศาสตร์',
  `str_asp_id` int(10) DEFAULT NULL COMMENT 'ด้าน',
  `proj_name` varchar(255) NOT NULL,
  `proj_name_sht` varchar(50) NOT NULL,
  `proj_budget_type` varchar(50) NOT NULL,
  `proj_budget` int(10) unsigned NOT NULL,
  `org_parent_id` int(10) unsigned NOT NULL,
  `org_resp_id` int(10) unsigned NOT NULL,
  `proj_date` date NOT NULL,
  `proj_yellow_code` varchar(50) NOT NULL,
  `proj_contract_type` varchar(50) NOT NULL,
  `proj_company_consul` varchar(200) DEFAULT NULL COMMENT 'บริษัท / ที่ปรึกษา',
  `proj_contract_id` int(10) unsigned NOT NULL,
  `proj_financial` decimal(15,0) unsigned NOT NULL,
  `proj_contract_date` date NOT NULL,
  `proj_start_date` date NOT NULL,
  `proj_end_date` int(10) unsigned NOT NULL,
  `proj_desc` text NOT NULL,
  `proj_parent_id` int(10) unsigned NOT NULL,
  `controller_user1_id` int(10) unsigned NOT NULL,
  `controller_user2_id` int(10) unsigned NOT NULL,
  `controller_user3_id` int(10) unsigned NOT NULL,
  `status` char(1) NOT NULL,
  `created_user` varchar(255) NOT NULL,
  `created_user_id` int(10) unsigned NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` varchar(255) NOT NULL,
  `updated_user_id` int(10) unsigned NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`proj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_project`
--

LOCK TABLES `m_project` WRITE;
/*!40000 ALTER TABLE `m_project` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_project` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:24
