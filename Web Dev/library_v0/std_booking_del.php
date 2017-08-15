<?PHP
error_reporting(E_ALL);
session_start();
include "include/config.php";
include "include/function.php";



 $id = @$_REQUEST ["id"];
    $cat = @$_REQUEST ["cat"];
    $filter = @$_REQUEST ["filter"];
    $status = @$_REQUEST["button"];

if( @$_SESSION["user_id"]==""){
    echo "<script>
			        alert('ไม่สามารถทำรายการจองหนังสือได้ กรุณาลงชื่อเข้าใช้งานระบบก่อนทำรายการ');
				    window.location.href='std_detail.php?page=main&cat=".$cat."&filter=".$filter."';
				  </script>";
            exit();
}


    //เช็ค user และ password จาก ฟอร์ม
    if (!empty($id)) {
          $sql = sprintf("delete from tb_booking where id='%s';"  , mysql_real_escape_string($id));
        $query = mysql_query($sql) or die(mysql_error());
        
        if ($query) {
			echo "<script>
					alert('ปรับปรุงรายการหนังสือเรียบร้อย');
					window.location.href='std_handles.php?page=main&cat=".$cat."&filter=".$filter."';
				  </script>";
            exit();
        
        } else {
            echo "<script>
			        alert('ไม่สามารถทำรายการหนังสือได้');
				    window.location.href='std_handles.php?page=home&filter=1&cat=';
				  </script>";
            exit();
        }
    } else {
            echo "<script>
			        alert('ไม่สามารถทำรายการหนังสือได้');
				    window.location.href='std_handles.php?page=home&filter=1&cat=';
				  </script>";
            exit();
        }
?>
