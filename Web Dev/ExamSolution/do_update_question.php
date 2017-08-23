<?php
/**
	manage function for exam
*/

session_start();
// require need database.
require_once("include/include_mysql.php");
if($_POST['id'] != ""){
	
	
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	$sql = "UPDATE tbl_exam_detail set question = '".$_POST['question']."' ,q_picture='".$pic_name."',choise_1='".$_POST['choise_1']."',choise_2='".$_POST['choise_2']."',choise_3='".$_POST['choise_3']."',choise_4='".$_POST['choise_4']."',choise_5='".$_POST['choise_5']."',answer_choise='".$_POST['answer_choise']."',answer_description='".$_POST['answer_description']."'  where id='".$_POST['id']."' ";
}
else
{
	
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
	
	
	
	
	$sql = "insert into tbl_exam_detail (exam_id,question,q_picture,choise_1,choise_2,choise_3,choise_4,choise_5,answer_choise,answer_description,created_date) 
	
	values('".$_POST['exam_id']."' ,'".$_POST['question']."' ,'".$pic_name."','".$_POST['choise_1']."','".$_POST['choise_2']."','".$_POST['choise_3']."', '".$_POST['choise_4']."','".$_POST['choise_5']."','".$_POST['answer_choise']."','".$_POST['answer_description']."',now())";
	
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