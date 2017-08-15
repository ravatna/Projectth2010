<?php
/* update current to do exam to database */
session_start();
// require need database.
require_once("include/include_mysql.php");

$do_exam_id = $_SESSION['do_exam_id']; // question set id
$exam_no = $_GET['exam_no']; // question no

// check temp 
$sql = "select do_exam_id,exam_no,answer_no,currect_no,created_date,updated_date from tbl_do_exam_detail_tmp where temp_id='". session_id() ."' and exam_no='". $exam_no ."'";

$result = mysqli_query($conn,$sql);
$iCount = mysqli_num_rows($result);

$a = mysqli_fetch_array($result);


if($iCount > 0){
    $sql = "update tbl_do_exam_detail_tmp set do_exam_id='',exam_no='',answer_no='',currect_no='',updated_date=now() where temp_id='". session_id() ."' and exam_no='". $exam_no ."' and exam_key ='".$exam_key."'";
}else{
    $sql = "insert into tbl_do_exam_detail_tmp( exam_key,do_exam_id,exam_no,answer_no,currect_no,created_date,updated_date)"
            . " values('".$do_exam_id."','".$exam_no."','".$answer_no."','".$currect_no."','".$created_date."','".$updated_date."')";
}

$result = mysqli_query($conn,$sql);

?>