<?php
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
echo mysqli_error($conn);
?>
<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ชุดข้อสอบ: <?=$a['title'];?>  ชั้น; <?=$a['for_class_level'];?></title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/dist/css/datepicker.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->

	<style>
		.page {
		   size: 7in 9.25in !important;
		   margin: 27mm 16mm 27mm 16mm !important;
		   /*border:solid thin #ececec;*/
		}

		@font-face {
			font-family: THSarabun;
			src: url('fonts/THSarabun.ttf');
		}
		body {
			font-family: THSarabun;
			font-size:18pt;
		}
	</style>
  </head>

  <body class="page">

    <div class="container-fluid">
      <div class="row">
	  
        <div class="col-sm-12   main">
         
		<div style="font-weight:700;">
		<div >ชุดข้อสอบ: <?=$a['title'];?></div>
		<div><span style="width:300px;">ชั้น: <?=$a['for_class_level'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>วันที่สอบ: <?=$a[	'start_date'];?></span></div>
		<div>โดย: <?=$a['teacher_fullname'];?> </div>
		</div>

	            <h2>ผลคะแนน</h2>
          <div class="table-responsive">
            <table class="table">

                <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อ</th>
				  <th>ชั้นปี</th>
				  <th>ครั้งที่</th>
				  <th>วันที่</th>
				  <th>คะแนน</th>
                </tr>
              </thead>
           
              <tbody>
                  <?php
// get content from exam


// $sql_student = "SELECT id,fullname,class_level FROM tbl_student where class_level='".$_GET['for_class_level']."';";

 $sql_student = "SELECT dex.score,dex.created_date,dex.id,dex.do_time,ex.title,dex.student_id,st.fullname,st.class_level
FROM ((tbl_do_exam dex inner join tbl_exam ex on dex.exam_id = ex.id)

  inner join tbl_student st on dex.student_id = st.id)

where ex.id = ".$_REQUEST['exam_id']." and dex.created_date between '".$_GET['from_date']." 00:00:00' and '".$_GET['from_date']." 23:59:59';";

$result_student = mysqli_query($conn,$sql_student);
$inum = mysqli_num_rows($result_student);

              for($i = 0; $i < $inum; $i++):
                  $a_student = mysqli_fetch_array($result_student);
                  ?>

                        <tr>
                  <td><?=$i+1; ?></td>
                  <td><?=$a_student['fullname'];?></td>
                  <td><?=$a_student['class_level'];?></td>
				  <td><?=$a_student['do_time'];?></td>
				  <td><?=$a_student['created_date'];?></td>
				  <td><?=$a_student['score'];?></td>
				  
                  
                </tr>

                <?php endfor;
                // end for
                ?>
              </tbody>
            </table>
			
			</div>
			<!-- / end list question in set exam -->

		
      </div>
          </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/dist/js/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
            
	
	
	<script>
	$(document).ready( function() {
		$('.datepicker').datepicker({"format": "yyyy-mm-dd"});
	})
	
	
	function sendSubmit(){    
	var c = confirm("ต้องการบันทึกใช่หรือไม่?");
	if(c==false){
		return;
	}
	
    var status = ( document.getElementById("status").checked ) ? "1" : "0";
	var never_end_date = ( document.getElementById("never_end_date").checked ) ? "1" : "0";
	var show_score_on_send = (document.getElementById("show_score_on_send").checked ) ? "1" : "0";
	
	
	
		$.ajax({
			type: "POST",
			url: "do_update_exam.php",
			data: {
				"id":$("#id").val(),
				"title":$("#title").val(),
				"type_exam":$("#type_exam").val(),
				"for_class_level":$("#for_class_level option:checked").val(),
				"description":$("#description").val(),
				"start_date":$("#start_date").val(),
				"end_date":$("#end_date").val(),
				"status":status,
				"never_end_date":never_end_date,
				"show_score_on_send":show_score_on_send
			},
			success: function(res){
				if(res.message=="success"){
					alert("บันทึกเรียบร้อยแล้ว");
					if(res.is_new==1){
						window.location="dashboard_teacher.php";
					}else{
							window.location=window.location;
					}
					
				}else{
					alert("บันทึกไม่สำเร็จ");
				}
			},
			dataType: "json"
		});

	}
	
	</script>
  </body>
</html>
