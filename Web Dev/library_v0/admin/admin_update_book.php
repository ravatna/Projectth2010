<?PHP
error_reporting(E_ALL);
session_start();
include "../include/config.php";
include "../include/function.php";
?>

<html><head>
        <title>ห้องสมุด 4.0</title>
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">

        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <!-- Bootstrap core CSS --> 

        <link rel="stylesheet" type="text/css" href="../css/login_form.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        
    </head>

    <!-- body -->
    <body >

        <!-- container -->
        <div class="container">

            <?php include_once("_admin_top_header.php"); ?>

              <?php include_once("_admin_main_menu.php"); ?>

            <!-- row main -->
            <div class="row">
                
            <!-- colmnu main -->
            <div class="panel-x-container" style="padding: 10px; 
  background-color: #F7F7F7 !important;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden; ">

<a class="btn btn-md btn-primary" href="admin_manage_book.php?is_ebook=<?=@$_GET['is_ebook']?>"><span class="glyphicon glyphicon-arrow-left">&nbsp;ย้อนกลับ</a>
<hr style="margin-top:5px; margin-bottom:5px;" />
<div class="panel panel-primary">
                        <div class="panel-heading">
                            ฟอร์มจัดการข้อมูลหนังสือ และอื่นๆ
                        </div>
                        <div class="panel-body">
                            <!-- form manage book is here -->
                            <?php include_once("_book_form.php"); ?>
                        </div>
                        <div class="panel-footer">
                            <i>*ตรวจสอบข้อมูลให้ถูกต้องก่อนการบันทึกรายการ</i>
                        </div>
                    </div>

             
             


            </div> <!-- .End column -->

            </div> <!-- .End row -->


        </div> <!-- .End container -->
        

    </body>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 	 
    <script type="text/javascript" src="../js/jquery.gallery.js"></script>
</html>