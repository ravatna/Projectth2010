<html charset="th">
<head>
<title>version 0.34-beta</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<style>
/*
 * Base structure
 */

/* Move down content because we have a fixed navbar that is 3.5rem tall */
body {
  padding-top: 3.5rem;
  font-size:10px !important;
}

/*
 * Typography
 */

h1 {
  margin-bottom: 20px;
  padding-bottom: 9px;
  border-bottom: 1px solid #eee;
}
 

 .table {
	 font-size:10px;
 }
 

/*
 * Dashboard
 */

 /* Placeholders */
.placeholders {
  padding-bottom: 3rem;
}

.placeholder img {
  padding-top: 1.5rem;
  padding-bottom: 1.5rem;
}

/*
* Logo company
*/
#logo{
	width:100px;
}
/**
* driver image
*/

#img_driver {
	width:100%;
	max-height:288px;
	min-height:288px;
	border-radius:30px;
	
}
/*
* Button GO
*/
#btn_go {
	width:250px;
	height:250px;
	border-radius:30px;
	font-size:80px;
}
</style>
</head>
<body>

<div class="container">

<div class="row">
        <div class="col-md-3" >
			<img id="logo" src="dpro_logo.jpg" src="dpro parking" />
		</div>
		<div class="col-md-7" >
			<h2> DEE PROFESSIONAL PARKING CO., LTD.<h2>
			<h3>ระบบบริหารจัดการลานจอดรถ  Demo</h3>
			
		</div>
        
    </div>
	
    <div class="row">
	
		<!-- column display form action -->
        <div class="col-md-3">
			<form action="#" method="post" target="#status_que">
			<input type="submit" id="btn_go" name="submit" value="GO" />
			</form></div>
			
		<!-- column image driver --><!-- column display list process -->
        <div class="col-md-5 placeholder">
			<img   src="#" alt="driver" id="img_driver" />
		</div>
		
		
		<!-- column display list process -->
        <div class="col-md-4">
		
		<h3>รายการรถเข้าออก</h3>
           
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ทะเบียน/รหัสบัตร/บาร์โค๊ด</th>
                  <th>ทำรายการ</th>
                  <th>เวลาเข้า</th>
                  <th>เวลาออก</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>กจ-1232</td>
                  <td>เข้า</td>
                  <td>11.32</td>
                  <td>-</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>กจ-123</td>
				  <td>เข้า</td>
                  <td>11.42</td>
                  
                  <td>-</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>จ-1232</td>
				  <td>เข้า</td>
                  <td>12.32</td>
                  
                  <td>-</td>
                </tr>
				<tr>
                  <td>4</td>
                  <td>จ-1232</td>
				  <td>ออก</td>
                  <td>12.32</td>
                  <td>13.17</td>
                </tr>
                
              </tbody>
            </table>
          
		
		</div>
    </div>
	
	<div class="row">
        <div class  "col-md-12" style="height:100px;">
		<h1 id="status_que" style="text-align:center" class="warnning" >รับรถเข้าลานจอดเรียบร้อยแล้ว
			<?php
				if(@$_POST['submit']){
					$result = exec("python client_pi.py"); // ให้ปรับเปลี่ยนไปตามค่าที่ตั้งไว้ในระบบปฏิบัติการครับ 
					print_r($result); 
				} 
			?>
			</h1>
		</div>
        
    </div>
</div>

</body>
</head>

