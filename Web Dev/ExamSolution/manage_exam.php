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
	
    <title>จัดการข้อสอบ</title>

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
		
						<a class="btn btn-primary " style="" target="_blank" href="print_exam_a4.php?exam_id=<?=$_GET['exam_id']; ?>" role="button">
                            <span class="glyphicon glyphicon-print"></span> <span class="">พิมพ์ชุดข้อสอบ</span>
                        </a>
		

          <h2 class="sub-header">ข้อสอบ</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ชุดข้อสอบ</th>
				  <th>ประเภทข้อสอบ</th>
				  
		  <th>ชั้นปี</th>
                  <th>วันที่เริ่ม</th>
                  <th>วันที่สิ้นสุด</th>
                  <th>แสดงคะแนน</th>
                </tr>
              </thead>
              
              <tbody>
                  <?php 
// get content from exam

$sql = "SELECT id,room,title,type_exam,teacher_id,for_class_level,show_score_on_send,start_date,end_date,status,created_at,description,count_down_time,major_title,never_end_date FROM tbl_exam where (id='". $_GET['exam_id'] ."');";
$result = mysqli_query($conn,$sql);

                  $a = mysqli_fetch_array($result);
                  ?>
                  <tr>
                  <td><?=1; ?></td>
                  <td><?=$a['title'];?></td>
				  <td><?=$a['type_exam'];?></td>
                  <td><?=$a['for_class_level'];?></td>
                  <td><?=$a['start_date'];?></td>
                  <td><?=$a['end_date'];?></td>
                  <td><?=($a['show_score_on_send']=="1") ? "เมื่อส่งคำตอบ" : "ไม่แสดง";?></td>
                </tr>                
              </tbody>
            </table>
          </div>
		  
		  <!-- end student -->
		  <hr />
                  
                  <div class="col-sm-8 col-sm-offset-1  main">
                      
                      <form class="form-horizontal" action="do_update_exam.php" method="post">
					  
					  
					  
					  
  <div class="form-group">
    <label class="control-label col-sm-2" for="title">ชุดข้อสอบ</label>
    <div class="col-sm-10">
	<input type="hidden" class="form-control" name="id" id="id"  value="<?=$a['id'] ?>" />
	<textarea rows="2" class="form-control" name="title" id="title" placeholder="ชื่อชุดข้อสอบ..."><?=$a['title'] ?></textarea>	
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="major_title">วิชา</label>
    <div class="col-sm-10"> 

<a class="btn btn-primary " style="" href="list_subject.php" role="button">
    <span class="">+ เพิ่มวิชาใหม่</span> </a>

      <?php 
	  $sql = "SELECT id,subject_name from tbl_subject;";
	  $result = mysqli_query($conn,$sql);
          $c = mysqli_num_rows($result);
                  
	  ?>
      <select  class="form-control"  name="major_title" id="major_title">
	  <?php
          for($i = 0 ; $i < $c ; $i++){
          $b = mysqli_fetch_array($result);
          ?>
	   <option value="<?=$b['subject_name'];?>" <?=($a['major_title']==$b['subject_name']) ? "selected" : "" ;?>><?=$b['subject_name'];?></option>
           <?php
          }
	  ?>
	  
      </select>

    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="how_to_answer">วิธีการทำ</label>
    <div class="col-sm-10"> 
      
      <select  class="form-control"  name="how_to_answer" id="how_to_answer">
          <option value="ปรนัย" <?=($a['how_to_answer']=="ปรนัย") ? "selected" : "" ;?>>ปรนัย</option>
          <option value="อัตนัย" <?=($a['how_to_answer']=="อัตนัย") ? "selected" : "" ;?>>อัตนัย</option>
          
      </select>

    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="for_class_level">ประเภทข้อสอบ</label>
    <div class="col-sm-10"> 
      
      <select  class="form-control"  name="type_exam" id="type_exam">
          <option value="ทดสอบก่อนเรียน/หลังเรียน" <?=($a['type_exam']=="ทดสอบก่อนเรียน/หลังเรียน") ? "selected" : "" ;?>>ทดสอบก่อนเรียน/หลังเรียน</option>
          <option value="ทดสอบเก็บคะแนน" <?=($a['type_exam']=="ทดสอบเก็บคะแนน") ? "selected" : "" ;?>>ทดสอบเก็บคะแนน</option>
          <option value="ข้อสอบวัดผล" <?=($a['type_exam']=="ข้อสอบวัดผล") ? "selected" : "" ;?>>ข้อสอบวัดผล</option>
      </select>

    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="title">คำอธิบาย</label>
    <div class="col-sm-10">
      <textarea rows="5" class="form-control" name="description" id="description" placeholder="คำอธิบายเกี่ยวกับข้อสอบ..."><?=$a['description'] ?></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="for_class_level">ชั้นปี</label>
    <div class="col-sm-10"> 
      
      <select  class="form-control"  name="for_class_level" id="for_class_level">
          <option value="ป.1" <?=($a['for_class_level']=="ป.1") ? "selected" : "" ;?>>ป.1</option>
          <option value="ป.2" <?=($a['for_class_level']=="ป.2") ? "selected" : "" ;?>>ป.2</option>
          <option value="ป.3" <?=($a['for_class_level']=="ป.3") ? "selected" : "" ;?>>ป.3</option>
          <option value="ป.4" <?=($a['for_class_level']=="ป.4") ? "selected" : "" ;?>>ป.4</option>
          <option value="ป.5" <?=($a['for_class_level']=="ป.5") ? "selected" : "" ;?>>ป.5</option>
          <option value="ป.6" <?=($a['for_class_level']=="ป.6") ? "selected" : "" ;?>>ป.6</option>
          <option value="ม.1" <?=($a['for_class_level']=="ม.1") ? "selected" : "" ;?>>ม.1</option>
          <option value="ม.2" <?=($a['for_class_level']=="ม.2") ? "selected" : "" ;?>>ม.2</option>
          <option value="ม.3" <?=($a['for_class_level']=="ม.3") ? "selected" : "" ;?>>ม.3</option>
          <option value="ม.4" <?=($a['for_class_level']=="ม.4") ? "selected" : "" ;?>>ม.4</option>
          <option value="ม.5" <?=($a['for_class_level']=="ม.5") ? "selected" : "" ;?>>ม.5</option>
          <option value="ม.6" <?=($a['for_class_level']=="ม.6") ? "selected" : "" ;?>>ม.6</option>
      </select>

    </div>
  </div>
    
	<div class="form-group">
    <label class="control-label col-sm-2" for="room">ห้อง</label>
    <div class="col-sm-10"> 
      <select  class="form-control"  name="room" id="room">
		<option value="0" <?=($a['room']==0) ? "selected" : "" ;?>>ทุกห้อง</option>
		<?php 
		for($i=1; $i <= 12; $i++){
			?>
			<option value="<?=$i;?>" <?=($a['room']==$i) ? "selected" : "" ;?>>ห้อง <?=$i;?></option>
			<?php
		}
		?>
      </select>

    </div>
  </div>
	
	
	
<div class="form-group">
    <label class="control-label col-sm-2" for="start_date">จำนวนเวลาทำข้อสอบ</label>
    <div class="col-sm-10"> 
        <input type="text" class=" form-control" id="count_down_time" name="count_down_time" placeholder="จำนวนเวลาทำข้อสอบ..." value="<?=$a['count_down_time'] ?>" />
    </div>
    
    
  </div>
	
    <div class="form-group">
    <label class="control-label col-sm-2" for="start_date">วันที่เริ่ม</label>
    <div class="col-sm-10"> 
        <input type="text" class="datepicker form-control" id="start_date" name="start_date" placeholder="วันที่เริ่มใช้งาน..." value="<?=$a['start_date'] ?>" />
    </div>
    
    
  </div>
                          
  <div class="form-group">
    <label class="control-label col-sm-2" for="end_date">วันที่สิ้นสุด</label>
    <div class="col-sm-10"> 
        <input type="text" class="datepicker form-control" id="end_date" name="end_date" placeholder="วันที่เลิกใช้งาน..." value="<?=$a['end_date'] ?>">
    </div>
  </div>

          <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input id="never_end_date" name="never_end_date" type="checkbox" value="1" <?=($a['never_end_date']=="1") ? "checked" : "" ;?>> ไม่กำหนดวันสิ้นสุด</label>
      </div>
    </div>
	
  </div>
  
  
                          <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input id="show_score_on_send" name="show_score_on_send" type="checkbox" value="1" <?=($a['show_score_on_send']=="1") ? "checked" : "" ;?>> แสดงคะแนนเมื่อส่งคำตอบ</label>
      </div>
    </div>
	
  </div>
        


		
                  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input id="status" name="status" type="checkbox" value="1" <?=($a['status']=="1") ? "checked" : "" ;?>> ใช้งานข้อสอบ</label>
      </div>
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
		<?php 
    if (@$_GET['exam_id'] != "" && @$_GET['exam_id'] != "0"){
      ?>
<div class="col-sm-12   main">
<h2 class="sub-header">ข้อคำถาม</h2>

<a class="btn btn-primary " style="" href="ae_question.php?exam_id=<?=$_GET['exam_id'] ?>" role="button">
                            <span class="">+</span>
							</a>
	            
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>คำถาม</th>
                  <th>วันที่บันทึก</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              
              <tbody>
                  <?php 
// get content from exam

 $sql = "SELECT id,exam_id,question,q_picture,choise_1,choise_2,choise_3,choise_4,choise_5,answer_choise,answer_description,created_date FROM tbl_exam_detail where (exam_id <>'0') and  (exam_id='". $_GET['exam_id'] ."');";
$result = mysqli_query($conn,$sql);
if($result){
$inum = mysqli_num_rows($result);

              for($i = 0; $i < $inum; $i++): 
                  $a = mysqli_fetch_array($result);
                  ?>
                  
                  <tr>
                  <td><?=$i+1; ?></td>
                  <td><?=$a['question'];?><br/><hr />
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
                  
                  <td><?=$a['created_date'];?></td>
                  
                  <td>
			<a class="btn btn-default " style="" href="ae_question.php?exam_id=<?=$a['exam_id'] ;?>&question_id=<?=$a['id'] ;?>" role="button">
                            <span class="">จัดการคำถาม</span>
                        </a>
						
						<button class="btn btn-default " style="" onclick="delQuestion(<?=$a['exam_id'] ;?>,<?=$a['id'] ;?>);"  role="button">
                            <span class="">ลบคำถาม</span>
                        </button>
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
      <?php 
    }
    ?>
			<!-- / end list question in set exam -->

		
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
	
	function delQuestion(exam_id,q_id)
	{
		var x = confirm("ต้องการลบคำถามนี้ใช่หรือไม่ ?");
		if(x == true)
		{
			window.location="do_delete_question.php?q_id=" + q_id + "&exam_id=" + exam_id;
			
		}
	}
	
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
				"how_to_answer":$("#how_to_answer").val(),
				
				"for_class_level":$("#for_class_level option:checked").val(),
				"description":$("#description").val(),
				"start_date":$("#start_date").val(),
				"end_date":$("#end_date").val(),
				"status":status,
				"never_end_date":never_end_date,
				"show_score_on_send":show_score_on_send,
				"room":$("#room").val(),
				"major_title":$("#major_title").val(),
				"count_down_time":$("#count_down_time").val()
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
