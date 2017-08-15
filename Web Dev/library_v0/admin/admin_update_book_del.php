<?php
error_reporting(E_ALL);
session_start();
include "../include/config.php";
include "../include/function.php";

     del("tb_book", " where book_id = '{$_GET['book_id']}'");
    

     echo "<script>
                        alert('ลบข้อมูลเรียบร้อย');
                        window.location='admin_manage_book.php?is_ebook=1';
                      </script>";
   
?>