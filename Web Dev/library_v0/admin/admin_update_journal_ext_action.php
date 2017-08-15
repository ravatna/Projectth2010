<?php
error_reporting(E_ALL);
session_start();
include "../include/config.php";
include "../include/function.php";


    for($i = 0; $i < count($_POST['url']); $i++){
        $pic_name = "";
// echo $_FILES['cover']['name'][0];
// echo $_FILES['cover']['tmp_name'][0];    

 if (isset($_FILES['cover']['name'][$i]) && $_FILES['cover']['name'][$i] != "") {
        $errors = array();
        $pic = $_FILES['cover']['name'][$i];
        $file_size = $_FILES['cover']['size'][$i];
        $file_tmp = $_FILES['cover']['tmp_name'][$i];
        $file_type = $_FILES['cover']['type'][$i];
        $tmp = explode('.', $_FILES['cover']['name'][$i]);
        $file_ext = strtolower(end($tmp));
        $pic_name = date('dmyHis') . 'L.' . $tmp[1];
        $expensions = array("jpeg", "jpg", "png", "gif");

        if (in_array($file_ext, $expensions) === false) {
            $chtext = "รองรับไฟล์สกุล .jpeg .jpg .gif หรือ .png";
        }

        if (empty($errors) == true) {
            $path = '../img/';
            move_uploaded_file($file_tmp, $path . $pic_name);
        } else {
            $chk = 1;
        }
 $up = update("tb_journal_ext", "url = '{$_POST['url'][$i]}',title = '{$_POST['title'][$i]}', cover='{$pic_name}'", " where id = '{$_POST['id'][$i]}'");


    } // .End if check upload file
else{
     $up = update("tb_journal_ext", "url = '{$_POST['url'][$i]}',title = '{$_POST['title'][$i]}'", " where id = '{$_POST['id'][$i]}'");


}
        //echo "url = '{$_POST['url'][$i]}',title = '{$_POST['title'][$i]}'", " where id = '{$_POST['id'][$i]}'";
       
    }
   // @todo: debug here // exit();

     echo "<script>
                        alert('บันทึกข้อมูลเรียบร้อย');
                        window.location='admin_manage_journal_ext.php';
                      </script>";
   
?>