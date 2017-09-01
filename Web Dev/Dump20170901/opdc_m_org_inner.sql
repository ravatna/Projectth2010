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
-- Table structure for table `m_org_inner`
--

DROP TABLE IF EXISTS `m_org_inner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_org_inner` (
  `org_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `org_name` varchar(255) NOT NULL,
  `nodelv` tinyint(3) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `parent_key` varchar(255) NOT NULL,
  `doc_key` varchar(10) NOT NULL,
  `created_user` varchar(255) NOT NULL,
  `created_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `updated_user` varchar(255) NOT NULL,
  `updated_user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_org_inner`
--

LOCK TABLES `m_org_inner` WRITE;
/*!40000 ALTER TABLE `m_org_inner` DISABLE KEYS */;
INSERT INTO `m_org_inner` VALUES (1,'ก.พ.ร.',1,0,'฿1฿','','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(2,'กองติดตามและประเมินผลการพัฒนาระบบราชการ',2,1,'฿1฿2฿','','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(3,'กลุ่มมาตรฐานการติดตามประเมินผลส่วนราชการ และสถาบันการศึกษา',3,2,'฿1฿2฿3฿','1201','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(4,'กลุ่มมาตรฐานการติดตามประเมินผลกลุ่มจังหวัดและจังหวัด',3,2,'฿1฿2฿4฿','1201','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(5,'กองเผยแพร่และสนับสนุนการมีส่วนร่วมในการพัฒนาระบบราชการ',2,1,'฿1฿5฿','','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(6,'กลุ่มการพัฒนาระบบราชการกลุ่มกระทรวงที่ 4  (กระทรวงพลังงาน กระทรวงทรัพยากรธรรมชาติและสิ่งแวดล้อม)',3,5,'฿1฿5฿6฿','1202','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(7,'กลุ่มการพัฒนาระบบราชการกลุ่มกระทรวงที่ 5 (กระทรวงสาธารณสุข กระทรวงศึกษาธิการ กระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์)',3,5,'฿1฿5฿7฿','1202','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(8,'กลุ่มการพัฒนาระบบราชการกลุ่มกระทรวงที่ 6 (กระทรวงวัฒนธรรม กระทรวงการท่องเที่ยวและกีฬา)',3,5,'฿1฿5฿8฿','1202','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(9,'กลุ่มการพัฒนาระบบราชการกลุ่มกระทรวงที่ 7 (กระทรวงกลาโหม กระทรวงยุติธรรม สำนักงานตำรวจแห่งชาติ สำนักงานสภาความมั่นคงแห่งชาติ สำนักงานข่าวกรองแห่งชาติ กองอำนวยการรักษาความมันคงแห่งราชอาณาจักร ศูนย์อำนวยการบริหารจังหวัดชายแดนภายใต้)',3,5,'฿1฿5฿9฿','1202','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(10,'กลุ่มการพัฒนาระบบราชการกลุ่มกระทรวงที่ 8 (ส่วนราชการในสังกัดสำนักงานนายกรัฐมนตรี และส่วนราชการไม่สังกัด สำนักงานนายกรัฐมนตรี)',3,5,'฿1฿5฿10฿','1202','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(11,'กองพัฒนาระเบียบราชการส่วนภูมิภาค',2,1,'฿1฿11฿','1203','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(12,'กลุ่มการพัฒนาระบบราชการกลุ่มกระทรวงที่ 9',3,11,'฿1฿11฿12฿','1203.1','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(13,'กลุ่มเลขานุการ ก.น.จ. และพัฒนาระบบบูรณาการ',3,11,'฿1฿11฿13฿','1203.2','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(14,'กลุ่มพัฒนาระบบราชการกลุ่มจังหวัดที่ 1',3,11,'฿1฿11฿14฿','1203.2','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(15,'กลุ่มพัฒนาระบบราชการกลุ่มจังหวัดที่ 2',3,11,'฿1฿11฿15฿','1203.2','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(16,'กองพัฒนาระบบราชการ 1',2,1,'฿1฿16฿','1204','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(17,'กระทรวงการคลัง',3,16,'฿1฿16฿17฿','1204.2','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(18,'กระทรวงเกษตรและสหกรณ์',3,16,'฿1฿16฿18฿','1204.3','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(19,'กระทรวง คมนาคม',3,16,'฿1฿16฿19฿','1204.4','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(20,'กระทรวงพาณิชย์',3,16,'฿1฿16฿20฿','1204.6','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(21,'กระทรวงอุตสาหกรรม',3,16,'฿1฿16฿21฿','1204.8','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(22,'กระทรวงวิทยาศาสตร์และเทคโนโลยี',3,16,'฿1฿16฿22฿','1204.8','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(23,'สำนักงานคณะกรรมการเศรษฐกิจและสังคมแห่งชาติ',3,16,'฿1฿16฿23฿','1204.8','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(24,'สำนักงบประมาณ และสำนักงานคณะกรรมการส่งเสริมการลงทุน',3,16,'฿1฿16฿24฿','1204.8','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(25,'กระทรวงดิจิทัลเพื่อเศรษฐกิจและสังคม',3,16,'฿1฿16฿25฿','1204.8','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(26,'กลุ่มการพัฒนาระบบราชการกลุ่มกระทรวงที่ 1 (กระทรวงเกษตร์และสหกรณ์   กระทรวงพาณิชย์ กระทรวงอุตสาหกรรม กระทรวงวิทยาศาสตร์และเทคโนโลยี)',3,16,'฿1฿16฿26฿','1204','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(27,'กลุ่มการพัฒนาระบบราชการกลุ่มกระทรวงที่ 2 (กระทรวงการคลัง สำนักงานคณะกรรมการเศรษฐกิจและสังคมแห่งชาติสำนักงบประมาณ และสำนักงานคณะกรรมการส่งเสริมการลงทุน)',3,16,'฿1฿16฿27฿','1204','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(28,'กลุ่มการพัฒนาระบบราชการกลุ่มกระทรวงที่ 3 ( กระทรวง คมนาคม กระทรวงดิจิทัลเพื่อเศรษฐกิจและสังคม)',3,16,'฿1฿16฿28฿','1204','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(29,'กองบริหารการเปลี่ยนแปลงและนวัตกรรม',2,1,'฿1฿29฿','1205','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(30,'กลุ่มพัฒนายกระดับมาตรฐานการให้บริการ',3,29,'฿1฿29฿30฿','1205.1','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(31,'กลุ่มพัฒนานวัตกรรมกการเรียนรู้ผ่านสื่ออิเล็กทรอนิกส์',3,29,'฿1฿29฿31฿','1205.2','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(32,'กลุ่มเสริมสร้างธรรมาภิบาลและพัฒนาระบบคุณภาพการบริหารจัดการภาครัฐ',3,29,'฿1฿29฿32฿','1205.3','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(33,'กลุ่มพัฒนานักบริหารการเปลี่ยนแปลงรุ่นใหม่',3,29,'฿1฿29฿33฿','1205.4','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(34,'กลุ่มพัฒนานวัตกรรมการเงินและงบประมาณ',3,29,'฿1฿29฿34฿','1205.5','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(35,'กลุ่มพัฒนานวัตกรรมการบริหารงานภาครัฐ และความร่วมมือทางวิชาการระหว่างประเทศ',3,29,'฿1฿29฿35฿','1205.6','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(36,'กองกฏหมาย',2,1,'฿1฿36฿','1206','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(37,'สำนักงานเลขาธิการ',2,1,'฿1฿37฿','1207','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(38,'กลุ่มการคลัง',3,37,'฿1฿37฿38฿','1207.1','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(39,'กลุ่มบริหารทรัพยากรบุคคล',3,37,'฿1฿37฿39฿','1207.2','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(40,'กลุ่มงานเลขานุการ ก.พ.ร.',3,37,'฿1฿37฿40฿','1207.4','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(41,'กลุ่มงานวิเทศสัมพันธ์ และการประชาสัมพันธ์',3,37,'฿1฿37฿41฿','1207.5','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(42,'กลุ่มงานสวัสดิการ',3,37,'฿1฿37฿42฿','1207.6','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(43,'กลุ่มงานเทคโนโลยีสารสนเทศ',3,37,'฿1฿37฿43฿','1207.7','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(44,'ฝ่ายสารบรรณ',3,37,'฿1฿37฿44฿','1207.8','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(45,'กลุ่มตรวจสอบภายใน',2,1,'฿1฿45฿','1212','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(46,'กองกิจกรรมองค์การมหาชนและหน่วยงานของภาครัฐรูปแบบอื่น',2,1,'฿1฿46฿','1208','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(47,'กองส่งเสริมการตรวจสอบและประเมินผลภาคราชการ',2,1,'฿1฿47฿','1210','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(48,'กองพัฒนาระบบราชการ 2',2,1,'฿1฿48฿','','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(49,'กลุ่มพัฒนาระบบสนับสนุนการมีส่วนร่วมในการพัฒนาระบบราชการ',3,48,'฿1฿48฿49฿','1211','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(50,'กลุ่มช่วยอำนวยการ',2,1,'฿1฿50฿','-','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(51,'กลุ่มพัฒนาระบบบริหาร',2,1,'฿1฿51฿','1214','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15'),(52,'ศูนย์ปฏิบัติการต่อต้านการทุจริต',2,1,'฿1฿52฿','1209','DUMMY',0,'2017-03-08 15:39:15','DUMMY',0,'2017-03-08 15:39:15');
/*!40000 ALTER TABLE `m_org_inner` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:08:15