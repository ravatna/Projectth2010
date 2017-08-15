<?php

session_start();
include "include/config.php";
include "include/function.php";


//print_r($_POST);

// edit firstname and lastname
if (isset($_POST['submit_info'])) {



    // ถ้าไม่กรอกชื่อ
    if ($_POST['firstname'] == "") {
        echo "<script>
                                                            alert('โปรด ระบุชื่อ');
                                                            window.location.href='std_index.php?page=home&filter=1&cat=';
            </script>";
        exit();
    }


    if ($_POST['lastname'] == "") {
        echo "<script>
                                                            alert('โปรด ระบุนามสกุล');
                                                            window.location.href='std_index.php?page=home&filter=1&cat=';
                                      </script>";
        exit();
    }

    $condition = " where user_id='".$_SESSION['user_id']."'";

    $u = update("tb_user", "firstname='" . $_POST['firstname'] . "', lastname='" . $_POST['lastname'] . "' ", $condition);

    echo "<script>
							alert('แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว');
							window.location.href='std_info.php?page=home&filter=1&cat=';
				  </script>";
}

// case update password
else if ($_POST['submit_password']) {

    // ไม่กรอกรหัสผ่าน แจ้งเตือน
    if ($_POST['pass'] == "") {
        echo "<script>
							alert('โปรด ระบุรหัสผ่าน');
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
        exit();
    }

    // รหัสผ่านไม่ตรงกันแจ้งเตือน
    if ($_POST['pass'] != $_POST['re_pass']) {
        echo "<script>
							alert('โปรด ระบุรหัสผ่าน และยืนยันรหัสผ่านให้ถูกต้อง');
							window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
        exit();
    }
    
    $condition = " where user_id='".$_SESSION['user_id']."'";
    $u = update("tb_user", "password='" . $_POST['pass'] . "' ", $condition);

    echo "<script>
							alert('แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว');
							window.location.href='std_info.php?page=home&filter=1&cat=';
				  </script>";
    exit();
}




//
//if ($_POST['pass'] == "") {
//    echo "<script>
//							alert('โปรด ระบุรหัสผ่าน');
//							window.location.href='std_index.php?page=home&filter=1&cat=';
//				  </script>";
//    exit();
//}
//
//if ($_POST['pass'] != $_POST['re_pass']) {
//    echo "<script>
//							alert('โปรด ระบุรหัสผ่าน และยืนยันรหัสผ่านให้ถูกต้อง');
//							window.location.href='std_index.php?page=home&filter=1&cat=';
//				  </script>";
//    exit();
//}
//
//
//$chtext = 'มีข้อมูลผู้ใช้นี้มีแล้วในระบบครับ';
//$chk = num_rows("tb_user", "where identification='$_POST[identification]'");
//if ($chk == 0) {
//    $add = insert("identification,username,u_tel,lastname,firstname,password,g_id", "'$_POST[identification]','$_POST[user]',
//			    '0000000000','$_POST[lastname]','$_POST[firstname]','$_POST[pass]','1'", "tb_user");
//
//    if ($add) {
//        echo "<script>
//							alert('ลงทะเบียนใหม่เสร็จเรียบร้อย  ลงขื่อเข้าใช้งานระบบเพื่อ เข้าใช้งานปกติ');
//							window.location.href='std_index.php?page=home&filter=1&cat=';
//				  </script>";
//    }
//} else {
//    echo "<script>
//							alert('ไม่สามารถลงะเบียนใหม่ได้ !!!  Username นี้ถูกใช้งานแล้ว'); 
//							window.location.href='std_index.php?page=home&filter=1&cat=';
//				  </script>";
//}
?>