<?php
error_reporting(E_ALL);
session_start();
include "../include/config.php";
include "../include/function.php";

   $chk = num_rows("tb_user", "where identification='$_POST[identification]'");
    if ($chk == 0) {
        $add = insert("user_id,firstname,lastname,dept_id,g_id", "'$_POST[user_id]','$_POST[firstn]',
			    '$_POST[lastn]','0','3'", "tb_user");
        if ($add) {
            echo "<script>
                        alert('บันทึกข้อมูลเรียบร้อย');
                        window.location='admin_update_book.php?book_id=".$_POST['bookd_id']."';
                      </script>";
        }
    } else {
        echo "<script>
                        alert(' ".$chtext."');
                        window.location='admin_update_book.php?book_id=".$_POST['bookd_id']."';
                      </script>";
    }

     
?>