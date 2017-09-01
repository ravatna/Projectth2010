CREATE DATABASE  IF NOT EXISTS `kte_claim` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kte_claim`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: kte_claim
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
-- Table structure for table `bike_brand`
--

DROP TABLE IF EXISTS `bike_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bike_brand` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bike_brand`
--

LOCK TABLES `bike_brand` WRITE;
/*!40000 ALTER TABLE `bike_brand` DISABLE KEYS */;
INSERT INTO `bike_brand` VALUES (3,'Benelli'),(4,'Big Bull'),(5,'Aprillia'),(6,'Beta'),(7,'Bimota'),(8,'BMW'),(9,'Can-Am'),(10,'CCW'),(11,'Ducati'),(12,'EBR'),(13,'Harley-Davidson'),(14,'Honda'),(15,'Kawasaki'),(16,'KTM'),(17,'Kymco'),(18,'Lotus'),(19,'MV Agusta'),(20,'RYUKA'),(21,'Stallion'),(22,'Suzuki'),(23,'Triumph'),(24,'Vespa'),(25,'Victory'),(26,'Voxan'),(27,'Yamaha'),(29,'SCANIA'),(30,'KAWASAKI'),(31,'wave'),(32,'GPX');
/*!40000 ALTER TABLE `bike_brand` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:05
