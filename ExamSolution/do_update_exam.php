<?php
/**
	manage function for exam
*/

session_start();
// require need database.
require_once("include/include_mysql.php");



$sql_update = "INSERT INTO tbl_exam (title,description,for_class_level,how_to_answer,type_exam,start_date,end_date,start_time,end_time,status,never_end_date,show_score_on_send,teacher_id,count_down_time,major_title,room) values('".$_POST['title']."' ,'".$_POST['description']."' ,'".$_POST['for_class_level']."' ,'".$_POST['how_to_answer']."','".$_POST['type_exam']."' ,'".$_POST['start_date']."' ,'".$_POST['end_date']."' ,'".$_POST['start_time']."' ,'".$_POST['end_time']."' ,'".$_POST['status']."' ,'".$_POST['show_score_on_send']."' ,'".$_POST['never_end_date']."','".$_SESSION['id']."','".$_POST['count_down_time']."','".$_POST['major_title']."','".$_POST['room']."')";


if($_POST['id'] != ""){
  $sql_update = "UPDATE tbl_exam set title = '".$_POST['title']."' ,description='".$_POST['description']."',for_class_level='".$_POST['for_class_level']."',how_to_answer = '".$_POST['how_to_answer']."' ,type_exam='".$_POST['type_exam']."',start_date='".$_POST['start_date']."',end_date='".$_POST['end_date']."',start_time='".$_POST['start_time']."',end_time='".$_POST['end_time']."',status='".$_POST['status']."',never_end_date='".$_POST['never_end_date']."',show_score_on_send='".$_POST['show_score_on_send']."',count_down_time='".$_POST['count_down_time']."',major_title='".$_POST['major_title']."',room='".$_POST['room']."' where id='".$_POST['id']."' ";
}
  
  
$result = mysqli_query($conn,$sql_update);
//echo mysqli_error($conn);
if($result){
	if($_POST['id'] != ""){
			echo json_encode(array("message"=>"success"));
	}
	else{
	echo json_encode(array("message"=>"success","is_new"=>1));
	}
}else{
	echo json_encode(array("message"=>"fail"));	
}

?>