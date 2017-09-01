<?php
session_start();
// require need database.
require_once("include/include_mysql.php");


$objCSV = fopen("backup_onet_art.csv", "r");
$i = 0;
while (($objArr = fgetcsv($objCSV, 2048, ",")) !== FALSE) {
	
	if($i==0){
		$i++;
		continue;
	}
	
	//echo $objArr[0] ."-". $objArr[1]."<br/>";
	
	$question = iconv("tis-620","utf-8",$objArr[1]);
	$q_picture = "";
	// iconv("tis-620","utf-8",$objArr[1]);
	$choise_1 = iconv("tis-620","utf-8",$objArr[2]);
	$choise_2 = iconv("tis-620","utf-8",$objArr[3]);
	$choise_3 = iconv("tis-620","utf-8",$objArr[4]);
	$choise_4 = iconv("tis-620","utf-8",$objArr[5]);
	$answer_choise = iconv("tis-620","utf-8",$objArr[6]);
	$answer_description = iconv("tis-620","utf-8",$objArr[7]);

$sql = "insert into tbl_exam_detail(exam_id,question,q_picture,choise_1,choise_2,choise_3,choise_4,answer_choise,answer_description,created_date)
 values(9,'".$question."','".$q_picture."','".$choise_1."','".$choise_2."','".$choise_3."','".$choise_4."','".$answer_choise."','".$answer_description."',now());";
		echo $sql ."<br/>";
		echo $result = mysqli_query($conn,$sql);
		echo mysqli_error($conn);
		
		//$i++;
		//exit();
	}

	
fclose($objCSV);

?>