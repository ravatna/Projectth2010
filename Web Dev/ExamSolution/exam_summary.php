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

    <title>ข้อมูลเกี่ยวกับตัวข้อสอบ</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/dist/css/datepicker.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
	<link rel="stylesheet" href="jchart/main.css">
<style>
	.jumbotron {
			padding-top: 20px;
			padding-bottom: 10px;
			color: white;
			background-color: #4570a5;
		}
		.jumbotron>h1 {
			font-size: 75pt;
			font-family: "Times New Roman", Times, serif;
			margin: 0;
		}
		.jumbotron>p {
			margin: 0;
		}
</style>
  </head>

  <body>

<?php 
include "include/include_teacher_nav.php";
?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            
          <ul class="nav nav-sidebar">
            <li><a href="teacherinfo.php">ข้อมูลส่วนตัว</a></li>
			<li><a href="list_student.php">นักเรียน</a></li>
			<li><a href="list_subject.php">วิชาที่เปิดสอน</a></li>
            <li><a href="dashboard_teacher.php">ข้อสอบ</a></li>
          </ul>
            
        </div>
          
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <a class="btn btn-warning " style="" href="dashboard_teacher.php" role="button">
			<span class="">&lt;</span> <span class="">ย้อนกลับ</span>
          </a>
		  
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
                  <th></th>
                </tr>
              </thead>
              
              <tbody>
                  <?php 
// get content from exam

$sql = "SELECT id,title,teacher_id,for_class_level,start_date,end_date,status,created_at,description FROM tbl_exam where (status = '1' and id='". $_GET['exam_id'] ."');";
$result = mysqli_query($conn,$sql);
$inum = mysqli_num_rows($result);

              if($inum > 0): 
                  $a = mysqli_fetch_array($result);
                  ?>
                  
                  <tr>
                  <td><?=$i+1; ?></td>
                  <td><?=$a['title'];?></td>
                  <td><?=$a['for_class_level'];?></td>
                  <td><?=$a['start_date'];?></td>
                  <td><?=$a['end_date'];?></td>
                  <td>
			
                  </td>
                </tr>
                
                <?php endif; 
                // end for
                ?>
            
                
              </tbody>
            </table>
          </div>
		  
		  
          
	  <h3 class="sub-header">เลือกวันที่แสดงผลคะแนน</h3>
	  
					
					<div class="row">
						<div class="col-sm-6">
                      
                      <form class="form-horizontal" action="exam_summary.php?exam_id=<?=$_GET['exam_id'] ;?>&from_date=<?=$_GET['from_date'] ;?>" method="get">
  
  
                          
    <div class="form-group">
    <label class="control-label col-sm-2" for="start_date">วันที่ทำข้อสอบ</label>
    <div
	class="col-sm-10"> 
	<input type="hidden"  id="exam_id" name="exam_id"  value="<?=$_GET['exam_id'] ;?>" />
        <input type="text" class="datepicker form-control" id="from_date" name="from_date" placeholder="จากวันที่..." value="<?=$_GET['from_date'];?>" />
    </div>
  </div> <!-- // end -->
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="room">ห้อง</label>
    <div
	class="col-sm-10">  
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
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" onclick=";">แสดงคะแนน</button>
    </div>
  </div>
  
</form>

</div><!-- // end -->
</div> <!-- // end row-->
<hr/>	

<div class="row">
<div class="col-sm-10">

<!-- tap section -->
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">แผนภาพแสดงคะแนนสูงสุด 10 อันดับแรก</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">แผนภาพแสดงสัดส่วนช่วงคะแนน</a></li>
    
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
	<!-- start graph -->
			  <div id="population_chart" 
			  
			  data-sort="true"
			  data-x_label="คะแนน"
			  data-y_label="student name"
			  
			  data-width="400" 
			  class="jChart chart-lg" 
			  name="แผนภาพแสดงคะแนนสูงสุด 10 อันดับแรก">
			  
			   <?php 
				  
				  if($_GET['from_date'] != ""){
				  
// get content from exam

 $sql_student = "SELECT dex.score,dex.created_date,dex.id,dex.do_time,ex.title,dex.student_id,st.fullname,st.class_level
FROM ((tbl_do_exam dex inner join tbl_exam ex on dex.exam_id = ex.id)

  inner join tbl_student st on dex.student_id = st.id)

where ex.id = ".$_REQUEST['exam_id']." and dex.created_date between '".$_GET['from_date']." 00:00:00' and '".$_GET['from_date']." 23:59:59'  order by score desc limit 0,10;";
//echo $sql_student;
$result_student = mysqli_query($conn,$sql_student);
$inum = mysqli_num_rows($result_student);

              for($i = 0; $i < 10; $i++): 
                  $a_student = mysqli_fetch_array($result_student);
                  ?>
					<div class="define-chart-row" data-color="#84d<?=$i;?>ff" title="<?=$a_student['fullname'];?>"><?=$a_student['score'];?></div>
                <?php endfor; 
                // end for
				
				  } // end if
                ?>			  
	<div class="define-chart-footer">0</div>
	<div class="define-chart-footer">10</div>
	<div class="define-chart-footer">20</div>
	<div class="define-chart-footer">30</div>
	<div class="define-chart-footer">40</div>
	<div class="define-chart-footer">50</div>
	<div class="define-chart-footer">60</div>
	<div class="define-chart-footer">70</div>
	<div class="define-chart-footer">80</div>
	<div class="define-chart-footer">90</div>
	<div class="define-chart-footer">100</div>
	
</div>

<!-- end graph -->
	</div>
    <div role="tabpanel" class="tab-pane" id="profile">
	<?php
		  if($_GET['from_date'] != ""){
				  
// get content from exam

 $sql_student = "SELECT dex.score,dex.created_date,dex.id,dex.do_time,ex.title,dex.student_id,st.fullname,st.class_level
FROM ((tbl_do_exam dex inner join tbl_exam ex on dex.exam_id = ex.id)

  inner join tbl_student st on dex.student_id = st.id)

where ex.id = ".$_REQUEST['exam_id']." and dex.created_date between '".$_GET['from_date']." 00:00:00' and '".$_GET['from_date']." 23:59:59';";
$result_student = mysqli_query($conn,$sql_student);
$inum = mysqli_num_rows($result_student);
$aa = array();
              for($i = 0; $i < $inum; $i++): 
                  $a_student = mysqli_fetch_array($result_student);
                  
				  if($a_student['score'] >=90)
				  {
					$aa[0] += 1;     
					  
					  
				  }else if($a_student['score'] >= 80 && $a_student['score'] <= 89){
					  $aa[1] += 1;
				  }else if($a_student['score'] >= 70 && $a_student['score'] <= 79){
					  $aa[2] += 1;
				  }else if($a_student['score'] >= 60 && $a_student['score'] <= 69){
					  $aa[3] += 1;
				  }else if($a_student['score'] >= 50 && $a_student['score'] <= 59){
					  $aa[4] += 1;
				  }else if($a_student['score'] >= 40 && $a_student['score'] <= 49){
					  $aa[5] += 1;
				  }else if($a_student['score'] >= 30 && $a_student['score'] <= 39){
					  $aa[6] += 1;
				  }else if($a_student['score'] >= 20 && $a_student['score'] <= 29){
					  $aa[7] += 1;
				  }else if($a_student['score'] >= 10 && $a_student['score'] <= 19){
					  $aa[8] += 1;
				  }else if($a_student['score'] >= 0 && $a_student['score'] <= 9){
					  $aa[9] += 1;
				  }
				   endfor; 
                // end for
				
				  } // end if
                ?>
	
	<!-- start graph pie -->
	<table id="pieChart" class="pieChart data-table col-table">
        <caption>Pie Chart</caption>
        <tr>
            <th scope="col" data-type="string">ช่วงคะแนน</th>
            <th scope="col" data-type="number">จำนวนนักเรียน</th>
        </tr>
		
		 
        <tr>
            <td>90-100</td>
            <td align="right"><?=$aa[0];?></td>
        </tr>

        <tr>
            <td>80-89</td>
            <td align="right"><?=$aa[1];?></td>
        </tr>

        <tr>
            <td>70-79</td>
            <td align="right"><?=$aa[2];?></td>
        </tr>
		
		<tr>
            <td>60-69</td>
            <td align="right"><?=$aa[3];?></td>
        </tr>
		<tr>
            <td>50-59</td>
            <td align="right"><?=$aa[4];?></td>
        </tr>
		<tr>
            <td>40-49</td>
            <td align="right"><?=$aa[5];?></td>
        </tr>
		<tr>
            <td>30-39</td>
            <td align="right"><?=$aa[6];?></td>
        </tr>
		<tr>
            <td>20-29</td>
            <td align="right"><?=$aa[7];?></td>
        </tr>
		<tr>
            <td>10-19</td>
            <td align="right"><?=$aa[8];?></td>
        </tr>
		<tr>
            <td>0-9</td>
            <td align="right"><?=$aa[9];?></td>
        </tr>
    </table>
</div> <!-- ./ end col -->
 </div>
<!-- ./ end row -->

		<div class="row">
			<div class="col-sm-10">
			
			
	</div>
    
  </div>

</div>

<!-- ./end tap section -->











			</div>
		</div>				
						
		<div class="row">				
          <div class="table-responsive">
		  
		  
		
		  
		  <h3>ผลคะแนน</h3>
		  
		  <a class="btn btn-primary " style="" target="_blank" href="list_exam_score_a4.php?exam_id=<?=$_GET['exam_id']; ?>&from_date=<?=$_GET['from_date'];?>"  role="button">
                            <span class="glyphicon glyphicon-print"></span> <span class="">พิมพ์ผลคะแนน</span>
                        </a>
						
						<a class="btn btn-primary " style="" target="_blank" href="list_exam_score_csv.php?exam_id=<?=$_GET['exam_id']; ?>&from_date=<?=$_GET['from_date'];?>"  role="button">
                            <span class="glyphicon glyphicon-save"></span> <span class="">ผลคะแนน Excel</span>
                        </a>
						
						
						
            <table class="table table-striped">
              
              <thead>
                <tr>
                  <th>#</th>
                  <th>ชื่อ</th>
				  <th>ชั้นปี</th>
				  <th>ครั้งที่</th>
				  <th>วันที่</th>
				  <th>คะแนน</th>
                </tr>
              </thead>
              
              <tbody>  
                  <?php 
				  
				  if($_GET['from_date'] != ""){
				  
// get content from exam

 $sql_student = "SELECT dex.score,dex.created_date,dex.id,dex.do_time,ex.title,dex.student_id,st.fullname,st.class_level
FROM ((tbl_do_exam dex inner join tbl_exam ex on dex.exam_id = ex.id)

  inner join tbl_student st on dex.student_id = st.id)

where ex.id = ".$_REQUEST['exam_id']." and dex.created_date between '".$_GET['from_date']." 00:00:00' and '".$_GET['from_date']." 23:59:59';";
$result_student = mysqli_query($conn,$sql_student);
$inum = mysqli_num_rows($result_student);

              for($i = 0; $i < $inum; $i++): 
                  $a_student = mysqli_fetch_array($result_student);
                  ?>
                  
                  <tr>
                  <td><?=$i+1; ?></td>
                  <td><?=$a_student['fullname'];?></td>
                  <td><?=$a_student['class_level'];?></td>
				  <td><?=$a_student['do_time'];?></td>
				  <td><?=$a_student['created_date'];?></td>
				  <td><?=$a_student['score'];?></td>
				  
                  
                </tr>
                
                <?php endfor; 
                // end for
				
				  } // end if
                ?>
            
                
              </tbody>
            </table>
          </div>
	  
          </div> <!-- end row -->
		  
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
			<script src="bootstrap/dist/js/bootstrap-datepicker.js"></script>
			<script src="run_prettify.js"></script>
			<script src="jchart/jchart.js"></script>
<script src="lib/modernizr/modernizr-custom.js"></script>		
		<script src="js/chartinator.js" ></script>
		
			<script>
			$(document).ready( function() {
				$('.datepicker').datepicker({"format": "yyyy-mm-dd"});
				$("#population_chart").jChart({x_label:"Population"});
				$("#colors_chart").jChart();
	});
	
	//  Pie Chart Example
            var chart2 = $('#pieChart').chartinator({

                // Custom Options ------------------------------------------------------
                // Note: This example appends data from a data array
                // to the data extracted from an HTML table
                // Google Charts does not support custom tooltips or annotations on Pie Charts

                // Append the following rows of data to the data extracted from the table
                rows: [
                    //['France', 5],['Mexico', 2]
					],

                // Create Table - String
                // Create a basic HTML table or a Google Table Chart from chart data
                // Options: false, 'basic-table', 'table-chart'
                // Note: This table will replace an existing HTML table
                createTable: 'table-chart',

                // The data title
                // A title used to identify the set of data
                // Used as a caption when generating an HTML table
                dataTitle: 'Pie Chart Data - Table Chart',

                // The chart type - String
                // Derived from the Google Charts visualization class name
                // Default: 'BarChart'
                // Use TitleCase names. eg. BarChart, PieChart, ColumnChart, Calendar, GeoChart, Table.
                // See Google Charts Gallery for a complete list of Chart types
                // https://developers.google.com/chart/interactive/docs/gallery
                chartType: 'PieChart',

                // The class to apply to the chart container element
                chartClass: 'col',

                // The class to apply to the table element
                tableClass: 'col-table',

                // The chart aspect ratio custom option - width/height
                // Used to calculate the chart dimensions relative to the width or height
                // this is overridden if the Google Chart's height and width options have values
                // Suggested value: 1.25
                // Default: false - not used
                //chartAspectRatio: 1.25,

                // Google Pie Chart Options
                pieChart: {

                    // Width of chart in pixels - Number
                    // Default: automatic (unspecified)
                    width: null,

                    // Height of chart in pixels - Number
                    // Default: automatic (unspecified)
                    height: 300,

                    chartArea: {
                        left: "6%",
                        top: 30,
                        width: "94%",
                        height: "100%"
                    },

                    // The font size in pixels - Number
                    // Or use css selectors as keywords to assign font sizes from the page
                    // For example: 'body'
                    // Default: false - Use Google Charts defaults
                    fontSize: 'body',

                    // The font family name. String
                    // Default: body font family
                    fontName: 'Roboto',

                    // Chart Title - String
                    // Default: Table caption.
                    title: 'แผนภาพแสดงสัดส่วนช่วงคะแนน',

                    titleTextStyle: {

                        // The font size in pixels - Number
                        // Or use css selectors as keywords to assign font sizes from the page
                        // For example: 'body'
                        // Default: false - Use Google Charts defaults
                        fontSize: 'h4'
                    },
                    legend: {

                        // Legend position - String
                        // Options: bottom, top, left, right, in, none.
                        // Default: right
                        position: 'right'
                    },

                    // Array of colours
                    colors: ['#94ac27', '#3691ff', '#e248b3', '#f58327', '#bf5cff', '#758347', '#b55c5f'],

                    // Make chart 3D - Boolean
                    // Default: false.
                    is3D: true,

                    tooltip: {

                        // Shows tooltip with values on hover - String
                        // Options: focus, none.
                        // Default: focus
                        trigger: 'focus'
                    }
                },
                // Show table as well as chart - String
                // Options: 'show', 'hide', 'remove'
                showTable: 'hide'
            });
// end pie chart
			</script>
  </body>
</html>
