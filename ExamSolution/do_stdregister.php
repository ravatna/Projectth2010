<?php
/**
	check duplicate 
*/

session_start();
// require need database.
require_once("include/include_mysql.php");

$fullname = $_POST['fullname'];
$uname = $_POST['std_code'];
$pword = $_POST['pword'];
$std_code = $_POST['std_code'];
$class_level = $_POST['class_level'];
$room = $_POST['room'];

$s = "select * from tbl_student where std_code='".$std_code."'";
$res = mysqli_query($conn,$s);
 
	if(mysqli_num_rows($res) > 0){
		$_SESSION['msg'] = "ไม่สามารถลงทะเบียนได้ รหัสนักเรียนมีอยู่แล้วในระบบ";
		header("location:stdregister.php");
		exit();	
	}

	$sql = "INSERT INTO tbl_student(fullname,uname,pword,std_code,class_level,room,status) VALUES('".$fullname."','".$uname."',md5('".$pword."'),'".$std_code."','".$class_level."','".$room."',1);";
  
	$result = mysqli_query($conn,$sql);
	if($result){
		$_SESSION['msg'] = "";
		header("location:login.php");
	}else{
		$_SESSION['msg'] = "ไม่สามารถลงทะเบียนได้";
		header("location:stdregister.php");
	}

?>