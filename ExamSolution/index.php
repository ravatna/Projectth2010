<?php
session_start();

if(isset($_SESSION['im_is'])){
    if($_SESSION['im_is'] == "teacher"){
        header("location:dashboard_teacher.php");
    }else{
        header("location:dashboard_student.php");    
    }    
}else{
    session_destroy();
    header("location:login.php");
}
?>