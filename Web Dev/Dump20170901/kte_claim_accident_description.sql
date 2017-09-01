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
-- Table structure for table `accident_description`
--

DROP TABLE IF EXISTS `accident_description`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accident_description` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `tiny_description` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accident_description`
--

LOCK TABLES `accident_description` WRITE;
/*!40000 ALTER TABLE `accident_description` DISABLE KEYS */;
INSERT INTO `accident_description` VALUES (3,'ชนท้ายคู่กรณี','อุบัติเหตุรายนี้ได้เดินทางออกตรวจสอบที่เกิดเหตุ พบ ทุกฝ่าย  สอบถามผู้ขับขี่รถประกัน ได้ความว่าใน วันเกิดเหตุ ทางผู้ขับขี่รถประกันได้ ขับรถประกัน มาจากทางด้าน .....มุ่งหน้าไปทางด้าน .... โดยขับตามถนน... อยู่ในเลนที่ ... จากซ้าย   ส่วนรถคู่กรณี ขับมาตามทิศทางและช่องทางเดียวกัน   โดยวิ่งอยู่นำหน้ารถประกัน  ขณะขับมาถึงที่เกิดเหตุ  ทางรถคู่กรณี ได้ ..เบรค..ชลอ.. ตามสภาพจราจร  ทางผู้ขับขี่รถประกัน  ห้ามล้อไม่ทันทำให้รถประกันไปชนท้ายรถคู่กรณี ทำให้รถทั้งสองฝ่ายได้รับความเสียหาย   จากการเกิดเหตุ ทางผู้ขับขี่รถประกัน ยอมรับผิด  เรื่องไม่ถึงพนักงานสอบสวน  เรื่องถึงพนักงานสอบสวน ...สน. ...ร้อยเวร.. รับเรื่อง... ได้สอบสวน ทุกฝ่ายแล้ว ลงความเห็น รถประกันประมาท  ทางผู้ขับขี่รถประกัน ยอมรับผิด ทางพนักงานสอบสวนได้เปรียบเทียบปรับผู้ขับขี่รถประกัน ตามประจำวัน  ข้อที่ ....   ประจำวัน ตามเอกสารแนบ        ได้ตรวจสอบความเสียหายของรถประกันและรถคู่กรณี แล้ว  เชื่อถือการเกิดเหตุ ได้  เรื่องยุติ '),(34,'คู่กรณีชนท้าย','อบ.รายนี้ได้เดินทางออกตรวจสอบ ที่เกิดเหตุ พบ ............. จากการสอบถามผู้ขับขี่รถประกันได้ ความว่าในวันเกิดเหตุ ทางผู้ขับขี่รถประกัน ได้ขับรถประกันแล่นมาตามถนน..........มาจากทางด้าน..... มุ่งหน้าไปทางด้าน ..........โดยแล่นในช่องทางที่ ...... จากซ้าย   ส่วนรถคู่กรณี  แล่นมาในทิศทางและเลนเดียวกันกับรถประกัน  โดยอยู่ทางด้านหลัง ของรถประกัน  เมือถึงที่เกิดเหตุ บริเวณ..............  รถประกันได้ ห้ามล้อตามสภาพการจราจร   รถคู่กรณี ที่แล่นทางด้านหลังรถประกัน ห้ามล้อไม่อยู่ ทำให้รถคู่กรณี ชนท้ายรถประกัน   จากการเกิดเหตุ ทำให้รถ ทั้งสองฝ่ายได้ รับความเสียหาย   การเกิดเหตุ ทางผู้ขับขี่รถคู่กรณี ยอมรับผิด  เรื่อง...ถึง..ไม่ถึง.. พนักงานสอบสวน  รถคู่กรณี ...มี  .. ไม่มีประกันภัย ..ดำเนินการ รับหลักฐานจากทางประกันภัยคู่กรณี....(ไม่มีประกันภัยเจรจาเรียกร้องเงินจากทางคู่กรณี ยุติ เป็นเงิน ..  บาท.คู่กรณีได้จ่ายแล้ว  ปรึกษาคุณ...พนักงานบริษัทท่าน)  (ไม่มีประกันภัย ทางพนักงานสอบสวนได้เปรียบเทียบปรับ ตามประจำวัน ข้อที่ ... เวลา ... วันที่ ... ตามเอกสารแนบ )'),(40,'คู่กรณีถอยชน','คู่กรณีถอยชน'),(80,'รถประกันเปลี่ยนช่องทางเฉี่ยวชนรถคู่กรณี ','อบ.รายนี้ได้เดินทางออกตรวจสอบที่เกิดเหตุ  พบ .........จากการสอบถามผู้ขับขี่รถประกันได้ ความว่าในเกิดเหตุ ทางผู้ขับขี่รถประกันได้ ขับรถประกันมาตามถนน.... จากทางด้าน... มุ่งหน้าไปทางด้าน...โดยแล่นมาในเลนที่.... จากซ้าย   ส่วนรถคู่กรณี แล่นมาในทิศทางเดียวกันกับรถประกัน โดยแล่นมาในเลนที่... จากซ้าย   ขณะทางผู้ขับขี่รถประกัน ขับรถประกันมาถึงที่เกิดเหตุ บริเวณ ..... ทางผู้ขับขี่รถประกันได้เปลี่ยนช่องไปในเลนที่  .... โดยไม่ทันระวัง  ทำให้รถประกันไปเฉี่ยวชนรถคู่กรณี ทางตรง  ทำให้รถประกันและรถคู่กรณี ได้รับความเสียหาย   (มีผู้บาดเจ็บ เป็น ... )  จากการเกิดเหตุ ทางผู้ขับขี่รถประกัน ยอมรับผิด   เรื่องไม่ถึงพนักงานสอบสวน   ตรวจสอบการเกิดเหตุ  รถประกันประมาท จริง  ความเสียหาย เชื่อถือได้  '),(81,'ป.ออกจากซอยชน ค.ทางตรง','  อบ.รายนี้ได้เดินทางออกตรวจสอบ ตามรับแจ้ง  พบรถประกันและคู่กรณี   จากการสอบปากคำผู้ขับรถประกันได้ความว่า เกิดเหตุเมื่อวันที่........... เวลา .... น. ขณะนั้นรถประกันแล่นมาตามถนนในซอย........... จากด้านในซอย มุ่งหน้าออกปากซอยถนน .............. ส่วนรถคู่กรณีแล่นมาตามถนน....... จากทางด้าน ....... มุ่งหน้าไปทาง ....... โดยแล่นอยู่ในช่องทางที่ .... นับจากขอบทางด้านซ้าย เมื่อถึงที่เกิดเหตุบริเวณปากซอย .......... รถประกันได้แล่นเลี้ยว (ขวา/ซ้าย)...... ออกจากซอยโดยขาดความระมัดระวัง จึงไปตัดหน้ารถคู่กรณีที่แล่นมาในทางตรง ทำให้รถคู่กรณีเบรคไม่ทัน จึงชนรถประกัน ทำให้ได้รับความเสียหายทั้ง 2 ฝ่าย    อุบัติเหตุครั้งนี้ รถประกันยอมรับเป็นฝ่ายประมาทในที่เกิดเหตุ เรื่องยุติ ไม่ถึง สน.   รถประกันเป็นฝ่ายประมาทตามพรบ.จราจรทางบก มาตรา 71(1)\r\n-อบ.รายนี้ การเกิดเหตุผู้ขับขี่รถประกัน ยอมรับผิด เรื่องไม่สามารถยุติที่เกิดเหตุ ได้เนื่องจากมีผู้บาดเจ็บ  เรื่องถึงพนักงานสอบสวน  สน. ............. ทางร้อยเวร ............... รับเรื่อง ในเบื้องต้นได้สอบสวน แล้ว ลงความเห็นรถประกันประมาท  แต่เนืองจากมีผู้บาดเจ็บ  ทางพนักงานสอบสวน  จึงได้ ลงประจำวัน ข้อเกิดเหตุ ใว้ก่อน  ตามข้อที่ ... เวลา ...  วันที่ .... ตามเอกสารแนบ  โดยรอนัดหมายภายหลังอีกครั้ง  ยังไม่ได้แจ้งวันเวลา นัดหมาย '),(82,'ป.หินกระเด็นใส่ ','<p>    เมื่อวันที่ ........ เวลา ..... น. ทางบริษัทฯได้รับแจ้งจากคุณ .... เจ้าหน้าที่ของทางท่าน ให้ออกตรวจสอบอุบัติเหตุตามที่นัดหมายไว้ที่ .... วันที่ ... เวลา .... น. บริษัทฯ เดินทางไปตามรับแจ้งถึงที่นัดหมาย พบรถประกันจอดรออยู่ จากการสอบปากคำได้ความว่า เมื่อวันที่ ......เวลา ... น. รถประกันได้แล่นไปตามถนน ..... จากทางด้าน ...... มุ่งหน้าไปทาง ...... ด้วยความเร็วประมาณ .....ต่อชั่วโมง เมื่อแล่นถึงบริเวณ .......... ได้สวนทางกับรถบรรทุกหินที่ใช้ในการก่อสร้างทาง และได้ถูกหินกระเด็นใส่ตัวรถ ทำให้ได้รับความเสียหายที่บริเวณ กระจกบังลมหน้า , ฝากะโปรงหน้า , กันชนหน้า และบังโคลนหน้าขวา <br />ทางบริษัทฯตรวจสอบแล้ว เห็นว่าความเสียหายสอดคล้องกับข้อเท็จจริง จึงออกหลักฐานให้ติดต่อทางท่านก่อนจัดซ่อม</p>'),(83,'ป. เลี้ยวกลับรถ ค. ทางตรง','   อบ.รายนี้ได้ เดินทางออกตรวจสอบตามรับแจ้ง  เมื่อเดินทางไปถึงที่เกิดเหตุ พบรถประกันและคู่กรณีจอดรออยู่ใกล้ที่เกิดเหตุ จากการสอบปากคำได้ความว่าเกิดเหตุเมื่อวันที่........ เวลา .........น. ขณะนั้นรถประกันแล่นมาตามถนน ......จากทางด้าน ......... มุ่งหน้าไป ....... ในช่องทางขวาสุด   ส่วนรถคู่กรณีแล่นสวนทางมาจาก ....... มุ่งหน้าไปทาง ........ โดยแล่นอยู่ในช่องทางขวาสุดเช่นเดียวกัน โดยถนนเส้นดังกล่าว มีเกาะกลางถนนคั่นอยู่ เมื่อถึงที่เกิดเหตุ บริเวณ ..... รถประกัน ได้เลี้ยวกลับรถที่เกาะกลางถนน โดยขาดความระมัดระวัง จึงชนเข้ากับรถคู่กรณี ที่วิ่งมาทางตรง  ทำให้ได้รับความเสียหายทั้ง 2 ฝ่าย   การเกิดเหตุ ทางผู้ขับขี่รถประกัน ยอมรับผิด   ทางพนักงานได้ ตรวจสอบแล้ว รถประกันประมาท จริง  เรื่องยุติไม่ถึงพนักงานสอบสวน \r\n- ( เบื้องต้นไม่สามารถตกลงกันได้     อุบัติเหตุครั้งนี้ ความทราบถึงพตต. ........... พนักงานสอบสวน สน .......... ได้มาตรวจสอบที่เกิดเหตุ และพาคู่กรณีทุกฝ่ายไป สน. ........ทำการสอบปากคำ ได้การดังข้างต้น พงส.มีความเห็นว่า รถประกันเป็นฝ่ายประมาท ตามพรบ.จราจรทางบกมาตรา 52  ผู้ขับขี่รถประกัน ยอมรับ จึงได้เปรียบเทียบปรับ เป็นเงิน 400 บาท และลงปจว. ข้อที่ ..... วันที่ .... เวลา ..... น. ทางบริษัทฯ ได้คัดสำเนาบันทึก ปจว.แนบมาพร้อมรายงานฉบับนี้แล้ว</p>'),(84,'ค. เปลี่ยนช่องทางชน ป.','  อบ.รายนี้ได้เดินทางออกตรวจสอบ ตามรับแจ้ง   เมื่อเดินทางไปถึงที่เกิดเหตุ พบรถประกันและคู่กรณีจอดรออยู่ใกล้ที่เกิดเหตุ จากการสอบปากคำได้ความว่าเกิดเหตุเมื่อวันที่....... เวลา .........น. ขณะนั้นรถประกันแล่นมาตามถนน.....................จากทางด้าน....มุ่งหน้าไปทาง....ในช่องทางที่....นับจากขอบทางด้านซ้าย (/ซ้ายสุด/ขวาสุด ช่องทางขนาน/ช่องทางด่วน) เมื่อมาถึงที่เกิดเหตุบริเวณ........ .. ได้มีรถคูกรณีซึ่งเป็นรถจักรยานยนต์/รถยนต์เก๋ง/รถบรรทุก...ล้อ ซึ่งแล่นมาในช่องทางด้านซ้าย/ขวา มุ่งหน้าทิศทางเดืยวกันเปลี่ยนช่องทางมาทางซ้าย/ขวาโดยมิได้ระมัดระวัง เป็นเหตุให้เฉี่ยวชนรถประกัน ได้รับความเสียหายทั้งสองฝ่าย/ฝ่ายเดียว    หลังเกิดเหตุไม่มีผู้ได้รับบาดเจ็บ/ผู้ขับขี่/ผู้โดยสารรถประกัน/ผู้ขับขี่/ผู้โดยสารรถคู่กรณี ได้รับบาดเจ็บรวม.....คน \r\n\r\n-จากการเกิดเหตุ  ทางผู้ขับขี่รถคู่กรณี ยอมรับผิด    รับหลักฐานจากทางประกันภัย คู่กรณี   เรื่องยุติ ไม่ถึงพนักงานสอบสวน  \r\n\r\n-จากการเกิดเหตุ ทางผู้ขับขี่รถคู่กรณี ยอมรับผิด    รถคู่กรณีไม่มีประกันภัย  ได้เจรจาเรียกร้องค่าเสียหาย ของรถประกัน โดยปรึกษาคุณ ......  พนักงานบริษัทท่าน  ให้เรียกร้อง เป็นเงิน   ...... ทางคู่กรณี ได้เจรจา ต่อรอง  และสามารถยุติได้ เป็นเงิน ......  บาท  ทางคู่กรณีได้ จ่ายเงินสดให้เป็นที่ เรียบร้อยแล้ว  และได้นำส่งบริษัทท่านตามใบเปอินแนบ   เรื่องยุติ  \r\n\r\n-จากการเกิดเหตุ ทางผู้ขับขี่รถคู่กรณี ไม่ยอมรับผิด   เรื่องถึงพนักงานสอบสวน  สน/สภ........  ทางร้อยเวร  ร.ต.ต./.................. รับเรื่องได้สอบสวน ทุกฝ่ายแล้ว  ได้ ลงความเห็น ผู้ขับขี่รถคู่กรณีเป็นฝ่ายประมาท   ทางผู้ขับขี่รถคู่กรณี ยอมรับผิด  ทางพนักงานสอบสวนได้เปรียบเทียบปรับ  ผู้ขับขี่รถคู่กรณี  ตามประจำวัน ข้อที่ ... เวลา ... น.วันที่ ..... ได้คัดประจำวัน แนบเรีื่องเพื่อเรียกร้องภายหลัง \r\n\r\n-จากการเกิดเหตุ ทางผู้ขับขี่รถคู่กรณี ยอมรับผิด   ทางรถประกันประเภท  3    รถคู่กรณีไม่มีประกันภัย ได้ ช่วยเจรจาเรียกร้องค่าเสียหายให้รถประกัน  โดยทางคู่กรณีได้ จ่ายเงินสดให้รถประกันเป็นที่  เรียบร้อยแล้ว   ยกเลิกเคลม \r\n\r\n-จากกาเกิดเหตุ  ทางผู้ขับขี่รถคู่กรณี ไม่ยอมรับผิด   โดยแจ้งทางรถประกันเปลี่ยนช่องทาง    เรื่องถึงพนักงานสอบสวน   สน. ............ ทางร้อยเวร................. รับเรื่อง  เบื้อต้นได้สอบสวน ทุกฝ่ายแล้ว   ทางพนักงานสอบสวนไม่ลงความเห็น ว่าฝ่ายใดประมาท เนื่องจากต่างฝ่าย ต่างกล่างอ้าง  ในเรื่องข้อเท็จจริง   โดยทางพนักงานสอบสวน แจ้ง ชี้ประมาทร่วม  เนื่องจากต่างฝ่าย ต่างกล่าวอ้าง  ผู้ขับขี่รถทั้งสองฝ่ายยอมรับ  ตามความเห็นของพนักงานสอบสวน  เรื่องยุติ  ไม่มีการลงประจำวัน   /พ้อมกันนี้ทางพนักงานสอบสวนได้เปรียบเทียบปรับ ทั้งสองฝ่าย ตามประจำวัน  ข้อที่  .... เวลา ...  วันที่ ..... ตามเอกสารแนบ  เรื่องยุติ '),(85,'ป. ชนกับ ค. ทางแยก','<p>เมื่อเดินทางไปถึงที่เกิดเหตุ พบรถประกันและคู่กรณีจอดรออยู่ใกล้ที่เกิดเหตุ จากการสอบปากคำได้ความว่า เกิดเหตุเมื่อวันที่........... เวลา .........น. ขณะนั้นรถประกันแล่นไปตามถนน........... จากทางด้าน ........ ไปทางด้าน ....... โดยแล่นมาในช่องทางที่ ...ของช่องทางด่วน / ทางคู่ขนาน ส่วนคู่กรณีแล่นไปตามถนน........... จากทางด้าน ........ ไปทางด้าน ....... โดยแล่นมาในช่องทางที่ ... เมื่อถึงที่เกิดเหตุบริเวณ .........</p>'),(86,'รถประกัน ชนท้ายรถคู่กรณีที่ 1 ต่อเนืองรถคู่กรณีที่  2 ','อบ.รายนี้ได้เดินทางออกตรวจสอบที่เกิดเหตุ พบทุกฝ่าย  จากการสอบถามผู้ขับขี่รถประกัน  ได้ความว่าในวันเกิดเหตุ ทางผู้ขับขี่รถประกัน ขับรถประกัน มาจากทางด้าน ....... มุ่งหน้าไปทางด้าน  ....โดยขับรถประกันมาตามถนน ..... ในช่องทางที่  ..........  จากซ้าย  ส่วนรถคู่กรณีที่  1   ที่   2  แล่นมา ตามทิศทาง  และช่องทาง เดียวกัน  กับรถประกัน  โดยรถคู่กรณีที่  1  แล่นนำหน้ารถประกัน  ส่วนรถคู่กรณีที่   2  แล่นนำหน้ารถคู่กรณีที่  1   เมือรถประกัน แล่นมาถึงที่เกิดเหตุ บริเวณ ............รถคู่กรณีที่  2 ได้เบรค ตามสภาพจราจร   ทำให้รถคู่กรณีที่  1  เบรค ตาม  ทางผู้ขับขี่รถประกัน ใช้ความระมัดระวังไม่เพียงพอ  เบรคไม่ทัน ทำให้รถประกัน ไปชนท้ายรถคู่กรณีที่  1  เป็นเหตุให้รถคู่กรณีที่  1  เคลื่อนตัวไปชนท้ายรถคุ่กรณีที่   2  ด้านหน้า   จากการเกิดเหตุ ทำให้รถทุกฝ่ายได้ รับความเสียหาย  ...(มี ผู้ได้รับบาดเจ็บ เป้น  .... อยู่ในรถ ..... ) จากการเกิดเหตุ ทางผู้ขับขี่รถประกัน  ยอมรับ เป็นฝ่ายประมาท  \r\n-ได้ ตรวจสอบความเสียหาย ทุกฝ่าย  ประกอบการสอบถามการเกิดเหตุ  จากผู้ขับขี่รถทุกฝ่ายแล้ว  เชื่อถือการเกิดเหตุได้    เรื่องยุติ ไม่ถึงพนักงานสอบสวน \r\n-ได้ ตรวจสอบ ความเสียหายของรถทุกฝ่าย  แล้ว   รถทุกฝ่ายได้ รับความเสียหายมาก   ประกอบกับ ความเสียหายของรถคู่กรณีที่  1  เสียหายส่วนหน้าและหลังใกล้เคียงกัน  ทาง พนักงานจึงให้ทุกฝ่ายเดินทางไป  สน. .... เพื่อให้ทางพนักงานสอบสวน  ได้ สอบสวน เพิ่มเติม  เรื่องจึงถึงพนักงานสอบสวน  สน....... ทาง ร้อยเวร....... รับเรื่องไม่สอบสวนทุกฝ่ายแล้ว ลงความเห็น ......... เป็นฝ่ายประมาท  ทางผู้ขับขี่รถประกัน ยอมรับผิด   ทางพนักงานสอบสวน ได้ เปรียบเทียบปรับ  ตามประจำวัน ข้อที่ ...\r\n'),(87,'หินกระเด็นใส่ รถประกัน ','อบ.รายนี้ได้ เดินทางออกตรวจสอบ ตามรับแจ้ง  พบรถประกันพร้อมผู้ขับขี่รถประกัน จากการสอบถามการเกิดเหตุ ได้ ความว่าในวันเกิดเหตุ วันที่ ......... เวลาประมาณ  .... ทางผู้ขับขี่รถประกันได้ ขับรถประกันมาจากทางด้าน............  มุ่งหน้าไปทางด้าน ....  โดยเล่นตามถนน.... ..อยู่ในเลนที่  ..... ขณะรถประกันแล่นมาถึงที่เกิดเหตุ  บริเวณ ............... ได้มีเศษหินกระเด็นมาใส่รถประกัน  ภายหลัง พบรถประกันมีความเสียหาย บริเวณ  1. .... 2.... 3...  \r\n- จากการตรวจสอบความเสียหายของรถประกันแล้ว  เชื่อถือได้    ได้โทรปรึกษาคุณ .....พนักงานบริษัทท่าน แจ้งให้เรียกเก็บส่วนร่วม เป็นเงิน  .... ท่างผู้ขับขี่รถประกัน ยอมรับ   จึงได้ออกหลักฐานให้รถประกัน หักส่วนร่วม  ..... บาท จากค่าซ่อม  \r\n\r\n-อบ.รายนี้ ทางผู้ขับขี่รถประกันประสงค์แจ้งเพิ่ม   ...(2)  เหตุการณ์ดังนี้  \r\n1.ในวันที่  .......เวลาประมาณ ..... น. ทางผู้ขับขี่รถประกันได้ ขับรถประกัน /จอด      รถประกันได้ รับความเสียหาย บริเวณ ....\r\n2.เมือวันที่ ........เวลา ประมาณ.... น. ทางผู้ขับขี่รถประกัน ได้ ขับรถประกัน ....  รถประกันได้ รับความเสียหาย บริเวณ.... '),(88,'ป.ถอยหลังชน รถ ค.ในลานจอดรถ ','อบ.รายนี้ได้ เดินทางออกตรวจสอบ ที่เกิดเหตุ( หรือตามนัดหมาย)  พบทุกฝ่าย  จากการสอบถามผู้ขับขี่รถประกันได้ ความว่าในวันเกิดเหตุ ทางผู้ขับขี่รถประกัน ได้ขับรถประกัน มาจอดใว้ ในบริเวณลานจอดรถ ของ  ...... โดยมีรถคู่กรณี จอดอยู่ ทางด้าน ..ซ้ายของรถประกัน  .. ขวาของรถประกัน ..ด้านหลังของรถประกัน   . ถึงเวลาเกิดเหตุ ทางผู้ขับขี่รถประกันได้ขับรถประกัน ออกจาก ที่จอดโดยถอยหลัง ..เดินหน้า ..โดยไม่ทันระวัง  รถคู่กรณี ที่จอดอยู่  ทำให้รถประกัน ไปเฉี่ยวชนรถคู่กรณี ได้  รับความเสียหาย   จากการเกิดเหตุ  ทางผู้ขับขี่รถประกัน ยอมรับผิด    เรื่องยุติ ไม่ถึงพนักงานสอบสวน \r\n-ได้ ตรวจสอบความเสียหายของรถประกันและรถคู่กรณี แล้ว เชื่อถือได้  ');
/*!40000 ALTER TABLE `accident_description` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-01 11:07:48
