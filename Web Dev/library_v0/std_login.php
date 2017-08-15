<?php 
session_start();
include "include/config.php";
include "include/function.php";
$status = select("tb_setting", "where sett_id=1");

$username = trim($_POST['user']);
    $password = trim($_POST['pass']);
	
    
    //เช็ค user และ password จาก ฟอร์ม
    if ((!empty($username)) and ( !empty($password)) or $password == '') {
        $sql = sprintf("select * from tb_user where username='%s' and password='%s'", mysql_real_escape_string($username), mysql_real_escape_string($password));
        $query = mysql_query($sql) or die(mysql_error());
        $num_rows = mysql_num_rows($query);
        $login = mysql_fetch_assoc($query);
        if ($num_rows === 0) {
            //echo "<br><p class='alert alert-danger'>ผิดพลาด! ไม่มี Username นี้ในระบบ หรือคุณถูกระงับการใช้งาน.</p>";
			echo "<script>
							alert('เกิดพลาด! ไม่มี Username นี้ในระบบ หรือคุณถูกระงับการใช้งาน');
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
				  
            exit();
        } else if ($num_rows != 0) {
            $uid = $login['user_id'];
            $row = select("tb_user", "where user_id='$uid'");
            $_SESSION['logon'] = 1;
			$_SESSION["username"] = $row['username'];
            $_SESSION["user_id"] = $row['user_id'];
            $_SESSION["firstname"] = $row['firstname'];
            $_SESSION["lastname"] = $row['lastname'];
            $_SESSION["identification"] = $row['identification'];
            $_SESSION["u_tel"] = $row['u_tel'];
            $_SESSION["is_librarian"] = $row['is_librarian'];
    
            //echo "<br><p class='alert alert-success'>กำลังเข้าสู่ระบบ กรุณารอสักครู่ ...</p>";
            echo "<script>
			alert('กำลังเข้าสู่ระบบ กรุณารอสักครู่ ...');
									window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
            exit();
        } else {
            echo "<script>
			alert('เกิดพลาด! ไม่มี Username นี้ในระบบ หรือคุณถูกระงับการใช้งาน');
									window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
            exit();
        }
    }
	
?>