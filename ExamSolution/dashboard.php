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

    <title>Dashboard Exam System</title>

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
            <li><a href="#">กระดานสรุป</a></li>
            <li><a href="#">แบบทดสอบ</a></li>
            <li><a href="#">ผู้สอน</a></li>
            <li><a href="#">นักเรียน</a></li>
          </ul>
          <!--
<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="ค้นหา...">
          </form>
		  -->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">ภาพรวม <span class="sr-only">(current)</span></a></li>
            <li><a href="#">รายงาน</a></li>
            <li><a href="#">Export</a></li>
          </ul>
            
          <ul class="nav nav-sidebar">
            <li><a href="list_teacher.php">ผู้สอน</a></li>
            <li><a href="list_student.php">นักเรียน</a></li>
            <li><a href="list_exam.php">ข้อสอบ</a></li>
          </ul>
            
        </div>
          
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          

          <h2 class="sub-header">ผู้สอน</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อ</th>
                  <th>ชื่อผู้ใช้</th>
                  <th>วันที่บันทึก</th>
                </tr>
              </thead>
              <tbody>
                
				
				
				
                <tr>
                  <td>1</td>
                  <td>Tida</td>
                  <td>tida1</td>
                  <td>2017-01-09</td>
                </tr>
                
                <tr>
                  <td>2</td>
                  <td>Mana</td>
                  <td>mana1</td>
                  <td>2017-01-09</td>
                </tr>
                
                <tr>
                  <td>3</td>
                  <td>Hannah</td>
                  <td>hannah</td>
                  <td>2017-01-09</td>
                </tr>
                
              </tbody>
            </table>
          </div>
		  
		  <!-- end teacher -->
		  
	  <h2 class="sub-header">นักเรียน</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อ</th>
                  <th>ชื่อผู้ใช้</th>
		  <th>ชั้นปี</th>
                  <th>วันที่บันทึก</th>
                  
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Rewat</td>
                  <td>ravatna</td>
                  <td>ประถม 5</td>
                  <td>2017-01-09</td>
                </tr>
                
                <tr>
                  <td>2</td>
                  <td>Boonsit</td>
                  <td>User1</td>
                  <td>ประถม 3</td>
                  <td>2017-01-10</td>
                </tr>
                
                <tr>
                  <td>3</td>
                  <td>Narin</td>
                  <td>user2</td>
		  <td>ประถม 5</td>
                  <td>2017-01-11</td>
                </tr>
                
              </tbody>
            </table>
          </div>
		  
		  <!-- end student -->
		  
            <h2 class="sub-header">ข้อสอบ</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ชุดข้อสอบ</th>
		  <th>ชั้นปี</th>
                  <th>วันที่เริ่ม</th>
                  <th>วันที่สิ้นสุด</th>
                </tr>
              </thead>
              
              <tbody>
                <tr>
                  <td>1</td>
                  <td>ภาษาไทย ป3 ชุดที่ 1</td>
		  <td>ประถม 5</td>
                  <td>2017-01-12 10:30 am</td>
                  <td>2017-01-12 12:30 am</td>
                </tr> 
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
