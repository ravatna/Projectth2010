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
-- Table structure for table `m_document_main`
--

DROP TABLE IF EXISTS `m_document_main`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_document_main` (
  `document_receiv_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doc_year` varchar(4) NOT NULL,
  `doc_Main_type` char(1) NOT NULL COMMENT 'รับภายนอก = 1,รับภายใน =2, ส่งภายนอก=3,ส่งภายใน=   4,หนังสือเวียน = 5 ',
  `doc_register_number_id` varchar(100) NOT NULL COMMENT 'เลขทะเบียน',
  `doc_book_number_id` varchar(100) NOT NULL COMMENT 'เลขหนังสือ(เลขที่รับส่งหนังสือ)',
  `doc_created_date` datetime NOT NULL COMMENT 'ลงวันที่',
  `doc_receive_date` datetime NOT NULL COMMENT 'รับวันที่',
  `doc_haste` char(1) NOT NULL COMMENT 'ความเร่งด่วน',
  `doc_secrets` char(1) NOT NULL COMMENT ' ชั้นความลับ',
  `doc_form_department` varchar(300) NOT NULL,
  `doc_too_department` varchar(300) NOT NULL,
  `doc_subject` text NOT NULL,
  `doc_to_person` varchar(300) NOT NULL,
  `doc_refer` varchar(300) NOT NULL,
  `doc_attachment` text NOT NULL,
  `doc_note` text NOT NULL,
  `doc_book_type` char(1) NOT NULL,
  `doc_type_recieve_doc` varchar(100) NOT NULL,
  `doc_main_coordinator` varchar(100) NOT NULL,
  `doc_contact_number` varchar(100) NOT NULL,
  `doc_email_coordinator` varchar(100) NOT NULL,
  `doc_main_status` char(1) NOT NULL COMMENT ' ปกติ = 1,ยกเลิก=C',
  `doc_Keyword1` varchar(100) DEFAULT NULL,
  `doc_Keyword2` varchar(100) DEFAULT NULL,
  `doc_Keyword3` varchar(100) DEFAULT NULL,
  `created_user` varchar(100) NOT NULL,
  `created_user_id` int(10) NOT NULL,
  `updated_user_id` int(10) NOT NULL,
  `updated_user` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`document_receiv_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_document_main`
--

LOCK TABLES `m_document_main` WRITE;
/*!40000 ALTER TABLE `m_document_main` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_document_main` ENABLE KEYS */;
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
