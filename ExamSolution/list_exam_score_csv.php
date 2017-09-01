<?php
header("content-Type:application/octet-stream; charset=utf8");
header('Content-Disposition: attachment; filename=score.csv');

session_start();
// if you is not be tacher role
if($_SESSION['im_is'] != "teacher"){
    header("location:index.php");
}

// require need database.
require_once("include/include_mysql.php");


// get content from exam
$sql = "SELECT tbl_exam.id,title,type_exam,teacher_id, tbl_teacher.fullname as teacher_fullname,for_class_level,show_score_on_send,start_date,end_date,status,created_at,description FROM tbl_exam inner join tbl_teacher  where (status = '1' and tbl_exam.id='". $_GET['exam_id'] ."');";

$result = mysqli_query($conn,$sql);
$a = mysqli_fetch_array($result);

// get content from exam


// $sql_student = "SELECT id,fullname,class_level FROM tbl_student where class_level='".$_GET['for_class_level']."';";

 $sql_student = "SELECT dex.score,dex.created_date,dex.id,dex.do_time,ex.title,dex.student_id,st.fullname,st.class_level
FROM ((tbl_do_exam dex inner join tbl_exam ex on dex.exam_id = ex.id)

  inner join tbl_student st on dex.student_id = st.id)

where ex.id = ".$_REQUEST['exam_id']." and dex.created_date between '".$_GET['from_date']." 00:00:00' and '".$_GET['from_date']." 23:59:59';";

$result_student = mysqli_query($conn,$sql_student);
$inum = mysqli_num_rows($result_student);

              for($i = 0; $i < $inum; $i++){
                  $a_student = mysqli_fetch_array($result_student);
 echo ($i+1).",".iconv("utf-8","tis-620",$a_student['fullname']).",".iconv("utf-8","tis-620",$a_student['class_level']).",".$a_student['do_time'].",".$a_student['created_date'].",".$a_student['score']."\n";
				  
			  }
                // end for
                ?>