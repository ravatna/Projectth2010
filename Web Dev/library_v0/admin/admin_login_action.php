<?php
session_start();
include "../include/config.php";
include "../include/function.php";
    $username = trim($_POST['user']);
    $password = trim($_POST['pass']);
    

    //เช็ค user และ password จาก ฟอร์ม
    if ((!empty($username)) and ( !empty($password)) or $password == '') {

        $sql = sprintf("select * from tb_user where username='%s' and password='%s'", mysql_real_escape_string($username), mysql_real_escape_string($password));
        
        $query = mysql_query($sql,$connect) or die(mysql_error());

        $num_rows = mysql_num_rows($query);
        $login = mysql_fetch_assoc($query);

        if ($num_rows === 0) {
            echo "<javascript> 
                        alert(\"ผิดพลาด! ไม่มี Username นี้ในระบบ หรือคุณถูกระงับการใช้งาน.\");
                        window.location = \"admin_logout.php\";
                </javascript>";
            exit();
        } // End if 

        else if ($num_rows != 0)
         {
            $uid = $login['user_id'];

            $row = select("tb_user", "where user_id='$uid'");
            $_SESSION['logon'] = 1;
            $_SESSION["user_id"] = $row['user_id'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["firstname"] = $row['firstname'];
            $_SESSION["lastname"] = $row['lastname'];
            $_SESSION["identification"] = $row['identification'];
            $_SESSION["u_tel"] = $row['u_tel'];
            $_SESSION['password'] = $row['password'];
            $_SESSION["is_librarian"] = $row['is_librarian'];

            if ($chk == 'on') { // ถ้าติ๊กถูก Login ตลอดไป ให้ทำการสร้าง cookie
                setcookie("username_log", $username, time() + 3600 * 24 * 356);
            }
           
            // goto main landing page.
            header("location:admin_dashboard.php");
        } else {

            echo "<javascript type='text/javascript' > 
                    alert(\"ผิดพลาด! ไม่สามารถใช้งานระบบได้.\");
                    window.location = \"admin_logout.php\";
            </javascript>";

            exit();
        }
    }
