<?php
/**
	manage function for exam
*/

session_start();
// require need database.
require_once("include/include_mysql.php");
if($_POST['id'] != ""){
	
	$choise_pic1;
	$choise_pic2;
	$choise_pic3;
	$choise_pic4;
	$choise_pic5;
	$_part_sql = "";
	$pic_name;
	if (isset($_FILES['q_picture']['name']) && $_FILES['q_picture']['name'] != "") {
        $errors = array();
        $pic = $_FILES['q_picture']['name'];
        $file_size = $_FILES['q_picture']['size'];
        $file_tmp = $_FILES['q_picture']['tmp_name'];
        $file_type = $_FILES['q_picture']['type'];
        $tmp = explode('.', $_FILES['q_picture']['name']);
        $file_ext = strtolower(end($tmp));
        $pic_name = date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif","mp3","wmv","wav");

        if (in_array($file_ext, $expensions) === false) {
            $chtext = "ต้องเป็นไฟล์ .jpg, .png, mp3, wmv, wav เท่านั้น";
			
			if($_POST['id'] != ""){
				echo "<script>
                        alert(' ".$chtext."');
                        window.location='ae_question.php?exam_id=".$_POST['exam_id']."&question_id=".$_POST['id']."';
                      </script>";
			}
			else
			{
				echo "<script>
                        alert(' ".$chtext."');
                        window.location='ae_question.php?exam_id=".$_POST['exam_id']."';
                      </script>";
			}
        }

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $pic_name);
        } else {
            $chk = 1;
        }
    }
	
	
	
	
	if (isset($_FILES['choise_pic1']['name']) && $_FILES['choise_pic1']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic1']['name'];
        $file_size = $_FILES['choise_pic1']['size'];
        $file_tmp = $_FILES['choise_pic1']['tmp_name'];
        $file_type = $_FILES['choise_pic1']['type'];
        $tmp = explode('.', $_FILES['choise_pic1']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic1 = "1".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");


        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic1);
			$_part_sql .=" ,choise_pic1='{$choise_pic1}'";
        } else {
            $chk = 1;
        }
    }
	
	if (isset($_FILES['choise_pic2']['name']) && $_FILES['choise_pic2']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic2']['name'];
        $file_size = $_FILES['choise_pic2']['size'];
        $file_tmp = $_FILES['choise_pic2']['tmp_name'];
        $file_type = $_FILES['choise_pic2']['type'];
        $tmp = explode('.', $_FILES['choise_pic2']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic2 = "2".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic2);
			$_part_sql .=" ,choise_pic2='{$choise_pic2}'";
        } else {
            $chk = 1;
        }
    }
	
	
	if (isset($_FILES['choise_pic3']['name']) && $_FILES['choise_pic3']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic3']['name'];
        $file_size = $_FILES['choise_pic3']['size'];
        $file_tmp = $_FILES['choise_pic3']['tmp_name'];
        $file_type = $_FILES['choise_pic3']['type'];
        $tmp = explode('.', $_FILES['choise_pic3']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic3 = "3".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic3);
			$_part_sql .=" ,choise_pic3='{$choise_pic3}'";
        } else {
            $chk = 1;
        }
    }
	
	if (isset($_FILES['choise_pic4']['name']) && $_FILES['choise_pic4']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic4']['name'];
        $file_size = $_FILES['choise_pic4']['size'];
        $file_tmp = $_FILES['choise_pic4']['tmp_name'];
        $file_type = $_FILES['choise_pic4']['type'];
        $tmp = explode('.', $_FILES['choise_pic4']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic4 = "4".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic4);
			$_part_sql .=" ,choise_pic4='{$choise_pic4}'";
        } else {
            $chk = 1;
        }
    }
	
	if (isset($_FILES['choise_pic5']['name']) && $_FILES['choise_pic5']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic5']['name'];
        $file_size = $_FILES['choise_pic5']['size'];
        $file_tmp = $_FILES['choise_pic5']['tmp_name'];
        $file_type = $_FILES['choise_pic5']['type'];
        $tmp = explode('.', $_FILES['choise_pic5']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic5 = "5".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic5);
			$_part_sql .=" ,choise_pic5='{$choise_pic5}'";
        } else {
            $chk = 1;
        }
    }
	
	  $sql = "UPDATE tbl_exam_detail set question = '".$_POST['question']."' ,q_picture='".$pic_name."',choise_1='".$_POST['choise_1']."',choise_2='".$_POST['choise_2']."',choise_3='".$_POST['choise_3']."',choise_4='".$_POST['choise_4']."',choise_5='".$_POST['choise_5']."',answer_choise='".$_POST['answer_choise']."',answer_description='".$_POST['answer_description']."'".$_part_sql."  where id='".$_POST['id']."' ";

	
	}
else
{
	
	$choise_pic1;
	$choise_pic2;
	$choise_pic3;
	$choise_pic4;
	$choise_pic5;
	
	if (isset($_FILES['q_picture']['name']) && $_FILES['q_picture']['name'] != "") {
	
        $errors = array();
        $pic = $_FILES['q_picture']['name'];
        $file_size = $_FILES['q_picture']['size'];
        $file_tmp = $_FILES['q_picture']['tmp_name'];
        $file_type = $_FILES['q_picture']['type'];
        $tmp = explode('.', $_FILES['q_picture']['name']);
        $file_ext = strtolower(end($tmp));
        $pic_name = date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        if (in_array($file_ext, $expensions) === false) {
            $chtext = "ต้องเป็นไฟล์ .jpg หรือ .png เท่านั้น";
			
			
			
			if($_POST['id'] != ""){
				echo "<script>
                        alert(' ".$chtext."');
                        window.location='ae_question.php?exam_id=".$_POST['exam_id']."&question_id=".$_POST['id']."';
                      </script>";
			  //header("location:);
			}
			else{
				echo "<script>
                        alert(' ".$chtext."');
                        window.location='ae_question.php?exam_id=".$_POST['exam_id']."';
                      </script>";
				
				//header("location:);
			}
			 
        
        
    
			
        }

//        if ($file_size > 2097152) {
//            $errors[] = 'File size must be excately 2 MB';
//        }

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $pic_name);
        } else {
            $chk = 1;
        }
    }
	


	if (isset($_FILES['choise_pic1']['name']) && $_FILES['choise_pic1']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic1']['name'];
        $file_size = $_FILES['choise_pic1']['size'];
        $file_tmp = $_FILES['choise_pic1']['tmp_name'];
        $file_type = $_FILES['choise_pic1']['type'];
        $tmp = explode('.', $_FILES['choise_pic1']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic1 = "1".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");


        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic1);
			$_part_sql .=" ,choise_pic1='{$choise_pic1}'";
        } else {
            $chk = 1;
        }
    }
	
	if (isset($_FILES['choise_pic2']['name']) && $_FILES['choise_pic2']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic2']['name'];
        $file_size = $_FILES['choise_pic2']['size'];
        $file_tmp = $_FILES['choise_pic2']['tmp_name'];
        $file_type = $_FILES['choise_pic2']['type'];
        $tmp = explode('.', $_FILES['choise_pic2']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic2 = "2".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic2);
			$_part_sql .=" ,choise_pic2='{$choise_pic2}'";
        } else {
            $chk = 1;
        }
    }
	
	
	if (isset($_FILES['choise_pic3']['name']) && $_FILES['choise_pic3']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic3']['name'];
        $file_size = $_FILES['choise_pic3']['size'];
        $file_tmp = $_FILES['choise_pic3']['tmp_name'];
        $file_type = $_FILES['choise_pic3']['type'];
        $tmp = explode('.', $_FILES['choise_pic3']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic3 = "3".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic3);
			$_part_sql .=" ,choise_pic3='{$choise_pic3}'";
        } else {
            $chk = 1;
        }
    }
	
	if (isset($_FILES['choise_pic4']['name']) && $_FILES['choise_pic4']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic4']['name'];
        $file_size = $_FILES['choise_pic4']['size'];
        $file_tmp = $_FILES['choise_pic4']['tmp_name'];
        $file_type = $_FILES['choise_pic4']['type'];
        $tmp = explode('.', $_FILES['choise_pic4']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic4 = "4".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic4);
			$_part_sql .=" ,choise_pic4='{$choise_pic4}'";
        } else {
            $chk = 1;
        }
    }
	
	if (isset($_FILES['choise_pic5']['name']) && $_FILES['choise_pic5']['name'] != "") {
        $errors = array();
        $pic = $_FILES['choise_pic5']['name'];
        $file_size = $_FILES['choise_pic5']['size'];
        $file_tmp = $_FILES['choise_pic5']['tmp_name'];
        $file_type = $_FILES['choise_pic5']['type'];
        $tmp = explode('.', $_FILES['choise_pic5']['name']);
        $file_ext = strtolower(end($tmp));
        $choise_pic5 = "5".date('dmyHis') .".". $file_ext;
        $expensions = array("jpeg", "jpg", "png", "gif");

        

        if (empty($errors) == true) {
            $path = 'res/';
            move_uploaded_file($file_tmp, $path . $choise_pic5);
			$_part_sql .=" ,choise_pic5='{$choise_pic5}'";
        } else {
            $chk = 1;
        }
    }
	
	
	
	$sql = "insert into tbl_exam_detail (exam_id,question,q_picture,choise_1,choise_2,choise_3,choise_4,choise_5,answer_choise,answer_description,created_date ,choise_pic1 ,choise_pic2 ,choise_pic3 ,choise_pic4 ,choise_pic5) 
	
	values('".$_POST['exam_id']."' ,'".$_POST['question']."' ,'".$pic_name."','".$_POST['choise_1']."','".$_POST['choise_2']."','".$_POST['choise_3']."', '".$_POST['choise_4']."','".$_POST['choise_5']."','".$_POST['answer_choise']."','".$_POST['answer_description']."',now(),'".$choise_pic1."','".$choise_pic2."','".$choise_pic3."','".$choise_pic4."','".$choise_pic5."')";
	
}
//echo $sql;
 $result = mysqli_query($conn,$sql);

if($result){
	$_SESSION['msg'] = "s";
	
}else{
	$_SESSION['msg'] = "f";
	 mysqli_error($conn);
}

if($_POST['id'] != ""){

  header("location:ae_question.php?exam_id=".$_POST['exam_id']."&question_id=".$_POST['id']);
}
else{
	 header("location:ae_question.php?exam_id=".$_POST['exam_id']);
}

?>