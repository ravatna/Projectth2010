<?php
session_start();
//$uid = $_SESSION["user_id"];
//include('include/config.php');
//include('include/function.php');
// update("user_name","status=0,time=null,day=null,sid=null","where user_id = '$uid'");
// setcookie("username_log",$uid,time()-3600*24*356);
session_destroy();	 
header("location:index.php");
exit();
?> 
