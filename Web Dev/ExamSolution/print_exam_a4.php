<?php
session_start();

// if you is not be tacher role
if($_SESSION['im_is'] != "teacher"){
    header("location:index.php");
}

// require need database.
require_once("include/include_mysql.php");


// get content from exam

$sql = "SELECT tbl_exam.id,title,type_exam,teacher_id,tbl_teacher.fullname as teacher_fullname,for_class_level,show_score_on_send,start_date,end_date,status,created_at,description FROM tbl_exam inner join tbl_teacher on tbl_exam.teacher_id = tbl_teacher.id where (status = '1' and tbl_exam.id='". $_GET['exam_id'] ."');";
$result = mysqli_query($conn,$sql);
//echo mysqli_error($conn);
                  $a = mysqli_fetch_array($result);
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
<div><span style="width:300px;">ชั้น: <?=$a['for_class_level'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span>วันที่สอบ: <?=$a['start_date'];?></span></div>
<div>คำอธิบาย: <?=$a['description'];?></div>
<div>โดย: <?=$a['teacher_fullname'];?> </div>
</div>

	            
          <div class="table-responsive">
            <table class="table">
              
              
              <tbody>
                  <?php 
// get content from exam

 $sql = "SELECT id,exam_id,question,q_picture,choise_1,choise_2,choise_3,choise_4,choise_5,answer_choise,answer_description,created_date FROM tbl_exam_detail where (exam_id='". $_GET['exam_id'] ."');";
$result = mysqli_query($conn,$sql);
if($result){
$inum = mysqli_num_rows($result);

              for($i = 0; $i < $inum; $i++): 
                  $a = mysqli_fetch_array($result);
                  ?>
                  
                  <tr>
                  <td><?=$i+1; ?></td>
                  <td><?=$a['question'];?><br/>
				  <span>ก. <?=$a['choise_1'];?></span><br/>
				  <span>ข. <?=$a['choise_2'];?></span><br/>
				  <span>ค. <?=$a['choise_3'];?></span><br/>
				  <?php 	
				  
				  if($a['choise_4']!=""){
					  ?>
				  <span>ง. <?=$a['choise_4'];?></span><br/>
				  <?php 
				  
				  }
					  
				  if($a['choise_5']!=""){
					  ?>
				  <span>จ. <?=$a['choise_5'];?></span><br/>
				  
				  <?php 
				  
				  }
					  ?>
				  </td>
                  
                  
                  
                  
                </tr>
                
                <?php endfor; 
                // end for
                ?>

			<?php
}
			
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
