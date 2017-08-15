-- MySQL dump 10.13  Distrib 5.1.50, for Win32 (ia32)
--
-- Host: localhost    Database: examdb
-- ------------------------------------------------------
-- Server version	5.1.50-community

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

create database examdb;
use examdb;

--
-- Table structure for table `tbl_do_exam`
--

DROP TABLE IF EXISTS `tbl_do_exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_do_exam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` int(10) unsigned NOT NULL,
  `exam_id` int(10) unsigned NOT NULL,
  `score` int(10) unsigned NOT NULL,
  `do_time` int(10) unsigned NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_do_exam`
--

LOCK TABLES `tbl_do_exam` WRITE;
/*!40000 ALTER TABLE `tbl_do_exam` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_do_exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_do_exam_detail`
--

DROP TABLE IF EXISTS `tbl_do_exam_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_do_exam_detail` (
  `do_exam_id` int(10) unsigned NOT NULL,
  `exam_no` int(10) unsigned NOT NULL,
  `answer_no` char(1) CHARACTER SET utf8 NOT NULL,
  `currect_no` char(1) CHARACTER SET utf8 NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_do_exam_detail`
--

LOCK TABLES `tbl_do_exam_detail` WRITE;
/*!40000 ALTER TABLE `tbl_do_exam_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_do_exam_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_do_exam_detail_tmp`
--

DROP TABLE IF EXISTS `tbl_do_exam_detail_tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_do_exam_detail_tmp` (
  `do_exam_id` int(10) unsigned NOT NULL,
  `exam_no` int(10) unsigned NOT NULL,
  `answer_no` char(1) NOT NULL,
  `currect_no` char(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_do_exam_detail_tmp`
--

LOCK TABLES `tbl_do_exam_detail_tmp` WRITE;
/*!40000 ALTER TABLE `tbl_do_exam_detail_tmp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_do_exam_detail_tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_exam`
--

DROP TABLE IF EXISTS `tbl_exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_exam` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `for_class_level` varchar(45) CHARACTER SET utf8 NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` varchar(45) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_exam`
--

LOCK TABLES `tbl_exam` WRITE;
/*!40000 ALTER TABLE `tbl_exam` DISABLE KEYS */;
INSERT INTO `tbl_exam` VALUES (1,'title one',1,'p1','2017-02-11 00:00:00','2017-02-11 00:00:00','1','2017-02-11 00:24:39','description'),(2,'title two',1,'p1','2017-02-11 00:00:00','2017-02-11 00:00:00','1','2017-02-11 00:28:58','description');
/*!40000 ALTER TABLE `tbl_exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_exam_detail`
--

DROP TABLE IF EXISTS `tbl_exam_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_exam_detail` (
  `exam_id` int(10) unsigned NOT NULL,
  `question` varchar(255) NOT NULL,
  `q_picture` varchar(255) NOT NULL,
  `choise_1` varchar(255) NOT NULL,
  `choise_2` varchar(255) NOT NULL,
  `choise_3` varchar(255) NOT NULL,
  `choise_4` varchar(255) DEFAULT NULL,
  `choise_5` varchar(255) DEFAULT NULL,
  `answer_choise` varchar(1) NOT NULL,
  `answer_description` varchar(45) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_exam_detail`
--

LOCK TABLES `tbl_exam_detail` WRITE;
/*!40000 ALTER TABLE `tbl_exam_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_exam_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_student`
--

DROP TABLE IF EXISTS `tbl_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_student` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `uname` varchar(45) CHARACTER SET utf8 NOT NULL,
  `pword` varchar(45) CHARACTER SET utf8 NOT NULL,
  `std_code` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `class_level` varchar(45) CHARACTER SET utf8 NOT NULL,
  `status` char(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_student`
--

LOCK TABLES `tbl_student` WRITE;
/*!40000 ALTER TABLE `tbl_student` DISABLE KEYS */;
INSERT INTO `tbl_student` VALUES (1,'rewat','std1','123456','000001','p1','1'),(2,'rewat','std1','e10adc3949ba59abbe56e057f20f883e','000001','p1','1');
/*!40000 ALTER TABLE `tbl_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_teacher`
--

DROP TABLE IF EXISTS `tbl_teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_teacher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `uname` varchar(45) CHARACTER SET utf8 NOT NULL,
  `pword` varchar(45) CHARACTER SET utf8 NOT NULL,
  `gen_exam` char(1) CHARACTER SET utf8 NOT NULL,
  `can_access` char(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='เก็บข้อมูลครูผู้สอน';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_teacher`
--

LOCK TABLES `tbl_teacher` WRITE;
/*!40000 ALTER TABLE `tbl_teacher` DISABLE KEYS */;
INSERT INTO `tbl_teacher` VALUES (1,'rewat','std1','e10adc3949ba59abbe56e057f20f883e','1','1'),(2,'rewat','tea1','e10adc3949ba59abbe56e057f20f883e','1','1');
/*!40000 ALTER TABLE `tbl_teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `uname` varchar(45) CHARACTER SET utf8 NOT NULL,
  `pname` varchar(45) CHARACTER SET utf8 NOT NULL,
  `status` char(1) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางเก็บข้อมูลผู้มีสิทธิ์จัดการข้อมูลระบบ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-11 11:07:08
