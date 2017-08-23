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

    <title>รายชื่อนักเรียนในระบบทั้งหมด</title>

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
?>
    <div class="container-fluid">
      <div class="row">
        

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<div class="col-sm-3 col-md-2 sidebar">

          <div class="col-sm-3 col-md-2 sidebar">


          <ul class="nav nav-sidebar">
            <li><a href="teacherinfo.php">ข้อมูลส่วนตัว</a></li>
			<!--<li><a href="list_student.php">นักเรียน</a></li>-->
			<li><a href="list_subject.php">วิชาที่เปิดสอน</a></li>
            <li><a href="dashboard_teacher.php">ข้อสอบ</a></li>
          </ul>

        </div>

        </div>



<h2 class="sub-header">นักเรียน</h2>
          <div class="table-responsive">
            <table class="table table-striped">

              <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อ</th>
				  <th>ชั้นปี</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>


                  <?php
// get content from exam


$sql_student = "SELECT id,fullname,class_level FROM tbl_student;";
$result_student = mysqli_query($conn,$sql_student);
$inum = mysqli_num_rows($result_student);

              for($i = 0; $i < $inum; $i++):
                  $a_student = mysqli_fetch_array($result_student);
                  ?>

                  <tr>
                  <td><?=$i+1; ?></td>
                  <td><?=$a_student['fullname'];?></td>
                  <td><?=$a_student['class_level'];?></td>
                  <td>
						<a class="btn btn-default  " style="" href="#" role="button">
                            <span class="">ประวัติการทำข้อสอบ</span>
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
    <!-- Placed at the end of the document so the pages load faster -->
            <script src="bootstrap/dist/js/jquery.min.js"></script>
            <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
