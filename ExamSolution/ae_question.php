<?php
session_start();

// if you is not be tacher role
if($_SESSION['im_is'] != "teacher"){
    header("location:index.php");
}

// require need database.
require_once("include/include_mysql.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Exam - Add/Update Question</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

  </head>

  <body>

<?php 
include "include/include_teacher_nav.php";

// get content from exam

$sql = "SELECT id,exam_id,question,q_picture,choise_1,choise_2,choise_3,choise_4,choise_5,answer_choise,answer_description,created_date,choise_pic1,choise_pic2,choise_pic3,choise_pic4,choise_pic5 FROM tbl_exam_detail where (id='". $_GET['question_id'] ."');";
$result = mysqli_query($conn,$sql);
$inum = mysqli_num_rows($result);              
$a = mysqli_fetch_array($result);
?>

    <div class="container-fluid">
      <div class="row">
         
          
        <div class="col-sm-12   main">
         
                  
                  <div class="col-sm-10 col-sm-offset-1  main">
                      
                      <form class="form-horizontal" action="do_update_question.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="question">คำถาม</label>
    <div class="col-sm-10">
	<input type="hidden" class="form-control" name="id" id="id"  value="<?=$a['id'] ?>" />
	<input type="hidden" class="form-control" name="exam_id" id="exam_id"  value="<?=$_GET['exam_id'] ?>" />
      <input type="text" class="form-control" name="question" id="question" placeholder="คำถาม..." value="<?=$a['question'] ?>"  require="require"/>
    </div>
  </div>
  
          <div class="form-group">
    <label class="control-label col-sm-2" for="q_picture">ภาพประกอบ</label>
    <div class="col-sm-10">
	
	
	<?php if($a['q_picture'] !="") { 
										
										echo "<img style='height:100px' src=\"res/{$a['q_picture']}\" alt='{$a['question']}' />";
										
									 }  ?>
	
      <input type="file" class="form-control" name="q_picture" id="q_picture" placeholder="..." value="<?=$a['q_picture'] ?>" />
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="choise_1">ก.</label>
    <div class="col-sm-10">
	<?php if($a['choise_pic1'] !="") { 
										
										echo "<img style='height:100px' src=\"res/{$a['choise_pic1']}\" alt='{$a['choise_pic1']}' />";
										
									 }  ?>
	
      <input type="file" class="form-control" name="choise_pic1" id="choise_pic1" placeholder="..." value="<?=$a['choise_pic1'] ?>" />
      <input type="text" class="form-control" name="choise_1" id="choise_1" placeholder="ก. .." value="<?=$a['choise_1'] ?>" require="require" />
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="choise_2">ข.</label>
    <div class="col-sm-10">
	<?php if($a['choise_pic2'] !="") { 
										
										echo "<img style='height:100px' src=\"res/{$a['choise_pic2']}\" alt='{$a['choise_pic2']}' />";
										
									 }  ?>
	
      <input type="file" class="form-control" name="choise_pic2" id="choise_pic2" placeholder="..." value="<?=$a['choise_pic2'] ?>" />
      <input type="text" class="form-control" name="choise_2" id="choise_2" placeholder="ข. .." value="<?=$a['choise_2'] ?>"  require="require" />
    </div>
  </div>

<div class="form-group">
    <label class="control-label col-sm-2" for="choise_3">ค.</label>
    <div class="col-sm-10">
	<?php if($a['choise_pic3'] !="") { 
										
										echo "<img style='height:100px' src=\"res/{$a['choise_pic3']}\" alt='{$a['choise_pic3']}' />";
										
									 }  ?>
	
      <input type="file" class="form-control" name="choise_pic3" id="choise_pic3" placeholder="..." value="<?=$a['choise_pic3'] ?>" />
      <input type="text" class="form-control" name="choise_3" id="choise_3" placeholder="ค. .." value="<?=$a['choise_3'] ?>" />
    </div>
  </div>  
        

<div class="form-group">
    <label class="control-label col-sm-2" for="choise_4">ง.</label>
    <div class="col-sm-10">
	<?php if($a['choise_pic4'] !="") { 
										
										echo "<img style='height:100px' src=\"res/{$a['choise_pic4']}\" alt='{$a['choise_pic4']}' />";
										
									 }  ?>
	
      <input type="file" class="form-control" name="choise_pic4" id="choise_pic4" placeholder="..." value="<?=$a['choise_pic4'] ?>" />
      <input type="text" class="form-control" name="choise_4" id="choise_4" placeholder="ง. .." value="<?=$a['choise_4'] ?>" />
    </div>
  </div>		
                

<div class="form-group">
    <label class="control-label col-sm-2" for="choise_5">จ.</label>
    <div class="col-sm-10">
	<?php if($a['choise_pic5'] !="") { 
										
										echo "<img style='height:100px' src=\"res/{$a['choise_pic5']}\" alt='{$a['choise_pic5']}' />";
										
									 }  ?>
	
      <input type="file" class="form-control" name="choise_pic5" id="choise_pic5" placeholder="..." value="<?=$a['choise_pic5'] ?>" />
      <input type="text" class="form-control" name="choise_5" id="choise_5" placeholder="จ. .." value="<?=$a['choise_5'] ?>" />


	  </div>
</div>
		

<div class="form-group">
    <label class="control-label col-sm-2" for="answer_choise">คำตอบ</label>
    <div class="col-sm-10">
      <input type="text" title="ระบุข้อที่ถูกต้องเป็นตัวเลข เช่น ก. = 1, ข. = 2, ค. = 3, ง. = 4, จ. = 5" class="form-control" name="answer_choise" id="answer_choise" placeholder="คำตอบ. .." value="<?=$a['answer_choise'] ?>"  require="require" />
    </div>
  </div>
  
  
<div class="form-group">
    <label class="control-label col-sm-2" for="answer_description">คำอธิบาย</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" title="คำอธิบายคำตอบเพื่อให้เกิดความเข้าใจมากขึ้น" name="answer_description" id="answer_description" placeholder="คำอธิบาย..." value="<?=$a['answer_description'] ?>" />
    </div>
  </div>
		
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit"  class="btn btn-primary">บันทึก</button> 
	  <a href="manage_exam.php?exam_id=<?=$_GET['exam_id']; ?>" class="btn btn-default" role="button">ย้อนกลับ</a>
	  
	  <a class="btn btn-warning " style="" href="ae_question.php?exam_id=<?=$_GET['exam_id'] ?>" role="button">
                            <span class="">+</span> เพิ่มข้อใหม่
							</a>
	  
    </div>
  </div>
</form>
                  </div>
				  
				  
				  
				  
        </div>
		
          </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
        <script src="bootstrap/dist/js/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  
  
  
	<script> 
	function sendSubmit(){    
	var c = confirm("ต้องการบันทึกใช่หรือไม่?");
	if(c==false){
		return;
	}
	
	
	
		$.ajax({
			type: "POST",
			url: "do_update_question.php",
			data: {
				"id":$("#id").val(),
				"question":$("#question").val(),
				"q_picture":$("#q_picture").val(),
				"choise_1":$("#choise_1").val(),
				"choise_2":$("#choise_2").val(),
				"choise_3":$("#choise_3").val(),
				"choise_4":$("#choise_4").val(),
				"choise_5":$("#choise_5").val()
			},
			success: function(res){
				if(res.message=="success"){
					alert("บันทึกเรียบร้อยแล้ว");
					window.location=window.location;
				}else{
					alert("บันทึกไม่สำเร็จ");
				}
			},
			dataType: "json"
		});

	}
	
	
	<?php
	if($_SESSION['msg']=="s"){
		?>
		alert("บันทึกเรียบร้อยแล้ว");
		<?php
	}else if($_SESSION['msg']=="f"){
		?>
		alert("บันทึกไม่สำเร็จ");
		<?php
	}
	$_SESSION ['msg'] = "";
	
	?>
	</script>
  </body>
  
  
</html>
