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
-- Table structure for table `m_opdcint`
--

DROP TABLE IF EXISTS `m_opdcint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_opdcint` (
  `int_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `org_name_th` varchar(255) NOT NULL,
  `org_name_en` varchar(255) NOT NULL,
  `org_vision` mediumtext,
  `org_vision_updated` datetime DEFAULT NULL,
  `org_mission` mediumtext,
  `org_mission_updated` datetime DEFAULT NULL,
  `org_purpose` mediumtext NOT NULL,
  `org_purpose_updated` datetime NOT NULL,
  `org_popularity` mediumtext NOT NULL,
  `org_popularity_updated` datetime NOT NULL,
  `org_strategy` mediumtext NOT NULL,
  `org_strategy_updated` datetime NOT NULL,
  `org_policy` mediumtext NOT NULL,
  `org_policy_updated` datetime NOT NULL,
  `org_place` mediumtext NOT NULL,
  `org_place_updated` datetime NOT NULL,
  `org_authority` mediumtext NOT NULL,
  `org_authority_updated` datetime NOT NULL,
  `org_tel` varchar(255) NOT NULL,
  `org_tel_updated` datetime NOT NULL,
  `org_fax` varchar(255) NOT NULL,
  `org_fax_updated` datetime NOT NULL,
  `org_website` varchar(255) NOT NULL,
  `org_website_updated` datetime NOT NULL,
  `org_logo` text NOT NULL,
  `nodelv` tinyint(3) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `parent_key` varchar(255) NOT NULL,
  `controller_user1` varchar(255) NOT NULL,
  `controller_user1_id` int(10) unsigned NOT NULL,
  `controller_user1_updated` datetime NOT NULL,
  `controller_user2` varchar(255) NOT NULL,
  `controller_user2_id` int(11) NOT NULL,
  `controller_user2_updated` datetime NOT NULL,
  `controller_user3` varchar(255) NOT NULL,
  `controller_user3_id` int(11) NOT NULL,
  `controller_user3_updated` datetime NOT NULL,
  `org_desc` varchar(255) NOT NULL,
  `org_desc_updated` datetime NOT NULL,
  `created_user` varchar(255) NOT NULL,
  `created_user_id` int(10) unsigned NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_user` varchar(255) NOT NULL,
  `updated_user_id` int(10) unsigned NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`int_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_opdcint`
--

LOCK TABLES `m_opdcint` WRITE;
/*!40000 ALTER TABLE `m_opdcint` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_opdcint` ENABLE KEYS */;
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
