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

    <title>หน้าจอจัดการข้อมูลครู</title>

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
        <div class="col-sm-3 col-md-2 sidebar">

          <div class="col-sm-3 col-md-2 sidebar">
		  
          <ul class="nav nav-sidebar">
		  
            <li><a href="teacherinfo.php">ข้อมูลส่วนตัว</a></li>
			<!--<li><a href="list_student.php">นักเรียน</a></li>-->
			<li><a href="list_subject.php">วิชาที่เปิดสอบ</a></li>
            <li><a href="dashboard_teacher.php">ข้อสอบ</a></li>
          </ul>

        </div>

        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">ข้อสอบ</h2>
		  <a class="btn btn-primary " style="" href="manage_exam.php" role="button">
              <span class="">+ เพิ่มข้อสอบใหม่</span>
          </a>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
				  <th>วิชา</th>
                  <th>ชุดข้อสอบ</th>
				  <th>ชั้นปี</th>
				  
                  <th>วันที่เริ่ม</th>
                  <th>วันที่สิ้นสุด</th>
				  <th>สถานะ ชุดข้อสอบ</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                  <?php
// get content from exam

$sql = "SELECT id,major_title,title,teacher_id,for_class_level,start_date,end_date,status,created_at,description,status FROM tbl_exam where ( teacher_id='". $_SESSION['id'] ."')  order by major_title asc;";
$result = mysqli_query($conn,$sql);
$inum = mysqli_num_rows($result);

              for($i = 0; $i < $inum; $i++):
                  $a = mysqli_fetch_array($result);
                  ?>

                  <tr >
				  
                  <td><?=$i+1; ?></td>
				  <td><?=$a['major_title'];?></td>
                  <td><?=$a['title'];?></td>
                  <td><?=$a['for_class_level'];?></td>
                  <td><?=$a['start_date'];?></td>
                  <td><?=$a['end_date'];?></td>
				  <td class="<?=($a['status']=="1") ? "success" : "" ;?>" align="center"><?=($a['status']=="1") ? "เปิดใช้" : "ไม่เปิดใช้" ;?></td>
                  <td>
				  <a class="btn btn-default " style="" href="who_doing_test.php?exam_id=<?=$a['id'] ;?>" role="button">
                       <span class="">ผู้เข้าทำข้อสอบได้</span>
                  </a>
						
			<a class="btn btn-default " style="" href="exam_summary.php?exam_id=<?=$a['id'] ;?>" role="button">
                            <span class="">คะแนน</span>
                        </a>

						<a class="btn btn-default " style="" href="manage_exam.php?exam_id=<?=$a['id'] ;?>" role="button">
                            <span class="">แก้ไขข้อสอบ</span>
                        </a>


                        <button type="button" class="btn btn-warring" onclick="delExam(<?=$a['id'] ;?>);">ลบ</button>

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
  <script type="text/javascript">
function delExam(exam_id)
	{
		var x = confirm("ต้องการลบแบบทดสอบนี้ใช่หรือไม่ ?");
		if(x == true)
		{
			window.location="do_delete_exam.php?&id=" + exam_id;
			
		}
	}
</script>
</html>
