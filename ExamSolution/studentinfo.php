<?php
/**
* 
*/
session_start();
// require need database.
require_once("include/include_mysql.php");

$sql = "select id,fullname,uname,pword,std_code,class_level,status,room from tbl_student where id='". $_SESSION['id'] ."'";

$result = mysqli_query($conn,$sql);
$data = mysqli_fetch_array($result);

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

    <title>ข้อมูลส่วนตัว</title>

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
        <h2>ข้อมูลส่วนตัว</h2>              
<form id="frm" class="form-horizontal" action="do_studentinfo.php" method="post">
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="fullname">ชื่อ - สกุล</label>
	
    <div class="col-sm-9">
	<input type="hidden" class="form-control" name="id" id="id"  value="<?=$data['id'];?>" />
      <input type="text" class="form-control" name="fullname" id="fullname" placeholder="ชื่อ - สกุล..." value="<?=$data['fullname'];?>" />
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="class_level">ชั้นปี</label>
    <div class="col-sm-9"> 
      
      <select  class="form-control"  name="class_level" id="class_level">
          <option value="ป.1" <?=($data['class_level'] == "ป.1") ? " selected ": "";?>>ป.1</option>
          <option value="ป.2" <?=($data['class_level'] == "ป.2") ? " selected ": "";?>>ป.2</option>
          <option value="ป.3" <?=($data['class_level'] == "ป.3") ? " selected ": "";?>>ป.3</option>
          <option value="ป.4" <?=($data['class_level'] == "ป.4") ? " selected ": "";?>>ป.4</option>
          <option value="ป.5" <?=($data['class_level'] == "ป.5") ? " selected ": "";?>>ป.5</option>
          <option value="ป.6" <?=($data['class_level'] == "ป.6") ? " selected ": "";?>>ป.6</option>
          <option value="ม.1" <?=($data['class_level'] == "ม.1") ? " selected ": "";?>>ม.1</option>
          <option value="ม.2" <?=($data['class_level'] == "ม.2") ? " selected ": "";?>>ม.2</option>
          <option value="ม.3" <?=($data['class_level'] == "ม.3") ? " selected ": "";?>>ม.3</option>
          <option value="ม.4" <?=($data['class_level'] == "ม.4") ? " selected ": "";?>>ม.4</option>
          <option value="ม.5" <?=($data['class_level'] == "ม.5") ? " selected ": "";?>>ม.5</option>
          <option value="ม.6" <?=($data['class_level'] == "ม.6") ? " selected ": "";?>>ม.6</option>
      </select>

    </div>
  </div>
           
  <div class="form-group">
    <label class="control-label col-sm-3" for="room">ห้อง</label>
    <div
	class="col-sm-9">  
		<select  class="form-control"  name="room" id="room">
		<option value="0" <?=($data['room']==0) ? "selected" : "" ;?>>ทุกห้อง</option>
		<?php 
		for($i=1; $i <= 12; $i++){
			?>
			<option value="<?=$i;?>" <?=($data['room']==$i) ? "selected" : "" ;?>>ห้อง <?=$i;?></option>
			
			
			<?php
		}
		?>
      </select>
    </div>
  </div>
		   

				<div class="form-group">
    <label class="control-label col-sm-3" for="std_code">รหัสนักเรียน</label>
	
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="std_code" id="std_code" placeholder="รหัสนักเรียน..." readonly="readonly" value="<?=$data['std_code'];?>" />
    </div>
  </div>
  
  
		
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-10">
      <button type="button" class="btn btn-primary" onclick="sendSubmit();">บันทึก</button>
	  <a type="button" class="btn btn-default" href="dashboard_student.php" role="button">ย้อนกลับ</a>
    </div>
  </div>
</form>

<h2>แก้ไขรหัสผ่าน</h2>              
<form id="frm2" class="form-horizontal" action="do_studentinfo.php" method="post">
  <input type="hidden" class="form-control" name="id" id="id"  value="<?=$data['id'];?>" />
  
		
  
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="pword">รหัสผ่านเดิม</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="confirm_old_pword" id="confirm_old_pword" placeholder="รหัสผ่านเดิม..." value="" />
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-3" for="pword">รหัสผ่านใหม่</label>
    <div class="col-sm-9">
      <input type="password" class="form-control" name="pword" id="pword" placeholder="รหัสผ่าน..." value="" />
    </div>
  </div>
				
		
<div class="form-group">
    <label class="control-label col-sm-3" for="re_pword">ยืนยันรหัสผ่านใหม่</label>
	
    <div class="col-sm-9">
	
      <input type="password" class="form-control" name="re_pword" id="re_pword" placeholder="ยืนยันรหัสผ่าน..." value="" />
    </div>
  </div>		
		
  <div class="form-group"> 
    <div class="col-sm-offset-3 col-sm-10">
      <button type="button" class="btn btn-primary" onclick="sendSubmit2();">บันทึก</button>
	  <a type="button" class="btn btn-default" href="dashboard_student.php" role="button">ย้อนกลับ</a>
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
	 
	$("#frm").submit();

	}
	
	
	function sendSubmit2(){    
		var c = confirm("ต้องการบันทึกใช่หรือไม่?");
		if(c==false){
			return false;
		}
	
	
	
	if($("#confirm_old_pword").val() == ""){
		alert("โปรดระบุรหัสผ่านเดิม");
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
	$("#frm2").submit();


	}
	
	</script>
  </body>
</html>
