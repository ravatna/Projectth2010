<?php
session_start();
// require need database.
require_once("include/include_mysql.php");

if($_SESSION['id'] == "")
     {
        header("location:login.php");
     }
	 
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

    <title>Dashboard for student</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Exam</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">ชื่อ <?=$_SESSION['fullname'] ;?> ชั้น <?=$_SESSION['class_level'];?></a></li>
            <li><a href="dologout.php"><strong>ออกจากระบบ</strong></a></li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">  
          <ul class="nav nav-sidebar">
		  <li><a href="studentinfo.php">ข้อมูลส่วนตัว</a></li>
            <li><a href="">ข้อสอบ/แบบทดสอบ</a></li>
          </ul>  
        </div>
          
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">ข้อสอบ/แบบทดสอบ</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
				  <th>วิชา</th>
                  <th>ชุดข้อสอบ</th>
				  <th>กำหนดเวลา</th>
		  <th>ชั้นปี</th>
		  <th>อาจารย์</th>
                  <th>วันที่เริ่ม</th>
                  <th>วันที่สิ้นสุด</th>
				  <th></th>
                </tr>
              </thead>
              
              <tbody>
              <?php 
// get content from exam


$sql = "SELECT tbl_teacher.fullname,tbl_exam.id,major_title,title,teacher_id,for_class_level,count_down_time,start_date,end_date,status,created_at,description FROM tbl_exam left join tbl_teacher on tbl_exam.teacher_id = tbl_teacher.id where  start_date <=  curdate() and status = '1' and for_class_level='". $_SESSION['class_level'] ."' order by major_title asc;";
$result = mysqli_query($conn,$sql);
$inum = mysqli_num_rows($result);

              for($i = 0; $i < $inum; $i++): 
                  $a = mysqli_fetch_array($result);
                  ?>
                  
                  <tr>
					<td><?=$i+1; ?></td>
					<td><?=$a['major_title'];?></td>
					<td><?=$a['title'];?></td>
					<td><?=$a['count_down_time'];?> นาที</td>
					<td><?=$a['for_class_level'];?></td>
					<td><?=$a['fullname'];?></td>
					<td><?=$a['start_date'];?></td>
					<td><?=$a['end_date'];?></td>
					<td>
						<a class="btn btn-default " style="" href="register_do_exam.php?exam_id=<?=$a['id'] ;?>&title=<?=$a['title'] ;?>" role="button">
                            <span class="">ทำข้อสอบ</span>
                        </a>
                  </td>
                </tr>
                
                <?php endfor; 
                // end for
                ?>
                
                
              </tbody>
            </table>
          </div>	  
          <!-- end student -->
		  
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="bootstrap/dist/js/jquery.min.js"></script>
    
    <script src="boostrap/dist/js/bootstrap.min.js"></script>
    
  </body>
</html>
