<?php
/**
	manage function for exam
*/

session_start();
// require need database.
require_once("include/include_mysql.php");
if($_POST['id'] != ""){
	$sql = "UPDATE tbl_subject set subject_name = '".$_POST['subject_name']." where id='".$_POST['subject_id']."' ";
}
else
{
	$sql = "insert into tbl_subject (subject_name) values('".$_POST['subject_name']."' )";	
}
//echo $sql;
 $result = mysqli_query($conn,$sql);

if($result){


	
	echo json_encode(array("message"=>"success"));


	
}else{

		echo json_encode(array("message"=>"fail"));
	
}


	 
?>