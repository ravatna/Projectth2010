<?php
session_start();
// require need database.
require_once("include/config.php");


$result = mysql_query("truncate table tb_book; ",$connect);

$objCSV = fopen("list_book_and_media.csv", "r");



$i = 0;
while (($objArr = fgetcsv($objCSV, 1024, ",")) !== FALSE) {
	
	// skip 2 rows.
	if($i++ < 2)
		continue;
	
		 //echo $objArr[0] ."-". $objArr[1]."<br/>";  1  5  10 11 13 15
	
	
	
	
$book_id=iconv("tis-620","utf-8",$objArr[0]);

// echo "(".($i-2).")" . 
$book_name=iconv("tis-620","utf-8",$objArr[1]);
// echo "<br/>";

$isbn=iconv("tis-620","utf-8",$objArr[2]);
$author=iconv("tis-620","utf-8",$objArr[3]);
$cover_price="0"; // if content not add iconv("tis-620","utf-8",$objArr[4]);
$is_ebook=iconv("tis-620","utf-8",$objArr[5]);
$filter=iconv("tis-620","utf-8",$objArr[6]);
$status=iconv("tis-620","utf-8",$objArr[7]);
$publish_year=iconv("tis-620","utf-8",$objArr[8]);
$edition=iconv("tis-620","utf-8",$objArr[9]);
$cover=iconv("tis-620","utf-8",$objArr[10]);
$category_id=iconv("tis-620","utf-8",$objArr[11]);
$sub_category_id=iconv("tis-620","utf-8",$objArr[12]);
$file_path=iconv("tis-620","utf-8",$objArr[13]);
$keyword=iconv("tis-620","utf-8",$objArr[14]);
$copy=iconv("tis-620","utf-8",$objArr[15]);
$publish_location=iconv("tis-620","utf-8",$objArr[16]);
$publisher=iconv("tis-620","utf-8",$objArr[17]);
$highlight=iconv("tis-620","utf-8",$objArr[18]);
$highlight_no=iconv("tis-620","utf-8",$objArr[19]);
$description=iconv("tis-620","utf-8",$objArr[20]);

	
	$sql = "insert into tb_book (book_id,bookname,isbn,author,cover_price,is_ebook,filter,status,publish_year,edition,cover,category_id,sub_category_id,file_path,keyword,copy,publish_location,publisher,highlight,highlight_no,description) values('".$book_id."','".$book_name."','".$isbn."','".$author."','".$cover_price."','".$is_ebook."','".$filter."','".$status."','".$publish_year."','".$edition."','".$cover."','".$category_id."','".$sub_category_id."','".$file_path."','".$keyword."','".$copy."','".$publish_location."','".$publisher."','".$highlight."','".$highlight_no."','".$description."')";
	

//$sql = "insert into tbl_exam_detail(exam_id,question,q_picture,choise_1,choise_2,choise_3,choise_4,answer_choise,answer_description,created_date)
 //values(1,'".$question."','".$q_picture."','".$choise_1."','".$choise_2."','".$choise_3."','".$choise_4."','".$answer_choise."','".$answer_description."',now());";
 
 
		// debug: 
		echo $sql ."<br/>";
		// debug: echo 
		$result = mysql_query($sql,$connect);
		// debug: echo 
		echo mysql_error($connect); 
		echo "<br/>";
	//	 exit();
	}

fclose($objCSV);

?>