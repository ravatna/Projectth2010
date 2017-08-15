<?php
session_start();

require_once 'include/include_mysql.php';
$sql = "SELECT show_score_on_send,id,title,teacher_id,for_class_level,start_date,end_date,status,created_at,description FROM tbl_exam where (status = '1' and id='". $_GET['exam_id'] ."');";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){ 
    $a = mysqli_fetch_array($result);
    $_SESSION['doing_exam'] = 1;
    //$_SESSION['exam_key'] = $_GET['exam_key'];
    $_SESSION['exam_id'] = $a['id']; 
    $_SESSION['exam_title'] = $a['title'];
	$_SESSION['show_score_on_send'] = $a['show_score_on_send'];
	
    
     $sql_do_time = "SELECT * FROM tbl_do_exam t where exam_id = '".$_SESSION['exam_id']."' and student_id = '".$_SESSION['id']."' order by created_date desc limit 0,1;";
    $res_do_time = mysqli_query($conn,$sql_do_time);
    $a_do_time = mysqli_fetch_array($res_do_time);
    $do_time = 0;
    
    if($a_do_time['do_time']!=""){
        $do_time = $a_do_time['do_time'];
        $do_time++;
    }else{
         $do_time = 1;
    }
    
    $_SESSION['do_time'] = $do_time;
    
    $sql_insert = "INSERT INTO tbl_do_exam(student_id,exam_id,score,do_time,created_date,updated_date) VALUES('".$_SESSION['id']."','".$_SESSION['exam_id']."',0,".$do_time.",now(),now());";
    mysqli_query($conn,$sql_insert);
    
    $sql_select="select id from tbl_do_exam where student_id = '".$_SESSION['id']."' and exam_id='".$_SESSION['exam_id']."' order by id desc limit 0,1;";
    $result = mysqli_query($conn,$sql_select);
    $a = mysqli_fetch_array($result);
    
	
	$_SESSION['do_exam_id'] = $a['id'] + 1;	
	
    
    
    
    
    
     header("location:do_exam.php");
}else{
	$_SESSION['show_score_on_send'] ="0";
    $_SESSION['doing_exam'] = 0;
    //$_SESSION['exam_key'] = "";
    $_SESSION['exam_id'] = "";    
    $_SESSION['exam_title'] = "";
     $_SESSION['do_exam_id'] ="";
    header("location:dashboard_student.php");
}


?>