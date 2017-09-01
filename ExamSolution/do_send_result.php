<?php
session_start();

$_SESSION['doing_exam'] = 0; // do exam is finish
$_SESSION['exam_key'] = "";

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

        <title>Do Exam</title>

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
                    <!--<a class="navbar-brand" href="#">Exam</a>-->
                </div>

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right"  style="color:white; font-size:20px;" >
                        <li><a href="#">วิชาที่กำลังสอบ</a></li>
                        <li><a href="#">ชื่อ <?=$_SESSION['fullname'] ;?> ชั้น <?=$_SESSION['class_level'];?></a></li>
                        <li><a href="dologout.php">ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                
                <div class=" container col-sm-12">
                   <h3><center>ส่งคำตอบเรียบร้อยแล้ว</center></h3> 
					<hr/>
					<center>
					<img src="imgs/check.png" height="200" alt="check" />
					<?php if($_SESSION['show_score_on_send'] =="1"){ ?>
						<!--<h3>คุณได้ <?=base64_decode($_GET['s']); ?> คะแนน</h3>-->
						<h3>คุณได้ <?=$_GET['s']; ?> คะแนน</h3>
					<?php } ?>
						
					<div style="padding-top:4px;" ></div>
					<a class="btn btn-primary btn-lg" href="dashboard_student.php" role="button">
                        <span class="">ปิดหน้าต่างนี้</span>
                    </a>
                </center>
                </div>
            </div>

            <!-- Bootstrap core JavaScript
            ================================================== -->
            <!-- Placed at the end of the document so the pages load faster -->
            <script src="bootstrap/dist/js/jquery.min.js"></script>
            <script src="bootstrap/dist/js/bootstrap.min.js"></script>
            
    </body>
</html>
