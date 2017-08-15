<?PHP
error_reporting(E_ALL);
session_start();
include "include/config.php";
include "include/function.php";



 $book_id = @$_REQUEST ["book_id"];
    $cat = @$_REQUEST ["cat"];
    $filter = @$_REQUEST ["filter"];
    $status = @$_REQUEST["button"];

if( @$_SESSION["user_id"]==""){
    echo "<script>
			        alert('ไม่สามารถทำรายการจองหนังสือได้ กรุณาลงชื่อเข้าใช้งานระบบก่อนทำรายการ');
				    window.location.href='std_detail.php?page=main&cat=".$cat."&filter=".$filter."&b_no=".$book_id."';
				  </script>";
            exit();
}


   

    //เช็ค user และ password จาก ฟอร์ม
    if (!empty($book_id)) {
         $sql = sprintf("insert into tb_booking(book_id,user_id,status,created_at,updated_at) values('%s','%s','%s',now(),now());"
        , mysql_real_escape_string($book_id)
        , mysql_real_escape_string($_SESSION['user_id'])
        , mysql_real_escape_string($status));
        $query = mysql_query($sql) or die(mysql_error());
        
        if ($query) {
			echo "<script>
					alert('ทำรายการจองหนังสือเรียบร้อย');
					window.location.href='std_detail.php?page=main&cat=".$cat."&filter=".$filter."&b_no=".$book_id."';
				  </script>";
            exit();
        
        } else {
            echo "<script>
			        alert('ไม่สามารถทำรายการจองหนังสือได้');
				    window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
            exit();
        }
    } else {
            echo "<script>
			        alert('ไม่สามารถทำรายการจองหนังสือได้');
				    window.location.href='std_index.php?page=home&filter=1&cat=';
				  </script>";
            exit();
        }

?>
