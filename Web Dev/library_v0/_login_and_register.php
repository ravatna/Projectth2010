
<div class="modal fade" 
     id="login-modal" tabindex="-1" 
     role="dialog" 
     aria-labelledby="myModalLabel" 
     aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>เข้าสู่ระบบ</h1><br>
				  <form action="std_login.php" method="post">
					<input type="text" name="user" placeholder="ชือ่ผู้ใช้งาน">
					<input type="password" name="pass" placeholder="รหัสผ่าน">
					<input type="submit" name="login" class="login loginmodal-submit" value="เข้าสู่ระบบ">
				  </form>
				</div>
			</div>
		  </div>

		  <div class="modal fade" 
                       id="register-modal" tabindex="-1" role="dialog" aria-labelledby="my2ModalLabel" aria-hidden="true" style="display: none;">
    	  <div class="modal-dialog">
				<div class="loginmodal-container">
					<h1>ลงทะเบียนผู้ใช้งานใหม่</h1><br>
				  <form action="std_register.php" method="post">
				  <input type="text" name="identification" placeholder="รหัสประจำตัว">
				  <input type="text" name="firstname" placeholder="ชื่อ">
				  <input type="text" name="lastname" placeholder="สกุล">
				  <hr/>
					<input type="text" name="user" placeholder="ชือ่ผู้ใช้งาน">
					<input type="password" name="pass" placeholder="รหัสผ่าน">
					<input type="password" name="re_pass" placeholder="ยืนยันรหัสผ่าน">
					<input type="submit" name="register" class="login loginmodal-submit" value="ลงทะเบียน">
				  </form>
				</div>
			</div>
		  </div>