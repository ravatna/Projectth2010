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
	$uname = $_POST['std_code'];
	$room = $_POST['room'];
	$class_level = $_POST['class_level'];

	$sql = "UPDATE tbl_student set fullname='".$fullname."',uname='".$uname."',class_level='".$class_level."',room='".$room."' WHERE id='".$_SESSION['id']."';";
	
	
$result = mysqli_query($conn,$sql);

if($result){
	$_SESSION['msg'] = "";
	
	echo '<script>alert("ปรับปรุงข้อมูลเรียบร้อยแล้ว"); window.location="dologout.php";</script>';
	exit();
	
}else{
	$_SESSION['msg'] = "ไม่สามารถปรับปรุงข้อมูลได้";
}

header("location:studentinfo.php");
}
else
{
	
	$confirm_old_pword = $_POST['confirm_old_pword'];
	$pword = $_POST['pword'];
	//echo $confirm_old_pword. " -- " .md5($confirm_old_pword); exit();
	
	if($_SESSION['p'] == md5($confirm_old_pword)){
		 $sql = "UPDATE tbl_student set pword=md5('".$pword."') WHERE id='".$_SESSION['id']."';";
	}else{
		$_SESSION['msg'] = "รหัสผ่านเดิมไม่ถูกต้อง";
		header("location:studentinfo.php");
	}
	
$result = mysqli_query($conn,$sql);

if($result){
	$_SESSION['msg'] = "";
	header("location:login.php");
}else{
	$_SESSION['msg'] = "ไม่สามารถปรับปรุงข้อมูลได้";
	header("location:studentinfo.php");
}


	
}


?>