<?php
session_start();
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

    <title>ลงทะเบียนนักเรียน</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/dist/css/datepicker.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

	<?php
	if(isset($_SESSION['msg']) && $_SESSION['msg'] != ""){
	?>
	<script>
		alert('<?=$_SESSION['msg'];?>');
	</script>
		<?php
		
		$_SESSION['msg'] = "";
	}
	?>
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
          
        </div>
      </div>
    </nav>
  
    <div class="container-fluid">
      <div class="row">
	  
	  <div class="col-sm-5 col-sm-offset-1  main">
        <h2>ฟอร์มลงทะเบียนนักเรียน</h2>              
<form id="frm" class="form-horizontal" action="do_stdregister.php" method="post">
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="fullname">ชื่อ - สกุล</label>
	
    <div class="col-sm-9">
	<input type="hidden" class="form-control" name="id" id="id"  value="" />
      <input type="text" class="form-control" name="fullname" id="fullname" placeholder="ชื่อ - สกุล..." value="" />
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="class_level">ชั้นปี</label>
    <div class="col-sm-9"> 
      
      <select  class="form-control"  name="class_level" id="class_level">
          <option value="ป.1" >ป.1</option>
          <option value="ป.2" >ป.2</option>
          <option value="ป.3" >ป.3</option>
          <option value="ป.4" >ป.4</option>
          <option value="ป.5" >ป.5</option>
          <option value="ป.6" >ป.6</option>
          <option value="ป.1" >ป.1</option>
          <option value="ป.2" >ม.2</option>
          <option value="ป.3" >ม.3</option>
          <option value="ป.4" >ม.4</option>
          <option value="ป.5" >ม.5</option>
          <option value="ป.6" >ม.6</option>
      </select>

    </div>
  </div>
                
  <div class="form-group">
    <label class="control-label col-sm-3" for="room">ห้อง</label>
    <div
	class="col-sm-9">  
		<select  class="form-control"  name="room" id="room">
		<option value="0">ทุกห้อง</option>
		<?php 
		for($i=1; $i <= 12; $i++){
			?>
			<option value="<?=$i;?>" >ห้อง <?=$i;?></option>
			<?php
		}
		?>
      </select>
    </div>
  </div>
				
				
				<div class="form-group">
    <label class="control-label col-sm-3" for="std_code">รหัสนักเรียน</label>
	
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="std_code" id="std_code" placeholder="รหัสนักเรียน..." value="" />
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="pword">รหัสผ่าน</label>
	
    <div class="col-sm-9">
	
      <input type="password" class="form-control" name="pword" id="pword" placeholder="รหัสผ่าน..." value="" />
    </div>
  </div>
				
		
<div class="form-group">
    <label class="control-label col-sm-3" for="re_pword">ยืนยันรหัสผ่าน</label>
	
    <div class="col-sm-9">
	
      <input type="password" class="form-control" name="re_pword" id="re_pword" placeholder="ยืนยันรหัสผ่าน..." value="" />
    </div>
  </div>		
		
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-10">
      <button type="button" class="btn btn-primary" onclick="sendSubmit();">บันทึก</button>
	  <a type="button" class="btn btn-default" href="login.php" role="button">ย้อนกลับ</a>
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
	$(document).ready( function() {
		$('.datepicker').datepicker({"format": "yyyy-mm-dd"});
	})
	
	
	function sendSubmit(){    
		var c = confirm("ต้องการบันทึกใช่หรือไม่?");
		if(c==false){
			return false;
		}
	
	
	if($("#fullname").val() == ""){
		alert("โปรดระบุชื่อ - สกุล");																																	
		return false;
		
	}

	if($("#std_code").val() == ""){
		alert("โปรดระบุรหัสนักเรียน");																																	
		return false;
		
	}
	
	if($("#pword").val().length < 3){
		alert("โปรดระบุรหัสผ่าน 3 ตัวอักษรขึ้นไป");
		return false;
		
	}
	
	
	if($("#re_pword").val() != $("#pword").val()){
		alert("รหัสผ่านไม่ตรงกัน");																																	
		return false;
		
	}
	$("#frm").submit();


	}
	
	</script>
  </body>
</html>
