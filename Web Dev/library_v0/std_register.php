<?php
session_start();
include "include/config.php";
include "include/function.php";


if($_POST['identification'] == ""){
	echo "<script>
							alert('โปรด ระบุรหัสประจำตัว');
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
	
}

if($_POST['firstname'] == ""){
	echo "<script>
							alert('โปรด ระบุชื่อ');
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
	
}


if($_POST['lastname'] == ""){
	echo "<script>
							alert('โปรด ระบุนามสกุล');
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
	
}

if($_POST['pass'] == ""){
	echo "<script>
							alert('โปรด ระบุรหัสผ่าน');
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
	
}

if($_POST['pass'] != $_POST['re_pass']){
	echo "<script>
							alert('โปรด ระบุรหัสผ่าน และยืนยันรหัสผ่านให้ถูกต้อง');
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
	
}


$chtext = 'มีข้อมูลผู้ใช้นี้มีแล้วในระบบครับ';
    $chk = num_rows("tb_user", "where identification='$_POST[identification]'");
    if ($chk == 0) {
        $add = insert("identification,username,u_tel,lastname,firstname,password,g_id", "'$_POST[identification]','$_POST[user]',
			    '0000000000','$_POST[lastname]','$_POST[firstname]','$_POST[pass]','1'", "tb_user");
				
        if ($add) {
            echo "<script>
							alert('ลงทะเบียนใหม่เสร็จเรียบร้อย  ลงขื่อเข้าใช้งานระบบเพื่อ เข้าใช้งานปกติ');
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
        }
		
    } else {
        echo "<script>
							alert('ไม่สามารถลงะเบียนใหม่ได้ !!!  Username นี้ถูกใช้งานแล้ว'); 
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
    }
?>