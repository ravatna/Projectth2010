<?php
error_reporting(E_ALL);
session_start();
include "../include/config.php";
include "../include/function.php";
	$chk = 0;
    $had_book = select("tb_book", "where book_id='{$_POST['book_id']}'");
    $chtext = 'มีข้อมูลหนังสือนี้แล้วในระบบครับ';
    $ebook = $had_book['file_path'];
	$pic_name = $had_book['cover'];
	
    if (isset($_FILES['Uploadfile']['name']) && $_FILES['Uploadfile']['name'] != "") {
        $errors = array();
        $pic = $_FILES['Uploadfile']['name'];
        $file_size = $_FILES['Uploadfile']['size'];
        $file_tmp = $_FILES['Uploadfile']['tmp_name'];
        $file_type = $_FILES['Uploadfile']['type'];
        $tmp = explode('.', $_FILES['Uploadfile']['name']);
        $file_ext = strtolower(end($tmp));
        $pic_name = date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        if (in_array($file_ext, $expensions) === false) {
            $chtext = "ต้องเป็นไฟล์ .jpg หรือ .png เท่านั้น";
        }

//        if ($file_size > 2097152) {
//            $errors[] = 'File size must be excately 2 MB';
//        }

        if (empty($errors) == true) {
            $path = '../img/books/';
            move_uploaded_file($file_tmp, $path . $pic_name);
        } else {
            $chk = 1;
        }
    }
	
    if (isset($_FILES['file_name']['name'])&& $_FILES['file_name']['name'] != "") {
        $errors = array();
        $file_name = $_FILES['file_name']['name'];
        $file_size = $_FILES['file_name']['size'];
        $file_tmp = $_FILES['file_name']['tmp_name'];
        $file_type = $_FILES['file_name']['type'];
        $tmp = explode('.', $_FILES['file_name']['name']);
        $file_ext = strtolower(end($tmp));
        $ebook = date('dmyHis') . '.' . $file_ext;
        $expensions = array("pdf");

        if (in_array($file_ext, $expensions) === false) {
            $chtext = "ต้องเป็นไฟล์ .pdf เท่านั้น";
        }

//        if ($file_size > 2097152) {
//            $errors[] = 'File size must be excately 2 MB';
//        }

        if (empty($errors) == true) {
            $path = '../ebook/';
            move_uploaded_file($file_tmp, $path . $ebook);
        } else {
            $chk = 1;
        }
    }

    if ($chk == 0) {
		$add = -1;
		
		if($had_book==0){
			$add = insert("isbn,bookname,author,publisher,publish_location,publish_year,edition,copy,category_id,cover_price,is_ebook,keyword,status,cover,file_path", "'$_POST[isbn]','$_POST[bookname]',
		'{$_POST['author']}','{$_POST['publisher']}','{$_POST['publish_location']}','{$_POST['publish_year']}','{$_POST['edition']}','{$_POST['copy']}','{$_POST['category_id']}','{$_POST['cover_price']}','{$_POST['is_ebook']}','{$_POST['keyword']}','{$_POST['status']}','$pic_name','$ebook'", "tb_book");
				
		}else{
			 $add = update("tb_book", "isbn = '{$_POST['isbn']}',bookname = '{$_POST['bookname']}', author = '{$_POST['author']}', publisher = '{$_POST['publisher']}', publish_location = '{$_POST['publish_location']}',  publish_year = '{$_POST['publish_year']}',  edition = '{$_POST['edition']}', copy = '{$_POST['copy']}', category_id = '{$_POST['category_id']}', cover_price = '{$_POST['cover_price']}',  is_ebook = '{$_POST['is_ebook']}',   keyword = '{$_POST['keyword']}',  status = '{$_POST['status']}',  cover = '{$pic_name}', file_path = '{$ebook}'" ," where book_id = '{$_POST['book_id']}'");
		}
		
        
		if ($add) {
 
            echo "<script>
                        alert('บันทึกข้อมูลเรียบร้อย');
                        window.location='admin_update_book.php?book_id=".$_POST['book_id']."';
                      </script>";
        }
		
    } else {
        
        echo "<script>
                        alert(' ".$chtext."');
                        window.location='admin_update_book.php?book_id=".$_POST['book_id']."';
                      </script>";
    }
?>