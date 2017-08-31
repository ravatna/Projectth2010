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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="../css/admin_book_form.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
        
    </head>

    <!-- body -->
    <body >

        <!-- container -->
        <div class="container" style="width:1024px !important;">

            <?php include_once("_admin_top_header.php"); ?>

               
            <!-- row main -->
            <div class="row">
                
            <!-- colmnu main -->
            <div class="panel-x-container" style="padding: 10px; 
  background-color: #F7F7F7 !important;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;  ">

             

            <!-- row datatable -->
            <div class="row" >

                <!-- left column -->
                <div class=" col-lg-12">

                    <div class="app-panel" 
                    style=" width:100%;   height:1230px; " >
                        
                   <!-- form manage book is here -->
                    <?php include_once("_borrow_datatable.php"); ?>
                    </div>
                    
                </div> <!-- .End column -->

            </div> <!-- .End row -->


            </div> <!-- .End column -->

            </div> <!-- .End row -->


        </div> <!-- .End container -->
        
<?php include_once("_book_for_borrow.php"); ?>
<?php include_once("_book_from_booking.php"); ?>
    </body>
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script> 	 
    <script type="text/javascript" src="../js/jquery.gallery.js"></script>
	
	
	<script>
	$(document).ready(function(){
		$('#table_id').DataTable();
	});
	</script>
</html>