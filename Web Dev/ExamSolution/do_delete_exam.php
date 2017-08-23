<?php
/**
	manage function for exam
*/

session_start();
// require need database.
require_once("include/include_mysql.php");

$sql = "delete from tbl_exam where id='".$_GET['id']."' ";
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
	alert("ลบขอบสอบแล้ว");
	window.location="dashboard_teacher.php";
	</script>
	<?php
  
}
else{
	
	?>
	<script>
	
	window.location="manage_exam.php?exam_id=<?=$_GET['id'];?>";
	</script>
	<?php
}

?>