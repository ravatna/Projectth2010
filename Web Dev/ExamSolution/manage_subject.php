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
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
	
    <title>Manage Subject</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/dist/css/datepicker.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

  </head>

  <body>

<?php
include "include/include_teacher_nav.php";
?>

    <div class="container-fluid">
      <div class="row">
	  
        <div class="col-sm-12   main">
						<a class="btn btn-warning " style="" href="dashboard_teacher.php" role="button">
                            <span class="">&lt;</span> <span class="">ย้อนกลับ</span>
                        </a>
		

          <h2 class="sub-header">วิชา</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อวิชา</th>
				  
                </tr>
              </thead>
              
              <tbody>
                  <?php 
// get content from exam

$sql = "SELECT id,subject_name FROM tbl_subject where (id='". $_GET['subject_id'] ."');";
$result = mysqli_query($conn,$sql);

                  $a = mysqli_fetch_array($result);
                  ?>
                  <tr>
                  <td><?=$a['id']; ?></td>
                  <td><?=$a['subject_name'];?></td>
                </tr>                
              </tbody>
            </table>
          </div>
		  
		  <!-- end student -->
		  <hr />
                  
                  <div class="col-sm-8 col-sm-offset-1  main">
                      
                      <form class="form-horizontal" action="do_update_subject.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="subject_name">ชื่อวิชา</label>
    <div class="col-sm-10">
	<input type="hidden" class="form-control" name="id" id="id"  value="<?=$a['id'] ?>" />
	<input rows="5" class="form-control" name="subject_name" id="subject_name" placeholder="ชื่อวิชา..." value="<?=$a['subject_name'] ?>" title="ชื่อวิชาที่เปิดสอบ..." />	
    </div>
  </div>
  
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-primary" onclick="sendSubmit();">บันทึก</button>
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
            
	<script src="bootstrap/dist/js/bootstrap-datepicker.js"></script>
  
	
	<script>
	
	
	
	function sendSubmit(){    
	var c = confirm("ต้องการบันทึกใช่หรือไม่?");
	if(c==false){
		return;
	}
	
		$.ajax({
			type: "POST",
			url: "do_update_subject.php",
			data: {
				"id":$("#id").val(),
				"subject_name":$("#subject_name").val()
				
			},
			success: function(res){
				if(res.message=="success"){
					alert("บันทึกเรียบร้อยแล้ว");
					window.location="list_subject.php";
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
