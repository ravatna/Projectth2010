<?php
session_start();

// require need database.
require_once("include/include_mysql.php");

$rows = explode("|", $_POST['v']);
$iSumScore = 0;
// loop for save per choise
for($i=0;$i< (count($rows)-1) ; $i++){
    $choise = explode("-",$rows[$i]);
    
    if($choise[0]=="null"){
        continue;
    }
    
     $sql_currect = "select id,exam_id,answer_choise from tbl_exam_detail where (id='".$choise[0]."' and exam_id = '". $_SESSION['exam_id'] ."')";   
    $result = mysqli_query($conn,$sql_currect);
    
    if($result){
        $a = mysqli_fetch_array($result);
        
         $sql_insert = "INSERT INTO tbl_do_exam_detail(do_exam_id,exam_no,answer_no,currect_no,created_date,do_time) "
                . "         VALUES(".$_SESSION['do_exam_id'].",'".$choise[0]."','".$choise[1]."','". $a['answer_choise'] ."',now(),".$_SESSION['do_time'].");";
        $result = mysqli_query($conn,$sql_insert);
        
        if(trim($choise[1]) == trim($a['answer_choise'])){
             $iSumScore++;
        }
        //echo "<br/><br/>".mysqli_error($conn);
    }

}

  $sql_do_exam = "update tbl_do_exam set score = ".$iSumScore." where student_id='".$_SESSION['id']."' and exam_id='".$_SESSION['exam_id']."' and do_time='".$_SESSION['do_time']."' ";
$result = mysqli_query($conn,$sql_do_exam);
//echo mysqli_error($conn);
if($result){
	echo json_encode(array("message"=>"success","score"=>$iSumScore));
}else{
	echo json_encode(array("message"=>"fail"));
}



?>

