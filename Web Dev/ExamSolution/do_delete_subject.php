<?php
/**
	manage function for exam
*/

session_start();
// require need database.
require_once("include/include_mysql.php");

$sql = "delete from tbl_subject where id='".$_GET['s_id']."' ";
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
	alert("ลบวิชาเรียบร้อยแล้ว");
	window.location="list_subject.php";
	</script>
	<?php
  
}
else{
	
	?>
	<script>
	
	window.location="manage_subject.php?subject_id=<?=$_GET['s_id'];?>";
	</script>
	<?php
}

?>