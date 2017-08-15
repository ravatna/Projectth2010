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

            <?php include_once("_admin_top_header2.php"); ?>

             <!-- row main -->
            <div class="row">

                <!-- left column -->
                <div class="col-12">
                
                <!-- panel main menu -->
                <ul class="nav nav-pills flex-column">

                    <li class="nav-item">
                        <a href="#" class="active nav-link">ระบบบริหารห้องสมุด</a>
                    </li>

                </ul>

                </div> <!-- .End column -->

            </div> <!-- .End row -->

            <!-- row main -->
            <div class="row">

                <!-- left column -->
                <div class="col-12">
                
                <?php include_once("_admin_login_form.php"); ?>

                </div> <!-- .End column -->

            </div> <!-- .End row -->

        </div> <!-- .End container -->
        

    </body>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 	 
    <script type="text/javascript" src="../js/jquery.gallery.js"></script>
</html>