<?php
/**
	update student info
*/
session_start();
// require need database.
require_once("include/include_mysql.php");
$sql = "";
if($_POST['fullname'] !=""){
	$fullname = $_POST['fullname'];
	
	

	$sql = "UPDATE tbl_teacher SET fullname='".$fullname."' where id='".$_SESSION['id']."';";
	
	
$result = mysqli_query($conn,$sql);
mysqli_error($conn);

if($result){
	$_SESSION['msg'] = "ปรับปรุงข้อมูลเรียบร้อยแล้ว";
}else{
	$_SESSION['msg'] = "ไม่สามารถปรับปรุงข้อมูลได้";
}

header("location:teacherinfo.php");
}
else
{
	
	$confirm_old_pword = $_POST['confirm_old_pword'];
	$pword = $_POST['pword'];
	//echo $confirm_old_pword. " -- " .md5($confirm_old_pword); exit();
	
	if($_SESSION['p'] == md5($confirm_old_pword)){
		 $sql = "UPDATE tbl_teacher set pword=md5('".$pword."') WHERE id='".$_SESSION['id']."';";
	}else{
		$_SESSION['msg'] = "รหัสผ่านเดิมไม่ถูกต้อง";
		header("location:teacherinfo.php");
	}
	
$result = mysqli_query($conn,$sql);

if($result){
	$_SESSION['msg'] = "";
	header("location:login.php");
}else{
	$_SESSION['msg'] = "ไม่สามารถปรับปรุงข้อมูลได้";
	header("location:teacherinfo.php");
}


	
}


?>