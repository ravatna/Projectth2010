<?PHP
error_reporting(E_ALL);
session_start();
include "../include/config.php";
include "../include/function.php";
?>

<html><head>
        <title>ห้องสมุด 4.0 - พิมพ์บัตรสมาชิก</title>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <!-- Bootstrap core CSS --> 

        <link rel="stylesheet" type="text/css" href="../css/login_form.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <style>
        	.page {
		   size: 7in 9.25in !important;
		   margin: 16mm 16mm 16mm 16mm !important; 
		}

		@font-face {
			font-family: THSarabun;
			src: url('fonts/THSarabun.ttf');
		}
		body {
			font-family: THSarabun; 
}
</style>
    </head>

    <!-- body -->
    <body style="background-color:white !important;">

        
<!-- row main -->
            <div class="page" style="margin:4px;">
<h3>พิมพ์บัตรสมาชิก</h3>
                <!-- left column -->
                <div class=" col-lg-12">

<?php

$a = explode("|",$_GET['members']);
$j = join($a,",");
$j = substr($j,0,strlen($j) - 1);
$sql_student = "select * from tb_user where user_id in ({$j})";

$result_student = mysql_query($sql_student);
$inum = mysql_num_rows($result_student);

$iCardCount = 1;
$ic = 0;
 $y = 0;
    for($i =0 ; $i < ceil($inum/2); $i++){
       
        $y = $i * 200;
       for($j = 0; $j < 2; $j++){
          if($iCardCount > $inum){
                        break ;
                    }
            $x = ($j%2) * 341;
            $b = mysql_fetch_array($result_student);
?>
                    <div style="sposition:absolute; margin-left:<?=$x?>px; margin-top:<?=$y?>px;" >
                        <img id="img-background" src="../img/background_card.jpg" style="position:absolute; float:left;height:2in; width:3.5in;" />                       
                        <img id="img-logo" src="../img/logo_obec.png" style="margin-left:20px; margin-top:4px; position:absolute; float:left; width:40px;" />
                         
                        <div style="border-color:#20a8d8; margin-left:70px; margin-top:20px; font-size:18px; float:left;position:absolute; ">
                            โรงเรียนวัด
                        </div>

                        <img id="img-logo" src="../img/user.png" style="margin-left:20px; margin-top:70px; position:absolute; float:left; width:80px;" />

                        <div style="margin-left:110px; margin-top:130px; border-color:#20a8d8; float:left;position:absolute; ">
                            ขื่อ-สกุล: <?=@$b['firstname']?> <?=@$b['lastname']?>  
                        </div>
<img id="img-barcode"  style="margin-left:20px; margin-top:150px; position:absolute; float:left; height:30px; width:60px;" src="barcode.php?code=<?=@$b['user_id'];?>" />
                       

                    </div> <!-- .End card -->
                    
                    <?php 
                     $iCardCount++;
                    
       }
        

                   
    } 
                    ?>
                    
                </div> <!-- .End column -->

            </div> <!-- .End row -->

    </body>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 	 
    <script type="text/javascript" src="../js/jquery.gallery.js"></script>
</html>