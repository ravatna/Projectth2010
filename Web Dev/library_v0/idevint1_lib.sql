-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 23, 2016 at 12:00 PM
-- Server version: 5.6.26
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idevint1_lib`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `dept_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dept_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('10000', 'ฝ่ายทรัพยากรมนุษย์'),
('11100', 'แผนกบุคคล'),
('11110', 'หน่วยว่าจ้าง'),
('11120', 'หน่วยค่าจ้าง'),
('11130', 'หน่วยงานกฎหมายและประสานงานราชการ'),
('11140', 'หน่วยงานประชาสัมพันธ์'),
('11200', 'แผนกฝึกอบรม'),
('11210', 'หน่วยฝึกอบรม'),
('13000', 'ส่วนธุรการ'),
('13100', 'แผนกธุรการ'),
('13133', 'ทีมซ่อมบำรุง'),
('13200', 'แผนกโครงสร้าง&งานระบบ'),
('13210', 'หน่วยโยธา'),
('13220', 'หน่วยซ่อมบำรุงเครื่องปรับอากาศ'),
('20000', 'ฝ่ายพาณิชย์'),
('21000', 'ส่วนสารสนเทศ'),
('21100', 'แผนกโปรแกรมและวิเคราะห์ระบบ'),
('21200', 'แผนกโอเปอร์เรเตอร์'),
('21210', 'หน่วยโอเปอร์เรเตอร์'),
('21300', 'แผนกบริหารระบบ'),
('21310', 'หน่วยบริหารระบบ'),
('22000', 'ส่วนจัดซื้อ'),
('22100', 'แผนกจัดซื้อในประเทศ'),
('22110', 'หน่วยจัดซื้อในประเทศ'),
('22200', 'แผนกจัดซื้อต่างประเทศ'),
('22210', 'หน่วยจัดซื้อต่างประเทศ'),
('23000', 'ส่วนการเงิน'),
('23100', 'แผนกการเงิน'),
('24000', 'ส่วนบัญชี'),
('24100', 'แผนกบัญชีทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE IF NOT EXISTS `tb_book` (
  `book_id` int(16) NOT NULL,
  `bookname` varchar(200) CHARACTER SET utf8 NOT NULL,
  `isbn` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `author` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cover_price` float DEFAULT NULL,
  `is_ebook` tinyint(1) DEFAULT NULL COMMENT 'ปกแข็งหรือหนังสืออิเล็กทรอนิกส์',
  `status` int(11) DEFAULT NULL COMMENT 'สถานะหนังสือ',
  `publish_year` varchar(4) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ปีที่พิมพ์',
  `edition` int(2) DEFAULT NULL COMMENT 'ครั้งที่พิมพ์',
  `cover` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'หน้าปก',
  `category_id` varchar(3) CHARACTER SET utf8 NOT NULL COMMENT 'เลขหมวดหลัก',
  `sub_category_id` varchar(3) CHARACTER SET utf8 NOT NULL COMMENT 'เลขหมวดย่อย',
  `file_path` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'path หนังสือ',
  `keyword` varchar(200) CHARACTER SET utf8 DEFAULT NULL COMMENT 'คำสำคัญ',
  `copy` varchar(10) DEFAULT NULL,
  `publish_location` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `publisher` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`book_id`, `bookname`, `isbn`, `author`, `cover_price`, `is_ebook`, `status`, `publish_year`, `edition`, `cover`, `category_id`, `sub_category_id`, `file_path`, `keyword`, `copy`, `publish_location`, `publisher`) VALUES
(3, 'ชีวประวัติ', '6745244', 'ฟ', 500, 0, 2, '2559', 1, NULL, '000', '080', NULL, 'o', '20', '?', '????'),
(4, 'sssssssssssssssssssssssss', '567323', 'ดดดดด', 12, 0, 2, '2559', 1, '9786117236006L.gif', '000', '000', 'img/books/', 'กก', '10', '???', 'aaaaa'),
(6, '1', 'a', '1', 1, 0, 2, '1', 1, NULL, '000', '000', NULL, '1', '1', '1', 'a'),
(7, 'ewr', '34r', 'w', 345, 0, 2, 'w', 1, NULL, '000', '010', NULL, 'dfd', 'w', 'w', 'w'),
(8, 's', 's', 's', 6, 0, 2, 's', 1, NULL, '000', '000', NULL, 's', 's', 's', 's'),
(10, 'f', 'ffffff', 'f', 230, 0, 2, 'f', 2, 'C:xampp	mpphp1CD3.tmp', '000', '010', NULL, 'q', 'f', 'f', 'f'),
(14, 'พระราชอารมณ์ขัน บทที 1', '9786165266239', 'วิลาศ มณีวัต ', 299, 0, 2, '2016', 1, '9786165266239L.jpg', '000', '070', 'img/books/', 'รัชกาลที่ 9,ชีวประวัติพระมหากษัตริย์', '20', 'กรีน-ปัญญาญาณ, สนพ.', 'กรุุงเทพฯ'),
(15, 'fgfdgdf', '34532444', 'f', 220, 1, 2, '2559', 1, '(9786165266239L.jpg)?9786165266239L.jpg:null', '100', '110', '(ebook)?ebook:null', 'ssss', '2', 'dfgdf', 'fff'),
(16, '34', '454545646', '34', 220, 1, 2, '3', 1, 'doc_3.pdf', '100', '100', 'doc_3.pdf', 'w', '2', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow`
--

CREATE TABLE IF NOT EXISTS `tb_borrow` (
  `br_id` int(11) NOT NULL,
  `identification` varchar(13) CHARACTER SET utf8 NOT NULL COMMENT 'รหัสผู้ขอยืม',
  `br_date` datetime NOT NULL COMMENT 'วันที่ขอยืม',
  `rec_date` datetime DEFAULT NULL COMMENT 'รับหนังสือแล้ว',
  `rec_status` tinyblob COMMENT 'เช็ครับหนังสือ',
  `rec_realdate` datetime DEFAULT NULL COMMENT 'วันรับหนังสือจริง',
  `ret_date` datetime DEFAULT NULL,
  `ret_realdate` datetime DEFAULT NULL,
  `ret_status` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `doc_date` datetime NOT NULL,
  `br_status` tinyint(4) NOT NULL,
  `br_no` varchar(10) NOT NULL,
  `remark` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'เหตุผลในการยืมหนังสือ',
  `u_tel` varchar(10) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_borrow`
--

INSERT INTO `tb_borrow` (`br_id`, `identification`, `br_date`, `rec_date`, `rec_status`, `rec_realdate`, `ret_date`, `ret_realdate`, `ret_status`, `doc_date`, `br_status`, `br_no`, `remark`, `u_tel`, `user_id`) VALUES
(32, '121211111111', '2016-11-18 00:00:00', '2016-11-19 13:23:29', NULL, NULL, '2016-11-20 00:00:00', NULL, NULL, '2016-11-17 00:00:00', 1, 'LIS-000032', 'ฟ', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow_btl`
--

CREATE TABLE IF NOT EXISTS `tb_borrow_btl` (
  `borrow_btl_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `br_no` varchar(11) DEFAULT NULL,
  `is_return` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_borrow_btl`
--

INSERT INTO `tb_borrow_btl` (`borrow_btl_id`, `br_id`, `book_id`, `br_no`, `is_return`) VALUES
(1, 32, 3, 'LIS-000032', NULL),
(2, 32, 14, 'LIS-000032', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow_dtl`
--

CREATE TABLE IF NOT EXISTS `tb_borrow_dtl` (
  `br_dtlid` int(10) NOT NULL,
  `br_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_no` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `prd_order` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `ret_status` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow_status`
--

CREATE TABLE IF NOT EXISTS `tb_borrow_status` (
  `id` int(3) NOT NULL,
  `borrow_status_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_borrow_status`
--

INSERT INTO `tb_borrow_status` (`id`, `borrow_status_name`) VALUES
(0, 'ยกเลิก'),
(1, 'กำลังจัดเตรียมหนังสือ'),
(2, 'รอรับหนังสือ(โปรดติดต่อบรรณารักษ์)'),
(3, 'รับหนังสือแล้ว'),
(4, 'คืนหนังสือแล้ว'),
(5, 'เกินกำหนดคืนหนังสือแล้ว'),
(6, 'ไม่สามารถติดต่อได้');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `category_id` varchar(3) CHARACTER SET utf8 NOT NULL,
  `category_name` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
('000', 'เบ็ตเตล็ดหรือความรู้ทั่วไป (Generalities)'),
('100', 'ปรัชญา (Philosophy)'),
('200', 'ศาสนา (Religion)'),
('300', 'สังคมศาสตร์ (Social sciences)'),
('400', 'ภาษาศาสตร์ (Language)'),
('500', 'วิทยาศาสตร์ (Science)'),
('600', 'วิทยาศาสตร์ประยุกต์ หรือเทคโนโลยี (Technology)'),
('700', 'ศิลปกรรมและการบันเทิง (Arts and recreation)'),
('800', 'วรรณคดี (Literature)'),
('900', 'ประวัติศาสตร์และภูมิศาสตร์ (History and geography)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_documents`
--

CREATE TABLE IF NOT EXISTS `tb_documents` (
  `doc_id` int(10) NOT NULL,
  `doc_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prd_order` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mat_no` varchar(18) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plant` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_accept` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `short_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_period` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_status` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=38920 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_documents`
--

INSERT INTO `tb_documents` (`doc_id`, `doc_no`, `prd_order`, `mat_no`, `plant`, `date_accept`, `start_date`, `short_text`, `doc_period`, `doc_status`) VALUES
(1, 'A001', '30104345', '40021759', '1000', '2013-01-07', '2012-12-28', 'PURE CARE BY BSC MAKE UP EYESHADOW#P0', '10', ''),
(2, 'A002', '30104343', '40021757', '1000', '2013-01-07', '2012-12-28', 'PURE CARE BY BSC MAKE UP EYESHADOW#N1', '3', ''),
(3, 'A003', '30104350', '40013216', '1000', '2013-01-07', '2012-12-28', 'ELISEES BUTTERFLY FINISH POWDER SPF25#C2', '3', ''),
(4, 'A004', '30104346', '40021760', '1000', '2013-01-07', '2012-12-28', 'PURE CARE BY BSC MAKE UP EYESHADOW#P3', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guser`
--

CREATE TABLE IF NOT EXISTS `tb_guser` (
  `g_id` int(5) NOT NULL,
  `g_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_guser`
--

INSERT INTO `tb_guser` (`g_id`, `g_name`) VALUES
(1, 'นักเรียน'),
(2, 'ผู้อนุมัติ'),
(3, 'ผู้ดูแลระบบ'),
(4, 'นักศึกษา'),
(5, 'อาจารย์'),
(6, 'บุคคลทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE IF NOT EXISTS `tb_setting` (
  `sett_id` int(5) NOT NULL,
  `sett_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sett_qr` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`sett_id`, `sett_status`, `sett_qr`) VALUES
(1, 'on', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_category`
--

CREATE TABLE IF NOT EXISTS `tb_sub_category` (
  `sub_category_id` varchar(3) CHARACTER SET utf8 NOT NULL COMMENT 'เลขหมวดย่อย',
  `sub_category_name` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT 'ชื่อหมวดย่อย',
  `category_id` varchar(3) CHARACTER SET utf8 NOT NULL COMMENT 'เลขหมวดหลัก'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sub_category`
--

INSERT INTO `tb_sub_category` (`sub_category_id`, `sub_category_name`, `category_id`) VALUES
('000', 'คอมพิวเตอร์ ความรู้ทั่วไป ', '000'),
('010', 'บรรณานุกรม แคตตาล็อก ', '000'),
('020', 'บรรณารักษศาสตร์และสารนิเทศศาสตร์ ', '000'),
('030', 'หนังสือรวบรวมความรู้ทั่วไป สารานุกรม', '000'),
('040', 'ยังไม่กำหนดใช้', '000'),
('050', 'สิ่งพิมพ์ต่อเนื่อง วารสาร และดรรชนี', '000'),
('060', 'องค์การต่างๆ พิพิธภัณฑวิทยา', '000'),
('070', 'วารสารศาสตร์ การพิมพ์', '000'),
('080', 'ชุมนุมนิพนธ์', '000'),
('090', 'ต้นฉบับตัวเขียน หนังสือหายาก ', '000'),
('100', 'ปรัชญา', '100'),
('110', 'อภิปรัชญา', '100'),
('120', 'ญาณวิทยา ความเป็นเหตุผล ความเป็นมนุษย์', '100'),
('130', 'จิตวิทยานามธรรม', '100'),
('140', 'แนวความคิดปรัชญาเฉพาะกลุ่ม', '100'),
('150', 'จิตวิทยา', '100'),
('160', 'ตรรกศาสตร์ ตรรกวิทยา', '100'),
('170', 'จริยศาสตร์ ศีลธรรม', '100'),
('180', 'ปรัชญาสมัยโบราณ สมัยกลาง ตะวันออก', '100'),
('190', 'ปรัชญาตะวันตกสมัยใหม่', '100'),
('201', 'a', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `password` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_id` int(5) DEFAULT NULL,
  `g_id` int(5) NOT NULL,
  `avartar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identification` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `is_librarian` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`password`, `firstname`, `lastname`, `dept_id`, `g_id`, `avartar`, `u_email`, `u_tel`, `username`, `identification`, `is_librarian`, `user_id`) VALUES
('1234', 'มนัสวิน', 'แสนคำ', 21100, 3, '', '', '000000000', '1234', '111111111111', 1, 1),
('1234', 'ทดสอบ', 'ระบบ', 11100, 1, '', '', '', '1000', '', 0, 2),
('1234', 'พอล', 'วอล์คเกอร์', 21100, 2, '', '', '', '1000', '', 0, 3),
(NULL, '', '', 0, 0, '', '', '', '', '', 0, 4),
('1234', 'a', 'a', NULL, 0, '', '', '1', 'a', '121211111111', 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tb_borrow`
--
ALTER TABLE `tb_borrow`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `tb_borrow_btl`
--
ALTER TABLE `tb_borrow_btl`
  ADD PRIMARY KEY (`borrow_btl_id`);

--
-- Indexes for table `tb_borrow_dtl`
--
ALTER TABLE `tb_borrow_dtl`
  ADD PRIMARY KEY (`br_dtlid`);

--
-- Indexes for table `tb_borrow_status`
--
ALTER TABLE `tb_borrow_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_documents`
--
ALTER TABLE `tb_documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `tb_guser`
--
ALTER TABLE `tb_guser`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`sett_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`,`identification`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_book`
--
ALTER TABLE `tb_book`
  MODIFY `book_id` int(16) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_borrow`
--
ALTER TABLE `tb_borrow`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_borrow_btl`
--
ALTER TABLE `tb_borrow_btl`
  MODIFY `borrow_btl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_borrow_dtl`
--
ALTER TABLE `tb_borrow_dtl`
  MODIFY `br_dtlid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_documents`
--
ALTER TABLE `tb_documents`
  MODIFY `doc_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38920;
--
-- AUTO_INCREMENT for table `tb_guser`
--
ALTER TABLE `tb_guser`
  MODIFY `g_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `sett_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
