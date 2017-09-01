<?php
session_start();
// require need database.
require_once("include/include_mysql.php");

$sql = "select id,fullname,uname,pword,std_code,class_level,status,room from tbl_student where uname='". $_POST['uname'] ."' and pword = md5('".$_POST['pword']."')";

// if user set teacher to login login module will goto teacher page.
if($_POST['loginfor'] == "teacher"){
    $sql = "select id,fullname,uname,pword,gen_exam,can_access from tbl_teacher where uname='". $_POST['uname'] ."' and pword = md5('".$_POST['pword']."')";
}


$result = mysqli_query($conn,$sql);
$a = mysqli_fetch_array($result);



if(count($a) > 0){
   
    
   
    
    if($_POST['loginfor'] == "teacher"){
        $_SESSION['im_is'] = "teacher";
        
        $_SESSION['id'] = $a['id'];
        $_SESSION['fullname'] = $a['fullname'];
		$_SESSION['p'] = $a['pword'];
        $_SESSION['gen_exam'] = $a['gen_exam'];
        $_SESSION['can_access'] = $a['can_access'];
        header("location:dashboard_teacher.php");
    }else{
        $_SESSION['im_is'] = "student";
        $_SESSION['id'] = $a['id'];
        $_SESSION['fullname'] = $a['fullname'];
		$_SESSION['p'] = $a['pword'];
        $_SESSION['std_code'] = $a['std_code'];
        $_SESSION['class_level'] = $a['class_level'];
		$_SESSION['room'] = $a['room'];
        $_SESSION['status'] = $a['status'];
        header("location:dashboard_student.php");    
    }
    
}else{
    session_destroy();
    header("location:login.php");
}
?>