<?php
/**
	manage function for exam
*/

session_start();
// require need database.
require_once("include/include_mysql.php");
if($_POST['id'] != ""){
	$sql = "UPDATE tbl_exam_detail set question = '".$_POST['question']."' ,q_picture='".$_FILES['q_picture']['name']."',choise_1='".$_POST['choise_1']."',choise_2='".$_POST['choise_2']."',choise_3='".$_POST['choise_3']."',choise_4='".$_POST['choise_4']."',choise_5='".$_POST['choise_5']."',answer_choise='".$_POST['answer_choise']."',answer_description='".$_POST['answer_description']."'  where id='".$_POST['id']."' ";
}
else
{
	$sql = "insert into tbl_exam_detail (exam_id,question,q_picture,choise_1,choise_2,choise_3,choise_4,choise_5,answer_choise,answer_description,created_date) 
	
	values('".$_POST['exam_id']."' ,'".$_POST['question']."' ,'".$_FILES['q_picture']['name']."','".$_POST['choise_1']."','".$_POST['choise_2']."','".$_POST['choise_3']."', '".$_POST['choise_4']."','".$_POST['choise_5']."','".$_POST['answer_choise']."','".$_POST['answer_description']."',now())";
	
}
//echo $sql;
 $result = mysqli_query($conn,$sql);

if($result){
	$_SESSION['msg'] = "s";
	
}else{
	$_SESSION['msg'] = "f";
	 mysqli_error($conn);
}

if($_POST['id'] != ""){

  header("location:ae_question.php?exam_id=".$_POST['exam_id']."&question_id=".$_POST['id']);
}
else{
	 header("location:ae_question.php?exam_id=".$_POST['exam_id']);
}

?>