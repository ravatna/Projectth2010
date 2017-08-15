<?php
/**
	manage function for exam
*/

session_start();
// require need database.
require_once("include/include_mysql.php");

$sql = "delete from tbl_exam_detail where id='".$_GET['q_id']."' ";
$result = mysqli_query($conn,$sql);

if($result){
	$_SESSION['msg'] = "ds";
	
}else{
	$_SESSION['msg'] = "df";
	 mysqli_error($conn);
}

if($result){
	
	?>
	<script>
	alert("ลบคำถามเรียบร้อยแล้ว");
	window.location="manage_exam.php?exam_id=<?=$_GET['exam_id'];?>";
	</script>
	<?php
  
}
else{
	
	?>
	<script>
	
	window.location="ae_question.php?exam_id=<?=$_GET['exam_id'];?>&question_id=<?=$_GET['q_id'];?>";
	</script>
	<?php
}

?>