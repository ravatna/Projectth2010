
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

    <title>ลงชื่อเข้าสู่ระบบ</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

  </head>

  <body>
      
<div class="container" style="width:300px !important;">
    
	<div class="row">
    <!-- form -->
	
	
    <form class="form-signin" method="post" action="dologin.php">
        <h2 class="form-signin-heading">ลงชื่อเข้าสู่ระบบ</h2>
        <label for="inputEmail" class="sr-only">ชื่อผู้ใช้งาน</label>
        <input type="text" id="inputEmail" class="form-control" name="uname" placeholder="ชื่อผู้ใช้งาน..." required autofocus>
        <label for="inputPassword" class="sr-only">รหัสผ่าน</label>
        <input type="password" id="inputPassword" class="form-control" name="pword" placeholder="รหัสผ่าน..." required>
        
            <div class="radio">
              <label>
                  <input type="radio" name="loginfor" value="student" checked="checked"> นักเรียน
              </label>
                
                <label>
                    <input type="radio" name="loginfor" value="teacher"> ผู้สอน
                </label>
            </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">เข้าสู่ระบบ</button>
		<div style="margin-top:10px !important;"><a  href="stdregister.php"  role="button" >ลงทะเบียนนักเรียน</a> | <a  href="tearegister.php"  role="button" >ลงทะเบียนผู้สอน</a></div>
    </form> 
    <!-- end form -->
	
	</div>
    <!-- /end row -->
    
    </div> <!-- /container -->

  </body>
</html>