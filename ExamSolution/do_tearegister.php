<?php
/**
	check duplicate 
*/

session_start();
// require need database.
require_once("include/include_mysql.php");

$_SESSION['msg'] = "";

$fullname = $_POST['fullname'];
$uname = $_POST['uname'];
$pword = $_POST['pword'];

$s = "select * from tbl_teacher where uname='".$uname."'";
$res = mysqli_query($conn,$s);
 
	if(mysqli_num_rows($res) > 0){
		$_SESSION['msg'] = "ไม่สามารถลงทะเบียนได้ ".$uname." มีอยู่แล้วในระบบ";
		header("location:tearegister.php");
		exit();	
	}

	$sql = "INSERT INTO tbl_teacher(fullname,uname,pword,gen_exam,can_access) VALUES('".$fullname."','".$uname."',md5('".$pword."'),'1',1);";
  
	$result = mysqli_query($conn,$sql);
	if($result){
		$_SESSION['msg'] = "";
		header("location:login.php");
	}else{
		$_SESSION['msg'] = "ไม่สามารถลงทะเบียนได้";
		header("location:tearegister.php");
	}
?>